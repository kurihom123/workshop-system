<?php
require '../../path.php';
require ROOT_PATH . '/php/dbcon.php';
require_once ROOT_PATH . "/includes/merchant/header.php"; ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="<?= BASE_URL . '/merchant/products/create.php' ?>" type="button" class="btn btn-sm btn-outline-secondary">
                <span data-feather="plus"></span>
                Add Product
            </a>
        </div>
    </div>
    <?php $query = $con->query("SELECT p.*, c.name, ind.industry_name FROM products AS p, product_category AS c, industry AS ind WHERE p.product_category_id = c.id AND  p.industry_id = ind.id AND users_id= '" . $_SESSION['user_id'] . "' "); ?>
    <div class="w-75 my-4 mx-auto">

        <?php if (mysqli_num_rows($query) > 0) : ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Industry Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Actions</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query as $key => $row) : ?>

                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['industry_name'] ?></td>
                            <td><?= $row['prod_name'] ?></td>
                            <td><?= $row['body'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td><?= $row['quantity'] ?></td>
                            <td> <a href="edit.php?id=<?= $row['id']; ?>" class="text-decoration-none"> <span data-feather="edit" class=" text-info"></span> Edit </a></td>
                            <td> <a href="<?= BASE_URL . '/php/products.php' ?>?del_id=<?= $row['id']; ?>" class="text-decoration-none text-danger"> <span data-feather="trash-2" class=" text-danger"></span> Delete </a> </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="text-center fw-bold border shadow p-3 text-uppercase m-4 w-50 mx-auto">You dont have any product</p>
        <?php endif; ?>
    </div>
</main>

<?php require_once ROOT_PATH . "/includes/super-footer.php"; ?>