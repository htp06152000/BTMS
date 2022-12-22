<?php if ( ! defined('ACCESS') ) die("Direct access not allowed."); ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- Title ang login -->
<div class="navbar navbar-expand-lg bg-light navbar-light p-1" id="navbar">
        <div class="container">
                <a href="#" class="navbar-brand text-dark mb-0 h1 animate__animated animate__fadeInRight animate__faster font-weight-bold">
                        <img src="resources/images/calumpangs.jpg" alt="Logo"> Barangay Transaction Management System</a>

                <a href="<?=root_url("login")?>" class="btn btn-primary animate__animated animate__zoomIn" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;" role="button">Login</a>
        </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-primary navbar-dark p-2 " style="box-shadow: 0rem 0rem 0.5rem 0rem;"> 
        <div class="container">
                <ul class="nav justify-content-start animate__animated animate__fadeInLeft animate__faster">
                        <li class="nav-item">
                                <a href="#" class="nav-link text-light active h6">Home</a>
                        </li>
                        <li class="nav-item">
                                <a href="#Services" class="nav-link text-light h6">Services</a>
                        </li>
                        <li class="nav-item">
                                <a href="#request" class="nav-link text-light h6">Track Request</a>
                        </li>
                </ul>
        </div>
</nav>

<section class="p-5"></section>

<!--Content-->
<section class="text-dark p-5 p-lg-0 p-lg-5 text-start text-sm-start">
        <div class="container">
                <div class="d-sm-flex animate__animated animate__fadeInDown">
                        <img class="img-fluid w-25" src="resources/images/calumpang.jfif" alt="" style="border-radius: 20px;">

                        <div>
                                <h1><span class="text-light">..</span>Welcome to <span class="text-primary">Barangay Calumpang</span></h1>
                                <p class="lead">
                                        <span class="text-light">_...</span>Iloilo City, Iloilo<br>
                                        <span class="text-light">_...</span>Office open from 8:00am - 5:00pm<br>
                                        <span class="text-light">_...</span><span class="text-primary">Monday-Friday</span><br>
                                        <span class="text-light">_...</span>09123456789
                                </p>
                        </div>
                </div>
        </div>
</section>

<section class="p-5"></section>
<section class="p-3"></section>
<section class="bg-primary p-1" id="Services"></section>


<!-- Services -->
<section class="p-5">
<div class="container p-1">
                <div class="d-flex justify-content-center">
                        <div class="h1">Services</div>
                </div>
        </div>
        <div class="p-5"></div>
        <div class="container">
                <div class="row text-center">
                        <div class="col-md">
                                <div class="card bg-info text-light text-center mb-1 " style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">
                                        <div class="h1 mb-1 py-3">
                                        </div>
                                        <h4 class="card-title mb-3 text-uppercase font-weight-bold">Barangay Clearance</h4>
                                        <p class="card-text px-4">
                                                View the document requirements needed for Barangay Clearance
                                        </p>
                                        <div class="button">
                                                <button href="#" class="btn btn-outline-warning btn-light my-5 text-dark w-25" data-toggle="modal" data-target="#add-modal-clearance">Proceed</button>
                                        </div>
                                </div>
                        </div>
                
                        <div class="col-md">
                                <div class="card bg-info text-light text-center mb-1" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">
                                        <div class="h1 mb-1 py-3">
                                        </div>
                                        <h4 class="card-title mb-3 text-uppercase font-weight-bold">Certificate of Indigency</h4>
                                        <p class="card-text px-4">
                                                View the document requirements needed for Certificate of Indigency
                                        </p>
                                        <div class="button">
                                                <a href="#" class="btn btn-outline-warning btn-light my-5 text-dark w-25" data-toggle="modal" data-target="#add-modal-indigency">Proceed</a>
                                        </div>
                                </div>
                        </div>

                        <div class="col-md">
                                <div class="card bg-info text-light text-center mb-1" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">
                                        <div class="h1 mb-1 py-3">
                                        </div>
                                        <h4 class="card-title mb-3 text-uppercase font-weight-bold">Business Permit</h4>
                                        <p class="card-text px-4">
                                                View the document requirements needed for Business permit
                                        </p>
                                        <div class="button">
                                                <a href="#" class="btn btn-outline-warning btn-light my-5 text-dark w-25" data-toggle="modal" data-target="#add-modal-permit">Proceed</a>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        </div>
        <div class="p-5"></div>
        <div class="p-5"></div>
