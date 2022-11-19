<?php if (isset($_GET['edit']) ) : ?>


<?php $get_blotters = $DB->prepare("SELECT * FROM blotter WHERE blotterID = ? LIMIT 0, 1");
$get_blotters->execute([ $_GET['edit'] ]);  ?>

<?php if ($get_blotters && $get_blotters->rowCount() > 0) :
        $blotters = $get_blotters->fetch(); ?>
    <form method="POST" class="row py-5">
        <div class="col-12">
            <h2 class="h2 text-primary">Edit Blotter Report</h2>
            <hr class="hr" />
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="complainant">Complainant: <span class="text-danger">*</span> </label>
                <input type="text" name="complainant" id="complainant" class="form-control" value="<?=$blotters['complainant']?>" maxlength="255" required />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="c_address">Complainant Address:</label>
                <input type="text" name="c_address" id="c_address" class="form-control" value="<?=$blotters['c_address']?>" maxlength="255" />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="c_contact">Complainant Contact#: <span class="text-danger">*</span></label>
                <input type="text" name="c_contact" id="c_contact" class="form-control" value="<?=$blotters['c_contact']?>" maxlength="11" required />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="person_to_complain">Complainee: <span class="text-danger">*</span></label>
                <input type="text" name="person_to_complain" id="person_to_complain" class="form-control" value="<?=$blotters['person_to_complain']?>" maxlength="255" required />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="p_address">Complainee Address:</label>
                <input type="text" name="p_address" id="p_address" class="form-control" value="<?=$blotters['p_address']?>" maxlength="255" />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="p_contact">Complainee Contact#:</label>
                <input type="text" name="p_contact" id="p_contact" class="form-control" value="<?=$blotters['p_contact']?>" maxlength="11" />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="date_recorded">Date Recorded: <span class="text-danger">*</span></label>
                <input type="date" name="date_recorded" id="date_recorded" class="form-control" placeholder="mm/dd/yyyy" value="<?=$blotters['date_recorded']?>" maxlength="10" required />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="action_taken">Action Taken: <span class="text-danger">*</span></label>
                <input type="text" name="action_taken" id="action_taken" class="form-control" value="<?=$blotters['action_taken']?>" maxlength="100" required />
            </div>
        </div>        
        <div class="col-lg-4">
            <div class="form-group">
                <label for="complaint_status">Status of Report:</label>
                    <select name="complaint_status" id="complaint_status" class="custom-select">
                        <option <?=$user['complaint_status']=='Pending' ? 'selected' : '' ?> value="Pending" >Pending</option>
                        <option <?=$user['complaint_status']=='Solve' ? 'selected' : '' ?> value="Solve" >Solved</option>
                    </select>
            </div>
        </div>        
        <div class="col-lg-4">
            <div class="form-group">
                <label for="location_of_incidence">Location of Incidence: <span class="text-danger">*</span></label>
                <input type="text" name="location_of_incidence" id="location_of_incidence" class="form-control" value="<?=$blotters['location_of_incidence']?>" maxlength="50" required />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="complaint">Location of Incidence: <span class="text-danger">*</span></label>
                <input type="text" name="complaint" id="complaint" class="form-control" value="<?=$blotters['complaint']?>" maxlength="100" required />
            </div>
        </div>
        <div class="col-12">
            <hr class="hr" />
            <a href="<?=root_url('blotter')?>" class="btn btn-light text-danger rounded-50px px-4">Cancel</a>
            <input type="hidden" name="blotterID" value="<?=$blotters['blotterID']?>" class="d-none">
            <button type="submit" name="update-blotters" class="btn btn-primary rounded-50px px-4">Update</button>
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
    <form method="POST" class="col-lg-4">
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
    <div class="col-lg-8">
        <button class="btn btn-primary rounded-50px float-right px-5" data-toggle="modal" data-target="#add-modal">Add</button>
    </div>
