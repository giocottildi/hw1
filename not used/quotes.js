const quotes = [
    'Ciò che un uomo può inventare, un altro può scoprire. (da L`avventura degli omini danzanti)',
    'Da molto tempo il mio assioma è che le piccole cose sono di gran lunga le più importanti. (da Un caso di identità)',
    'È un errore enorme teorizzare a vuoto. Senza accorgersene, si comincia a deformare i fatti per adattarli alle teorie, anziché il viceversa. (da Uno scandalo in Boemia)',
    'È un errore confondere ciò che è strano con ciò che è misterioso. Spesso, il delitto più banale è il più incomprensibile proprio perché non presenta aspetti insoliti o particolari, da cui si possono trarre delle deduzioni. (da Uno studio in rosso)' ,
    'Eliminato l`impossibile, ciò che resta, per quanto improbabile sia, deve essere la verità. (da Il segno dei quattro)' ,
    'Il modo migliore per recitare una parte è quello di viverla. (da L`avventura del detective morente)' ,
    'Il mondo è pieno di cose ovvie che nessuno si prende mai la cura di osservare. (da Il mastino dei Baskerville)' ,
    'Il tocco supremo dell`artista – sapere quando fermarsi. (da L`avventura del costruttore di Norwood)' ,
    'La mia vita non è che un continuo sforzo per sfuggire alla banalità dell`esistenza. (da La lega dei capelli rossi)' ,
    'La prova principale della vera grandezza di un uomo è la sua percezione della propria piccolezza. (da Il segno dei quattro)' ,
    'Nella matassa incolore della vita scorre il filo rosso del delitto, e il nostro compito sta nel dipanarlo, nell`isolarlo, nell`esporne ogni pollice. (da Uno studio in rosso)' ,
    'Non faccio mai eccezioni. Un`eccezione contraddice la regola. (da Il segno dei quattro)' ,
    'Non posso vivere se non faccio lavorare il cervello. Quale altro scopo c`è nella vita? (da Il segno dei quattro)' ,
    'Non sono fra coloro che considerano la modestia una virtù. Per un uomo dotato di logica, tutte le cose andrebbero viste esattamente come sono, e sottovalutare se stessi significa allontanarsi dalla verità almeno quanto sopravvalutare le proprie doti. (da L`interprete greco)',
    'Nulla è più innaturale dell`ovvio. (da Un caso di identità)',
    'Quella dell`investigazione è, o dovrebbe essere, una scienza esatta e andrebbe quindi trattata in maniera fredda e distaccata. (da Il segno dei quattro)',
    'Sono proprio le soluzioni più semplici quelle che in genere vengono trascurate. (da Il segno dei quattro)',
    'Tutto ciò che non è noto appare straordinario. (da Il mastino dei Baskerville)',
    'Una deduzione giusta ne suggerisce invariabilmente altre. (da Silver Blaze)'
];

/*
function generaQuotes(event)
{
    const genera = event.currentTarget;
    console.log('genera cliccata');

    const randomIndex = Math.floor(Math.random() * quotes.length);
    const randomText = document.querySelector('#random-quote');
    randomText.textContent = quotes[randomIndex];

    console.log('generata');
}
const genera = document.querySelector('#button-genera');
genera.addEventListener('click', generaQuotes);
*/


function generaQuotes()
{

    const randomIndex = Math.floor(Math.random() * quotes.length);
    const randomText = document.querySelector('#random-quote h1');
    randomText.textContent = quotes[randomIndex];

    console.log('generata');
}
//cambia automaticamente quote dopo tot secondi
setInterval(generaQuotes, 2500);