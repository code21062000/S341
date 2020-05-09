<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:memloginreg.php');
}
 ?>
 <html>
 <head>
<title>seePreviousTransactions</title>
<link rel="stylesheet" type="text/css" href="assets/css/memberstyle5.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 </head>
<body>
  <div class="container row">
<!--   <a class="float-right" class href="memlogout.php">Logout</a>-->
  <button type="button" class="btn btn-primary float-right topright"  style="margin-left:20px; margin-right:10px;" onclick="location.href='memlogout.php'">Sign Out</button>
  <h4 class="text-white float-left topleft " style="margin-left:10px;"> User: <?php echo $_SESSION['username']; ?></h4 >
</div>
<!--starty your code here reading the bootstrap documentation-->
</body>
</html>
x