<?php if (isset($_GET['edit']) ) : ?>


<?php $get_residents = $DB->prepare("SELECT * FROM resident WHERE residentID = ? LIMIT 0, 1");
$get_residents->execute([ $_GET['edit'] ]);  ?>

<?php if ($get_residents && $get_residents->rowCount() > 0) :
        $residents = $get_residents->fetch(); ?>
    <form method="POST" class="row py-5">
        <div class="col-12">
            <h2 class="h2 text-primary">Edit Resident</h2>
            <hr class="hr" />
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="residentFName">First Name: <span class="text-danger">*</span> </label>
                <input type="text" name="residentFName" id="residentFName" class="form-control" value="<?=$residents['residentFName']?>" maxlength="255" required />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="residentMName">Middle Name:</label>
                <input type="text" name="residentMName" id="residentMName" class="form-control" value="<?=$residents['residentMName']?>" maxlength="255" />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="residentLName">Last Name: <span class="text-danger">*</span></label>
                <input type="text" name="residentLName" id="residentLName" class="form-control" value="<?=$residents['residentLName']?>" maxlength="255" required />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="residentAge">Age: <span class="text-danger">*</span></label>
                <input type="number" name="residentAge" id="residentAge" class="form-control" value="<?=$residents['residentAge']?>" maxlength="2" required />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="residentCivilStatus">Civil Status:</label>
                <input type="text" name="residentCivilStatus" id="residentCivilStatus" class="form-control" value="<?=$residents['residentCivilStatus']?>" maxlength="255" />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="residentGender">Gender:</label>
                <input type="text" name="residentGender" id="residentGender" class="form-control" value="<?=$residents['residentGender']?>" maxlength="255" />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="residentZoneNumber">Zone #: <span class="text-danger">*</span></label>
                <input type="text" name="residentZoneNumber" id="residentZoneNumber" class="form-control" value="<?=$residents['residentZoneNumber']?>" maxlength="10" required />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="residentBdate">Year of birth: <span class="text-danger">*</span></label>
                <input type="date" name="residentBdate" id="residentBdate" class="form-control" placeholder="mm/dd/yyyy" value="<?=$residents['residentBdate']?>"required />
            </div>
        </div>        
        <div class="col-lg-4">
            <div class="form-group">
                <label for="residentContactNumber">Contact Number: <span class="text-danger">*</span></label>
                <input type="text" name="residentContactNumber" id="residentContactNumber" class="form-control" value="<?=$residents['residentContactNumber']?>" maxlength="10" required />
            </div>
        </div>        
        <div class="col-lg-4">
            <div class="form-group">
                <label for="residentOccupation">Occupation: <span class="text-danger">*</span></label>
                <input type="text" name="residentOccupation" id="residentOccupation" class="form-control" value="<?=$residents['residentOccupation']?>" maxlength="30" required />
            </div>
        </div>
        <div class="col-12">
            <hr class="hr" />
            <a href="<?=root_url('residents')?>" class="btn btn-light text-danger rounded-50px px-4">Cancel</a>
            <input type="hidden" name="residentID" value="<?=$residents['residentID']?>" class="d-none">
            <button type="submit" name="update-residents" class="btn btn-primary rounded-50px px-4">Update</button>
        </div>
    </form>
<?php else : ?>
    <?php error_404(); ?>
<?php endif; ?>
<?php else : ?>

<!-- View Modal -->
<?php if (isset($_GET['view']) ) : ?>


<?php $get_residents = $DB->prepare("SELECT * FROM resident WHERE residentID = ? LIMIT 0, 1");
$get_residents->execute([ $_GET['view'] ]);  ?>

<?php if ($get_residents && $get_residents->rowCount() > 0) :
        $residents = $get_residents->fetch(); ?>
