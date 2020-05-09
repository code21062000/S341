<?php
    session_start();

    $con = mysqli_connect('localhost','root','');

    mysqli_select_db($con, 'medibase');

    $UserName = _POST['username'];
    $Email = _POST['email'];
    $Number = _POST['number'];
    $Password = _POST['password'];

    $S = "select * from register where username = '$UserName' && password='$Password'";
    $Result = mysqli_query($con, $S);
    $Num = mysqli_num_rows($Result);

    if($Num == 1)
    {
        $_SESSION['username'] = $UserName;
        header('location:home.php');
    }
    else
    {
        header('location:index.php');    
    }

?>