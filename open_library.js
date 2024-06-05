

document.getElementById('search-form').addEventListener('submit', fetchSearch);

function fetchSearch(event) {
    event.preventDefault();
    const searchQuery = document.getElementById('search-input').value;
    fetch(`fetch_OL.php?search=${encodeURIComponent(searchQuery)}`)
        .then(response => response.json())
        .then(onJson)
        .catch(error => {
            console.error('Errore nella fetch:', error);
        });
}

function onJson(data) {
    const container = document.getElementById('results-container');
    const resultTitle = document.getElementById('result-title');
    container.innerHTML = '';
    const searchQuery = document.getElementById('search-input').value;
    resultTitle.textContent = `Risultati della ricerca per: "${searchQuery}"`;

    if (data.docs && data.docs.length > 0) {
        data.docs.forEach((book, index) => {
            const bookDiv = document.createElement('div');
            bookDiv.classList.add('libri');

            if (book.cover_i) {
                const img = document.createElement('img');
                img.src = `https://covers.openlibrary.org/b/id/${book.cover_i}-M.jpg`;
                img.alt = `Copertina di ${book.title_suggest}`;
                bookDiv.appendChild(img);
            }

            const title = document.createElement('h1');
            title.textContent = book.title_suggest;
            bookDiv.appendChild(title);

            // Immagine per il salvataggio
            const saveImgUrl = 'img/salva.png';
            const saveImg = document.createElement('img');
            saveImg.classList.add('img-salva');
            saveImg.id = `save-img-${index}`; // id unico per ogni salva img
            saveImg.src = saveImgUrl;
            saveImg.onclick = () => toggleSaveBook(book.title_suggest, book.cover_i, saveImg);
            bookDiv.appendChild(saveImg);

            container.appendChild(bookDiv);
            
        });
    } else {
        const noResult = document.createElement('h1');
        noResult.textContent = 'Nessun risultato trovato.';
        container.appendChild(noResult);
    }
}
function toggleSaveBook(title, cover_id, saveImg) {
    const isSaved = saveImg.src.includes('salvato.png');
    const url = isSaved ? 'elimina_OL_salvati.php' : 'aggiungi_OL_salvati.php';

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ title, cover_id })
    })
    .then(response => {
        console.log('Raw response:', response);
        return response.json();
    })
    .then(data => {
        console.log('Parsed JSON response:', data);
        if (data.success) {
            const saveImgUrl = isSaved ? 'img/salva.png' : 'img/salvato.png';
            console.log(isSaved ? 'rimosso' : 'salvato');
            saveImg.src = saveImgUrl;
        } else {
            alert('Errore nella richiesta: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Errore nella richiesta:', error);
    });
}
