<?php

    session_start();
?>


<html>
    <head>
        <title>Home Page</title>
    </head>
    <body>
        <h1>Welcome <?php $_SESSION['username']; ?> </h1>
    </body>
</html>