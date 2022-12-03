<?php

$conn = mysqli_connect("localhost", "root", "", "baskarae_db");

ini_set('date.timezone', 'Asia/Jakarta');

$now = new DateTime();

$datenow = $now->format("Y-m-d H:i:s");

//Ngambil data dari web
$rfid = $_POST['rfid'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$prodi = $_POST['prodi'];


//Masukin data ke MySQL
$sql = "INSERT INTO monitoring1 VALUES ('',
                    '$rfid',
     			'$nama',
				'$nim',
				'$prodi')";

if ($conn->query($sql) === TRUE) {
     echo json_encode("Ok");
} else {
     echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
