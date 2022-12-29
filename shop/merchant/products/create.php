<?php
require '../../path.php';
require ROOT_PATH . '/php/dbcon.php';
require_once ROOT_PATH . "/includes/merchant/header.php"; ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="<?= BASE_URL . '/merchant/products/index.php' ?>" type="button" class="btn btn-sm btn-outline-secondary">
                <span data-feather="list"></span>
                Product Lists
            </a>
        </div>
    </div>

    <h2 class="text-center my-2">Add Product </h2>
    <div class="shadow border col-md-10 p-3 mt-3 mx-auto">
        <form action="<?= BASE_URL . '/php/products.php' ?>" method="POST" enctype="multipart/form-data">
            <fieldset class="form-group">
                <?php $query = $con->query("SELECT * FROM `product_category`"); ?>
                <div class="mb-3">
                    <label for="productInputHelp" class="form-label">Product Category</label>
                    <select name="product_cat" class="form-select" aria-label="Default select example">
                        <option>Choose product category</option>
                        <?php foreach ($query as $key => $location) : ?>
                            <option value="<?= $location['id']; ?>"><?= $location['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php $query = $con->query("SELECT * FROM `industry`"); ?>
                <div class="mb-3">
                    <label for="productInputHelp" class="form-label">Product Indutry</label>
                    <select name="industry_id" class="form-select" aria-label="Default select example">
                        <option>Choose product industry</option>
                        <?php foreach ($query as $key => $location) : ?>
                            <option value="<?= $location['id']; ?>"><?= $location['industry_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="productInputHelp" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="product" id="productInputHelp" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="quanityInputHelp" class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="quanity" id="quanityInputHelp" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="priceInputHelp" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" id="priceInputHelp" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Small file input example</label>
                    <input class="form-control form-control-sm" name="file" id="formFileSm" type="file">
                </div>
                <div class="form-group my-3">
                    <button type="submit" name="add_product" class="btn btn-outline-success">add product</button>
                </div>
            </fieldset>

        </form>
    </div>
</main>

<?php require_once ROOT_PATH . "/includes/super-footer.php"; ?>