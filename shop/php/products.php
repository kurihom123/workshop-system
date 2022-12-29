<?php

require '../path.php';
require "dbcon.php";

// Add Products
if (isset($_POST['add_product'])) {
    $product_cat = $_POST['product_cat'];
    $product = $_POST['product'];
    $body = $_POST['body'];
    $quanity = $_POST['quanity'];
    $price = $_POST['price'];
    $user_id = $_SESSION['user_id'];
    $industry_id = $_POST['industry_id'];

    $image = $_FILES['file']['name'];
    $target = "../assets/images/products/" . basename($image);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
        $query = $con->query("INSERT INTO `products` VALUES(NULL,'$product_cat', '$product', '$body', '$quanity', '$price', '$image', '0', '$user_id', '$industry_id')");
        if ($query) {
            header('location:' . BASE_URL . '/merchant/products/index.php');
        } else {
            echo mysqli_error($con);
        }
    } else {
        echo mysqli_error($con);
    }
}

// Update Products
if (isset($_POST['edit_product'])) {
    $product_cat = $_POST['product_cat'];
    $product = $_POST['product'];
    $body = $_POST['body'];
    $quanity = $_POST['quanity'];
    $price = $_POST['price'];
    $user_id = $_SESSION['id'];
    $industry_id = $_POST['industry_id'];
    $id = $_POST['id'];

    $query = $con->query("UPDATE `products` SET 
    product_category_id = '$product_cat',
    prod_name =  '$product',
    body =  '$body',
    quantity = '$quanity', 
    price = '$price',
    users_id = '$user_id',
    industry_id = '$industry_id'
    WHERE id=$id
    ");
    if ($query) {
        header('location:' . BASE_URL . '/merchant/products/index.php');
    } else {
        echo mysqli_error($con);
    }
}

// Delete Products
if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $query = $con->query("DELETE FROM `products` WHERE id = '$id' ");

    if ($query) {
        header('location:' . BASE_URL . '/merchant/products/index.php');
    } else {
        mysqli_error($con);
    }
}
