<?php if (isset($_GET['edit']) ) : ?>

<!-- Edit datas from Tables -->
<?php $get_transaction = $DB->prepare("SELECT * FROM blotter WHERE transactionID = ? LIMIT 0, 1");
$get_transaction->execute([ $_GET['edit'] ]);  ?>

<?php if ($get_transaction && $get_transaction->rowCount() > 0) :
        $transaction = $get_transaction->fetch(); ?>
    <form method="POST" class="row py-5">
        <div class="col-12">
            <h2 class="h2 text-primary">Edit Blotter Report</h2>
            <hr class="hr" />
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="complainant">Complainant: <span class="text-danger">*</span> </label>
                <input type="text" name="complainant" id="complainant" class="form-control" value="<?=$transaction['complainant']?>" maxlength="255" required />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="c_address">Complainant Address:</label>
                <input type="text" name="c_address" id="c_address" class="form-control" value="<?=$transaction['c_address']?>" maxlength="255" />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="c_contact">Complainant Contact#: <span class="text-danger">*</span></label>
                <input type="text" name="c_contact" id="c_contact" class="form-control" value="<?=$transaction['c_contact']?>" maxlength="11" required />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="person_to_complain">Complainee: <span class="text-danger">*</span></label>
                <input type="text" name="person_to_complain" id="person_to_complain" class="form-control" value="<?=$transaction['person_to_complain']?>" maxlength="255" required />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="p_address">Complainee Address:</label>
                <input type="text" name="p_address" id="p_address" class="form-control" value="<?=$transaction['p_address']?>" maxlength="255" />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="p_contact">Complainee Contact#:</label>
                <input type="text" name="p_contact" id="p_contact" class="form-control" value="<?=$transaction['p_contact']?>" maxlength="11" />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="date_recorded">Date Recorded: <span class="text-danger">*</span></label>
                <input type="date" name="date_recorded" id="date_recorded" class="form-control" placeholder="mm/dd/yyyy" value="<?=$transaction['date_recorded']?>" maxlength="10" required />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="action_taken">Action Taken: <span class="text-danger">*</span></label>
                <input type="text" name="action_taken" id="action_taken" class="form-control" value="<?=$transaction['action_taken']?>" maxlength="100" required />
            </div>
        </div>        
        <div class="col-lg-4">
            <div class="form-group">
                <label for="complaint_status">Status of Report:</label>
                    <select name="complaint_status" id="complaint_status" class="custom-select">
                        <option <?=$transaction['complaint_status']=='Pending' ? 'selected' : '' ?> value="Pending" >Pending</option>
                        <option <?=$transaction['complaint_status']=='Solve' ? 'selected' : '' ?> value="Solve" >Solved</option>
                    </select>
            </div>
        </div>        
        <div class="col-lg-4">
            <div class="form-group">
                <label for="location_of_incidence">Location of Incidence: <span class="text-danger">*</span></label>
                <input type="text" name="location_of_incidence" id="location_of_incidence" class="form-control" value="<?=$transaction['location_of_incidence']?>" maxlength="50" required />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="complaint">Complaint: <span class="text-danger">*</span></label>
                <input type="text" name="complaint" id="complaint" class="form-control" value="<?=$transaction['complaint']?>" maxlength="100" required />
            </div>
        </div>
        <div class="col-12">
            <hr class="hr" />
            <a href="<?=root_url('tran$transaction')?>" class="btn btn-light text-danger rounded-50px px-4">Cancel</a>
            <input type="hidden" name="transactionID" value="<?=$transaction['transactionID']?>" class="d-none">
            <button type="submit" name="update-tran$transaction" class="btn btn-primary rounded-50px px-4">Update</button>
        </div>
    </form>
<?php else : ?>
    <?php error_404(); ?>
