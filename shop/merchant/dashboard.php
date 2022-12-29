<?php
session_start();
require '../path.php';
require_once ROOT_PATH . "/includes/merchant/header.php"; ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div class="bg-light p-5 rounded">
        <h2>Welcome Merchant [<?php echo $_SESSION['username'];  ?>]</h1>
            <a class="btn btn-lg btn-danger" href="<?= BASE_URL . '/php/login.php' ?>" role="button">Logout </a>
    </div>
</main>
<?php require_once ROOT_PATH . "/includes/super-footer.php"; ?>