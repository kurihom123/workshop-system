<?php
require '../path.php';
require "dbcon.php";

// Add the member

if(isset($_POST['login']))
{
    $id = $_GET['id'];
    $user_id = $_GET['UserID'];
    $fistname = $_POST['fistname'];
    $secondname = $_POST['secondname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['userName'];
    $password = $_POST['password'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $name = $_POST['role_id'];
    $dob = $_POST['dob'];
    $image = rand(1000, 10000)."-".$_FILES['photo']['name'];
    $temp_name = $_FILES['photo']['temp_name'];
    $gender = $_POST['gender'];
    

            //preparing a query
            $sql = "UPDATE `userroles` SET name = '$name' WHERE id = '$id' ";
                    
            //running the querry    
            $sqlrun = mysqli_query($conn, $sql);
                if($sqlrun)
                {
                    $last_id = mysqli_insert_id($conn);
                    move_uploaded_file($temp_name, "../uploads/$image");
                    $sql1 = "UPDATE `user_t` SET
                     firstName = '$firstname',
                    secondName = '$secondname',
                    lastName = '$lastname',
                    role_id = '$last_id',
                     UserDOB = '$dob',
                    UserGender = '$gender',
                    UserMobileNo = '$mobile',
                    UserEmail = '$email',
                    UserName = '$username',
                    photo = '$image' WHERE  userID = '$id'";
                    $sqlru = mysqli_query($conn, $sql1);
                    if($sqlru)
                    {
                       header("location:../admin/users/index.php");
                    }

                }
        else
        {
           header("location: ../register.php");  
        }
    }

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE  user_t, userroles FROM userroles INNER JOIN user_t ON user_t.role_id = userroles.id AND UserID='$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        header('location: index.php');
    }
    else{
        echo 'mpuuzi kalale';
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE  user_t, project_t 
            FROM user_t INNER JOIN project_t 
            ON user_t.userID = project_t.User_UserID AND ProjectID='$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        header('location: index.php');
    }
    else{
        echo 'mpuuzi kalale';
    }
}


?>