<?php
require '../path.php';
require "dbcon.php";


// Delete Products
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $con->query("UPDATE `oders` SET status = '1' WHERE id = '$id' ");
    if ($query) {
        header('location:' . BASE_URL . '/merchant/orders/index.php');
    } else {
        echo mysqli_error($con);
    }
}


// Delete Products
if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $query = $con->query("UPDATE `oders` SET status = '0' WHERE id = '$id' ");
    if ($query) {
        header('location:' . BASE_URL . '/merchant/orders/index.php');
    } else {
        echo mysqli_error($con);
    }
}
