
//Cambiamento dinamico dell'altezza dell'header

function toggleHeaderPosition() {
  const header = document.querySelector('header');
  const sh_img = document.querySelector('.flex-item2 a img');
  if (window.scrollY > 0) {
      header.style.position = 'fixed';
      header.style.top = '0';
      header.style.height = '80px'; // New height when scrolling
      sh_img.style.width = '100%';
      sh_img.style.height = '50%';
  } else {
      header.style.position = 'static';
      header.style.height = '120px'; // Default height
      sh_img.style.width = '100%';
      sh_img.style.height = '100%';
  }
}

window.addEventListener('scroll', toggleHeaderPosition);


// Gestione di apertura e chiusura MENU PER COLLEGAMENTI NELLA STESSA PAGINA

function unvediMenu(event)
{
    console.log('Chiudi menu');
    const chiudiMenu = event.currentTarget;
    chiudiMenu.removeEventListener('click', unvediMenu);

    const chiudiSubMenu = document.querySelector('#container-menu');

    chiudiSubMenu.classList.add('hidden');
    const apriMenu = document.querySelector('#menu img');
    apriMenu.addEventListener('click', vediMenu);
}



function vediMenu(event)
{
    console.log('Apri menu');
    const apriMenu = event.currentTarget;
    apriMenu.removeEventListener('click', vediMenu);

    const apriSubMenu = document.querySelector('#container-menu');

    apriSubMenu.classList.remove('hidden');
    const chiudiMenu = document.querySelector('#menu img');
    chiudiMenu.addEventListener('click', unvediMenu);
}
const apriMenu = document.querySelector('#menu img');
apriMenu.addEventListener('click', vediMenu);


// Gestione di apertura e chiusura MY ACCOUNT

function unvediMyAccount(event)
{
    console.log('Chiudi account');
    const chiudiMyAccount = event.currentTarget;
    chiudiMyAccount.removeEventListener('click', unvediMyAccount);

    const chiudiSubMyAccount = document.querySelector('#container-account');

    chiudiSubMyAccount.classList.add('hidden');
    const apriMyAccount = document.querySelector('#account h1');
    apriMyAccount.addEventListener('click', vediMyAccount);
}



function vediMyAccount(event)
{
    console.log('Apri account');
    const apriMyAccount = event.currentTarget;
    apriMyAccount.removeEventListener('click', vediMyAccount);

    const apriSubMyAccount = document.querySelector('#container-account');

    apriSubMyAccount.classList.remove('hidden');
    const chiudiMyAccount = document.querySelector('#account h1');
    chiudiMyAccount.addEventListener('click', unvediMyAccount);
}
const apriMyAccount = document.querySelector('#account h1');
apriMyAccount.addEventListener('click', vediMyAccount);


// utilizzo di addEventListener e modifica dinamica di una img tramite src

function cambiaImmaginedx()
{
    const image_dx = document.querySelector('.magazine a img');
    
    if(image_dx.src.includes('img/libri.jpg')){
        image_dx.src = 'img/uscita1.png';
    }else if(image_dx.src.includes('img/uscita1.png')){
        image_dx.src = 'img/uscita2.png';
    }
    else if(image_dx.src.includes('img/uscita2.png')){
        image_dx.src = 'img/uscita3.png';
    }
    else if(image_dx.src.includes('img/uscita3.png')){
        image_dx.src = 'img/libri.jpg';
    }
    // console.log(image.src);
    console.log('cambio dx effettuato!');
    image_dx.removeEventListener('click', cambiaImmaginedx);
}

const image_dx = document.querySelector('#right-arrow');
image_dx.addEventListener('click', cambiaImmaginedx);


function cambiaImmaginesx()
{
    const image_sx = document.querySelector('.magazine a img');
    
    if(image_sx.src.includes('img/libri.jpg')){
        image_sx.src = 'img/uscita3.png';
    }
    else if(image_sx.src.includes('img/uscita3.png')){
        image_sx.src = 'img/uscita2.png';
    }
    else if(image_sx.src.includes('img/uscita2.png')){
        image_sx.src = 'img/uscita1.png';
    }
    else if(image_sx.src.includes('img/uscita1.png')){
        image_sx.src = 'img/libri.jpg';
    }
    // console.log(image.src);
    console.log('cambio sx effettuato!');
    image_sx.removeEventListener('click', cambiaImmaginesx);
}

