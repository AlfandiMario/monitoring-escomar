<?php

//Koneksi ke Database
// $db = mysqli_connect("host", "user", "password", "nama db")
$db = mysqli_connect("localhost", "root", "", "baskarae_db");


//Query
function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function registrasi($databaru)
{
    global $db;
    $username = strtolower(stripslashes($databaru["username"]));
    $password = mysqli_real_escape_string($db, $databaru["password"]);
    $password2 = mysqli_real_escape_string($db, $databaru["password2"]);

    //Cek username
    $result = mysqli_query($db, "SELECT username FROM admin WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username sudah terdaftar')</script>";
        return false;
    }
    //Cek Konfirmasi pass
    if ($password !== $password2) {
        echo "<script>
        alert('Kondirmasi Password Tidak Sesuai')</script>";
        return false;
    }

    //Enkripsi Password
    $password = password_hash($password, PASSWORD_DEFAULT);
    //tambah user ke db
    mysqli_query($db, "INSERT INTO admin VALUES('', '$username', '$password')");
    return mysqli_affected_rows($db);
}

function tambah($data)
{
    global $db;
    // ambil data dari tiap inputan ke suatu variabel
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $nohp = htmlspecialchars($data["nohp"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $rfid = htmlspecialchars($data["rfid"]);

    // Upload Gambar
    //  $gambar = upload();
    //  if ($gambar === false) {
    //       return false;
    //  }
    // htmlspecialchars agar elemen html yang dimasukkan ke form tidak ngefek ke tampilan sistem

    // query insert data
    $isi = "INSERT INTO mahasiswa 
      VALUES ('', '$nim', '$nama','$prodi','$nohp','$alamat', '$rfid')";

    mysqli_query($db, $isi);
    return  mysqli_affected_rows($db);
}
