<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APSS</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-fixed/">
    <!-- Bootstrap core CSS -->
    <link href="<?= BASE_URL . '/assets/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?= BASE_URL . '/assets/css/dashboard.css' ?>" rel="stylesheet">
    <meta name="theme-color" content="#7952b3">


    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">
</head>

<body>

    <?php require_once ROOT_PATH . "/includes/super-navbar.php"; ?>
    <div class="container-fluid">
        <div class="row">
            <?php require_once ROOT_PATH . "/includes/merchant/sidebar.php"; ?>