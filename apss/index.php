 

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body class="text-info">
<style> 

</style>


 <?php
require 'path.php';
 require_once ROOT_PATH . "/includes/header.php"; ?>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"> Login Form </h1>
                                    </div>
                                    <form class="user" action="admin/dashboard.php" method="POST">
                                            <div class="form-group">
                                                <div class="col-sm-12 mb-3 mb-sm-0">
                                                    <input type="text" name="username" class="form-control"
                                                    placeholder="Enter username...">
                                                </div>
                                                    <div class="col-sm-12 mb-3 mb-sm-0 mt-3">
                                                         <input type="password" name="password" class="form-control" placeholder="Password">                                              
                                                    </div>
                                                <div class="col-sm-12 mb-3 mb-sm-0 mt-3">
                                            <input type="submit" name="login" value="login" class=" bg-success bg-gradient form-control">
                                        </div>
                                      </div>
                                    </form>
                                  
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>