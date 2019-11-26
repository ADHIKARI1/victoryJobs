<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="ScriptsBundle">
<title>Victory Jobs</title>
<link style="width:100%px; height:100%px" rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.png" type="image/x-icon">

<!-- BOOTSTRAPE STYLESHEET CSS FILES -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

<!-- JQUERY SELECT -->
<link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" />

<!-- JQUERY MENU -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mega_menu.min.css">

<!-- ANIMATION -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">

<!-- OWl  CAROUSEL-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.style.css">

<!-- Datatable -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">

<!-- TEMPLATE CORE CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

<!-- FONT AWESOME -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/et-line-fonts.css" type="text/css">

<!-- Google Fonts -->
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">

<!-- JavaScripts -->
<script src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="page">
    <div id="spinner">
        <div class="spinner-img"> <img alt="Opportunities Preloader" src="<?php echo base_url(); ?>assets/images/loader.gif" />
            <h2>Please Wait.....</h2>
        </div>
    </div>
  <nav id="menu-1" class="mega-menu fa-change-black"> 
        <section class="menu-list-items container"> 
            <ul class="menu-logo">
                <li> <a href="<?php echo base_url(); ?>"> <img style="width:100%px; height:60px" src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo" class="img-responsive"> </a> </li>
            </ul>
            <ul class="menu-links pull-right">
            	<!--<li> 
                    <a href="javascript:void(0)"> Home <i class="fa fa-angle-down fa-indicator"></i></a>
                    <ul class="drop-down-multilevel">
                        <li><a href="javascript:void(0)">Home Style  <label class="label label-info">New</label> <i class="fa fa-angle-right fa-indicator"></i> </a> 
                        	<ul class="drop-down-multilevel">
                                <li><a href="index.html"><i class="fa fa-angle-right"></i> Home Default</a></li> 
                            </ul>
                        </li>                        
 					</ul>
                </li> -->
                <?php if($this->session->userdata('idtype_mko789') == 3 && $this->session->userdata('userid_mko789') != ""): ?>
                <li class="no-bg"><a href="<?php echo base_url(); ?>job/postjob" class="p-job"><i class="fa fa-plus-square"></i> Post a Job</a></li>
                <?php elseif($this->session->userdata('idtype_mko789') == ""): ?>
                <li class="no-bg"><a href="<?php echo base_url(); ?>user/signin" class="p-job"><i class="fa fa-plus-square"></i> Post a Job</a></li>
                <?php endif; ?>
                <?php if(!$this->session->userdata('islogged_mko789')): ?>
                <li class="no-bg login-btn-no-bg"><a href="<?php echo base_url(); ?>user/signin" class="login-header-btn"><i class="fa fa-sign-in"></i> Log In</a></li>
                         </li>
                <li class="no-bg login-btn-no-bg"><a href="<?php echo base_url(); ?>candidate/register" class="login-header-btn"><i class="fa fa-user-plus"></i> Register</a></li>
                </li>
                <?php else: ?>
                <li class="profile-pic">
                        <a href="javascript:void(0)"> <img src="<?php echo base_url(); ?>assets/images/admin.jpg" alt="user-img" class="img-circle" width="36"><span class="hidden-xs hidden-sm">Welcome! </span><i class="fa fa-angle-down fa-indicator"></i> </a>
                        <ul class="drop-down-multilevel left-side">
                            <?php if ($this->session->userdata('islogged_mko789') && $this->session->userdata('idtype_mko789') == 2): ?>
                                <li><a href="<?php echo base_url(); ?>candidate/profile"><i class="fa fa-user"></i> My Profile</a></li> 
                            <?php elseif($this->session->userdata('islogged_mko789') && $this->session->userdata('idtype_mko789') == 3): ?>
                                <li><a href="<?php echo base_url(); ?>employer/edit"><i class="fa fa-user"></i> My Profile</a></li>  
                            <?php endif; ?>                                                  
                            <li><a href="<?php echo base_url(); ?>user/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                             <?php if ($this->session->userdata('islogged_mko789') && $this->session->userdata('idtype_mko789') == 1): ?>
                            <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                            <?php endif; ?> 
                        </ul>
                </li>
                <?php endif; ?>
 			</ul>
        </section>
  </nav>