const image_sx = document.querySelector('#left-arrow');
image_sx.addEventListener('click', cambiaImmaginesx);

// Utilizzo di modifica dinamica del display + utilizzo di classList

function unvediUscite(event)
{
    // console.log('Chiudi');
    const chiudi = event.currentTarget;
    chiudi.removeEventListener('click', unvediUscite);

    const chiudiUscite = document.querySelector('#nascosto');

    chiudiUscite.classList.add('hidden');
    const apri = document.querySelector('.uscite a');
    apri.addEventListener('click', vediUscite);
}



function vediUscite(event)
{
    const apri = event.currentTarget;
    apri.removeEventListener('click', vediUscite);

    const apriUscite = document.querySelector('#nascosto');

    apriUscite.classList.remove('hidden');
    const chiudi = document.querySelector('.uscite a');
    chiudi.addEventListener('click', unvediUscite);
}
const apri = document.querySelector('.uscite a');
apri.addEventListener('click', vediUscite);




// uso di document.createElement() + data-*

function sfida(event){
    const new_h1 = document.createElement('h1');
    new_h1.textContent = 'MPH! Non credevo avresti accettato, hai del fegato! Questo è il primo passo per diventare un detective!';
    const new_img = document.createElement('img');
    new_img.src = 'img/post_game_sh.jpg';
    const gioco = document.querySelector('#gioco button');
    gioco.innerHTML = '';
    gioco.appendChild(new_h1);
    gioco.appendChild(new_img);

    
  console.log(event.currentTarget.dataset.clicked, 'Cliccato');
  }
  const game = document.querySelector('#gioco button');
  game.addEventListener('click', sfida);

  
// API GUTENBERG


function onJson1(json) {
    console.log('JSON ricevuto');
    // Svuotiamo la libreria
    const elenco = document.querySelector('#elenco-view');
    
    elenco.innerHTML = '';
    // Leggi il numero di risultati
    let num_results = json.count;
    // Mostriamone al massimo 15
    if(num_results > 15)
      num_results = 15;

    console.log(num_results);
// Processa ciascun risultato
for(let i=0; i<num_results; i++)
    {
        
      // Leggi il documento
      const doc = json.results[i]
      // Leggiamo info
      const title = doc.title;
      const id = doc.id[0];      
      // Creiamo il div che conterrà la didascalia
      const book = document.createElement('div');
      book.classList.add('book');
      // // Creiamo la didascalia
       const caption = document.createElement('div');
       caption.textContent = title;
       // Aggiungiamo didascalia al div
       book.appendChild(caption);
      // Aggiungiamo il div alla libreria
      elenco.appendChild(book);
    }
    console.log('ecco il risultato');
  }
  function onResponse1(response) {
    console.log('Risposta ricevuta');
    return response.json();
  }

  function search1(event)
{
  // Impedisci il submit del form
  event.preventDefault();
  // Leggi valore del campo di testo
  const topic_input = document.querySelector('#topic');
  const topic_value = encodeURIComponent(topic_input.value);
  const language_input = document.querySelector('#language');
  const language_value = encodeURIComponent(language_input.value);

  console.log('Eseguo ricerca: ' + topic_value + language_value);
  // Prepara la richiesta
  rest_url = 'https://gutendex.com/books/?topic=' + topic_value + '&language=' + language_value;
  console.log('URL: ' + rest_url);
  // Esegui fetch
  fetch(rest_url).then(onResponse1).then(onJson1);
}

// Aggiungi event listener al form
const form1=document.querySelector('#form1');
form1.addEventListener('submit', search1)



  
// API LIBRARY

