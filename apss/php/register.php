<?php 
require '../path.php';
require ROOT_PATH . '/php/dbcon.php';
if(isset($_POST['login']))
{
    $fistname = $_POST['fistname'];
    $secondname = $_POST['secondname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['userName'];
    $password = $_POST['password'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $image = rand(1000, 10000)."-".$_FILES['photo']['name'];
    $temp_name = $_FILES['photo']['temp_name'];
    $gender = $_POST['gender'];
    
          //comparing passwords
        if ($password == $pass) 
        {

            $hpassword = MD5($password);

            //preparing a query
            $sql = "INSERT INTO `userroles` (`name`) VALUES ('coordinator')";
                    
            //running the querry    
            $sqlrun = mysqli_query($conn, $sql);
                if($sqlrun)
                {
                    $last_id = mysqli_insert_id($conn);
                    move_uploaded_file($temp_name, "../uploads/$image");
                    $sql1 = "INSERT INTO `user_t` (`firstName`, `secondName`, `lastName`, `role_id`, `UserName`, `UserDOB`, `UserPassword`, `UserEmail`, `UserGender`, `UserMobileNo`, `photo`) VALUES ('$fistname', '$secondname', '$lastname', '$last_id', '$username', '$dob','$hpassword', '$email', '$gender', '$mobile', '$image')";
                    $sqlru = mysqli_query($conn, $sql1);
                    if($sqlru)
                    {
                       header("location:../index.php");
                    }


                    else
                    {
                	header("location:../register.php");     
                    }
                }
        }
        else
        {
           header("location: ../register.php");  
        }
    }
else{
    echo 'bad access';
}
?>