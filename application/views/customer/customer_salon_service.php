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
<body style="zoom:85%;background-color: #fff;">


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

<!--Branch & Reserve Section-->
<section style="background-color: #fff;">
    <div class="container">
        <div class="section_title">
            <h3 class="mt10 ml90">
                <span id="branch-id" hidden><?php echo $branch[0]->br_id?></span>
                <a style="float:right;" href="<?php echo base_url('customer_reserve_view'.'?id='.$branch[0]->br_id);?>" class="btn btn-primary btn-rounded mt10">RESERVE</a>
            </h3>
        </div>
    </div>
</section>
<!--Branch & Reserve End-->

<section class="pt50 pb100 plr10" style="background-color: #fff;">
    <div class="container">
        <div class="section_title mb50">
            <h4 class="title" style="color: #e5446b">
               Services Offered
            </h4>
        </div>
    </div>  
    <div id="category" class="container-fluid">
        <div class="widget widget_tags">
            <ul style="list-style-type: none;">
                <li class="active shadow"><a href="#" id="0" >All</a></li>
                    <?php foreach($category as $ct){
                    ?>
                        <li class="shadow" ><a href="#" id="<?php echo $ct->ct_id?>"><?php echo $ct->ct_category ?></a></li>
                    <?php }
                    ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid"> 
            <div class="container-fluid">
                <div class="col-sm-8">
                    <span id="item-count"></span>
                    <span> Item(s)</span>
                </div>
                <span class="col-sm-4" align="right">
                    Sort By
                    <select id="sort">
                        <option value="1">Popularity</option>
                        <option value="2">Name</option>
                    </select>
                    Show
                    <select id="shown">
                        <option value="9">9</option>
                        <option value="18">18</option>
                        <option value="27">27</option>
                    </select>
                </span>
            </div>          
            <div class="row justify-content-center no-gutters mt10" id="service-list"></div>
    </div>
    <div class="container" id="pagination-link"></div>   
</section>


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
                    </form>
                </div>

                <div class="modal-footer">
                    <input class="btn btn-primary mb20" type='submit' value='Change Password'/>
                    <a class="btn btn-light mb20" href="#">Cancel</a>
                </div>
            </div><!--modal-content-->
        </div><!--modal-dialog-->
    </div><!--modal-->
<!--Change Password End-->

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

	<link rel="stylesheet" href="<?php echo base_url('assets/full-calendar/fullcalendar.min.css')?>" />
	<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>" ></script> 
	<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>" ></script>
    <script src="<?php echo base_url('assets/full-calendar/lib/moment.min.js')?>"></script>
    <script src="<?php echo base_url('assets/full-calendar/fullcalendar.min.js')?>"></script>
    <script src="<?php echo base_url('assets/full-calendar/gcal.js')?>"></script>
    <script src="<?php echo base_url('assets/js/pagination.js')?>"></script>

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
		$(document).ready(function(){
			var date_last_clicked = null;
    		load_services(1);

			function load_services(page){
				var id = $('#branch-id').text();
				var catVal = $('#category li.active a').attr('id');	//get id of chosen category
				var sortVal = $('#sort option:selected').val()
				var showVal = $('#shown option:selected').val();
				$.ajax({
					url:"<?php echo base_url('customer_controller/service_pagination/')?>"+page,
					method:"GET",
					dataType: 'json',
					data:{id:id, ct_id:catVal, sort:sortVal, show:showVal},
					success:function(data){
						$('#item-count').text(data.service_count);
						$('#service-list').html(data.display);
						$('#pagination-link').html(data.pagination);
					},
					error:function(request){
						alert(request.responseText);
					}
				});
			}
			$(document).on('click', '.pagination li a', function(event){
				event.preventDefault();
				var page = $(this).data("ci-pagination-page");
				load_services(page);
			});
			$('#sort').change(function(){
				load_services(1);
			});
			$('#shown').change(function(){
				load_services(1);
			});
			$('#category').on('click', 'li a', function(e){
				e.preventDefault();
				$(this).parent('li').siblings('li').removeClass('active');
				$(this).parent('li').addClass('active');
				load_services(1);
			});
		});
	</script>
</body>
</html>