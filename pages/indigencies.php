<?php if (isset($_GET['edit']) ) : ?>

<!-- Edit datas from Tables -->
<?php $get_indigencies = $DB->prepare("SELECT * FROM certificateindigency WHERE certificateindigency_ID = ? LIMIT 0, 1");
$get_indigencies->execute([ $_GET['edit'] ]);  ?>

<?php if ($get_indigencies && $get_indigencies->rowCount() > 0) :
        $indigencies = $get_indigencies->fetch(); ?>
    <form method="POST" class="row py-5">
        <div class="col-12">
            <h2 class="h2 text-primary">Edit Request Details</h2>
            <hr class="hr" />
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="servicesname">Requestor's Full Name: <span class="text-danger">*</span> </label>
                <input type="text" name="servicesname" id="servicesname" class="form-control" value="<?=$indigencies['servicesname']?>" maxlength="255" disabled />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="pickupdate">Pick up Date:</label>
                <input type="date" name="pickupdate" id="pickupdate" class="form-control" value="<?=$indigencies['pickupdate']?>" maxlength="255" disabled/>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="dateRecorded">Date Recorded: <span class="text-danger">*</span></label>
                <input type="date" name="dateRecorded" id="dateRecorded" class="form-control" value="<?=$indigencies['dateRecorded']?>" maxlength="11" disabled/>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="status">Status: <span class="text-danger">*</span></label>
                <select name="status" id="status" class="custom-select">
                    <option <?=$indigencies['status']=='Pending' ? 'selected' : '' ?> value="Pending" >Pending</option>
                    <option <?=$indigencies['status']=='Processing' ? 'selected' : '' ?> value="Processing" >Processing</option>
                    <option <?=$indigencies['status']=='Ready' ? 'selected' : '' ?> value="Ready to Pick up" >Ready to Pick up</option>
                    <option <?=$indigencies['status']=='Released' ? 'selected' : '' ?> value="Released" >Released</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="text" name="amount" id="amount" class="form-control" value="<?=$indigencies['amount']?>" maxlength="255" disabled />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="purpose">Purpose:</label>
                <input type="text" name="purpose" id="purpose" class="form-control" value="<?=$indigencies['purpose']?>" maxlength="11" disabled />
            </div>
        </div>
        <div class="col-12">
            <hr class="hr" />
            <a href="<?=root_url('indigencies')?>" class="btn btn-light text-danger rounded-50px px-4">Cancel</a>
            <input type="hidden" name="certificateindigency_ID" value="<?=$clearances['certificateindigency_ID']?>" class="d-none">
            <button type="submit" name="update-indigencies" class="btn btn-primary rounded-50px px-4">Update</button>
        </div>
    </form>
<?php else : ?>
    <?php error_404(); ?>
<?php endif; ?>
<?php else : ?>

<!-- View Modal -->
<?php if (isset($_GET['view']) ) : ?>

<!-- View Data from Table -->
<?php $get_indigencies = $DB->prepare("SELECT * FROM certificateindigency WHERE certificateindigency_ID = ? LIMIT 0, 1");
$get_indigencies->execute([ $_GET['view'] ]);  ?>

<?php if ($get_indigencies && $get_indigencies->rowCount() > 0) :
        $indigencies = $get_indigencies->fetch(); ?>
