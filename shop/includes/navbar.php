<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark px-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= BASE_URL . '/index.php' ?>">Project Workshops Repository Management System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= BASE_URL . '/index.php' ?>">Home</a>
                </li>
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href=""><?= $_SESSION['username'];  ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL . '/php/logout.php' ?>">Logout</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL . '/orders.php' ?>">Orders</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL . '/login.php' ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL . '/register.php' ?>">Register</a>
                    </li>
                <?php endif; ?>

                <!-- </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
        </div>
    </div>
</nav>