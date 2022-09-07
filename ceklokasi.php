<?php
//koneksi ke database (server, user database, password, nama db)
$konek = mysqli_connect("localhost", "root", "", "baskarae_db");
//baca dari tabel monitoring
$sql = mysqli_query($konek, "SELECT * FROM tracking1 ORDER BY id DESC"); //data terakhir akan berada diatas

//baca data paling atas
$data = mysqli_fetch_array($sql);
$tracking = $data['tracking'];

//uji apabila nilai suhu belum ada, maka suhu = 0
if ($tracking == "") $tracking = "-";

//cetak nilai suhu
// echo $tracking;
