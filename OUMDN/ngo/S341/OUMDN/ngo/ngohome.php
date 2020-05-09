<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:memloginreg.php');
}
 ?>
 <html>
 <head>
<title>homepage</title>
<link rel="stylesheet" type="text/css" href="assets/css/ngostyle2.css">
<title>member login and registration</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 </head>
 <body>
   <div class="container row">
<!--   <a class="float-right" class href="memlogout.php">Logout</a>-->
  <h4 style="margin-left:10px;" class="text-white float-left topleft "> User: <?php echo $_SESSION['username']; ?></h4 >

    <div class="button-box">
           <div class="button-box col-lg-20 float-right topright">
               <button type="button" class="btn btn-primary float-right" style="margin-left:20px; margin-right:10px; " onclick="location.href='memlogout.php'">Sign Out</button>
             <button type="button" class="btn btn-danger float-right" onclick="location.href='resetpassword.php'">Reset Password</button>
       </div>
            </div>

</div>
<div class="container mt-3 p-3 d-flex justify-content-between ">
  <div class="card" style="width:400px">
    <img class="card-img-top" src="pharmac.jpg" alt="donate medicine vector" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">Donate</h4>
      <p class="card-text">Donate medicine, provide medicine details, schedule donating date</p>
      <button onclick="location.href='medidonate.php'" type="button" class="btn btn-primary btn-lg">Donate Medicine</a>
    </div>
  </div>

  <div class="card" style="width:400px">
    <img class="card-img-top" src="transactions.jpg" alt=" transaction vector" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">Transactions</h4>
      <p class="card-text">see the previous transaction of medicine</p>
      <button type="button" class="btn btn-info btn-lg" onclick="location.href='meditransact.php'">View Transactions</button>
    </div>
  </div>
</div>


 </body>
 </html>
