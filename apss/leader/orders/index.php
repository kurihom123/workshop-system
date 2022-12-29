<?php
require '../../path.php';
require ROOT_PATH . '/php/dbcon.php';
require_once ROOT_PATH . "/includes/merchant/header.php"; ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> My Orders</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button onclick="window.print()" type="button" class="btn btn-sm btn-outline-secondary">
                <span data-feather="printer"></span>
                Make a Report
            </button>
        </div>
    </div>
    <?php $query = $con->query("SELECT od.*, u.username, p.prod_name, p.price, p.price FROM `oders` as od, users as u, products as p WHERE od.user_id=u.id AND od.product_id = p.id AND p.users_id = '" . $_SESSION['user_id'] . "' "); ?>
    <div class="w-75 my-4 mx-auto">

        <?php if (mysqli_num_rows($query) > 0) : ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Date Ordered</th>
                        <th scope="col">Progress Order</th>
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
                                <td> <a href="<?= BASE_URL . '/php/orders.php' ?>?id=<?= $row['id']; ?>" class="text-decoration-none"> <span data-feather="check" class=" text-info"></span> Accept </a></td>
                            <?php else :  ?>
                                <td> <a href="<?= BASE_URL . '/php/orders.php' ?>?del_id=<?= $row['id']; ?>" class="text-decoration-none text-danger"> <span data-feather="x" class=" text-danger"></span> Decline </a> </td>
                            <?php endif; ?>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                        <?php $query = $con->query("SELECT od.*, u.username, p.prod_name, p.price, SUM(p.price) as total FROM `oders` as od, users as u, products as p WHERE od.user_id=u.id AND od.product_id = p.id AND p.users_id = '" . $_SESSION['user_id'] . "' "); ?>
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
</main>

<?php require_once ROOT_PATH . "/includes/super-footer.php"; ?>