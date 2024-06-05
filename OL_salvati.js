document.addEventListener('DOMContentLoaded', fetchSavedBooks);

function fetchSavedBooks() {
    fetch('check_OL_salvati.php')
        .then(response => response.json())
        .then(onJson)
        .catch(error => {
            console.error('Errore nella fetch:', error);
        });
}

function onJson(data) {
    const container = document.getElementById('saved-results-container');
    if (data.success) {
        data.books.forEach((book, index) => {
            const bookDiv = document.createElement('div');
            bookDiv.classList.add('libri');

            if (book.cover_id) {
                const img = document.createElement('img');
                img.src = `https://covers.openlibrary.org/b/id/${book.cover_id}-M.jpg`;
                img.alt = `Copertina di ${book.title}`;
                bookDiv.appendChild(img);
            }

            const title = document.createElement('h1');
            title.textContent = book.title;
            bookDiv.appendChild(title);

            // Immagine per il salvataggio
            const saveImgUrl = 'img/salvato.png';
            const saveImg = document.createElement('img');
            saveImg.classList.add('img-salva');
            saveImg.id = `save-img-${index}`; // id unico per ogni salva img
            saveImg.src = saveImgUrl;
            saveImg.onclick = () => toggleSaveBook(book.title, book.cover_id, saveImg);
            bookDiv.appendChild(saveImg);

            container.appendChild(bookDiv);
        });
    } else {
        const noResult = document.createElement('h1');
        noResult.textContent = 'Nessun libro salvato trovato.';
        container.appendChild(noResult);
    }
}
