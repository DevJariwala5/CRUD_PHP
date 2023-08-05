<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>

<body>
    <center>
        <Form action="" method="post" enctype="multipart/form-data">
            <h1>
                Insert Data
            </h1>
            <br><br>
            <hr>

            <div class>
                <lable>User Name:</lable>
                <input type="text" name="user_name" placeholder="Enter Name"><br><br>
            </div>
            <lable>User Email:</lable>
            <input type="email" name="user_email" placeholder="Enter email"><br><br>
            <lable>User Password:</lable>
            <input type="password" name="user_password" placeholder="Enter Password"><br><br>
            <lable>Select Image:</lable>
            <input type="file" name="user_image"><br><br>
            <lable>Details:</lable>
            <textarea name="user_details" placeholder="Enter the Details"></textarea><br><br>


            <input type="submit" name="Submit"><br><br>
            <hr>
            <hr>
        </Form>
        <?php
    $conn = mysqli_connect('localhost','root','','crud');

   if(isset($_POST['Submit']))
   {
     $user_name = $_POST['user_name'];
     $user_email = $_POST['user_email'];

     $user_password = $_POST['user_password'];
     $user_image=$_FILES['user_image'] ['name'];
     $tmp_name=$_FILES['user_image'] ['tmp_name'];

    $user_details = $_POST['user_details'];
     $insert = "INSERT INTO crud( user_name,user_email,user_password,user_image,user_details)
      VALUES ('$user_name','$user_email','$user_password','$user_image','$user_details')";
      $run = mysqli_query($conn,$insert) ;
      if($run === true){
          echo 'Data inserted ';
          move_uploaded_file($tmp_name,"upload/$user_image");
        }
              else {
        echo 'insert failed'; 
    }
   }
?>
        <a href='display.php'>View User</a>
    </center>
</body>

</html>