<?php endif; ?>
<?php else : ?>

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
            <div class="card-header bg-warning">
                <h6 class="card-text h4 text-light">
                    Transactions
                </h6>
            </div>
            <!-- Table Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr class="table-sm text-center">
                                <th>Transaction ID</th>
                                <th>Requestor</th>
                                <th>Type of Document</th>
                                <th>Pick up Date</th>
                                <th>Status of request</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $transaction = $DB->query("SELECT concat(rs.residentFName,' ',rs.residentMName,' ',rs.residentLName) AS requester, rq.* FROM transaction rq JOIN resident rs ON rq.residentID = rs.residentID ORDER BY dateRecorded ASC");
                                foreach ($transaction as $transactions) : ?>
                                    <tr class="table-sm">
                                        <td><?=$transactions["transactionID"] ?></td>
                                        <td><?=$transactions["requester"] ?></td>
                                        <td class="text-center"><?=$transactions["dateRecorded"] ?></td>
                                        <td class="font-weight-bold text-center"><?=$transactions["status"] ?></td>
                                        <td class="text-center">
                                            <a href="<?=root_url('transaction')?>?edit=<?=$transactions['transactionID']?>" class="btn btn-sm btn-primary">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="#delete-items" class="btn btn-sm btn-danger" data-toggle="modal" data-itemid=<?=$transactions['transactionID']?>>
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
<form method="POST" class="modal" id="add-modal" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-light bg-primary">Select Type of Document</h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <button type="button" class="btn btn-info btn-md btn-block" data-toggle="modal" data-target="#add-modal-clearance">Barangay Clearance</button>
                    <button type="button" class="btn btn-info btn-md btn-block" data-toggle="modal" data-target="#add-modal-indigency">Certificate of Indigency</button>
                    <button type="button" class="btn btn-info btn-md btn-block" data-toggle="modal" data-target="#add-modal-permit">Business Permit</button>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php 
    $get_res = $DB->query("SELECT * FROM resident ORDER BY residentLName ASC");
    $residents = $get_res->fetchAll();
?>

<?php
    $get_ser = $DB->query("SELECT * FROM services");
    $services = $get_ser->fetchall();
?>

<!-- add modal for clearance -->
<form method="POST" class="modal" id="add-modal-clearance">
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
                <label for="services" class="text-muted font-weight-bold">Type of Document:</label>
                <select name="services" id="services" class="form-control">
                    <?php foreach($services as $service) :?>
                    <option value="<?=$service["servicesID"]?>"><?=$service['services'];?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="requester" class="text-muted font-weight-bold">Requestor's Full name:</label>
                <select name="requester" id="requester" class="form-control">
                    <?php foreach($residents as $resident) :?>
                        <option value="<?=$resident["residentID"]?>"><?=$resident['residentLName'].", ".$resident['residentFName']." ".$resident['residentMName']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pickupdate" class="text-muted font-weight-bold">Pick up Date:</label>
                <input type="date" name="pickupdate" id="pickupdate" class="form-control" placeholder="mm/dd/yyyy" min="<?=date('Y-m-d')?>" required />
            </div>
            <div class="form-group">
                <label for="status" class="text-muted font-weight-bold">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="Pending">Pending</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dateRecorded" class="text-muted font-weight-bold">Date Recorded:</label>
                <input type="date" name="dateRecorded" id="dateRecorded" class="form-control" placeholder="mm/dd/yyyy" min="<?=date('Y-m-d')?>" value="<?=date('Y-m-d')?>"/>
            </div>
            <div class="form-group">
                <label for="amount" class="text-muted font-weight-bold">Amount</label>
                <select name="amount" id="amount" class="form-control" disabled>
                    <option value="25">25</option>
                </select>
            </div>
            <div class="form-group">
                <label for="purpose" class="text-muted font-weight-bold">Purpose:</label>
                <input type="text" class="form-control" name="purpose" id="purpose" placeholder="Purpose" maxlength="255" required/>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="add-clearances">Proceed to payment</button>
            </div>
        </div>
        </div>
    </div>
</form>

<!-- add modal for indigency -->
<form method="POST" class="modal" id="add-modal-indigency">
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
                <label for="servicesname" class="text-muted font-weight-bold">Requestor's Full name:</label>
                <select name="requester" id="requester" class="form-control">
                    <?php foreach($residents as $resident) :?>
                        <option value="<?=$resident["residentID"]?>"><?=$resident['residentLName'].", ".$resident['residentFName']." ".$resident['residentMName']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pickupdate" class="text-muted font-weight-bold">Pick up Date:</label>
                <input type="date" name="pickupdate" id="pickupdate" class="form-control" placeholder="mm/dd/yyyy" min="<?=date('Y-m-d')?>" required />
            </div>
            <div class="form-group">
                <label for="status" class="text-muted font-weight-bold">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="Pending">Pending</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dateRecorded" class="text-muted font-weight-bold">Date Recorded:</label>
                <input type="date" name="dateRecorded" id="dateRecorded" class="form-control" placeholder="mm/dd/yyyy" min="<?=date('Y-m-d')?>" value="<?=date('Y-m-d')?>"/>
            </div>
            <div class="form-group">
                <label for="amount" class="text-muted font-weight-bold">Amount</label>
                <select name="amount" id="amount" class="form-control">
                    <option value="25">25</option>
                </select>
            </div>
            <div class="form-group">
                <label for="purpose" class="text-muted font-weight-bold">Purpose:</label>
                <input type="text" class="form-control" name="purpose" id="purpose" placeholder="Purpose" maxlength="255" required/>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="add-indigencies">Proceed to payment</button>
            </div>
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
                    <button type="submit" name="delete-transaction" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

