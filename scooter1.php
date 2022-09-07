<?php
//koneksi ke database (server, user database, password, nama db)
$konek = mysqli_connect("localhost", "root", "", "baskarae_db");
//baca dari tabel monitoring2

$sql = mysqli_query($konek, "SELECT * from monitoring1 order by id desc"); //data terakhir akan berada diatas

//baca data paling atas
$data = mysqli_fetch_array($sql);
// $nama = $data['nama'];
$rfid = $data['rfid'];
$rfid1 = (int)$rfid;

// var_dump($rfid1);

// $nim = $data['nim'];
// $prodi = $data['prodi'];

$lokasi = mysqli_query($konek, "SELECT * FROM tracking1 ORDER BY id desc"); //data lokasi dari database yang berbeda
$dataloct = mysqli_fetch_array($lokasi);
$tracking = $dataloct['tracking'];


$pencocokan = mysqli_query($konek, "SELECT * FROM userdata WHERE rfid = $rfid1");
$hasil = mysqli_fetch_array($pencocokan);
// var_dump($hasil);
// $rfid = $pencocokan[6];
$nama = $hasil['nama'];
$nim = $hasil['nim'];
$prodi = $hasil['prodi'];
// var_dump($nama);


//uji apabila nilai suhu belum ada, maka suhu = 0
if ($tracking == "") $tracking = "-";
?>
<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link href="css/scooter.css" rel="stylesheet" />
     <title>ESCOMAR</title>

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

     <div class="container" style="text-align: center;">
          <header>Monitoring ESCOMAR</header>

          <div class="fluid-container">
               <img src="images/icon-escomar.png" style="width: 17%; margin-bottom: 3%;">
          </div>

          <table class="table table-borderless">
               <thead>
                    <tr>
                         <th scope="col">ID </th>
                         <th scope="col">Nama Lengkap</th>
                         <th scope="col">NIM</th>
                         <th scope="col">Program Studi</th>
                         <!-- <th scope="col">Baterai</th> -->
                         <th scope="col">Posisi Scooter (klik)</th>
                    </tr>
               </thead>
               <tbody>
                    <tr>
                         <td> <span><?= $rfid ?></span></td>
                         <td> <span><?= $nama ?></span></td>
                         <td> <span><?= $nim ?></span></td>
                         <td> <span><?= $prodi ?></span></td>
                         <td><a href=<?= $tracking ?> target="_blank" rel="noopener noreferrer"> <span> <?= $tracking ?> </span></a> </td>
                    </tr>
               </tbody>
          </table>
     </div>

     <br><br><br><br><br><br>
     <div class="container" style="text-align: center;">
          &#169 <script>
               document.write(new Date().getFullYear())
          </script> Baskara Team
     </div>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>