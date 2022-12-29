<?php
 
session_start();

$host = "localhost";
$root = "root";
$password = "";
$dbname = "shop";

$conn = new MySQLi($host, $root, $password, $dbname);

if (!$conn) {
	mysqli_connect_error($con);
}