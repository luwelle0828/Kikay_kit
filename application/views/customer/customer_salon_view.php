<!DOCTYPE html>
<html lang="en">
<head> 
    <!--  ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/kikay_icon.png" type="image/x-icon">
    <title><?php echo $branch[0]->br_name?></title>
    <!-- ========== Title ========== -->
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
    <link href="assets/vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendors/owl-carousel/owl.theme.default.min.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
    <link href="assets/responsive.css" rel="stylesheet">
     <link href="assets/vendors/themify-icon/themify-icons.css" rel="stylesheet">

</head>
<body style="zoom:85%">
<div class="loader">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>

<!--Header Section -->
<header class="header navbar fixed-top navbar-expand-md">    
    <div class="container">
        <!-- <a class="navbar-brand logo" href="#">
            <img src="assets/img/logo.png" alt="Evento"/>
        </a> -->
        <a href="<?php echo base_url('customer_home');?>" style="font-size: 30px; font-weight: 1000; color: #ffffff;">Kikay Kit</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headernav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr lnr-text-align-right"></span>
        </button>
        <div class="collapse navbar-collapse flex-sm-row-reverse" id="headernav">
            <ul class=" nav navbar-nav menu">
                <li class="nav-item active">
                    <a class="nav-link active" href="<?php echo base_url('customer_home');?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url('customer_salon');?>">Find Salon</a>
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
<!--Header End-->

<!--Salon Cover Section-->
<section class="inner_cover parallax-window" data-parallax="scroll" data-image-src="assets/images/bg/bg-2.jpg">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="inner_cover_content">
                </div>
            </div>
        </div>
        <div class="breadcrumbs">
            <ul>
                <h3 style="margin-bottom: 0px;"><?php echo $branch[0]->br_name?></h3>
            </ul>
        </div>
    </div>
</section>
<!--Salon Cover End-->

<!--Branch & Reserve Section-->
<section >
    <div class="container" align="right">
        <h3 class="mt10 ml90">
            <a href="<?php echo base_url('customer_reserve_view'.'?id='.$branch[0]->br_id);?>" class="btn btn-primary btn-rounded mt10">RESERVE</a>
        </h3>
    </div>
</section>
<!--Branch & Reserve End-->

