<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>

<body>
    <center>
        <h1>Display records</h1><br><br>
        <hr>
        <br>
        <br>
        <?php
            $conn = mysqli_connect('localhost','root','','crud');
            if(isset($_GET['del'])){
            $del_id=$_GET['del'];
            $delete = "DELETE FROM crud WHERE user_id='$del_id'";
            $run=mysqli_query($conn,$delete);
            if($run === true)
            {
                echo 'Record has been deleted';
            }
            else{
                echo 'Failed';
            }
        }
            
        ?>
        <table border=1 cellpadding=12 cellspacing=10>
            <thead>
                <tr>
                    <th>user_id</th>
                    <th>user_name</th>
                    <th>user_email</th>
                    <th>user_password</th>
                    <th>user-image</th>
                    <th>user_details</th>
                    <th>DELETE</th>
                    <th>UPDATE</th>
                </tr>
            </thead>
            <tbody>
                <?php  
            $conn = mysqli_connect('localhost','root','','crud');
            $select = "SELECT * FROM crud";
            $run = mysqli_query($conn,$select);
            while($row_user= mysqli_fetch_array($run)){
                $user_id = $row_user['user_id'];
                $user_name = $row_user['user_name'];
                $user_email = $row_user['user_email'];
                $user_password = $row_user['user_password'];
                $user_image = $row_user['user_image'];
                $user_details = $row_user['user_details'];
            ?>
                <tr>
                    <td><?php echo $user_id;?></td>
                    <td><?php echo $user_name;?></td>
                    <td><?php echo $user_email;?></td>
                    <td><?php echo $user_password;?></td>
                    <td><img src="upload/<?php echo $user_image;?>" height=70px></td>
                    <td><?php echo $user_details;?></td>
                    <td>
                        <a href="display.php?del= <?php echo $user_id;?>">Delete<a>
                    </td>
                    <td>
                        <a href="update.php?edit= <?php echo $user_id;?>">UPDATE<a>
                    </td>


                </tr>
                <?php }?>
            </tbody>
        </table>
        <br></br>
        <h3><a href='insert.php'>Insert User</a></h3><br>
        <hr>
    </center>


</body>

</html>