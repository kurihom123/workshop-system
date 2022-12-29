<?php
require '../../path.php';
require ROOT_PATH . '/php/dbcon.php';
require_once ROOT_PATH . "/includes/admin/header.php"; ?>

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
    <?php $query = $con->query("SELECT u.*, r.name FROM `users` AS u, `roles` AS r WHERE u.role_id = r.id "); ?>
    <div class="my-4 mx-auto">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Date Birth</th>
                    <th scope="col">Gender</th>
                    <th scope="col">location</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">phone_number</th>
                     <th scope="col">Role</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach ($query as $key => $row) : ?>
                    <tr>

                        <td><?= $row['id']; ?></td>
                        <td><?= $row['firstname'] ?></td>
                        <td><?= $row['lastname'] ?></td>
                        <td><?= $row['d.o.b'] ?></td>
                        <td><?= $row['gender'] ?></td>
                         <td><?= $row['location'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['email'] ?></td>
                         <td><?= $row['phone_number'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td> <a href="edit.php?id=<?= $row['id']; ?>" class="text-decoration-none"> <span data-feather="edit" class=" text-info"></span> Edit </a></td>
                        <td> <a href="<?= BASE_URL . '/php/users.php' ?>?del_id=<?= $row['id']; ?>" class="text-decoration-none text-danger"> <span data-feather="trash-2" class=" text-danger"></span> Delete </a> </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</main>

<?php require_once ROOT_PATH . "/includes/super-footer.php"; ?>