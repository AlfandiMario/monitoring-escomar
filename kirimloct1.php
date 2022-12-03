<?php

$conn = mysqli_connect("localhost", "root", "", "baskarae_db");

ini_set('date.timezone', 'Asia/Jakarta');

$now = new DateTime();

$datenow = $now->format("Y-m-d H:i:s");
var_dump($_SERVER["REQUEST_METHOD"]);

//Ngambil data dari web
$tracking = $_POST['tracking'];

// Update data lokasi biar kolomnya hanya ada 1
$sql = "UPDATE tracking1 SET tracking = '$tracking' WHERE id = 1";


if ($conn->query($sql) === TRUE) {
     echo json_encode("Ok");
} else {
     echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
