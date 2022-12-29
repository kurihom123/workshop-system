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

    <?php $query = $conn->query("SELECT * FROM `user_t` wHERE UserID='$id'");
    foreach ($query as $key => $row) :
    ?>

        <h2 class="text-center my-4">Update Member </h2>
        <div class="shadow border col-md-10 p-3 mt-3 mx-auto">
            <form action="<?= BASE_URL . '/php/users.php' ?>" method="POST">
                <input type="hidden" name="id" value="<?= $row['UserID']; ?>">
                <fieldset class="form-group">
                    <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required type="text" value="<?= $row['firstName']; ?>" name="fistname" class="form-control" 
                                            placeholder="enter first name">
                                    </div><br>
                                    <div class="col-sm-6">
                                        <input required type="text" value="<?= $row['secondName']; ?>" name="secondname" class="form-control " 
                                            placeholder="enter second name">
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required type="text" value="<?= $row['lastName']; ?>" name="lastname" class="form-control "
                                          placeholder="enter last name">
                                    </div><br>
                                    <div class="col-sm-6">
                                        <input required type="text" value="<?= $row['UserName']; ?>" name="userName" class="form-control"
                                        placeholder="enter username">
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required type="email" value="<?= $row['UserEmail']; ?>" name="email" class="form-control "
                                          placeholder="enter email">
                                    </div><br>
                                    <div class="col-sm-6">
                                        <input required type="text" value="<?= $row['UserMobileNo']; ?>" name="mobile" class="form-control "
                                             placeholder="enter phone number">
                                    </div>
                        
                                </div><br>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required type="date" value="<?= $row['UserDOB']; ?>" name="dob" class="form-control "
                                            placeholder="enter date of brth">
                                    </div>
                                      <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input required type="file" value="<?= $row['photo']; ?>" name="photo" class="form-control">
                                        </div>
                                </div>

                                <div class="form-group row">
                                 <div class="col-sm-6 mt-3">
                            <select name="role_id" class="form-control">
                                <option selected hidden disabled>Select Role</option>
                                <option value="Male">coordinator</option>
                                <option value="Female">leader</option>
                                <option value="Female">member</option>
                            </select>
                                    </div>
                        <div class="col-sm-6 mt-3">
                            <select name="gender" class="form-control">
                                <option selected hidden disabled>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Female">Other</option>
                            </select>
                                    </div>
                    </div>
<br>
                <div class="form-group my-3">
                 <button type="submit" name="login" class="btn btn-outline-success">Submit</button>
                </div>
                            </fieldset>
                </fieldset>
            </form>
        </div>
    <?php endforeach; ?>
</main>

<?php require_once ROOT_PATH . "/includes/super-footer.php"; ?>