<!DOCTYPE html> 
<html lang="en">
<head>  
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="shortcut icon" href="<?=base_url()?>assets/images/kikay_icon.png" type="image/x-icon">
    <!-- ========== Title ========== -->
    <title>Kikay Kit</title>
    <!-- ========== Favicon Ico ========== -->
    <!--<link rel="icon" href="fav.ico">-->
    <!-- ========== STYLESHEETS ========== -->
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts Icon CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/et-line.css" rel="stylesheet">
    <link href="assets/css/ionicons.min.css" rel="stylesheet">
    <!-- Carousel CSS -->
    <link href="assets/css/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/css/owl.theme.default.min.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>
<div class="loader">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>

<!--Header Section -->
<header class="header navbar fixed-top navbar-expand-md">
    <div class="container">
        <!-- <a class="navbar-brand logo" href="#">
            <img src="assets/img/logo.png" alt="Kikay Kit"/>
        </a> -->
        <a href="<?php echo base_url('customer_home');?>" style="float: left; font-size: 30px; font-weight: 1000; color: #ffffff;">Kikay Kit</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headernav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr lnr-text-align-right"></span>
        </button>
        <div class="collapse navbar-collapse flex-sm-row-reverse" id="headernav">
            <ul class=" nav navbar-nav menu">
                <li class="nav-item active">
                    <a class="nav-link active" href="<?php echo base_url('customer_home');?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url('customer_salon');?>">Find Salons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#" style="font-weight: bold;"><?php echo 'Welcome, '.$_SESSION['user'];?></a>
                    <ul class="nav-dropdown">
            			<li class="white"><a class="nav-down" style="margin-left: 20px; margin-top: 3px;" data-toggle="modal" data-target="#changePassword">Change Password</a></li>
            			<li><a class="nav-down" style="margin-left: 50px; margin-top: 3px;" href="<?php echo base_url('logout'); ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>
<!--Header Section End-->

<!--Profile Section-->
<section class="inner_cover_p parallax-window" data-parallax="scroll" data-image-src="assets/images/bg/dark_bg.png"> 
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="inner_cover_content_p">
            <div class="container">
                <div class="media">
                </div>
            </div>
        </div>
    </div>
</section>
<!--Profile Section End-->

<!--View Reservation Table Section-->
<section class="pt30 pb30 plr10 mt30">
    <div class="container">
        <div class="section_title mb50">
            <h3 class="title color-dark"> 
            	Reservation Details
            </h3>
        </div>
    </div>
    <div class="container">
        <div class="table-responsive">
            <table class="event_calender table">
                <thead style="border: 0px;">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody style="background-color:transparent; padding: 0px; ">
                	<td style="padding:0px; margin: 0px;"><h6 class="color-red">Reservation Number</h6><?php echo $reserve[0]->rv_no ?></td>
                    <td class="event_date">
                    	<h6 class="color-red">Time & Date</h6>
                        <?php echo $reserve[0]->rv_time?>
                        <span><?php echo $reserve[0]->rv_date?></span>
                    </td>
                    <td><h6 class="color-red">Branch Name</h6><?php echo $reserve[0]->br_name?></td>
                    <td><h6 class="color-red">Date Created</h6><?php echo $reserve[0]->rv_created_date?></td>
                </tbody>
            </table>
        </div>
		<div class="container mt50">
        	<div class="table-responsive">
            	<table class="event_calender table">
                	<thead class="event_title">
                		<tr>
                    		<th class="center-text">Service Name</th>
                    		<th class="center-text">Service Price</th>
                    		<th class="center-text">Service Duration</th>
                		</tr>
                	</thead>
                	<tbody style="background-image: url('assets/images/bg/rating_bg.png');">
                		<?php
							$total = 0;
							$refund = 0;
							foreach($service as $val){
								if($val->as_status == "A" && $val->sv_status =="A"){
									$total += $val->as_price;	//getting total of all services
							?>
						<tr>
							<td class="color-dark"><?php echo $val->sv_name?></td>
							<td><h6><?php echo $val->as_price?></h6></td>
							<td class="color-dark"><?php echo $val->as_duration?></td>
						</tr>
						<?php
							}
							else{
								$refund += $val->as_price
							?>
						<tr>	
							<td><?php echo $val->sv_name."  --not available--"?></td>
							<td><?php echo '0'?></td>
						</tr>
						<?php	}
						}	?>
                	</tbody>
            	</table>
            	<h5 class="center-text mt30 color-grad-purple">Total: <?php echo $total?></h5>
            	<h5 class="center-text color-grad-purple">Refund: <?php echo $refund?></h5>
			</div>
		</div>
    </div>
</section>
<!--View Reservation Table End -->


<!--Footer Section-->
<div class="copyright_footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <p>Kikay Kit &copy;2018</p>
            </div>
            <div class="col-12 col-md-6 ">
                <ul class="footer_menu">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="#">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Footer End-->


<!--Change Password Section-->
<div class="modal fade" id="changePassword" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel-2">Update Profile</h4>
                </div>

                <div class="modal-body">
                    <form align="center" id='login' action="<?php echo base_url('change_pass'.'?id='.$_SESSION['id']);?>" method='post'>
                        <label class="color-dark edit-input-label">Current Password:</label>
                            <input class="color-dark edit-input" type='password' name='current_pass' required /><br>
                        <labe class="color-dark edit-input-label">New Password:</label>
                            <input class="color-dark edit-input" type='password' name='new_pass' required /><br>
                        <label class="color-dark edit-input-label">Confirm Password:</label>
                            <input class="color-dark edit-input" type='password' name='confirm_pass' required /><br>
                    </form>
                </div>

                <div class="modal-footer">
                    <input class="btn btn-primary mb20" type='submit' value='Change Password'/>
                    <a class="btn btn-light mb20" href="<?php echo base_url('customer_home');?>">Cancel</a>
                </div>
            </div><!--modal-content-->
        </div><!--modal-dialog-->
    </div><!--modal-->
<!--Change Password End-->

<!-- jquery -->
<script src="assets/js/jquery.min.js"></script>
<!-- bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<!--slick carousel -->
<script src="assets/js/owl.carousel.min.js"></script>
<!--parallax -->
<script src="assets/js/parallax.min.js"></script>
<!--Counter up -->
<script src="assets/js/jquery.counterup.min.js"></script>
<!--Counter down -->
<script src="assets/js/jquery.countdown.min.js"></script>
<!-- WOW JS -->
<script src="assets/js/wow.min.js"></script>
<!-- Custom js -->
<script src="assets/js/main.js"></script>

</body>
</html>

