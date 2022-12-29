<?php
require 'path.php';
require ROOT_PATH . '/php/dbcon.php';
require_once ROOT_PATH . "/includes/header.php";
$id = $_GET['id'];
?>
<main class="container my-4">
    <div class="album py-3 bg-light">
        <div class="container">
            <h2 class="text-center my-2">Product Details </h2>
            <?php $query = $con->query("SELECT p.*, u.username, ind.industry_name FROM `products` AS p, users as u, industry AS ind WHERE p.users_id=u.id AND p.industry_id = ind.id AND p.id = '$id' "); ?>
            <?php foreach ($query as $key => $row) : ?>
                <div class="card shadow-sm">
                    <img src="<?= BASE_URL . "/assets/images/products/" . $row['image']; ?>" width="100%" height="100%" alt="<?= $row['image']; ?>">

                    <div class="card-body">
                        <h5 class="card-title">Industry Name: <?= $row['industry_name'] ?></h5>
                        <h6 class="card-title">Seller: <?= $row['username'] ?></h6>
                        <h6 class="card-title">product name: <?= $row['prod_name'] ?></h6>
                        <p class="card-text"><?= $row['body'] ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">buy/order</button>
                            </div>
                            <small class="text-muted">Tsh <?= $row['price'] ?>/=</small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</main>
<?php require_once ROOT_PATH . "/includes/footer.php"; ?>