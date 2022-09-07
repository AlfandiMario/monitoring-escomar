<?php

//Koneksi ke Database
// $db = mysqli_connect("host", "user", "password", "nama db")
$koneksi = mysqli_connect("localhost", "root", "", "baskarae_db");

if (!$koneksi) {
     die("Tidak bisa terkoneksi ke database");
}
$nim = "";
$nama = "";
$prodi = "";
$nohp = "";
$alamat = "";
$rfid = "";
$sukses = "";
$error = "";
if (isset($_GET['op'])) {
     $op = $_GET['op'];
} else {
     $op = "";
}

function delete()
{
     global $koneksi, $sukses, $error;
     $id         = $_GET['id'];
     $query         = mysqli_query($koneksi, "DELETE FROM userdata WHERE id = '$id'");
     if ($query) {
          $sukses = "Berhasil hapus data";
     } else {
          $error  = "Gagal melakukan delete data";
     }
}
function edit()
{
     global $koneksi, $nama, $prodi, $nohp, $alamat, $rfid, $error;

     $id         = $_GET['id'];
     $query      = mysqli_query($koneksi, "SELECT * FROM userdata  WHERE id = '$id'");
     $identitas  = mysqli_fetch_array($query);
     $nim        = $identitas['nim'];
     $nama       = $identitas['nama'];
     $prodi      = $identitas['prodi'];
     $nohp       = $identitas['nohp'];
     $alamat     = $identitas['alamat'];
     $rfid       = $identitas['rfid'];


     if ($nim == '') {
          $error = "Data tidak ditemukan";
     }
}
function tambah()
{
     $nim        = $_POST['nim'];
     $nama       = $_POST['nama'];
     $prodi       = $_POST['prodi'];
     $nohp       = $_POST['nohp'];
     $alamat     = $_POST['alamat'];
     $rfid     = $_POST['rfid'];
     global $koneksi, $op, $id, $sukses, $error;


     if ($nim && $nama && $prodi && $nohp && $alamat && $rfid) {
          if ($op == 'edit') { //untuk update
               $sql1       = "UPDATE userdata SET nim = '$nim',nama='$nama',prodi='$prodi', nohp='$nohp', alamat = '$alamat', rfid='$rfid' WHERE id = '$id'";
               $query         = mysqli_query($koneksi, $sql1);
               if ($query) {
                    $sukses = "Data berhasil diupdate";
               } else {
                    $error  = "Data gagal diupdate";
               }
          } else { //untuk insert
               $sql1   = "INSERT INTO userdata (nim,nama,prodi,nohp,alamat,rfid) VALUE ('$nim','$nama','$prodi','$nohp','$alamat','$rfid')";
               $query     = mysqli_query($koneksi, $sql1);
               if ($query) {
                    $sukses     = "Berhasil memasukkan data baru";
               } else {
                    $error      = "Gagal memasukkan data";
               }
          }
     } else {
          $error = "Silakan masukkan semua data";
     }
}
if ($op == 'delete') {
     delete();
}
if ($op == 'edit') {
     edit();
}

