 

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<style> 
body{
    position: fixed;
    background-image:url(AAA3.png);
}
</style>


 <?php
require 'path.php';
 require_once ROOT_PATH . "/includes/header.php"; ?>
    <div class="justify-content-center">
<main class="container my-4" style="margin-left: 200px;">
    <div class="border p-5 col-md-8 mx-auto" style="background-color: lightgrey; width: 730px; ">
        <form action="php/login.php" method="POST" style="width: 600px">
            <h3>Login Form</h3>
            <div class="row mb-3">
                <label for="inputUsername3" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" id="inputUsername3">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword3">
                </div>
            </div>
            <h6>Are you a merchant? <a class="" href="register.php">Register</a></h6>
            <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
        </form>
    </div>
</main>
</div>
<?php require_once ROOT_PATH . "/includes/footer.php"; ?>
</body>
</html>