</section>

<!-- track request -->
<section class="bg-primary text-light p-3" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">
        <div class="container">
                <div class="d-md-flex justify-content-between align-items-center">
                        <h4 class="mb-3 mb-md-0 pe-1 text-start">Track</h4>
                        <h4 class="mb-3 mb-md-0 text-start" id="request">Request</h4>

                        <div class="input-group news-input ps-5">
                                <input type="text" class="form-control" placeholder="Enter code here">
                                <button class="btn btn-success btn-md text-light" type="button">Track</button>
                        </div>
                </div>
        </div>
</section>
<div class="p-4">
        <div class="container">
                <div class="d-flex justify-content-center">
                        <a class="btn btn-primary btn-sm" role="button" href="#navbar" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">Back to top</a>
                </div>        
        </div>
</div>

<!-- modal for services -->

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
                <label for="tod" class="text-muted font-weight-bold">Type of Document:</label>
                <select name="tod" id="tod" class="form-control">
                    <?php foreach($services as $service) :?>
                    <option value="<?=$service['servicesID'];?>"><?=$service['services'];?></option>
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
                <input type="date" name="dateRecorded" id="dateRecorded" class="form-control" placeholder="mm/dd/yyyy" max="<?=date('Y-m-d')?>" min="<?=date('Y-m-d')?>" value="<?=date('Y-m-d')?>"/>
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
                <button type="submit" class="btn btn-primary" name="add-clearances">Proceed to payment</button>
            </div>
        </div>
        </div>
    </div>
</form>

<?php
    $get_ser = $DB->query("SELECT * FROM services ORDER BY services DESC");
    $services = $get_ser->fetchall();
?>

<!-- add modal for indigency -->
<form method="POST" class="modal" id="add-modal-indigency">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-primary">
            <h4 class="modal-title text-light bg-primary">Add Indigency Request</h4>
            <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <div class="form-group">
                <label for="tod" class="text-muted font-weight-bold">Type of Document:</label>
                <select name="tod" id="tod" class="form-control">
                    <?php foreach($services as $service) :?>
                    <option value="<?=$service['servicesID'];?>"><?=$service['services'];?></option>
                    <?php endforeach; ?>
                </select>
            </div>
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
                <input type="date" name="dateRecorded" id="dateRecorded" class="form-control" placeholder="mm/dd/yyyy" max="<?=date('Y-m-d')?>" min="<?=date('Y-m-d')?>" value="<?=date('Y-m-d')?>"/>
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

<?php
    $get_ser = $DB->query("SELECT * FROM services ORDER BY price DESC");
    $services = $get_ser->fetchall();
?>

<!-- add modal for business permit -->
<form method="POST" class="modal" id="add-modal-permit">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-primary">
            <h4 class="modal-title text-light bg-primary">Add Business Permit Request</h4>
            <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <div class="form-group">
                <label for="tod" class="text-muted font-weight-bold">Type of Document:</label>
                <select name="tod" id="tod" class="form-control">
                    <?php foreach($services as $service) :?>
                    <option value="<?=$service['servicesID'];?>"><?=$service['services'];?></option>
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
                <label for="business_name" class="text-muted font-weight-bold">Business Name:</label>
                <input type="text" name="business_name" id="business_name" class="form-control" maxlength="100" required>
            </div>
            <div class="form-group">
                <label for="type_of_business" class="text-muted font-weight-bold">Business Type:</label>
                <input type="text" name="type_of_business" id="type_of_business" class="form-control" maxlength="100" required>
            </div>
            <div class="form-group">
                <label for="business_address" class="text-muted font-weight-bold">Business Address:</label>
                <input type="text" name="business_address" id="business_address" class="form-control" maxlength="100" required>
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
                <input type="date" name="dateRecorded" id="dateRecorded" class="form-control" placeholder="mm/dd/yyyy" max="<?=date('Y-m-d')?>" min="<?=date('Y-m-d')?>" value="<?=date('Y-m-d')?>"/>
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
                <button type="submit" class="btn btn-primary" name="add-permits">Proceed to payment</button>
            </div>
        </div>
        </div>
    </div>
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>