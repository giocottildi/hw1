<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hw1";

session_start();

$conn = mysqli_connect($servername, $username, $password, $dbname);


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
        $delete = "DELETE FROM ricerche_spotify WHERE id_user = '$idUtente'";
        if ($conn->query($delete) === TRUE) {
            echo json_encode(array("username" => true, "delete" => true));
        }else{
           echo json_encode(array("username" => true, "delete" => false));
        }   
    } else {
        echo json_encode(array("username" => false, "delete" => false));
    }

    $conn->close();
?>