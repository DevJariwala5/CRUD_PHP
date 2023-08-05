<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In </title>
</head>

<body>
    <center>
        <h1>Login Page</h1><br></br></br>

        <form action="" method="post">
            <hr>
            <lable>User Email:</lable>
            <input type="email" name="email" placeholder="Enter email" required="required"><br><br>
            <lable>User Password:</lable>
            <input type="password" name="password" placeholder="Enter Password"><br><br>
            <input type="submit" name="submit" value="submit">
            <br><br>
            <hr>
        </form>
        <?php
   
    $conn = mysqli_connect('localhost','root','','crud');
    if(isset($_POST['submit'])){
        $email =    $_POST['email'];
        $password = $_POST['password'];
        
        $qry ="SELECT * from crud where user_email='$email'";
        $run = mysqli_query($conn,$qry);

            $row_user = mysqli_fetch_array($run);
            $db_email = $row_user['user_email'];
            $db_password = $row_user['user_password'];
         if($email == $db_email && $password == $db_password){
             header("location:home.php");
                  echo "ok";
                  $_SESSION['email']=$db_email;
         }else{
             echo "Email or Password wrong!";
         }
}
?>
    </center>

</body>

</html>