<?php
session_start();
require '../path.php';
require_once ROOT_PATH . "/includes/admin/header.php"; ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="bg-light p-5 rounded">
        <h1>Welcome Admin [<?php echo $_SESSION['username'];  ?>]</h1>
    </div>
</main>

<?php require_once ROOT_PATH . "/includes/super-footer.php"; ?>