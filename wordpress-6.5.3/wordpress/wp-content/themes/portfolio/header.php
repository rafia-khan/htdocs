<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo bloginfo('title') ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  

  <!-- Favicons -->
  <link href="<?php //echo get_stylesheet_directory_uri() ?>./img/favicon.png" rel="icon">
  <link href="<?php //echo get_stylesheet_directory_uri() ?>./img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo get_stylesheet_directory_uri() ?>./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo get_stylesheet_directory_uri() ?>./lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo get_stylesheet_directory_uri() ?>./lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo get_stylesheet_directory_uri() ?>./lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo get_stylesheet_directory_uri() ?>./lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo get_stylesheet_directory_uri() ?>./lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo get_stylesheet_directory_uri() ?>./css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
  <?php wp_head() ?>
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header" style="background:#E59866;">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#main" class="scrollto"><?php echo bloginfo('')?></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#main"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>
        <!-- <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="#main">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#team">Team</a></li>
                <li class="menu-has-children"><a href="">Drop Down</a>
                    <ul>
                    <li><a href="#">Drop Down 1</a></li>
                    <li><a href="#">Drop Down 3</a></li>
                    <li><a href="#">Drop Down 4</a></li>
                    <li><a href="#">Drop Down 5</a></li>
                    </ul>
                </li>
                <li><a href="#contact">Contact</a></li>
                
            </ul> 
            
        </nav> -->
        <!-- #nav-menu-container -->
            <?php 
                wp_nav_menu(array(
                    'theme_location' => 'primary_menu',
                    'menu_class' => "nav-menu ",
                   // "container_class" => "collapse navbar-collapse",
                    "container_id" => "nav-menu-container",
                 "walker" => new AWP_Menu_Walker(),
                ));
              ?>
    </div>
  </header><!-- #header -->
