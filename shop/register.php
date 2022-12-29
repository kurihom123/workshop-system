<?php
session_start();
require 'path.php';
require_once ROOT_PATH . "/includes/header.php"; ?>
<main class="container my-4">

    <div class="border p-5 col-md-8 mx-auto" style="background-color: lightgrey;">
        <form method="POST" action="php/register.php">
           <center><h3>Registration Form</h3></center>
            <div class="row my-2">
                <div class="col">
                    <input type="text" name="first_name" class="form-control" placeholder="First name" aria-label="First name">
                </div>
                <div class="col">
                    <input type="text" name="last_name" class="form-control" placeholder="Last name" aria-label="Last name">
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <input type="date" name="dob" class="form-control" placeholder="d.o.b">
                </div>

                <div class="col">
                    <select id="inputState" name="gender" class="form-select">
                        <option selected hidden disabled>Choose gender</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                </div>
                <div class="col">
                    <select id="inputState" name="location" class="form-select">
                        <option selected hidden disabled>Choose location</option>
                        <option value="DODOMA">DODOMA</option>
                        <option value="MOROGORO">MOROGORO</option>
                        <option value="DAR ES SALAAM">DAR ES SALAAM</option>
                        <option value="MBEYA">MBEYA</option>
                    </select>
                </div>
            </div>

            <div class="row my-2">  
                <div class="col">
                    <input type="email" name="email" class="form-control" placeholder="email" aria-label="email">

                </div>

                <div class="col">
                    <input type="phone_number" name="phone_number" class="form-control" placeholder="phone_number" aria-label="phone_number">
                    
                </div>
                <div class="col">
                    <input type="text" name="username" class="form-control" placeholder="username" aria-label="username">
                </div>
                <div class="col">
                    <input type="password" name="password" class="form-control" placeholder="password" aria-label="password">
                </div>
            </div>
            <center><button type="submit" name="submit" class="btn btn-primary">Sign Up</button></center>
        </form>
    </div>

</main>
<?php require_once ROOT_PATH . "/includes/footer.php"; ?>