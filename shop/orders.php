<?php
require 'path.php';
require ROOT_PATH . '/php/dbcon.php';
require_once ROOT_PATH . "/includes/header.php";

if (!isset($_SESSION['user_id'])) {
    header('location: ' . BASE_URL . '/login.php');
}


?>
<main class="container my-4">
    <div class="album py-3 bg-light">
        <div class="container">
            <h2 class="text-center my-2">Order Listing </h2>
            <?php $query = $con->query("SELECT od.*, u.username, p.prod_name, p.price, p.price FROM `oders` as od, users as u, products as p WHERE od.user_id=u.id AND od.product_id = p.id AND od.user_id = '" . $_SESSION['user_id'] . "' "); ?>

            <?php if (mysqli_num_rows($query) > 0) : ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Date Ordered</th>
                            <th scope="col">Order status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query as $key => $row) : ?>

                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['prod_name'] ?></td>
                                <td><?= $row['price'] ?></td>
                                <td><?= $row['created_at'] ?></td>
                                <?php if ($row['status'] == '0') : ?>
                                    <td> <span class="text-warning">Pending</span> </td>
                                <?php else :  ?>
                                    <td> <span class="text-success">Accepted</span> </td>
                                <?php endif; ?>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <?php $query = $con->query("SELECT od.*, u.username, p.prod_name, p.price, SUM(p.price) as total FROM `oders` as od, users as u, products as p WHERE od.user_id=u.id AND od.product_id = p.id AND od.user_id = '" . $_SESSION['user_id'] . "' "); ?>
                        <?php $row = mysqli_fetch_assoc($query); ?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td> <b> Total Cost = Tsh <?= $row['total']; ?>/=</b></td>
                        <td></td>
                    </tfoot>
                </table>
            <?php else : ?>
                <p class="text-center fw-bold border shadow p-3 text-uppercase m-4 w-50 mx-auto">You dont have any product</p>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php require_once ROOT_PATH . "/includes/footer.php"; ?>