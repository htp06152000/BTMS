<?php if ( ! defined('ACCESS') ) die("Direct access not allowed."); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?=isset($pagetitle) ? ucfirst($pagetitle) : 'Page Title' ?></title>
        <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="keywords" content="Website, Application, System, Responsive, Progressive, HTML5, CSS3, Web Based">
        <meta name="description" content="Barangay Transaction Management System">
        <meta name="author" content="Group 7">
        <meta property="category" content="technology">
        <meta property="channel" content="Websites">
        <link rel="icon" type="image/ico" href="./resources/images/calumpangs.jpg" sizes="32x32">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="./resources/css/style.css">

        <style>
            body{ background: #fefefe; }
            .rounded-15px{ -webkit-border-radius: 15px;-moz-border-radius: 15px;border-radius: 15px; }
            .rounded-50px{ -webkit-border-radius: 50px;-moz-border-radius: 50px;border-radius: 50px; }
            ::-webkit-scrollbar-track{ -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.25);box-shadow: inset 0 0 6px rgba(0,0,0,0.25);background-color: rgba(77, 77, 77, 0.015); }
            ::-webkit-scrollbar-thumb{ border-radius: 10px;background-color: rgba(128,128,128,0.35); }
            ::-webkit-scrollbar{ width: 7px;height: 7px;background-color: transparent; }
        </style>
        <?php if (user_is_loggedin()) { ?>
            <link href="./resources/css/dashboard.css" rel="stylesheet">
        <?php } ?>
        <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
    </head>
    <body>
        <main id="wrapper" class="main-content" role="main">
            <?php if (user_is_loggedin()) {
                    include_once('./layout/sidebar.php');                          
                    $page_number = isset($_GET['pagenumber']) ? $_GET['pagenumber'] : 1;
                    $limit = 10;
                    $offset = (($page_number - 1) <= 0) ? 0 : ($page_number - 1) * $limit ;      
                }
            ?>
<div id="page-content-wrapper" class="smooth-transition min-vh-100">
                <div class="container-fluid px-0">
                    