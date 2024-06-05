<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hw1";

// Creazione connessione
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Controllo connessione
if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}

    $data = json_decode(file_get_contents("php://input"), true);

    $user = mysqli_real_escape_string($conn, $_SESSION['username']);
    $idCover = mysqli_real_escape_string($conn, $data['cover_id']);
    $title = mysqli_real_escape_string($conn, $data['title']);


    $getUserID = "SELECT id FROM users WHERE username = '$user'";
    $result_getUserID = $conn->query($getUserID);
    
    if ($result_getUserID->num_rows > 0) {
        $row = $result_getUserID->fetch_assoc();
    
        $idUtente = $row['id'];
    
        $sql = "INSERT INTO OL_salvati (id_user, title, cover_id) VALUES ($idUtente, '$title', '$idCover')";
    
// IMPORTANTISSIMO (TEST): https://covers.openlibrary.org/b/id/cover_id-S.jpg --> sostituisci cover_id con quello che ti salvi nel db per trovare la cover

        // Esecuzione della query
        if ($conn->query($sql) === TRUE) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Errore: ' . $conn->error]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Nessun utente trovato']);
    }
    
    $conn->close();
?>


