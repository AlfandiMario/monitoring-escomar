<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
$konek = mysqli_connect("localhost", "root", "", "baskarae_db");
$sql = mysqli_query($konek, "SELECT * from monitoring1 order by id desc");
$data = mysqli_fetch_array($sql);
$rfid = $data['rfid'];
$rfid1 = (int)$rfid;

$pencocokan = mysqli_query($konek, "SELECT * FROM userdata WHERE rfid = $rfid1");
$hasil = mysqli_fetch_array($pencocokan);
$nama = $hasil['nama'];

?>

<!DOCTYPE html>

<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link href="css/home.css" rel="stylesheet" />
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

  <!-- Header -->
  <header>
    <p>Pilih Scooter</p>
  </header>

  <!-- Kolom Scooter 1 s.d 3 -->
  <div class="d-flex justify-content-center">
    <div class="row row-cols-1 row-cols-md-3 g-20" style="width: 65%">
      <div class="col">
        <div class="card h-100" id="avail">
          <a href="scooter1.php"> <img src="images/icon.png" class="card-img" /> </a>
          <div class="card-body">
            <h5 class="card-title">Scooter 1</h5>
            <!-- <img src="images/battery.svg" alt="baterai" />
            <p class="card-text">50 %</p> -->
            <br>
            <p class="card-text">In Use : <?= $nama; ?></p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100" id="coming">
          <a href="scooter2.php"> <img src="images/icon.png" class="card-img" /> </a>
          <div class="card-body">
            <h5 class="card-text">Scooter 2</h5>
            <!-- <img src="images/battery.svg" alt="baterai" />
            <p class="card-text">50 %</p> -->
            <br>
            <p class="card-title">Coming Soon</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100" id="coming">
          <a href="scooter3.php"> <img src="images/icon.png" class="card-img" /> </a>
          <div class="card-body">
            <h5 class="card-text">Scooter 2</h5>
            <!-- <img src="images/battery.svg" alt="baterai" />
            <p class="card-text">50 %</p> -->
            <br>
            <p class="card-title">Coming Soon</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>