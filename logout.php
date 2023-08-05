<?php
    session_start();
    $conn = mysqli_connect('localhost','root','','crud');
   
        header("location:login.php");
   session_destroy();
?>