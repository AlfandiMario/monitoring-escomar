<?php
require 'functions.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "
            <script>
            alert('User berhasil ditambahkan!')
            </script>
            ";
    } else {
        echo mysqli_error($db);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sign Up </title>
</head>

<body>
    <div class="container">
        <div class="box">
            <h1 class="head">ESCOMAR : Electrical Scooter Sebelas Maret</h1>
            <!-- <img style="width: 50%;margin-top: 2vh; margin-bottom: 3vh;" src="assets/img/logo smart pv.png"> -->
            <div class="form pb-1">
                <h1>
                    Sign Up
                </h1>
                <form action="" method="POST">

                    <div class="txt_field">
                        <input type="text" required name="username" id="username">
                        <label>
                            Username
                        </label>
                    </div>
                    <div class="txt_field">
                        <input type="password" required name="password" id="password">
                        <label>
                            Password
                        </label>
                    </div>

                    <div class="txt_field">
                        <input type="password" required name="password2" id="password2">
                        <label>
                            Konfirmasi password
                        </label>
                    </div>

                    <input type="submit" name="register">
                    <div class="signup_link">
                        Already member? <a href="login.php">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>