</div>
<div class="row py-3">
    <div class="col-12">
        <div class="card rounded-10px">
            <div class="card-header bg-primary">
                <h6 class="card-text h4 text-light">
                    Blotter
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="table-sm">
                                <th>Complainant</th>
                                <th>Complainee</th>
                                <th>Date recorded</th>
                                <th>Status of report</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $blotter = $DB->query("SELECT * FROM blotter ORDER BY date_recorded ASC");
                                foreach ($blotter as $blotters) : ?>
                                    <tr class="table-sm">
                                        <td><?=$blotters["complainant"] ?></td>
                                        <td><?=$blotters["person_to_complain"] ?></td>
                                        <td><?=$blotters["date_recorded"] ?></td>
                                        <td><?=$blotters["complaint_status"] ?></td>
                                        <td>
                                            <a href="<?=root_url('blotter')?>?view=<?=$blotters['blotterID']?>" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                                            <a href="<?=root_url('blotter')?>?edit=<?=$blotters['blotterID']?>" class="btn btn-primary">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="#delete-items" class="btn btn-danger" data-toggle="modal" data-itemid=<?=$blotters['blotterID']?>>
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
            <h4 class="modal-title">Add Blotter</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
                <label for="complainant" class="text-muted font-weight-bold">Complainant:</label>
                <input type="text" name="complainant" id="complainant" class="form-control" maxlength="255" required />
            </div>
            <div class="form-group">
                <label for="c_address" class="text-muted font-weight-bold">Complainant Address:</label>
                <input type="text" name="c_address" id="c_address" class="form-control" maxlength="225" required />
            </div>
            <div class="form-group">
                <label for="c_contact" class="text-muted font-weight-bold">Complainant Contact#:</label>
                <input type="text" name="c_contact" id="c_contact" class="form-control" maxlength="11" required />
            </div>
            <div class="form-group">
                <label for="person_to_complain" class="text-muted font-weight-bold">Complainee:</label>
                <input type="text" name="person_to_complain" id="person_to_complain" class="form-control" maxlength="50" required />
            </div>
            <div class="form-group">
                <label for="p_address" class="text-muted font-weight-bold">Complainee Address:</label>
                <input type="text" name="p_address" id="p_address" class="form-control" maxlength="255" />
            </div>
            <div class="form-group">
                <label for="p_contact" class="text-muted font-weight-bold">Complainee Contact#:</label>
                <input type="text" name="p_contact" id="p_contact" class="form-control" maxlength="11" required />
            </div>
            <div class="form-group">
                <label for="date_recorded" class="text-muted font-weight-bold">Date Recorded:</label>
                <input type="date" name="date_recorded" id="date_recorded" placeholder="mm/dd/yyyy" class="form-control" maxlength="25" required />
            </div>
            <div class="form-group">
                <label for="action_taken" class="text-muted font-weight-bold">Action Taken:</label>
                <input type="text" name="action_taken" id="action_taken" class="form-control" maxlength="25" required />
            </div>
            <div class="form-group">
                <label for="complaint_status" class="text-muted font-weight-bold">Status of Report:</label>
                    <select name="complaint_status" id="complaint_status" class="form-control">
                        <option value="Pending">Pending</option>
                        <option value="Solve">Solved</option>
                    </select>
            </div>
            <div class="form-group">
                <label for="location_of_incidence" class="text-muted font-weight-bold">Location of Incidence:</label>
                <input type="text" name="location_of_incidence" id="location_of_incidence" class="form-control" maxlength="100" required />
            </div>
            <div class="form-group">
                <label for="complaint" class="text-muted font-weight-bold">Report Details:</label>
                <input type="text" name="complaint" id="complaint" class="form-control" maxlength="100" required />
            </div>
        </div>


        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="add-blotters">Submit</button>
        </div>
        </div>
    </div>
</form>

<!-- Modal delete Item -->
<div class="modal fade has-itemid" id="delete-items">
    <div class="modal-dialog animate__animated animate__bounceInDown">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="h5 modal-title text-primary">Delete Blotter</h5>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-center">
                <div class="text-danger">Are you sure you want to delete this blotter?</div>
            </div>
            <div class="modal-footer">
                <form method="POST">
                    <input type="hidden" name="itemid" class="d-none" value="0" />
                    <button type="submit" name="delete-blotters" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

