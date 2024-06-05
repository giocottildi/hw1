const overlay = document.getElementById("overlay");
overlay.addEventListener('click', closeModal);
document.querySelector("#search form").addEventListener("submit", search);

function closeModal(event){
  console.log("Close modal");
  event.currentTarget.classList.add("hidden");
  const card = document.querySelector('.selected');
  card.classList.remove("selected");
  card.classList.remove("unselected");
  card.querySelector('img').classList.remove("img-selected");
  card.querySelector('.canzoneInfo').classList.remove("show");
  card.querySelector('.infoContainer').classList.remove("infoSelected");


}

function resizeSong(event){  
  console.log("Resize song");
  const playlist = event.currentTarget;
  // check if is already selected
  if (!event.currentTarget.classList.contains("selected")){
  overlay.classList.remove("hidden");

  event.currentTarget.classList.remove("unselected");
  event.currentTarget.classList.add("selected");
  event.currentTarget.querySelector('img').classList.add("img-selected"); 
  event.currentTarget.querySelector('.canzoneInfo').classList.add("show");
  event.currentTarget.querySelector('.infoContainer').classList.add("infoSelected");



} else {
  console.log('already selected');
}
}

  function jsonSpotify(json) {
    // svuoto i risultati
    console.log(json);
    const container = document.getElementById('results');
    container.innerHTML = '';
    container.className = 'spotify';
    if (!json.playlists.items.length) {noResults(); return;}
    
    for (let playlist in json.playlists.items) {
        const card = document.createElement('div');
        card.dataset.id = json.playlists.items[playlist].playlist_id;
        card.dataset.title = json.playlists.items[playlist].name;
        card.dataset.owner = json.playlists.items[playlist].owner.display_name;
        card.dataset.type = json.playlists.items[playlist].type;
        card.dataset.url = json.playlists.items[playlist].uri;
        card.dataset.tracks = json.playlists.items[playlist].tracks.total;
        // card.dataset.followers = json.playlists.items[playlist].followers.total; // Era una possibilta' ma a quanto pare hanno rimosso la funzionalita'
        console.log(json.playlists.items[playlist].followers);

        card.dataset.image = json.playlists.items[playlist].images[0].url;
        card.classList.add('playlist');
        
        // info sulle playlist quando unselected
        const playlistInfo = document.createElement('div');
        playlistInfo.classList.add('playlistInfo');
        card.appendChild(playlistInfo);

        const img = document.createElement('img');
        img.src = json.playlists.items[playlist].images[0].url;
        playlistInfo.appendChild(img);

        const infoContainer = document.createElement('div');
        infoContainer.classList.add("infoContainer");
        playlistInfo.appendChild(infoContainer);

        const info = document.createElement('div');
        info.classList.add("info");
        infoContainer.appendChild(info);

        const name = document.createElement('strong');
        name.innerHTML = json.playlists.items[playlist].name;
        info.appendChild(name);   

        const owner = document.createElement('a');
        owner.innerHTML = 'Creatore: ' + json.playlists.items[playlist].owner.display_name;        
        info.appendChild(owner);
        
        
        // info sulle canzoni quando selected
        const canzoneInfo= document.createElement('div');
        canzoneInfo.classList.add("canzoneInfo");

        const tracks = document.createElement('p');
        tracks.innerHTML = 'Numero di brani: '+ json.playlists.items[playlist].tracks.total;
        canzoneInfo.appendChild(tracks);

        // const followers = document.createElement('p');
        // followers.innerHTML = 'Followers: ' + json.playlists.items[playlist].followers.total; funzionalita' rimossa dall'api di spotify...
        // canzoneInfo.appendChild(followers);

        const type = document.createElement('p');
        type.innerHTML = 'Tipo: ' + json.playlists.items[playlist].type;        
        canzoneInfo.appendChild(type);

        const url = document.createElement('p');
        url.innerHTML = 'URL: ' + json.playlists.items[playlist].uri;        
        canzoneInfo.appendChild(url);

        card.appendChild(canzoneInfo);

        // aggiungiamo la classe unselected a tutte le canzoni come default
        card.classList.add("unselected");
        // aggiungiamo l'event listener per il resize
        card.addEventListener('click', resizeSong);
        // aggiungiamo la canzone al container
        container.appendChild(card);
        }
}