function onJson2(json) {
    console.log('JSON ricevuto');
    // Svuotiamo la libreria
    const library = document.querySelector('#library-view');
    library.innerHTML = '';
    // Leggi il numero di risultati
    let num_results = json.num_found;
    // Mostriamone al massimo 10
    if(num_results > 10)
      num_results = 10;
    // Processa ciascun risultato
    for(let i=0; i<num_results; i++)
    {
      // Leggi il documento
      const doc = json.docs[i]
      // Leggiamo info
      const title = doc.title;
      const isbn = doc.isbn[0];
      // Costruiamo l'URL della copertina
      const cover_url = 'http://covers.openlibrary.org/b/isbn/' + isbn + '-M.jpg';
      // Creiamo il div che conterrà immagine e didascalia
      const book = document.createElement('div');
      book.classList.add('book');
      // Creiamo l'immagine
      const img = document.createElement('img');
      img.src = cover_url;
      // Creiamo la didascalia
      const caption = document.createElement('span');
      caption.textContent = title;
      // Aggiungiamo immagine e didascalia al div
      book.appendChild(img);
      book.appendChild(caption);
      // Aggiungiamo il div alla libreria
      library.appendChild(book);
    }
  }
  
  function onResponse2(response) {
    console.log('Risposta ricevuta');
    return response.json();
  }
  
  function search2(event)
  {
    // Impedisci il submit del form
    event.preventDefault();
    // Leggi valore del campo di testo
    const titolo_input = document.querySelector('#titolo');
    const titolo_value = encodeURIComponent(titolo_input.value);
    console.log('Eseguo ricerca: ' + titolo_value);
    // Prepara la richiesta
    rest_url = 'http://openlibrary.org/search.json?title=' + titolo_value;
    console.log('URL: ' + rest_url);
    // Esegui fetch
    fetch(rest_url).then(onResponse2).then(onJson2);
  }
  
  // Aggiungi event listener al form
  const form2 = document.querySelector('#form2');
  form2.addEventListener('submit', search2)
  
  
  function onJson3(json) {
    console.log('JSON ricevuto');
    // Svuotiamo la libreria
    const library = document.querySelector('#playlist-view');
    library.innerHTML = '';
    // Leggi il numero di risultati
    const results = json.playlists.items;
    let num_results = results.length;
    // Mostriamone al massimo 10
    if(num_results > 10)
      num_results = 10;
    // Processa ciascun risultato
    for(let i=0; i<num_results; i++)
    {
      // Leggi il documento
      const playlist_data = results[i]
      // Leggiamo info
      const title = playlist_data.name;
      const selected_image = playlist_data.images[0].url;
      // Creiamo il div che conterrà immagine e didascalia
      const playlist = document.createElement('div');
      playlist.classList.add('playlist');
      // Creiamo l'immagine
      const img = document.createElement('img');
      img.src = selected_image;
      // Creiamo la didascalia
      const caption = document.createElement('span');
      caption.textContent = title;
      // Aggiungiamo immagine e didascalia al div
      playlist.appendChild(img);
      playlist.appendChild(caption);
      // Aggiungiamo il div alla libreria
      library.appendChild(playlist);
    }
  }
  
  function onResponse3(response) {
    console.log('Risposta ricevuta');
    return response.json();
  }
  
  function search3(event)
  {
    // Impedisci il submit del form
    event.preventDefault();
    // Leggi valore del campo di testo
    const playlist_input = document.querySelector('#playlist');
    const playlist_value = encodeURIComponent(playlist_input.value);
    console.log('Eseguo ricerca: ' + playlist_value);
    // Esegui la richiesta
    fetch("https://api.spotify.com/v1/search?type=playlist&q=" + playlist_value,
      {
        headers:
        {
          'Authorization': 'Bearer ' + token
        }
      }
    ).then(onResponse3).then(onJson3);
  }
  
  function onTokenJson(json)
  {
    // Imposta il token global
    token = json.access_token;
  }
  
  function onTokenResponse(response)
  {
    return response.json();
  }
  
  
  // OAuth credentials 
  const client_id = 'b578f91cd2f642d5b42918f1d732b32a';                
  const client_secret = '92148741eb824bb5898f8b23b8695f46';
  // Dichiara variabile token
  let token;
  // All'apertura della pagina, richiediamo il token
  fetch("https://accounts.spotify.com/api/token",
      {
     method: "post",
     body: 'grant_type=client_credentials',
     headers:
     {
      'Content-Type': 'application/x-www-form-urlencoded',
      'Authorization': 'Basic ' + btoa(client_id + ':' + client_secret)
     }
    }
  ).then(onTokenResponse).then(onTokenJson);
  // Aggiungi event listener al form
  const form3 = document.querySelector('#form3');
  form3.addEventListener('submit', search3)




  async function logoutClick()
  {
    console.log('logout!');
    await fetch('logout.php');
    window.open("index.php", "_self");
  }
  const logout = document.querySelector('#log-out');
  logout.addEventListener('click', logoutClick);
