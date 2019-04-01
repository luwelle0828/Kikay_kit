<!DOCTYPE html>
<html lang="en">
<head>  
    <!--  ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="assets/images/kikay_icon.png" type="image/x-icon">
    <title>Reviews</title>
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

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="assets/css/stars.css">

    <link rel="stylesheet" href="assets/css/tab.css">

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
                    <a class="nav-link active" href="<?php echo base_url('customer_salon_view'.'?id='.$branch[0]->br_id);?>">Salon</a>
                </li>
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
                        <li><a class="nav-down" style="margin-left: 50px; margin-top: 3px;" href="#">Logout</a></li>
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

<!--Branch Section-->
<section >
    <div class="container" align="right">
        <h3 class="mt10 ml90">
            <a href="<?php echo base_url('customer_reserve_view'.'?id='.$branch[0]->br_id);?>" class="btn btn-primary btn-rounded mt10">RESERVE</a>
        </h3>
        <p id="branch-id" hidden><?php echo $branch[0]->br_id?></p>
    </div>
</section>
<!--Branch End-->

<!--Add Review Section -->
<section class="pb50">
    <div class="container">
        <div class="row justify-content-center mt100">
            <div class="col-md-6 col-12">
                <div class="contact_info">
                    <div class="section_title">
                        <h4 class="title" style="color: #e5446b">
                            Be connected
                        </h4>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec gravida tempus. Integer iaculis in lacus a sollicitudin. Ut hendrerit hendrerit nisl a accumsan. Pellentesque convallis consectetur tortor id placerat. Curabitur a pulvinar nunc. Maecenas laoreet finibus lectus, at volutpat ligula euismod.
                    </p>
                    <ul class="social_list pt10">
                        <li>
                            <a href="#"><i class="ion-social-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="ion-social-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="ion-social-instagram"></i></a>
                        </li>
                    </ul>

                    <ul class="icon_list pt50">
                        <li>
                            <i class="ion-ios-telephone"></i>
                            <span>+5463 834 53 2245</span>
                        </li>
                        <li>
                            <i class="ion-email-unread"></i>
                            <span>contact@belo.com</span>
                        </li>
                        <li>
                            <i class="ion-planet"></i>
                            <span>www.belo.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="contact_form">
                    <div class="section_title">
                        <h4 class="title" style="color: #e5446b">
                            Rate Our Salon
                        </h4>
                    </div>
                    <form align="center" action="<?php echo base_url('customer_send_review'.'?id='.$branch[0]->br_id); ?>" method='post'>
                    <div class="rating">
                        <input type="radio" id="star5" name="rating" value="5">
                        <label class="full" for="star5" title="5 stars">
                            <i class="material-icons star-empty">star_border</i><i class="material-icons star-checked">star</i>
                        </label>
    
                        <input type="radio" id="star4" name="rating" value="4">
                        <label class="full" for="star4" title="4 stars">
                            <i class="material-icons star-empty">star_border</i><i class="material-icons star-checked">star</i>
                        </label>
    
                        <input type="radio" id="star3" name="rating" value="3">
                        <label class="full" for="star3" title="3 stars">
                            <i class="material-icons star-empty">star_border</i><i class="material-icons star-checked">star</i>
                        </label>
    
                        <input type="radio" id="star2" name="rating" value="2">
                        <label class="full" for="star2" title="2 stars">
                            <i class="material-icons star-empty">star_border</i><i class="material-icons star-checked">star</i>
                        </label>
    
                        <input type="radio" id="star1" name="rating" value="1" checked="checked">
                        <label class="full" for="star1" title="1 star">
                            <i class="material-icons star-empty">star_border</i><i class="material-icons star-checked">star</i>
                        </label>
                    </div>
                        <textarea name="message" class="form-control" cols="6" rows="4" placeholder="message" required></textarea>
                        <button class="btn btn-rounded btn-primary" type='submit' value="Send Review">send</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Add Review End-->

<!--View Reviews Section-->
<section class="pt20 pb10 mb50">
    <div class="container">
        <div class="section_title">
            <h4 class="title" style="color: #e5446b">
                Feedbacks & Reviews 
            </h4>
        </div>
        <div class="ml10 mr10" style="background-image: url('assets/images/bg/rating_bg.png');">
            <div class="container-fluid pt20 pb20">
                <div class="container-fluid">
                    <div class="widget widget_tags1 row justify-content-center center-text" id="review-shown">
                        <ul style="list-style-type: none;">
                            <li id="1" class="active col-md-5 center-text bg-macaroni"><a href="#">MOST RECENT</a></li>
                            <li id="2" class="col-md-5 center-text bg-macaroni"><a href="#">MY REVIEWS</a></li>
                        </ul>
                    </div>
                    <div class="container-fluid">
                        <div class="col-12 center-text">
                            <span id="item-count">0</span>
                            <span> Item(s)</span>
                        </div>
                    </div>
                    <div class="container-fluid" id="review-list">
                    </div>
                    <div class="container-fluid center-text">
                        <button class="btn btn-info" id="more-btn" value="0">Show More</button>
                    </div>
                </div>
            </div>
        </div>                                                                                                                 
     </div>
</section>
<!--View Reviews End-->

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
                    <a class="btn btn-light mb20" href="<?php echo base_url('customer_salon_reviews');?>">Cancel</a>
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
    <script src="assets/js/tab.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			var date_last_clicked = null;
    		load_reviews();
            $('#more-btn').hide();
    		function load_reviews(){
    			var id = $('#branch-id').text();
    			var start = parseInt($('#more-btn').val());
    			var shown = $('#review-shown li.active').attr('id');
    			var items = parseInt($('#item-count').text());
    			$.ajax({
					url:"<?php echo base_url('customer_controller/review_list')?>",
					method:"GET",
					dataType: 'json',
					data:{id:id, start:start, shown:shown},
					success:function(data){
						items+=data.reviews.length;
                        if(data.review_count==items){
                            $('#more-btn').hide();
                        }
                        else{
                            $('#more-btn').show();
                        }
						$('#item-count').text(items);
						$('#more-btn').val(start+5);
						$('#review-list').append(data.display);
					},
					error:function(request){
						alert(request.responseText);
					}
				});
    		}
    		$('#more-btn').click(function(){
    			load_reviews();
    		});	
    		$('#review-shown').on('click', 'li a', function(){
				$(this).parent('li').siblings('li').removeClass('active');
				$(this).parent('li').addClass('active');
				$('#more-btn').val("0");
				$('#item-count').text('0');
				$('#review-list').html("");
				load_reviews();
			});
		});
	</script>
	
</body>
</html> 