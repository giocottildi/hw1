<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hw1";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT titolo FROM titoli_libri";
$result = $conn->query($sql);

$options = '';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['titolo'] . '">' . $row['titolo'] . '</option>';
    }
} else {
    $options = '<option value="">Nessun libro trovato</option>';
}


$conn->close();


echo $options;
?>
