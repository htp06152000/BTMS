<?php if ( ! defined('ACCESS') ) die("Direct access not allowed."); ?>

<!-- Title -->
<div class="py-3 px-4">
    <div class="alert alert-primary animate__animated animate__slideInDown animate__faster" role="alert">
        Welcome to the Administrators page!
    </div>
</div>

<!-- Cards -->
<div class="row py-4 px-4">
    <div class="col-sm-6 ">
        <div class="card text-white bg-primary mb-3" style="max-width: 35rem;">
            <div class="card-header font-weight-900">Population</div>
                <div class="card-body">
                    <?php
                    $nRows = $DB->query('SELECT count(*) FROM resident')->fetchColumn(); 
                    echo '<h5 class="card-title"><span class="icon"><i class="bi bi-people"></i></span> Total: '.$nRows.'</h5>';
                    ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
        <div class="card text-white bg-success mb-3" style="max-width: 35rem;">
            <div class="card-header">Barangay Clearance Requests</div>
                <div class="card-body">
                    <h5 class="card-title"><span class="icon"><i class="bi bi-card-heading"></i></span> Total: 5</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
        <div class="card text-white bg-warning mb-3" style="max-width: 35rem;">
            <div class="card-header">Certificate of Indigency Requests</div>
                <div class="card-body">
                <h5 class="card-title"><span class="icon"><i class="bi bi-card-heading"></i></span> Total: 9</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
        <div class="card text-white bg-info mb-3" style="max-width: 35rem;">
            <div class="card-header">Business Permit Requests</div>
                <div class="card-body">
                <h5 class="card-title"><span class="icon"><i class="bi bi-card-heading"></i></span> Total: 2</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
        <div class="card text-white bg-danger mb-3" style="max-width: 35rem;">
            <div class="card-header">Blotter Reports Recorded</div>
                <div class="card-body">
                <?php
                    $nRows = $DB->query('SELECT count(*) FROM blotter')->fetchColumn(); 
                    echo '<h5 class="card-title"><span class="icon"><i class="bi bi-exclamation-triangle-fill"></i></span> Total: '.$nRows.'</h5>';
                ?>
                </div>
            </div>
        </div>
</div>