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
    $nomePlaylist = mysqli_real_escape_string($conn, $data['playlist_searched']);

    $getUserID = "SELECT id FROM users WHERE username = '$user'";
    $result_getUserID = $conn->query($getUserID);
    
    if ($result_getUserID->num_rows > 0) {
        $row = $result_getUserID->fetch_assoc();

        $idUtente = $row['id'];
        $insert = "INSERT INTO ricerche_spotify (id_user, ricerca) VALUES ('$idUtente','$nomePlaylist')";
        if ($conn->query($insert) === TRUE) {
            echo json_encode(array("username" => true, "save" => true));
        }else{
           echo json_encode(array("username" => true, "save" => false));
        }   
    } else {
        echo json_encode(array("username" => false, "save" => false));
    }

    $conn->close();
?>