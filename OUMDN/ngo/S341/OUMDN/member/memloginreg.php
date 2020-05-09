    <?php
    /*THis code is of memvalidation so we do not need memvalidation file Checks login and usernames uniqueness*/
    session_start();
    require_once('dbconnection.php');
    /*this code is for registration*/
      if(isset($_POST['memregistration']))
      {
    //mysqli_select_db($con,'medibase');
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $user=$_POST['user'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $enc_password=$password;
    //as the code/ function was not worling to check the uniqueness of the username i have removed it
    $msg=mysqli_query($con,"insert into memberinfo(firstname,lastname,user,email,phone,password) values ('$firstname','$lastname','$user','$email','$phone','$enc_password')");
    if($msg)
    {
        echo "<script>alert('Member registered, Please login to continue.');</script>";
    }
    else {
     echo "<script>alert('Something went Wrong, Please Try again with a different username.');</script>";
    }
    }
    //this is the code for login
      if(isset($_POST['memvalidation']))
      {
      //  mysqli_select_db($con,'medibase');
        $user=$_POST['user'];
        $password=$_POST['password'];
        $dec_password=$password;
        /*this code snippent might not work because of mysqli_num_rows function  used to make username unique*/
        //member info is the table name from the database medibase
        $result=mysqli_query($con,"SELECT * FROM memberinfo WHERE user='$user' and password='$dec_password'");
        $num=mysqli_fetch_array($result);
        if($num>0)  {
          $extra="memberhome.php";
        $_SESSION['username']=$_POST['user'];
        $host=$_SERVER['HTTP_HOST'];
    $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location:http://$host$uri/$extra");
    exit();
          //header('location:memberhome.php');//i.e. successful login

        }
        else {
        //header('Location:memloginreg.php');
        echo "<script>alert('Invalid username or password');</script>";
    $extra="memloginreg.php";
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
      <link rel="stylesheet" type="text/css" href="assets/css/memberstyle.css">
      <title>member login and registration</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
      <div class="container">
        <div class="login-box">
        <div class="row">
          <div class="col-md-6 log" >
              <h2 style='text-align:center'> Sign in</h2>
              <form action="" method="post"  name="memvalidation">
                <!--we shift the action for form memvalidation in this file itself on top   <form action="memvalidation.php" method="post" name="memvalidation">-->
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="user" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="memvalidation">Sign in</button>

              </form>
          </div>
          <!--the above one is for login-->
          <!--the below one is for Registration-->
          <div class="col-md-6 reg" >
              <h2 style='text-align:center'>Register as a member</h2>
              <form action="" method="post" enctype="multipart/form-data" name="memregistration">
                <div class="form-group">
                  <label>First name</label>
                  <input type="text" name="firstname" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Last name</label>
                    <input type="text" name="lastname" class="form-control" required>
                    </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="user" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Phone</label>
                        <input type="tel" name="phone" placeholder="without country code" pattern="[0-9]{10}" class="form-control" required>
                      </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="memregistration">Sign up</button><br>
              </form>
          </div>
        </div>
      </div>
    </body>
    </html>
