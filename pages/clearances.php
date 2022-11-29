<?php if (isset($_GET['edit']) ) : ?>

<!-- Edit datas from Tables -->
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
                        <option <?=$blotters['complaint_status']=='Pending' ? 'selected' : '' ?> value="Pending" >Pending</option>
                        <option <?=$blotters['complaint_status']=='Solve' ? 'selected' : '' ?> value="Solve" >Solved</option>
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
                <label for="complaint">Complaint: <span class="text-danger">*</span></label>
                <input type="text" name="complaint" id="complaint" class="form-control" value="<?=$blotters['complaint']?>" maxlength="100" required />
            </div>
        </div>
        <div class="col-12">
            <hr class="hr" />
            <a href="<?=root_url('blotters')?>" class="btn btn-light text-danger rounded-50px px-4">Cancel</a>
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

<!-- View Data from Table -->
<?php $get_blotters = $DB->prepare("SELECT * FROM blotter WHERE blotterID = ? LIMIT 0, 1");
$get_blotters->execute([ $_GET['view'] ]);  ?>

<?php if ($get_blotters && $get_blotters->rowCount() > 0) :
        $blotters = $get_blotters->fetch(); ?>
<form class="row py-5">
    <div class="col-12">
        <h2 class="h2 text-primary">Blotter Report</h2>
        <hr class="hr" />
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Complainant: <span class="font-weight-normal"><?=$blotters["complainant"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Complainant Address: <span class="font-weight-normal"><?=$blotters["c_address"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Complainant Contact#: <span class="font-weight-normal"><?=$blotters["c_contact"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Complainee: <span class="font-weight-normal"><?=$blotters["person_to_complain"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Complainee Address: <span class="font-weight-normal"><?=$blotters["p_address"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Complainee Contact#: <span class="font-weight-normal"><?=$blotters["p_contact"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Date of Incident: <span class="font-weight-normal"><?=$blotters["date_recorded"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Action Taken: <span class="font-weight-normal"><?=$blotters["action_taken"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Location of Incident: <span class="font-weight-normal"><?=$blotters["location_of_incidence"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Complaint Status: <span class="font-weight-normal"><?=$blotters["complaint_status"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Complaint: <span class="font-weight-normal"><?=$blotters["complaint"] ?></span></p>
    </div>
    <div class="col-12">
            <hr class="hr" />
            <a href="<?=root_url('blotters')?>" class="btn btn-secondary text-light rounded-50px px-4">Close</a>
            <button class="btn btn-success text-light rounded-50px px-4">Generate</button>
    </div>
</form>
<?php else : ?>
    <?php error_404(); ?>
<?php endif; ?>
<?php else : ?>
<?php endif; ?>

<!-- Search bar -->
<div class="row py-3">
    <form method="GET" action="" class="col-lg-4">
        <div class="form-group animate__animated animate__slideInDown  animate__faster">
            <div class="input-group">
                <input type="search" name="search" id="search" value="" class="form-control rounded-50px" placeholder="Search" />
                <div class="input-group-append">
                    <button type="submit" class="input-group-text rounded-50px bg-primary text-white px-3">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
    <!-- Add button -->
    <div class="col-lg-8">
        <button class="btn btn-primary rounded-50px float-right px-5 animate__animated animate__slideInDown  animate__faster" data-toggle="modal" data-target="#add-modal">Add</button>
    </div>
</div>
<!-- Table Title -->
<div class="row py-3">
    <div class="col-12">
        <div class="card rounded-10px" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            <div class="card-header bg-success">
                <h6 class="card-text h4 text-light">
                    Requests for Barangay Clearance
                </h6>
            </div>
            <!-- Table Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr class="table-sm text-center">
                                <th>Requestor Name</th>
                                <th>Pickup Date</th>
                                <th>Date recorded</th>
                                <th>Status of Request</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $clearance = $DB->query("SELECT * FROM barangayclearance ORDER BY dateRecorded DESC");
                                foreach ($clearance as $clearances) : ?>
                                    <tr class="table-sm">
                                        <td><?=$clearances["complainant"] ?></td>
                                        <td><?=$clearances["person_to_complain"] ?></td>
                                        <td class="text-center"><?=$clearances["date_recorded"] ?></td>
                                        <td class="font-weight-bold text-center"><?=$clearances["complaint_status"] ?></td>
                                        <td class="text-center">
                                            <a href="<?=root_url('clearances')?>?view=<?=$clearances['barangayclearance_ID']?>" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                                            <a href="<?=root_url('clearances')?>?edit=<?=$clearances['barangayclearance_ID']?>" class="btn btn-sm btn-primary">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="#delete-items" class="btn btn-sm btn-danger" data-toggle="modal" data-itemid=<?=$clearances['barangayclearance_ID']?>>
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
        <div class="modal-header bg-primary">
            <h4 class="modal-title text-light bg-primary">Add Clearance Request</h4>
            <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
                <label for="servicename" class="text-muted font-weight-bold">Requestor's Full name:</label>
                <input type="text" name="servicename" id="servicename" class="form-control" maxlength="255" required />
            </div>
            <div class="form-group">
                <label for="pickupdate" class="text-muted font-weight-bold">Pick up Date:</label>
                <input type="date" name="pickupdate" id="pickupdate" class="form-control" placeholder="mm/dd/yyyy" required />
            </div>
            <div class="form-group">
                <label for="purpose" class="text-muted font-weight-bold">Purpose:</label>
                <textarea type="text" class="form-control" name="purpose" id="purpose" rows="3" required></textarea>
            </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="add-clearances">Proceed to payment</button>
        </div>
        </div>
    </div>
</form>

<!-- Modal delete Item -->
<div class="modal fade has-itemid" id="delete-items">
    <div class="modal-dialog animate__animated animate__bounceInDown">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="h5 modal-title text-primary">Delete Request</h5>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-center">
                <div class="text-danger">Are you sure you want to delete this request?</div>
            </div>
            <div class="modal-footer">
                <form method="POST">
                    <input type="hidden" name="itemid" class="d-none" value="0" />
                    <button type="submit" name="delete-clearances" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

