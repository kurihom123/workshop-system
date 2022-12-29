<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= BASE_URL . '/merchant/dashboard.php' ?>">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL . '/merchant/orders/index.php' ?>">
                    <span data-feather="file"></span>
                    Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL . '/merchant/products/index.php' ?>">
                    <span data-feather="shopping-cart"></span>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL . '/php/logout.php' ?>">
                    <span data-feather="log-out" class="text-danger"></span>
                    <?= $_SESSION['username'] ?>
                </a>
            </li>
        </ul>
    </div>
</nav>