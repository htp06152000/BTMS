<?php if ( ! defined('ACCESS') ) die("Direct access not allowed."); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="resources/css/stylee.css">
</head>
<body>
    <header>
        <img class="logo" src="logo.jpg">
        <h2>Barangay Transaction Management System</h2>
    <a class="cta" href="<?=root_url("login")?>"><button>Log in</button></a>
    </header>
    <nav>
        <ul class="nav_lnks">
            <li><a class="cta" href="<?=root_url("Home")?>">Home</a>
            <a class="cta" href="#">Services</a>
            <a class="cta" href="#">Track-Request</a></li>
        </ul>
    </nav>
        <h2 class="title">Services</h2>
        <h4 class="offer">Documents Offered</h4>
<section class="containerone">
        <div class="containertwo">
        <div class="card">
            <div class="icon">BC</div>
            <div class="content">
                <h3>Barangay Clearance</h3>
                <p>View the document requirements needed for barangay clearance</p>
                <div class="buttonn"><a href="#">Proceed</a></div>
            </div>
        </div>

        <div class="card">
            <div class="icon">CI</div>
            <div class="content">
                <h3>Certificate of Indigency</h3>
                <p>View the document requirements needed for Certificate of Indigency</p>
                <div class="buttonn"><a href="#">Proceed</a></div>
            </div>
        </div>

        <div class="card">
            <div class="icon">BP</div>
            <div class="content">
                <h3>Business permit</h3>
                <p>View the document requirements needed for Business permit</p>
                <div class="buttonn"><a href="#">Proceed</a></div>
            </div>
        </div>
        </div>
    </section>
</body>
