<?php
require 'ceklokasi.php';
?>
<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

     <link href="css/scooter.css" rel="stylesheet" />
     <title>ESCOMAR</title>

     <script type="text/javascript" src="jquery/jquery.min.js"></script>

     <!-- load otomatis/realtime -->
     <script type="text/javascript">
          $(document).ready(function() {

               setInterval(function() {
                    $("#cekrfid").load("cekrfid.php");
                    $("#ceknama").load("ceknama.php");
                    $("#cekbaterai").load("cekbaterai.php");
                    $("#ceklokasi").load("ceklokasi.php");
               }, 1000);
          });
     </script>


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

     <div class="container" style="text-align: center; margin-top: 20px;">
          <h4>Monitoring Scooter Listrik<br>secara Realtime</h4>

          <script>
               alert('Jika ingin tracking GPS, maka copy dan paste koordinat yang terukur pada kolom "Maps Tracking" ke browser');
          </script>

          <!-- gambar pemanis-->
          <div class="fluid-container">
               <img src="images/icon-escomar.png" style="width: 195px; height: 185px">
          </div>

          <!-- tabel baru -->
          <table class="table">
               <thead>
                    <tr>
                         <th scope="col">ID Peminjam</th>
                         <th scope="col">Nama Peminjam</th>
                         <!-- <th scope="col">Baterai</th> -->
                         <th scope="col">Maps Tracking</th>
                    </tr>
               </thead>
               <tbody>
                    <tr>
                         <td> <span id="cekrfid"> 0 </span> </td>
                         <td> <span id="ceknama"> 0 </span></td>
                         <!-- <td> <span id="cekbaterai"> 0 </span>%</td> -->
                         <!-- <td> <span id="ceklokasi"> 0 </span> </td> -->

                         <td><a href=<?= $tracking ?> target="_blank" rel="noopener noreferrer"> <span> <?= $tracking ?> </span></a> </td>


                         <!-- belum tahu cara hyperlink biar diklik ke lokasi gmaps langsung gimana -->
                         <!-- sama gimana caranya $tracking bisa dipanggil di sini -->
                    </tr>
               </tbody>
          </table>



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