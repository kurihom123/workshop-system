<?php
require '../path.php';
require "dbcon.php";

// Add industry
if (isset($_POST['add_industry'])) {
    $category = $_POST['industry'];
    $location = $_POST['location_id'];
    $query = $con->query("INSERT INTO `industry` VALUES(NULL,'$category', '$location')");
    if ($query) {
        header('location:' . BASE_URL . '/admin/industry/index.php');
    } else {
        echo mysqli_error($con);
    }
}

// Edit industry
if (isset($_POST['edit_industry'])) {
    $category = $_POST['industry'];
    $location = $_POST['location_id'];
    $id = $_POST['id'];
    $query = $con->query("UPDATE `industry` SET industry_name = '$category', location_id = '$location' WHERE id= '$id' ");
    if ($query) {
        header('location:' . BASE_URL . '/admin/industry/index.php');
    } else {
        echo mysqli_error($con);
    }
}

// Delete industry
if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $query = $con->query("DELETE FROM `industry` WHERE id = '$id' ");
    if ($query) {
        header('location:' . BASE_URL . '/admin/industry/index.php');
    } else {
        echo mysqli_error($con);
    }
}
