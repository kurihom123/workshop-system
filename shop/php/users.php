<?php
require '../path.php';
require "dbcon.php";

// Add the member
if (isset($_POST['add_member'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role_id'];

    //hash the password first
    $password_hash = SHA1($password);

    $SQL = "INSERT INTO users VALUES(NULL, '$role', '$first_name', '$last_name', '$dob', '$gender', '$username', '$email', '$password_hash', now())";
    $QUERY = mysqli_query($con, $SQL);

    if ($QUERY) {
        header("location:" . BASE_URL . "/admin/users/index.php");
    } else {
        echo mysqli_error($con);
    }
}

// Update member
if (isset($_POST['edit_member'])) {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role_id'];

    //hash the password first
    $password_hash = SHA1($password);

    $query = $con->query("UPDATE `users` SET 
    firstname = '$first_name',
    lastname = '$last_name',
    role_id = '$role',
    `d.o.b` = '$dob',
    gender = '$gender',
    location = '$location',
    email = '$email',
    username = '$username',
    password = '$password_hash'
    WHERE id = '$id' ");

    if ($query) {
        header("location:" . BASE_URL . "/admin/users/index.php");
    } else {
        echo mysqli_error($con);
    }
}

// Delete industry
if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $query = $con->query("DELETE FROM `users` WHERE id = '$id' ");
    if ($query) {
        header('location:' . BASE_URL . '/admin/users/index.php');
    } else {
        echo mysqli_error($con);
    }
}
