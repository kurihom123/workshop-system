<?php
 
session_start();

$host = "localhost";
$root = "root";
$password = "";
$dbname = "shop";

$con = new MySQLi($host, $root, $password, $dbname);

if (!$con) {
	mysqli_connect_error($con);
}