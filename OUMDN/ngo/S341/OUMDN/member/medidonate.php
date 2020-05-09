<?php
session_start();
require_once('dbconnection.php');
if(!isset($_SESSION['username'])){
  header('location:memloginreg.php');
  }
  if(isset($_POST['donatemedicine']))
    {
  //mysqli_select_db($con,'medibase');
  $donorsid=$_SESSION['username'];
  $medicinenm=$_POST['medicinenm'];
  $donatedate=$_POST['donatedate'];
  $expdate=$_POST['expdate'];
  $usedfor=$_POST['usedfor'];
  $d1=strtotime($expdate);
  $d2=strtotime($donatedate);
  $d3=ceil(($d1-time())/60/60/24);
  $d4=ceil(($d2-time())/60/60/24);
  if($d4>=0 && $d3>0){
  $msg=mysqli_query($con,"insert into medidonate(donorsid,medicinenm,donatedate,expdate,usedfor) values ('$donorsid','$medicinenm','$donatedate','$expdate','$usedfor')");
  if($msg)
  {
      echo "<script>alert('Medicine Data recieved.');</script>";
  }
  else {
   echo "<script>alert('Something went Wrong. please try again. ');</script>";
  }
  }
  else {
   echo "<script>alert('Please enter valid dates.');</script>";
  }
  //as the code/ function was not worling to check the uniqueness of the username i have removed it
}

 ?>
 <html>
 <head>
<title>Donate Medicine</title>
<link rel="stylesheet" type="text/css" href="assets/css/memberstyle4.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 </head>
<body>
  <div class="container row">
<!--   <a class="float-right" class href="memlogout.php">Logout</a>-->
  <button type="button"  class="btn btn-primary float-right topright"  style="margin-left:20px; margin-right:10px;" onclick="location.href='memlogout.php'">Sign Out</button>
  <h4 style="margin-left:10px;" class="text-white float-left topleft "> User: <?php echo $_SESSION['username']; ?></h4 >
</div>
<div class=" text-center container">
  <h1 style="color:#fff">DONATE FOR THE GOOD CAUSE</h1>
  <div class="alert alert-warning">
  <strong>Warning!</strong> Donate medicine only if the drug has not corossed its expiry date. Donating unwanted and expired medicine could restrict your access to this site.
</div>
</div>

<div class="container">
  <div class="alert alert-info">
    <h2><strong>Fill</strong> the details below to donate medicine:</h2>
  </div>
</div>

<div class="container  justify-content-between">
  <div class="login-box">
  <div class="row">
<div class="col-md-6 reg" >
        <form action="" method="post" enctype="multipart/form-data" name="donatemedicine">
          <div class="form-group">
            <label style="color:white">Medicine Name</label>
            <input style="color:white" type="text" name="medicinenm" class="form-control" required>
            </div>
            <div class="form-group">
              <label style="color:white">Schedule donating date</label>
              <input type="date" name="donatedate" style="color:white" class="form-control" required>
              </div>
          <div class="form-group" >
            <label style="color:white">Date of Expiry</label>
            <input type="date" name="expdate" style="color:white" class="form-control" required>
            </div>
            <div class="form-group">
              <label style="color:white">Description of the medicine</label>
              <input type="text" name="usedfor" style="color:white" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-warning" name="donatemedicine">Send the information</button><br>
        </form>
    </div>
  </div>
</div>
</div>


</body>
</html>
