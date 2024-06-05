<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hw1";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}

    $data = json_decode(file_get_contents("php://input"), true);

    $user = mysqli_real_escape_string($conn, $_SESSION['username']);
    $nomePlaylist = mysqli_real_escape_string($conn, $data['playlist_searched']);
    $show = mysqli_real_escape_string($conn, $data['playlist_searched']);
    $crono = array();

    $getUserID = "SELECT id FROM users WHERE username = '$user'";
    $result_getUserID = $conn->query($getUserID);
    
    if ($result_getUserID->num_rows > 0) {
        $row = $result_getUserID->fetch_assoc();

        $idUtente = $row['id'];
        $query = "SELECT ricerca FROM ricerche_spotify WHERE id_user = '$idUtente'";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $crono[] = $row;
            }
            echo json_encode(array("crono" => $crono, "save" => true));
        }else{
           echo json_encode(array("crono" => "no history", "save" => false));
        }   
    } else {
        echo json_encode(array("crono" => false, "save" => false));
    }

    $conn->close();
?>