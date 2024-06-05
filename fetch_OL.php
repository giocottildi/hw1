<?php
// Funzione per effettuare una richiesta GET all'API di Open Library
function fetchBooks($query) {
    // URL ricerca dell'API di Open Library
    $url = "https://openlibrary.org/search.json?q=" . urlencode($query) . "&limit=12";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPGET, true);

    $response = curl_exec($ch);

    // Controlla se ci sono errori
    if ($response === false) {
        $error = curl_error($ch);
        curl_close($ch);
        die("Errore nella richiesta cURL: " . $error);
    }

    curl_close($ch);

    $data = json_decode($response, true);

    return $data;
}

if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    $results = fetchBooks($searchQuery);
    header('Content-Type: application/json');
    echo json_encode($results);
    exit;
}
?>