if (isset($_POST['simpan'])) { //untuk create
     tambah();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>User Management</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link href="css/usermanage.css" rel="stylesheet" />
     <style>

     </style>
</head>

<body>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container-fluid">
               <a class="navbar-brand">ESCOMAR</a>
               <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                         <li class="nav-item">
                              <a class="nav-link" href="index.php">Monitoring</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="usermanage.php">Manage Users</a>
                         </li>
                    </ul>
                    <span class="navbar-text">
                         <div class="container-fluid">
                              <a class="navbar-brand" href="logout.php">
                                   <img src="images/sign-out.png" width="15%" class="d-inline-block align-text-middle">
                                   Log out
                              </a>
                         </div>
                    </span>
               </div>
          </div>
     </nav>
     <header>
          <p>Escomar's User Management</p>
     </header>
     <div class="mx-auto">
          <!-- untuk memasukkan data -->
          <div class="card">
               <div class="card-header">
                    Create / Edit Data
               </div>
               <div class="card-body">
                    <?php
                    if ($error) {
                    ?>
                         <div class="alert alert-danger" role="alert">
                              <?php echo $error ?>
                         </div>
                    <?php
                         header("refresh:3;url=usermanage.php"); //3 : detik
                    }
                    ?>
                    <?php
                    if ($sukses) {
                    ?>
                         <div class="alert alert-success" role="alert">
                              <?php echo $sukses ?>
                         </div>
                    <?php
                         header("refresh:1;url=usermanage.php");
                    }
                    ?>
                    <form action="" method="POST">
                         <div class="mb-2 row">
                              <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                              <div class="col-sm-10"> <input type="nim" class="form-control" id="nim" name="nim" placeholder="Contoh : I0719001" value="<?php echo $nim ?>"></div>
                         </div>
                         <div class="mb-2 row">
                              <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                              <div class="col-sm-10"><input type="nama" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?php echo $nama ?>"></div>
                         </div>
                         <div class="mb-2 row">
                              <label for="prodi" class="col-sm-2 col-form-label">Program Studi</label>
                              <div class="col-sm-10"><input type="prodi" class="form-control" id="prodi" name="prodi" placeholder="S-1 Teknik Elektro" value="<?php echo $prodi ?>"></div>
                         </div>
                         <div class="mb-2 row">
                              <label for="nohp" class="col-sm-2 col-form-label">Nomor Telepon</label>
                              <div class="col-sm-10"><input type="nohp" class="form-control" id="nohp" name="nohp" placeholder="0812345678xxx" value="<?php echo $nohp ?>"></div>
                         </div>
                         <div class="mb-2 row">
                              <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                              <div class="col-sm-10"><input type="alamat" class="form-control" id="alamat" name="alamat" placeholder="Jl. Brajamusti No.1, Desa, Kecamatan, Kota" value="<?php echo $alamat ?>"></div>
                         </div>
                         <div class="mb-2 row">
                              <label for="rfid" class="col-sm-2 col-form-label">Tag RFID</label>
                              <div class="col-sm-10"><input type="rfid" class="form-control" id="rfid" name="rfid" placeholder="Ex : 01122965487" value="<?php echo $rfid ?>"></div>
                         </div>
                         <!-- <div class="mb-2 row">
                              <label for="formFile" class="col-sm-2 col-form-label"> Foto Formal</label>
                              <div class="col-sm-10"><input class="form-control" type="file" id="upfoto"></div>
                         </div> -->
                         <div class="d-grid gap-2 mx-auto">
                              <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                              <!-- <button class=" btn btn-primary btn-sm" type="button"><input type="submit" name="simpan" value="Simpan Data" /></button> -->
                         </div>
                    </form>
               </div>
          </div>
          <!-- untuk mengeluarkan data -->
          <div class="card">
               <div class="card-header text-white bg-secondary">
                    User's Data
               </div>
               <div class="card-body">
                    <table class="table">
                         <thead>
                              <tr>
                                   <th scope="col">#</th>
                                   <th scope="col">NIM</th>
                                   <th scope="col">Nama</th>
                                   <th scope="col">Prodi</th>
                                   <th scope="col">No. HP</th>
                                   <th scope="col">Alamat</th>
                                   <th scope="col">RFID</th>
                                   <th scope="col">Aksi</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php
                              $query2     = mysqli_query($koneksi, "SELECT * FROM userdata ORDER BY id DESC");
                              $urut   = 1;
                              while ($hasil = mysqli_fetch_array($query2)) {
                                   $id         = $hasil['id'];
                                   $nim        = $hasil['nim'];
                                   $nama       = $hasil['nama'];
                                   $prodi      = $hasil['prodi'];
                                   $nohp       = $hasil['nohp'];
                                   $alamat     = $hasil['alamat'];
                                   $rfid       = $hasil['rfid'];

                              ?>
                                   <tr>
                                        <th scope="row"><?php echo $urut++ ?></th>
                                        <td scope="row"><?php echo $nim ?></td>
                                        <td scope="row"><?php echo $nama ?></td>
                                        <td scope="row"><?php echo $prodi ?></td>
                                        <td scope="row"><?php echo $nohp ?></td>
                                        <td scope="row"><?php echo $alamat ?></td>
                                        <td scope="row"><?php echo $rfid ?></td>
                                        <td scope="row">
                                             <a href="usermanage.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                             <a href="usermanage.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                        </td>
                                   </tr>
                              <?php
                              }
                              ?>
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
</body>

</html>