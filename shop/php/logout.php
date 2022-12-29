<?php
require '../path.php';
session_start();
session_destroy();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['admin']);
unset($_SESSION['merchant']);

header('location:' . BASE_URL . '/index.php');
exit(1);