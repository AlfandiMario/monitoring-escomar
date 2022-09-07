<?php
session_start();
require 'functions.php';

//Cek Cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  //Ambil Username berdasarkan id
  $result = mysqli_query($db, "SELECT username FROM admin WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  //Cek Cookie dan Username
  if ($key === hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
  }
}

if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}


if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($db, "SELECT * FROM admin WHERE username = '$username'");

  //Cek Username
  if (mysqli_num_rows($result) === 1) {
    //Cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      //Set Session
      $_SESSION["login"] = true;

      // Cek remember me
      if (isset($_POST['remember'])) {

        setcookie('id', $row['id'], time() + 60);
        setcookie('key', hash('sha256', $row['username']), time() + 60);
      }

      header("Location: index.php");
      exit;
    }
  }
  $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/login.css">
  <!-- <link rel="stylesheet" href="css/loginbaru.css"> -->

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>ESCOMAR</title>
</head>

<body>
  <div class="container">
    <div class="box">
      <h2 class="head">ESCOMAR : Electrical Scooter Sebelas Maret</h2>
      <div class="form">
        <div class="logo">
          <img src="images/unskecil.png" class="logo">
        </div>

        <div class="head-login">
          Login
        </div>


        <form action="" method="POST">
          <div class="txt_field">
            <input type="text" required name="username" id="username">
            <label>Username</label>
          </div>
          <div class="txt_field">
            <input type="password" required name="password" id="password">
            <label>Password</label>
          </div>
          <!-- <a href="#">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Submit
          </a> -->

          <div class="pass" style="font-size: 12px;">
            Forgot Password
          </div>
          <input type="submit" name="login">

          <div class="signup_link">
            Not a member? <a href="registrasi.php">Sign Up</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>