<form class="row py-5">
    <div class="col-12">
        <h2 class="h2 text-primary">Request Details</h2>
        <hr class="hr" />
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Requestor's Full name: <span class="font-weight-normal"><?=$indigencies["servicesname"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Pick up Date: <span class="font-weight-normal"><?=$indigencies["pickupdate"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Date Recorded: <span class="font-weight-normal"><?=$indigencies["dateRecorded"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Amount: <span class="font-weight-normal"><?=$indigencies["amount"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Status: <span class="font-weight-normal"><?=$indigencies["status"] ?></span></p>
    </div>
    <div class="col-lg-4">
    <p class="fs-5 font-weight-bold">Purpose: <span class="font-weight-normal"><?=$indigencies["purpose"] ?></span></p>
    </div>
    <div class="col-12">
            <hr class="hr" />
            <a href="<?=root_url('indigencies')?>" class="btn btn-secondary text-light rounded-50px px-4">Close</a>
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
            <div class="card-header bg-warning">
                <h6 class="card-text h4 text-light">
                    Requests for Certificate of Indigency
                </h6>
            </div>
            <!-- Table Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr class="table-sm text-center">
                                <th>Transaction ID</th>
                                <th>Requestor Name</th>
                                <th>Pickup Date</th>
                                <th>Date recorded</th>
                                <th>Status of Request</th>
                                <th>Actions</th>
                                <th>Generate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $indigency = $DB->query("SELECT * FROM certificateindigency ORDER BY status ASC");
                                foreach ($indigency as $indigencies) : ?>
                                    <tr class="table-sm">
                                        <td class="text-center"><?=$indigencies['certificateindigency_ID']?></td>
                                        <td><?=$indigencies["servicesname"] ?></td>
                                        <td class="text-center"><?=$indigencies["pickupdate"] ?></td>
                                        <td class="text-center"><?=$indigencies["dateRecorded"] ?></td>
                                        <td class="font-weight-bold text-center"><?=$indigencies["status"] ?></td>
                                        <td class="text-center">
                                            <a href="<?=root_url('indigencies')?>?view=<?=$indigencies['certificateindigency_ID']?>" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                                            <a href="<?=root_url('indigencies')?>?edit=<?=$indigencies['certificateindigency_ID']?>" class="btn btn-sm btn-primary">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="#delete-items" class="btn btn-sm btn-danger" data-toggle="modal" data-itemid=<?=$indigencies['certificateindigency_ID']?>>
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                        <td class="text-center"><a href="" class="btn btn-sm btn-success w-75"><i class="fi fi-rr-print"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    $sql= "SELECT `residentLName`,`residentFName`,`residentMName` FROM `resident`";
    try
    {
        $rsdnt=$DB->prepare($sql);
        $rsdnt->execute();
        $resultss=$rsdnt->fetchAll();

    }
    catch (PDOException $err)
    {
        die ("Data Connection Failed" ($err -> getMessage()));
    }
?>

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
                <label for="servicesname" class="text-muted font-weight-bold">Requestor's Full name:</label>
                <select name="servicesname" id="servicesname" class="form-control" placeholder="Resident Name">
                    <option>--Full Name--</option>
                    <?php 
                        foreach($resultss as $resulta) :
                    ?>
                    <option><?php echo $resulta['residentLName'].", ".$resulta['residentFName']." ".$resulta['residentMName']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pickupdate" class="text-muted font-weight-bold">Pick up Date:</label>
                <input type="date" name="pickupdate" id="pickupdate" class="form-control" placeholder="mm/dd/yyyy" required />
            </div>
            <div class="form-group">
                <label for="status" class="text-muted font-weight-bold">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="Pending">Pending</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dateRecorded" class="text-muted font-weight-bold">Date Recorded:</label>
                <input type="date" name="dateRecorded" id="dateRecorded" class="form-control"/>
                <script>
                    var d=new Date()
                    var yr=d.getFullYear();
                    var month=d.getMonth()+1

                    if (month<10) {
                        month='0'+month
                    }
                    var date=d.getDate();
                    if(date<10) {
                        date='0'+date
                    }

                    var c_date=yr+"-"+month+"-"+date;

                    document.getElementById('dateRecorded').value=c_date;
                    
                    endif;
                </script>
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
                <h5 class="h5 modal-title text-primary">Delete Request</h5>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-center">
                <div class="text-danger">Are you sure you want to delete this request?</div>
            </div>
            <div class="modal-footer">
                <form method="POST">
                    <input type="hidden" name="itemid" class="d-none" value="0" />
                    <button type="submit" name="delete-indigencies" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