function noResults() {
  // Definisce il comportamento nel caso in cui non ci siano contenuti da mostrare
  const container = document.getElementById('results');
  container.innerHTML = '';
  const nores = document.createElement('div');
  nores.className = "loading";
  nores.textContent = "Nessun risultato.";
  container.appendChild(nores);
}

function onResult(result){
  console.log(result);
  return result.json();
}


const formPlaylist = document.getElementById("form-playlist");
formPlaylist.addEventListener('submit', search);
const searchPlaylist = formPlaylist.querySelector('#search-playlist');


function search(event){
  if(searchPlaylist.value.length == 0){
      console.log("search bar vuota");
      return null;
  } else {
      fetchSpotify(searchPlaylist.value, "token_spotify.php");
      searchPlaylist.value = "";
  }
  event.preventDefault();
}

async function fetchSpotify(playlist, url){
  const data = {
    playlist_searched: playlist
  };
  try {
    const queryResult = await fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    });

    if (!queryResult.ok) {
      throw new Error('Network response was not ok ' + queryResult.statusText);
    }

    const onJson = await queryResult.json();
    
    if (url == "token_spotify.php"){
      checkToken(onJson);
    } else if (url == "mostra_cronologia_spotify.php") {
      checkCronologia(onJson);
    } else if (url == "elimina_cronologia_spotify.php") {
      return onJson; 
    }

    return onJson; 

  } catch (error) {
    console.error('Fetch error: ', error);
    return null; 
  }
}

function checkToken(result){
  jsonSpotify(result.getPlaylist);
  console.log('token ricevuto');
  fetchSpotify(result.playlist, "aggiungi_cronologia_spotify.php");
  aggiungiCronologia(result.playlist);
  console.log('cronologia fetchata!');
}

function onResult(result) {
console.log('Risposta ricevuta');
console.log(result);
}


/*Funzioni cronologia*/


const deleteAllbutton = document.getElementById("elimina-tutto");
deleteAllbutton.addEventListener("click", eliminaCronologia);



function aggiungiCronologia(history){
  console.log('playlist cercata: ');
  console.log(history);
  const box_cronologia_fine = document.getElementById("container-cronologia");
  const box_scritta_fine = document.createElement('a');
  box_scritta_fine.classList.add('cronologia-a');
  box_scritta_fine.textContent = (history);
  box_cronologia_fine.appendChild(box_scritta_fine);
  box_cronologia_fine.appendChild(document.createElement('br'));
  console.log('cronologia aggiunta');
}



async function caricaCronologia(){
  await fetchSpotify("mostraCronologia", "mostra_cronologia_spotify.php");
  console.log('caricata!');
}


function checkCronologia(result) {
  const box_cronologia = document.getElementById("container-cronologia");
  if (result && result.save === true) {
    mostraCronologia(result.crono);
  } else if (result && result.crono) {
    const span = document.createElement('span');
    span.classList.add("cronologia-a");
    span.textContent = result.crono;
    box_cronologia.appendChild(span);
  }
}

function mostraCronologia(history){
  const box_cronologia = document.getElementById("container-cronologia");
  for(let a=0; a<history.length;a++){
      const box_scritta = document.createElement('a');
      box_scritta.classList.add('cronologia-a');
      box_scritta.textContent = (history[a].research);
      box_cronologia.appendChild(box_scritta);
      box_cronologia.appendChild(document.createElement('br'));
  }
}

caricaCronologia();


async function eliminaCronologia() {
  try {
    console.log('Inizio eliminazione cronologia');
    const response = await fetchSpotify("eliminaCronologia", "elimina_cronologia_spotify.php");

    console.log('Risposta fetchSpotify:', response);
    if (response) {
      console.log('Cronologia eliminata con successo');
      
      const box_cronologia = document.getElementById("container-cronologia");
      box_cronologia.innerHTML = ''; // innerHTML --> imposto tutto su stringa vuota --> elimino i record precedenti
    } else {
      console.error('Errore durante l eliminazione della cronologia');
    }
  } catch (error) {
    console.error('Errore durante l eliminazione della cronologia:', error);
  }
}