<form class="row py-5">
    <div class="col-12">
        <h2 class="h2 text-primary">Residents Info</h2>
        <hr class="hr" />
    </div>
    <div class="col-lg-4">
    <p class="fs-5 fw-bold">First Name: <span><?=$residents["residentFName"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 fw-bold">Middle Name: <span><?=$residents["residentMName"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 fw-bold">Last Name: <span><?=$residents["residentLName"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 fw-bold">Age: <span><?=$residents["residentAge"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 fw-bold">Gender: <span><?=$residents["residentGender"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 fw-bold">Occupation: <span><?=$residents["residentOccupation"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 fw-bold">Civil Status: <span><?=$residents["residentCivilStatus"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 fw-bold">Contact #: <span><?=$residents["residentContactNumber"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 fw-bold">Zone Number: <span><?=$residents["residentZoneNumber"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 fw-bold">Year Of Birth: <span><?=$residents["residentBdate"] ?></span></p>
    </div>
    <div class="col-12">
            <hr class="hr" />
            <a href="<?=root_url('residents')?>" class="btn btn-secondary text-light rounded-50px px-4">Close</a>
            <button class="btn btn-success text-light rounded-50px px-4">Generate</button>
    </div>
</form>
<?php else : ?>
    <?php error_404(); ?>
<?php endif; ?>
<?php else : ?>
<?php endif; ?>

<div class="row py-3">
    <form method="POST" class="col-lg-7">
        <div class="form-group">
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
    <div class="col-lg-5">
        <button class="btn btn-primary rounded-50px float-right px-5" data-toggle="modal" data-target="#add-modal">Add</button>
    </div>
</div>
<div class="row py-3">
    <div class="col-12 w-75">
        <div class="card rounded-15px">
            <div class="card-header bg-primary">
                <h6 class="card-text h4 text-light">
                    Residents
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="table-sm">
                                <th>First name</th>
                                <th>Middle name</th>
                                <th>Last name</th>
                                <th>Age</th>
                                <th>Civil Status</th>
                                <th>Gender</th>
                                <th>Zone#</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $resident = $DB->query("SELECT * FROM resident ORDER BY residentFName ASC");
                                foreach ($resident as $residents) : ?>
                                    <tr class="table-sm">
                                        <td><?=$residents["residentFName"] ?></td>
                                        <td><?=$residents["residentMName"] ?></td>
                                        <td><?=$residents["residentLName"] ?></td>
                                        <td><?=$residents["residentAge"] ?></td>
                                        <td><?=$residents["residentCivilStatus"] ?></td>
                                        <td><?=$residents["residentGender"] ?></td>
                                        <td><?=$residents["residentZoneNumber"] ?></td>
                                        <td>
                                            <a href="<?=root_url('residents')?>?view=<?=$residents['residentID']?>" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                                            <a href="<?=root_url('residents')?>?edit=<?=$residents['residentID']?>" class="btn btn-primary">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="#delete-items" class="btn btn-danger" data-toggle="modal" data-itemid=<?=$residents['residentID']?>>
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
            <h4 class="modal-title">Add Resident</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
                <label for="residentFName" class="text-muted font-weight-bold">First Name:</label>
                <input type="text" name="residentFName" id="residentFName" class="form-control" maxlength="255" required />
            </div>
            <div class="form-group">
                <label for="residentMName" class="text-muted font-weight-bold">Middle Name:</label>
                <input type="text" name="residentMName" id="residentMName" class="form-control" maxlength="225" required />
            </div>
            <div class="form-group">
                <label for="residentLName" class="text-muted font-weight-bold">Last Name:</label>
                <input type="text" name="residentLName" id="residentLName" class="form-control" maxlength="225" required />
            </div>
            <div class="form-group">
                <label for="residentAge" class="text-muted font-weight-bold">Age:</label>
                <input type="number" name="residentAge" id="residentAge" class="form-control" maxlength="2" required />
            </div>
            <div class="form-group">
                <label for="residentCivilStatus" class="text-muted font-weight-bold">Civil Status:</label>
                <input type="text" name="residentCivilStatus" id="residentCivilStatus" class="form-control" maxlength="255" />
            </div>
            <div class="form-group">
                <label for="residentGender" class="text-muted font-weight-bold">Gender:</label>
                <input type="text" name="residentGender" id="residentGender" class="form-control" maxlength="25" required />
            </div>
            <div class="form-group">
                <label for="residentZoneNumber" class="text-muted font-weight-bold">Zone #:</label>
                <input type="text" name="residentZoneNumber" id="residentZoneNumber" class="form-control" maxlength="25" required />
            </div>
            <div class="form-group">
                <label for="residentBdate" class="text-muted font-weight-bold">Year of Birth:</label>
                <input type="date" name="residentBdate" id="residentBdate" placeholder="mm/dd/yyyy" class="form-control" maxlength="25" required />
            </div>
            <div class="form-group">
                <label for="residentContactNumber" class="text-muted font-weight-bold">Contact Number:</label>
                <input type="text" name="residentContactNumber" id="residentContactNumber" class="form-control" maxlength="25" required />
            </div>
            <div class="form-group">
                <label for="residentOccupation" class="text-muted font-weight-bold">Occupation:</label>
                <input type="text" name="residentOccupation" id="residentOccupation" class="form-control" maxlength="25" required />
            </div>
            
        </div>


        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="add-residents">Submit</button>
        </div>
        </div>
    </div>
</form>

<!-- Modal delete Item -->
<div class="modal fade has-itemid" id="delete-items">
    <div class="modal-dialog animate__animated animate__bounceInDown">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="h5 modal-title text-primary">Delete Resident</h5>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-center">
                <div class="text-danger">Are you sure you want to delete this resident?</div>
            </div>
            <div class="modal-footer">
                <form method="POST">
                    <input type="hidden" name="itemid" class="d-none" value="0" />
                    <button type="submit" name="delete-residents" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