<!--Salon Info Section-->
<section class="pt50 pb10 mt50">
    <div class="container pb30" style="background-image: url('assets/images/bg/rating_bg.png');">
        <div class="row justify-content-center">
            <div class="col-6 col-md-4">
                <div class="icon_box_two">
                    <i class="ion-ios-location-outline"></i>
                    <div class="content">
                        <h4 class="box_title">
                            Location
                        </h4>
                        <p style="font-size: 16px">
                              <?php echo $branch[0]->br_location?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4">
                <div class="icon_box_two">
                    <i class="ion-ios-person-outline"></i>
                    <div class="content">
                        <h4 class="box_title">
                            Contact Number
                        </h4>
                        <p style="font-size: 16px">
                            Mobile: <?php echo $branch[0]->br_mobile?>
                        </p>
                        <p>
                            Telephone: <?php echo $branch[0]->br_telephone?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4">
                <div class="icon_box_two">
                    <i class="ion-ios-calendar-outline"></i>
                    <div class="content">
                        <h4 class="box_title">
                            Opening Hours
                        </h4>
                            <?php
							$day = array("Sunday","Monday","Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
							$day_arr = explode(",",$branch[0]->br_days);
							$day_start = $day[($day_arr[0]-1)];
							$day_end = $day[$day_arr[count($day_arr)-1]-1];
							$day_closed = array();
								foreach($day AS $index => $val){
									if(!in_array($index+1,$day_arr)){
										array_push($day_closed, $index);
									}	
								}
							?>
							<p style="font-size: 16px">Open: <?php echo $day_start." - ".$day_end?></p>
							<p style="font-size: 16px">Hours: <?php echo $branch[0]->br_opening." - ".$branch[0]->br_closing?></p>
							<p style="font-size: 16px">Closed:
								<?php for($x=0;$x<count($day_closed);$x++){
									if($x != count($day_closed)-1)
										echo $day[$day_closed[$x]].", ";
									else
										echo $day[$day_closed[$x]];
								}
							?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Salon Info End-->



<!--Salon Statistics section -->
<section class="pb20 hideme">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="row justify-content-center mt30">
                    <div class="col-12 col-md-4">
                        <div class="counter_box">
                            <span class="counter"><?php echo $stat[0]->sv_count?></span>
                            <h5>Services</h5>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="counter_box">
                            <span class="counter"><?php echo $stat[0]->rv_count?></span>
                            <h5>Reservations</h5>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="counter_box">
                            <span class="counter"><?php echo $stat[0]->cs_count?></span>
                            <h5>Customers Served</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Salon Statistics End -->

<!--Popular Services Section-->
<section class="pt100 pb10">
    <div class="container">
        <div class="section_title hideme">
            <h4 class="title" style="color: #e5446b">
               Popular Services
            </h4>
        </div>
    </div>
    <div class="container mt40">
        <div class="row justify-content-center no-gutters">
        	<?php 
    				if(count($service)>5){
    					for($x=0;$x<5;$x++){
    			?>		
                        <div class="card1 hideme" style="background-image: url('./assets/images/service-images/<?php echo $service[$x]->sv_image?>'); background-size: cover; background-repeat: no-repeat;">
                            <div class="info">
                                <h4 class="title"><?php echo $service[$x]->sv_name?></h4>
                                <p class="description pt20">Duration: <?php echo $service[$x]->as_duration?><br>Price: <?php echo $service[$x]->as_price?><br>Reserved Count: <?php echo $service[$x]->rs_count?></p>
                            </div>
                        </div>
    			<?php	}
    			}
    				else{	
    					for($x=0;$x<count($service);$x++){
    			?>
    					<div class="card1 hideme" style="background-image: url('./assets/images/service-images/<?php echo $service[$x]->sv_image?>'); background-size: cover; background-repeat: no-repeat;">
                            <div class="info">
                                <h4 class="title"><?php echo $service[$x]->sv_name?></h4>
                                <p class="description pt20">Duration: <?php echo $service[$x]->as_duration?><br>Price: <?php echo $service[$x]->as_price?><br>Reserved Count: <?php echo $service[$x]->rs_count?></p>
                            </div>
                        </div>
    			<?php	}
    				}
    			?>	
        </div>
        <div class="container-fluid" align="right" style="margin-bottom:10px">
            <a href="<?php echo base_url('customer_salon_services'.'?id='.$branch[0]->br_id);?>" class="btn btn-primary btn-rounded mt10">VIEW MORE</a>
        </div>
    </div>
</section>
<!--Popular Services End-->

<!--Reviews Section-->
<section class="testimonials_area p_100">
    <div class="container">
        <div class="section_title hideme">
            <h4 class="title" style="color: #e5446b;">
                Ratings & Reviews
            </h4>
        </div>
        <?php
        if(count($review)>0){ ?>
        <div class="testimonials_slider owl-carousel hideme">
        <?php $month_arr = array("January","February","March", "April", "May", "June", "July", "August", "September", "October", "November", "December"); ?>
        <?php for($x=0;$x<count($review);$x++){ 
                $date = $month_arr[(int)substr($review[$x]->rw_datetime,5,2)-1]." ".substr($review[$x]->rw_datetime,8,2).", ".substr($review[$x]->rw_datetime,0,4);
            ?>
            <div class="item">
                <div class="media">
                    <div class="media-body">
                    <?php for($y=0;$y<5;$y++){   
                            if($y<(int)$review[$x]->rw_rating){
                                echo '<span class="fa fa-star stars checked"></span>';
                            }
                            else{
                                echo '<span class="fa fa-star stars"></span>';
                            }
                    }
                    ?>
                        <p><?php echo '"'.$review[$x]->rw_message.'"'?></p>
                        <h4><b><?php echo $review[$x]->cs_fname.' '.$review[$x]->cs_lname?></b><?php echo ' - '.$date?></h4>
                    </div>
                </div>
            </div>
     <?php   }
        ?>
            <!-- <div class="item">
                <div class="media">
                    <div class="media-body">
                        <span class="fa fa-star stars checked"></span>
                        <span class="fa fa-star stars checked"></span>
                        <span class="fa fa-star stars checked"></span>
                        <span class="fa fa-star stars checked"></span>
                        <span class="fa fa-star stars"></span>
                        <p>I wanted to mention that these days, when the opposite of good customer and tech support tends to be the norm, it’s always great having a team like you guys at Fancy! So, be sure that I’ll always spread the word about how good your product is and the extraordinary level of support that you provide any time there is any need for it.</p>
                        <h4><a href="#">Aigars Silkalns</a> - November 7, 2017</h4>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="media">
                    <div class="media-body">
                        <span class="fa fa-star stars checked"></span>
                        <span class="fa fa-star stars checked"></span>
                        <span class="fa fa-star stars checked"></span>
                        <span class="fa fa-star stars checked"></span>
                        <span class="fa fa-star stars checked"></span>
                        <p>I wanted to mention that these days, when the opposite of good customer and tech support tends to be the norm, it’s always great having a team like you guys at Fancy! So, be sure that I’ll always spread the word about how good your product is and the extraordinary level of support that you provide any time there is any need for it.</p>
                        <h4><a href="#">Aigars Silkalns</a> - January 18, 2017</h4>
                    </div>
                </div>
            </div> -->
        </div>
    <?php } ?>
        <div class="container-fluid" align="right" style="margin-bottom:10px">
            <a href="<?php echo base_url('customer_salon_reviews'.'?id='.$branch[0]->br_id);?>" class="btn btn-primary btn-rounded mt10">Go to Reviews</a>
        </div>
    </div>
</section>
<!--Reviews End-->

<!--Footer Section-->
<div class="copyright_footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <p> Kikay Kit &copy;2018 </p>
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
<!--Footer end -->

<!--Change Password Section-->
<div class="modal fade" id="changePassword" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel-2">Update Profile</h4>
            </div>

            <div class="modal-body">
                <form align="center" action="<?php echo base_url('change_pass'.'?id='.$_SESSION['id']);?>" method='post'>
                    <label class="color-dark edit-input-label">Current Password:</label>
                        <input class="color-dark edit-input" type='password' name='current_pass' required /><br>
                    <labe class="color-dark edit-input-label">New Password:</label>
                        <input class="color-dark edit-input" type='password' name='new_pass' required /><br>
                    <label class="color-dark edit-input-label">Confirm Password:</label>
                        <input class="color-dark edit-input" type='password' name='confirm_pass' required /><br>
            </div>
            <div class="modal-footer">
                <input class="btn btn-primary mb20" type='submit' value='Change Password'/>
                </form>
                <button type="button" class="btn btn-light mb20" data-dismiss="modal">Close</button>
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

<script src="assets/theme.js"></script>
 <script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>

 <script type="text/javascript">
    $(function(){  // $(document).ready shorthand
  $('.monster').fadeIn('slow');
});

$(document).ready(function() {
    
    /* Every time the window is scrolled ... */
    $(window).scroll( function(){
    
        /* Check the location of each desired element */
        $('.hideme').each( function(i){
            
            var bottom_of_object = $(this).position().top;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1'},800);
                    
            }
            
        }); 
    
    });
    
});
</script>
</body>
</html>