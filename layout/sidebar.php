<?php if ( ! defined('ACCESS') ) die("Direct access not allowed."); ?>

<section class="sidebar sidebar-expand d-flex flex-column align-items-center" id="sidebar">
    <div class="sidebar-brand text-light mt-5">
        <h4 class="heading font-weight-bold text">ADMINISTRATOR</h4>
        <hr class="hr" />
</div>
    <ul class="sidebar-nav d-flex flex-column mt-5 w-100">
        <li class="nav-items w-100">
            <a href="<?=root_url('dashboard')?>" class="nav-link text-light pl-4 <?=($pagetitle=='dashboard'?' active':'')?>"><i class="bi bi-ui-checks-grid"></i> Dashboard</a>
        </li>
        <li class="nav-items w-100">
            <a href="<?=root_url('users')?>" class="nav-link text-light pl-4 <?=($pagetitle=='users'?' active':'')?>"><i class="bi bi-people"></i> User</a>
        </li>
        <li class="nav-items w-100">
            <a href="<?=root_url('residents')?>" class="nav-link text-light pl-4 <?=($pagetitle=='residents'?' active':'')?>"><i class="bi bi-person-badge"></i> Residents</a>
        </li>
        <li class="nav-items w-100">
            <a href="<?=root_url('blotters')?>" class="nav-link text-light pl-4 <?=($pagetitle=='blotters'?' active':'')?>"><i class="bi bi-megaphone"></i> Blotter</a>
        </li>
        <li class="nav-item dropdown w-100">
            <a href="" class="nav-link dropdown-toggle text-light pl-4" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false"><i class="bi bi-card-list"></i> Transactions</a>
            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                <li>
                    <a href="<?=root_url('BarangayClearance')?>" class="dropdown-item text-light pl-4 p-2"><i class="bi bi-filetype-doc"></i> Barangay Clearance</a>
                </li>
                <li>
                    <a href="<?=root_url('CertificateOfIndigency')?>" class="dropdown-item text-light pl-4 p-2"><i class="bi bi-filetype-doc"></i> Certificate of Indigency</a>
                </li>
                <li>
                    <a href="<?=root_url('BusinessPermit')?>" class="dropdown-item text-light pl-4 p-2"><i class="bi bi-filetype-doc"></i> Business Permit</a>
                </li>

            </ul>
        </li>
        <li class="nav-items w-100">
            <a href="<?=root_url('logout')?>" class="nav-link text-light pl-4"><i class="bi bi-nut"></i> Logout</a>
        </li>
    </ul>


</section>

