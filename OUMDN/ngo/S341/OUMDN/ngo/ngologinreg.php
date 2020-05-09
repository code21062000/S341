    <?php
    /*THis code is of ngovalidation so we do not need ngovalidation file Checks login and usernames uniqueness*/
    session_start();
    require_once('dbconnection.php');
    /*this code is for registration*/
      if(isset($_POST['ngoregistration']))
      {
    //mysqli_select_db($con,'medibase');
    $ngoid=$_POST['ngoid'];//ngo id is actually ngos web address
    $ngoname=$_POST['ngoname'];
    $ngoemail=$_POST['ngoemail'];
    $ngophone=$_POST['ngophone'];
    $ngourl=$_POST['ngourl'];
    $ngopassword=$_POST['ngopassword'];
    $enc_password=$ngopassword;
    //as the code/ function was not worling to check the uniqueness of the username i have removed it
    $msg=mysqli_query($con,"insert into ngoinfo(ngoid,ngoname,ngoemail,ngophone,ngourl,ngopassword) values ('$ngoid','$ngoname','$ngoemail','$ngophone','$ngourl','$enc_password')");
    if($msg)
    {
        echo "<script>alert('NGO details registered, Please login to continue.');</script>";
    }
    else {
     echo "<script>alert('User ID alteady taken, Please Try again with a different ID.');</script>";
    }
    }
    //this is the code for login
      if(isset($_POST['ngovalidation']))
      {
      //  mysqli_select_db($con,'medibase');
        $ngoid=$_POST['ngoid'];
        $ngopassword=$_POST['ngopassword'];
        $dec_password=$ngopassword;
        /*this code snippent might not work because of mysqli_num_rows function  used to make username unique*/
        //member info is the table name from the database medibase
        $result=mysqli_query($con,"SELECT * FROM ngoinfo WHERE ngoid='$ngoid' and password='$dec_password'");
        $num=mysqli_fetch_array($result);
        if($num>0)  {
          $extra="ngohome.php";
        $_SESSION['ngouserid']=$_POST['ngoid'];//remember...............................................
        $_SESSION['ngowebaddress']=$_POST['ngourl'];//remember................
        $host=$_SERVER['HTTP_HOST'];
    $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location:http://$host$uri/$extra");
    exit();
          //header('location:memberhome.php');//i.e. successful login

        }
        else {
        //header('Location:memloginreg.php');
        echo "<script>alert('Invalid user ID or password');</script>";
    $extra="ngologinreg.php";
    $host  = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    //header("location:http://$host$uri/$extra");
    //exit();
        }
    }


      ?>

    <html>
    <!--login.php this file contains code for both login and registration-->
    <head>
      <link rel="stylesheet" type="text/css" href="assets/css/ngostyle.css">
      <title>member login and registration</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
      <div class="container">
        <div class="login-box">
        <div class="row">
          <div class="col-md-6 log" >
              <h2 style='text-align:center'> Sign in to your NGO</h2>
              <form action="" method="post"  name="ngovalidation">
                <!--we shift the action for form ngovalidation in this file itself on top   <form action="ngovalidation.php" method="post" name="ngovalidation">-->
                <div class="form-group">
                  <label>NGO user ID</label>
                  <input type="text" name="ngoid" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="ngovalidation">Sign in</button>

              </form>
          </div>
          <!--the above one is for login-->
          <!--the below one is for Registration-->
          <div class="col-md-6 reg" >
              <h2 style='text-align:center'>Register your NGO for this scheme</h2>
              <form action="" method="post" enctype="multipart/form-data" name="ngoregistration">
                <div class="form-group">
                  <label>User ID</label>
                  <input type="text" name="ngoid" class="form-control" placeholder="NGO's user ID" required>
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="ngoname" class="form-control" placeholder="enter NGO's name" required>
                    </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="ngoemail" class="form-control" placeholder="enter NGO's email address" required>
                  </div>
                    <div class="form-group">
                      <label>Contact number</label>
                        <input type="tel" name="ngophone" placeholder="enter NGO's contact number without country code" pattern="[0-9]{10}" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Web address</label>
                          <input type="url" name="ngourl" placeholder="enter NGO's web address" class="form-control" required>
                        </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="ngopassword" class="form-control" placeholder="enter NGO's password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="ngoregistration">Sign up</button><br>
              </form>
          </div>
        </div>
      </div>
    </body>
    </html>
