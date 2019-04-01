<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kikay Kit</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php echo base_url('assets/images/kikay_icon.png');?>">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/kikay_icon.png');?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/themify-icons.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/flag-icon.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/cs-skin-elastic.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/lib/datatable/dataTables.bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/scss/style.css');?>">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css');?>">

    <!-- DATE & TIME PICKER -->
    <link href="assets/css/datetimepicker/bootstrap-datetimepicker.css" rel="stylesheet"/>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body style="zoom: 75%">
    
    <aside id="left-panel" class="left-panel" style="height: 1000px">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#"><img src="assets/images/kikay.png" alt="Kikay Kit"></a>
                <a class="navbar-brand hidden" href="#"><img src="assets/images/kikay_icon.png" alt="Kikay Kit"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo base_url('branch_home');?>"> <i class="menu-icon fa fa-info-circle"></i>Information</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('branch_reservations');?>"><i class="menu-icon fa fa-calendar"></i>Reservations</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('branch_services');?>"><i class="menu-icon fa fa-cogs"></i>Services</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('branch_pos');?>"><i class="menu-icon fa fa-tag"></i>POS</a>
                    </li>   
                </ul>
            </div>
        </nav>
    </aside>

    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
           <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left" style="background: #d31f42;"><i class="fa fa fa-hand-o-left"></i></a>
                    <div class="header-left">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['user'];?>
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a href="#" data-toggle="modal" data-target="#changepass" class="nav-link">Change Password</a>    
                            <a class="nav-link" href="<?php echo base_url('logout');?>">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
