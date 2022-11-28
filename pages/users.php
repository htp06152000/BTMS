<?php if (isset($_GET['edit']) ) : ?>


<?php $get_user = $DB->prepare("SELECT * FROM users WHERE user_id = ? LIMIT 0, 1");
$get_user->execute([ $_GET['edit'] ]);  ?>

<?php if ($get_user && $get_user->rowCount() > 0) :
        $user = $get_user->fetch(); ?>
    <form method="POST" class="edit row py-5">
        <div class="col-12">
            <h2 class="h2 text-primary">Edit User</h2>
            <hr class="hr" />
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="first_name">First Name: <span class="text-danger">*</span> </label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="<?=$user['first_name']?>" maxlength="255" required />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="middle_name">Middle Name:</label>
                <input type="text" name="middle_name" id="middle_name" class="form-control" value="<?=$user['middle_name']?>" maxlength="255" />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="last_name">Last Name: <span class="text-danger">*</span></label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="<?=$user['last_name']?>" maxlength="255" required />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="email">Email: <span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" class="form-control" value="<?=$user['email']?>" maxlength="255" required />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" class="form-control" value="<?=$user['address']?>" maxlength="255" />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role" id="role" class="custom-select">
                    <option <?=$user['role']=='USER' ? 'selected' : '' ?> value="USER" >User</option>
                    <option <?=$user['role']=='ADMINISTRATOR' ? 'selected' : '' ?> value="ADMINISTRATOR" >Administratror</option>
                </select>
            </div>
        </div>
        <div class="col-12">
            <hr class="hr" />
            <a href="<?=root_url('users')?>" class="btn btn-light text-danger rounded-50px px-4">Cancel</a>
            <input type="hidden" name="user_id" value="<?=$user['user_id']?>" class="d-none">
            <button type="submit" name="update-user" class="btn btn-primary rounded-50px px-4">Update</button>
        </div>
    </form>
<?php else : ?>
    <?php error_404(); ?>
<?php endif; ?>
<?php else : ?>

<!-- View Modal -->
<?php if (isset($_GET['view']) ) : ?>


<?php $get_user = $DB->prepare("SELECT * FROM users WHERE user_id = ? LIMIT 0, 1");
$get_user->execute([ $_GET['view'] ]);  ?>

<?php if ($get_user && $get_user->rowCount() > 0) :
        $user = $get_user->fetch(); ?>
<form class="row py-5">
    <div class="col-12">
        <h2 class="h2 text-primary">Users Info</h2>
        <hr class="hr" />
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">First Name: <span class="font-weight-normal"><?=$user["first_name"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Middle Name: <span class="font-weight-normal"><?=$user["middle_name"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Last Name: <span class="font-weight-normal"><?=$user["last_name"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Email: <span class="font-weight-normal"><?=$user["email"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Address: <span class="font-weight-normal"><?=$user["address"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Role: <span class="font-weight-normal"><?=$user["role"] ?></span></p>
    </div>
    <div class="col-12">
            <hr class="hr" />
            <a href="<?=root_url('users')?>" class="btn btn-secondary text-light rounded-50px px-4">Close</a>
    </div>
</form>
<?php else : ?>
    <?php error_404(); ?>
<?php endif; ?>
<?php else : ?>
<?php endif; ?>

<div class="row py-3">
    <form method="POST" class="col-lg-4">
        <div class="form-group animate__animated animate__slideInDown  animate__faster">
            <div class="input-group">
                <input type="search" name="s" id="search" class="form-control rounded-50px" placeholder="Search" />
                <div class="input-group-append">
                    <button type="submit" class="input-group-text rounded-50px bg-primary text-white px-3">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
    <div class="col-lg-8">
        <button class="btn btn-primary rounded-50px float-right px-5 animate__animated animate__slideInDown animate__faster" data-toggle="modal" data-target="#add-modal">Add</button>
    </div>
</div>
<div class="row py-3">
    <div class="col-12">
        <div class="card rounded-10px" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            <div class="card-header bg-primary">
                <h6 class="card-text h4 text-light">
                    Users
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-hover table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $users = $DB->query("SELECT * FROM users ORDER BY first_name ASC");
                                foreach ($users as $user) : ?>
                                    <tr class="table-sm text-center">
                                        <td><?=$user["first_name"] ?></td>
                                        <td><?=$user["last_name"] ?></td>
                                        <td><?=$user["email"] ?></td>
                                        <td>
                                        <a href="<?=root_url('users')?>?view=<?=$user['user_id']?>" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                                            <a href="<?=root_url('users')?>?edit=<?=$user['user_id']?>" class="btn btn-sm btn-primary">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="#delete-item" class="btn btn-sm btn-danger" data-toggle="modal" data-itemid=<?=$user['user_id']?>>
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<form method="POST" class="modal" id="add-modal">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Add User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
                <label for="username" class="text-muted font-weight-bold">Username:</label>
                <input type="text" name="username" id="username" class="form-control" maxlength="255" required />
            </div>
            <div class="form-group">
                <label for="password" class="text-muted font-weight-bold">Password:</label>
                <input type="password" name="password" id="password" class="form-control" maxlength="1000" required />
            </div>
            <div class="form-group">
                <label for="role" class="text-muted font-weight-bold">Role:</label>
                <select name="role" id="role" class="form-control">
                    <option value="USER">User</option>
                    <option value="ADMINISTRATOR">Administratror</option>
                </select>
            </div>
            <div class="form-group">
                <label for="first_name" class="text-muted font-weight-bold">First Name:</label>
                <input type="text" name="first_name" id="first_name" class="form-control" maxlength="255" required />
            </div>
            <div class="form-group">
                <label for="middle_name" class="text-muted font-weight-bold">Middle Name:</label>
                <input type="text" name="middle_name" id="middle_name" class="form-control" maxlength="255" />
            </div>
            <div class="form-group">
                <label for="last_name" class="text-muted font-weight-bold">Last Name:</label>
                <input type="text" name="last_name" id="last_name" class="form-control" maxlength="255" required />
            </div>
            <div class="form-group">
                <label for="email" class="text-muted font-weight-bold">Email:</label>
                <input type="email" name="email" id="email" class="form-control" maxlength="255" required />
            </div>
            <div class="form-group">
                <label for="address" class="text-muted font-weight-bold">Address:</label>
                <input type="text" name="address" id="address" class="form-control" maxlength="255" />
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="add-user">Submit</button>
        </div>

        </div>
    </div>
</form>

<div class="modal fade has-itemid" id="delete-item">
    <div class="modal-dialog animate__animated animate__bounceInDown">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="h5 modal-title text-primary">Delete User</h5>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-center">
                <div class="text-danger">Are you sure you want to delete this user?</div>
            </div>
            <div class="modal-footer">
                <form method="POST">
                    <input type="hidden" name="itemid" class="d-none" value="0" />
                    <button type="submit" name="delete-user" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>



