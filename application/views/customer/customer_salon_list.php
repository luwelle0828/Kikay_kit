<!DOCTYPE html>
<html lang="en">
<head>   
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="shortcut icon" href="<?=base_url()?>assets/images/kikay_icon.png" type="image/x-icon">
    <!-- ========== Title ========== -->
    <title>Search Salon</title>
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

<body style="zoom:85%">
<div class="loader">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>

<!--Header Section-->
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


<!--Search Section-->
<section class="inner_cover parallax-window" style="background-image: url('assets/images/bg/dark_bg.png');">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="inner_cover_content">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10">
                                <h1 class="mb30 text-center color-light">Search Salon</h1>
                                <div class="input-group">
                                    <span id="current-search" hidden></span>
                                    <input type="text" class="form-control" placeholder="Salon Name or Location ..." id="search-field" name="search">
                                    <span class="input-group-btn" style="background-color: rgb(225, 49, 91)">
                                    	<button type="submit" class="btn btn-default" id="search-btn"><i class="fa fa-search" style="margin-left: 5px;  font-size: 1.5rem"></i></button>
                                    	<button type="submit" class="btn-near btn-default" id="nearby-btn">Find Near</button>
                                    </span> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!--Search End-->

<!--Results Section-->
<div class="container mt100 mb100">
	<div class="container mb50">
		<span id="item-count"></span>
		<span> Item(s)</span>
		<span>
			Sort By
			<select id="sort">
				<option value="1">Rating</option>
				<option value="2">Popularity</option> MOST TRANSACTED
				<option value="3">Salon Name</option>
			</select>
			Show
			<select id="shown">
				<option value="12">12</option>
				<option value="24">24</option>
				<option value="36">36</option>
			</select>
		</span>
	</div>
    <div id="branch-list"></div>
    <div id="pagination-link"></div>
</div><!-- /.container -->
<!--Results End-->

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

<link rel="stylesheet" href="<?php echo base_url('assets/full-calendar/fullcalendar.min.css')?>" />
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>" ></script> 
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>" ></script>
	<script type="text/javascript">
		$(document).ready(function(){
			load_salon(1);
			function load_salon(page){
				var searchVal = $('#current-search').text();
				var sortVal = $('#sort option:selected').val()
				var showVal = $('#shown option:selected').val();
				$.ajax({
					url:"<?php echo base_url('customer_controller/branch_pagination/')?>"+page,
					method:"GET",
					dataType: 'json',
					data:{search:searchVal, sort:sortVal, show:showVal},
					success:function(data){
						$('#item-count').text(data.salon_count);
						$('#branch-list').html(data.display);
						$('#pagination-link').html(data.pagination);
					},
					error:function(request){
						alert('Same page.');
					}
				});
			}
			$(document).on('click', '.pagination li a', function(event){
				event.preventDefault();
				document.documentElement.scrollTop = 0;
				var page = $(this).data("ci-pagination-page");
				load_salon(page);
			});
			$('#search-btn').click(function(){
				var search_txt = $('#search-field').val();
				$('#current-search').text(search_txt);
				load_salon(1);
			});
			$('#sort').change(function(){
				load_salon(1);
			});
			$('#shown').change(function(){
				load_salon(1);
			});
		});
	</script>
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