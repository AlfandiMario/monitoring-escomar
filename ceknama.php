<?php
//koneksi ke database (server, user database, password, nama db)
$konek = mysqli_connect("localhost", "root", "", "baskarae_db");
//baca dari tabel monitoring
$sql = mysqli_query($konek, "select * from monitoring3 order by id desc"); //data terakhir akan berada diatas

//baca data paling atas
$data = mysqli_fetch_array($sql);
$nama = $data['nama'];

//uji apabila nilai suhu belum ada, maka suhu = 0
if ($nama == "") $nama = 0;

//cetak nilai suhu
echo $nama;
