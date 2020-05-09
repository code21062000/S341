<?php
    session_start();
    header('location:index.html');

    $con = mysqli_connect('localhost','root','');

    mysqli_select_db($con, 'medibase');

    $UserName = _POST['username'];
    $Email = _POST['email'];
    $Number = _POST['number'];
    $Password = _POST['password'];

    $S = "select * from register where username = '$UserName'";
    $Result = mysqli_query($con, $S);
    $Num = mysqli_num_rows($Result);

    if($Num == 1)
    {
        echo"UserName already taken";
    }
    else
    {
        $Reg = " insert into register(username, email, mobile, password) values ('$UserName','$Email','$Number','$Password')";
        mysqli_query($con, $Reg);
        echo"Registration Successfull";
    }

?>