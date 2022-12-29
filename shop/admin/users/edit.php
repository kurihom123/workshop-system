<?php
require '../../path.php';
require ROOT_PATH . '/php/dbcon.php';
require_once ROOT_PATH . "/includes/admin/header.php";
$id = $_GET['id'];
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Members</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="<?= BASE_URL . '/admin/users/create.php' ?>" type="button" class="btn btn-sm btn-outline-secondary">
                <span data-feather="user-plus"></span>
                Add Members
            </a>
        </div>
    </div>

    <?php $query = $con->query("SELECT * FROM `users` wHERE id='$id'");
    foreach ($query as $key => $row) :
    ?>

        <h2 class="text-center my-4">Update Member </h2>
        <div class="shadow border col-md-10 p-3 mt-3 mx-auto">
            <form action="<?= BASE_URL . '/php/users.php' ?>" method="POST">
                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                <fieldset class="form-group">
                    <div class="row my-2">
                        <div class="col">
                            <label for="industryInputHelp" class="form-label">First Name</label>
                            <input type="text" value="<?= $row['firstname']; ?>" name="first_name" class="form-control" placeholder="First name" aria-label="First name">
                        </div>
                        <div class="col">
                            <label for="industryInputHelp" class="form-label">Last Name</label>
                            <input type="text" value="<?= $row['lastname']; ?>" name="last_name" class="form-control" placeholder="Last name" aria-label="Last name">
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col">
                            <label for="industryInputHelp" class="form-label">Date Birth</label>
                            <input type="date" value="<?= $row['d.o.b']; ?>" name="dob" class="form-control" placeholder="d.o.b">
                        </div>

                        <div class="col">
                            <label for="industryInputHelp" class="form-label">Gender</label>
                            <select id="inputState" name="gender" class="form-select">
                                <option selected>Choose gender</option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="industryInputHelp" class="form-label">Location</label>
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
                            <label for="industryInputHelp" class="form-label">Email</label>
                            <input type="email" value="<?= $row['email']; ?>" name="email" class="form-control" placeholder="email" aria-label="email">
                        </div>
                        <div class="col">
                            <label for="industryInputHelp" class="form-label">phone_number</label>
                            <input type="number" value="<?= $row['phone_number']; ?>" name="phone_number" class="form-control" placeholder="phone_number" aria-label="phone_number">
                        </div>
                        <div class="col">
                            <label for="industryInputHelp" class="form-label">Username</label>
                            <input type="text" value="<?= $row['username']; ?>" name="username" class="form-control" placeholder="username" aria-label="username">
                        </div>
                        <div class="col">
                            <label for="industryInputHelp" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="password" aria-label="password">
                        </div>
                    </div>

                    <?php $query = $con->query("SELECT * FROM `roles`"); ?>
                    <div class="mb-3">
                        <label for="industryInputHelp" class="form-label">Select a role</label>
                        <select name="role_id" class="form-select" aria-label="Default select example">
                            <?php foreach ($query as $key => $role) : ?>
                                <?php if ($row['role_id'] == $role['id']) : ?>
                                    <option selected value="<?= $role['id']; ?>"><?= $role['name']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $role['id']; ?>"><?= $role['name']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group my-3">
                        <button type="submit" name="edit_member" class="btn btn-outline-success">update member</button>
                    </div>
                </fieldset>
            </form>
        </div>
    <?php endforeach; ?>
</main>

<?php require_once ROOT_PATH . "/includes/super-footer.php"; ?>