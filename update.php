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
                Update Data
            </h1>
            <br><br>
            <hr>
            <?php
            $conn = mysqli_connect('localhost','root','','crud');
            if(isset($_GET['edit'])){
            $edit_id=$_GET['edit'];
            $select = "SELECT * FROM crud WHERE user_id='$edit_id'";
            $run = mysqli_query($conn,$select); 
         $row_user= mysqli_fetch_array($run);
             $user_id = $row_user['user_id'];
             $user_name = $row_user['user_name'];
             $user_email = $row_user['user_email'];
             $user_password = $row_user['user_password'];
             $user_image = $row_user['user_image'];
            $user_details = $row_user['user_details'];

        }
            
        ?>

            <div class>
                <lable>User Name:</lable>
                <input type="text" name="user_name" placeholder="Enter Name" value="<?php echo $user_name;?>"><br><br>
            </div>
            <lable>User Email:</lable>
            <input type="email" name="user_email" placeholder="Enter email" value="<?php echo $user_email;?>"><br><br>
            <lable>User Password:</lable>
            <input type="password" name="user_password" placeholder="Enter Password"
                value="<?php echo $user_password;?>"><br><br>
            <lable>Select Image:</lable>
            <input type="file" name="user_image"><br><br>
            <lable>Details:</lable>
            <textarea name="user_details"><?php echo $user_details;?></textarea><br><br>



            <input type="submit" name="Submit"><br><br>
            <hr>
            <hr>
        </Form>
        <?php
        if(isset($_POST['Submit']))
        {
        $euser_name = $_POST['user_name'];
        $euser_email = $_POST['user_email'];

        $euser_password = $_POST['user_password'];
        $euser_image=$_FILES['user_image'] ['name'];
        $etmp_name=$_FILES['user_image'] ['tmp_name'];

        $euser_details = $_POST['user_details'];
        if(empty($euser_image)){
            $euser_image = $user_image;
        }
        $update = "UPDATE crud SET
         user_name='$euser_name',user_email='$euser_email',user_password='$euser_password',user_image='$euser_image',user_details='$euser_details' WHERE user_id='$edit_id'";
       $run = mysqli_query($conn,$update) ;
       if($run === true){
        echo 'Data Updated ';
        move_uploaded_file($etmp_name,"upload/$euser_image");    
        }
        else {
        echo 'Update failed';
        
        }
    }
       
        ?>
        <a href='display.php'>View User</a>
    </center>
</body>

</html>