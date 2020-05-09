<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:memloginreg.php');
}
require_once('dbconnection.php');
if(isset($_POST['changepassword'])){
    $user=$_POST['user'];//fetch values
    $password=$_POST['password'];
    $username=$_SESSION['username'];
  if($user==$_SESSION['username']){
      if(mysqli_query($con,"UPDATE memberinfo SET password='$password' WHERE user='".$username."'"))
   {
       echo "<script>alert('Your password has changed.');</script>";
       header( "refresh:1;url=memberhome.php");
   }
   else {
     echo "Error resetting password: " . mysqli_error($con);
    echo "<script>alert('Sorry, something went Wrong.');</script>";
   }
    }
  else {
    echo "<script>alert('Please check your username and try again.');</script>";
  }
}

?>
<!doctype html>
<html lang="en">
<head><link rel="stylesheet" type="text/css" href="assets/css/memberstyle3.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <div class="container" style="margin-top: 100px;">
        <form role="form" name="changepassword" method="post" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">
              <br><br>
                <input type="text" name="user" class="form-control" id="user" placeholder="Enter your username"><br>
                  <input type="password" name="password" class="form-control" id="password" placeholder="new password"><br>
                <button type="submit" class="btn btn-primary" name="changepassword" id="changepassword" placeholder="Reset password">Reset password</button>
                <br><br>
            </div>
        </div>
        </form>
    </div>

</body>
</html>
