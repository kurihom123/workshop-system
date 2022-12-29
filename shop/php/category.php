<?php

require '../path.php';
require "dbcon.php";

// Add category
if (isset($_POST['add_category'])) {
    $category = $_POST['category'];
    $query = $con->query("INSERT INTO `product_category` VALUES(NULL,'$category')");
    if ($query) {
        header('location:' . BASE_URL . '/admin/category/index.php');
    } else {
        mysqli_error($con);
    }
}

// Edit category
if (isset($_POST['edit_category'])) {
    $name = $_POST['category'];
    $id = $_POST['id'];
    $query = $con->query("UPDATE `product_category` SET name = '$name' WHERE id= '$id' ");

    if ($query) {
        header('location:' . BASE_URL . '/admin/category/index.php');
    } else {
        mysqli_error($con);
    }
}

// Delete
if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $query = $con->query("DELETE FROM `product_category` WHERE id = '$id' ");

    if ($query) {
        header('location:' . BASE_URL . '/admin/category/index.php');
    } else {
        mysqli_error($con);
    }
}
