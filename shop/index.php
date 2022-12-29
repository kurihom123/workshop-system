<?php
require 'path.php';
require_once ROOT_PATH . "/includes/header.php";
$con = mysqli_connect("localhost", "root", "", "agriculture");

if (!isset($_SESSION['user_id'])) {
    header('location: ' . BASE_URL . '/login.php');
}

if (isset($_GET['order_id'])) {

    $prod_id = $_GET['order_id'];
    $user_id = $_SESSION['user_id'];


    $query = $con->query("UPDATE `products` SET `products`.`status` = '1' WHERE `products`.`id` = '$prod_id' ");
    if ($query) {
        $order = $con->query("INSERT INTO `oders` VALUES(NULL, '$user_id', '$prod_id', '0', now() )");
        if ($order) {
            header('location: ' . BASE_URL . '/home.php');
        } else {
            echo mysqli_error($con);
        }
    } else {
        echo mysqli_error($con);
    }
}

?>
<main class="container my-4">
    <div class="album py-3 bg-light">
        <div class="container">
            <h2 class="text-center my-2">Product Listing </h2>
            <?php $query = $con->query("SELECT p.*, u.username, ind.industry_name FROM `products` AS p, users as u, industry AS ind WHERE p.users_id=u.id AND p.industry_id = ind.id AND status = 0"); ?>


            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php if (mysqli_num_rows($query) > 0) : ?>
                    <?php foreach ($query as $key => $row) : ?>

                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="<?= BASE_URL . "/assets/images/products/" . $row['image']; ?>" width="100%" height="300" alt="<?= $row['image']; ?>">

                                <div class="card-body">
                                    <h5 class="card-title">Industry Name: <?= $row['industry_name'] ?></h5>
                                    <h6 class="card-title">Seller: <?= $row['username'] ?></h6>
                                    <h6 class="card-title">Product name: <?= $row['prod_name'] ?></h6>
                                    <p class="card-text"><?= $row['body']; ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="product-detail.php?id=<?= $row['id']; ?>" type="button" class="btn btn-sm btn-outline-secondary">View product</a>
                                            <a type="button" href="index.php?order_id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-secondary">buy/order
                                            </a>
                                        </div>
                                        <small class="text-muted">Tsh <?= $row['price'] ?>/=</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-center fw-bold border shadow p-3 text-uppercase m-4 w-50 mx-auto">No product yet</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

</main>
<?php require_once ROOT_PATH . "/includes/footer.php"; ?>