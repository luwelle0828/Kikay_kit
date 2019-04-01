<!DOCTYPE html>
<html>
<head>
	<!--  ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/kikay_icon.png" type="image/x-icon">
    <title>Customer Reservation</title>
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
	<link href="assets/css/datetimepicker/bootstrap-datetimepicker.css" rel="stylesheet"/>
	<!-- <style>
	.datepicker{
	  width: 270px;
	  height: 250px;
	}
	</style> -->
</head>
<body style="zoom:85%">

<!--Header Section -->
<header class="header navbar fixed-top navbar-expand-md">    
    <div class="container">
        <a href="<?php echo base_url('customer_home');?>" style="float:left;font-size: 30px; font-weight: 1000; color: #ffffff;">Kikay Kit</a>
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

<!--Profile Section-->
<section class="inner_cover_r parallax-window" data-parallax="scroll"  style="background-image: url('assets/images/bg/dark_bg.png');"> 
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="inner_cover_content_r">
            <div class="container">
                <div class="media">
                	<div class="col-12 col-md-6">
                        <?php
						$day = array("Sunday","Monday","Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
						$day_arr = explode(",",$branch[0]->br_days);
					?>
					<p id="branch-id" hidden><?php echo $branch[0]->br_id?></p>
					<p id="open-days" hidden><?php echo $branch[0]->br_days?></p>
					<h3 class="center-text bg-macaroni color-light shadow mb20"><?php echo $branch[0]->br_name?></h3>
					<p><label>Branch Location:</label> <?php echo $branch[0]->br_location?></p>
					<p><label>Mobile Number:</label> <?php echo $branch[0]->br_mobile?></p>
					<p><label>Telephone Number:</label> <?php echo $branch[0]->br_telephone?></p>
					<p><label>Open Hours:</label> <span id="open-time"><?php echo $branch[0]->br_opening?></span> - <span id="close-time"><?php echo $branch[0]->br_closing?></span></p>
					<p><label>Open Days:</label>
						
								<?php foreach($day_arr as $index=>$days){
									if($index==(count($day_arr)-1)){
										echo '<span>'.$day[($days-1)].'</span>';
									}
									else{
										echo '<span>'.$day[($days-1)].", ".'</span>';
									}
								}?></p>
                    </div>
                    <div id="date-time" class="col-12 col-md-3">DATE & TIME</br>
						<div class="form-group pt40">
							<div class="input-group date shadow" id="datepicker">
							    <input type="text" class="form-control" name="date" required/>
							    <span class="input-group-addon" style="cursor:pointer; padding: 10px 10px">
							    	<span class="ion-ios-calendar-outline" style="font-size: 20px"></span>
							    </span>
							</div>
						</div>
						<div class="form-group">
							<div class='input-group date shadow' id='start-time'>
								<input type='text' value="<?php echo $branch[0]->br_opening?>" name="time" class='form-control' required/>
								<span class='input-group-addon' style="cursor:pointer; padding: 12px 9px">
									<span class="fa fa-clock-o" style="font-size: 20px"></span>
								</span>
							</div>
						</div>
					</div>
                    <div id="slots-list" class="col-12 col-md-4" style="height:220px;background-color:transparent;overflow: auto;">
					</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Profile Section End-->

<!--events section -->
<section class="pt100 pb100">
    <div class="container">
        <div class="row justify-content-center">
<!--main section start -->
            <div class="col-12 col-md-7">
				<div class="blog_card shadow">
					<div class="container-fluid mb10 pt10" style="font-size:16px;">
						<label class="col-sm-3 color-red">End Time:</label>
						<span id="end-time">-</span>
					</div>
					<div class="container-fluid" style="height:350px; margin-bottom:10px;overflow-y: auto">
						<table id="service-list" class="table">
							<thead class="bg-macaroni color-light">
								<tr>
									<td>#</td>
									<td>Service</td>
									<td>Duration</td>
									<td>Price</td>
									<td>Tools</td>
								</tr>
							</thead>
							<tbody>
								<!-- Nothing inside for JQuery display-->
							</tbody>
						</table>
					</div>
					<div style="float: right;">
						<span>TOTAL: <span id="total-price">0</span></span>
						<p id="url-redirect" hidden><?php echo base_url('customer_salon_view'.'?id='.$branch[0]->br_id);?></p>
						<button class="btn btn-info ml50 shadow" id="reserve-btn">Reserve</button>
					</div>
				</div>
			</div>
<!--main section end-->

<!--sidebar section -->
            <div class="col-12 col-md-5">
                <div class="sidebar">
                	<div class="blog_card shadow">
	                    <div class="widget widget_categories">
	                    	<div id="category" style="padding:10px">
	                    		<h4 class="widget-title">
	                            	Services
	                        	</h4>
	                      		<div class="widget widget_tags" style="overflow-x: auto">
	                        		<ul>
	                            		<li class="active shadow"><a href="#" id="0" >All</a></li>
	                            		<?php foreach($category as $ct){
										?>
										<li class="shadow" ><a href="#" id="<?php echo $ct->ct_id?>"><?php echo $ct->ct_category ?></a></li>
										<?php }
										?>
	                        		</ul>
	                    		</div>
	                    	</div>
						</div>
						<div class="container-fluid" style="height:350px; margin-bottom:10px;overflow-y: auto">
							<table id="choose-service" class="table" >
								<thead>
									<tr class="bg-macaroni">
										<td class="col-sm-5 color-light">Service</td>
										<td class="col-sm-2 color-light">Duration</td>
										<td class="col-sm-2 color-light">Price</td>
										<td class="col-sm-3 color-light">Tools</td>
									</tr>
								</thead>
								<tbody>
										<!-- Nothing inside for JQuery display-->
								</tbody>
							</table>
						</div>
					</div>
				</div>
            </div>	
        </div>
<!--sidebar section end -->
    </div>
</section>
<!--event section end -->
	
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
	
	<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>" ></script> 
	<script src="<?php echo base_url('assets/js/popper.js');?>" ></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>" ></script>
    <script src="<?php echo base_url('assets/js/datetimepicker/moment/moment.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/datetimepicker/bootstrap-datetimepicker.min.js');?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var branch_id = $('#branch-id').text();
			var open_time = $('#open-time').text();
			var close_time = $('#close-time').text();
			var end_time = open_time;
			var open_days = $('#open-days').text().split(',');
			var date_check = $('#date-time input[name="date"]').val();;
			var time_check = open_time;
			var close_days = [];
			for(var x=0;x<7;x++){
				if(open_days.indexOf((x+1).toString())==(-1)){
					close_days.push(x);
				}
			}
			
			//show datepicker
	   		$('#datepicker').datetimepicker({
	   			format:'MM/DD/YYYY',
	   			defaultDate: currentDate(),
                daysOfWeekDisabled: close_days,
	   			minDate: currentDate(),
	   			useCurrent:'day',icons: {
                    up: "fa fa-toggle-up fa-2x",
                    down: "fa fa-toggle-down fa-2x",
                    next: 'fa fa-toggle-right fa-2x',
                    previous: 'fa fa-toggle-left fa-2x'
                }
            });
			var total = 0;
			$('#end-time').text(end_time);
			display_services($('#category li.active a').attr('id'));
			displaySlots();
			//When time was changed, the time will be checked if within salon open time
			$('#start-time').datetimepicker({
		        format: 'HH:mm',
		        stepping: 30,
		        useCurrent:'day',icons: {
                    up: "fa fa-toggle-up fa-2x",
                    down: "fa fa-toggle-down fa-2x",
                    next: 'fa fa-toggle-right fa-2x',
                    previous: 'fa fa-toggle-left fa-2x'
                }
		    }).on('dp.change', function (ev){
		    	if(toMinute($('#start-time input').val())<toMinute(open_time)){
					alert('TIME BELOW SALON OPEN TIME.');
					$('#start-time input').val(time_check);
				}
				else if(toMinute($('#start-time input').val())>toMinute(close_time)){
					alert('TIME ABOVE SALON CLOSE TIME.');
					$('#start-time input').val(time_check);
				}
			});

			//When different category is clicked
			$('#category').on('click', 'li a', function(e){
    			e.preventDefault();
				$(this).parent('li').siblings('li').removeClass('active');
				$(this).parent('li').addClass('active');
				$('#choose-service tbody').html("");
				display_services($('#category li.active a').attr('id'));
			});

			$('#choose-service').on('click', 'button', function(){
				var id = $(this).val();
				var count=0;
				$(this).prop('disabled',true);
				$('#service-list tbody tr').each(function(){	//getting all id of services
					count++;
				});
				$.ajax({
					type: 'ajax',
					method: 'GET',
					url: '<?php echo base_url('customer_controller/choose_service')?>',
					data: {as_id:id, count:(count+1)},
					dataType: 'json',
					success: function(data){
						total+= parseFloat(data.avail[0].as_price);
						end_time = addTime(end_time,data.avail[0].as_duration);
						
						if(toMinute(end_time)<=toMinute(close_time)){
							$('#service-list tbody').append(data.display);
						}
						else{
							total -= parseFloat(data.avail[0].as_price);
							end_time = subTime(end_time,data.avail[0].as_duration);
							alert('You will exceed the open time of salon.');
						}

						if(fullSlots()){
							$('#service-list tbody tr:last').remove();
							total -= parseFloat(data.avail[0].as_price);
							end_time = subTime(end_time,data.avail[0].as_duration);
						}

						$('#end-time').text(end_time)
						$('#total-price').text(total);
						compare_services();
						checkSlots();
						
					},
					error: function(request){
						alert(request.responseText);
					}
				});
			});
			$('#service-list').on('click', 'button', function(){
				$(this).closest('tr').remove();
				var count = 0;
				var price = parseFloat($(this).closest('tr').find('td:eq(3)').text());
				var duration = $(this).closest('tr').find('td:eq(2)').text();
				$('#service-list tbody tr').each(function(){	//getting all id of services
					count++;
					$(this).children('td:first').text(count);
				});
				total -= price;
				$('#total-price').text(total);
				end_time = subTime(end_time,duration);
				$('#end-time').text(end_time)
				compare_services();
				checkSlots();
			});
			$('#reserve-btn').click(function(){
				var count = 0;
				var date = $('#date-time input[name="date"]').val();
				var time = $('#date-time input[name="time"]').val();
				
				//CHECKING OF RESERVATION INPUTS
				$('#service-list tbody tr').each(function(){	//checking if at least 1 service.
					count++;
				});
				if(count==0){
					alert("Please choose at least 1 service.");
				}
				else{
					if(date=="" || time==""){	//checking if no date or time picked.
						alert('Please choose date and time.');
					}
					else{
						reserve(date, time);
						
					}
				}
				
			});
			
			//Prevent user from typing
			$('#datepicker').keypress(function(e) {
			    return false;
			});
			$('#start-time').keypress(function(e) {
			    return false;
			});
			$('#datepicker').keydown(function(e) {
				if ( event.which == 8 ) {
				   event.preventDefault();
				}
			});
			$('#start-time').keydown(function(e) {
			    if ( event.which == 8 ) {
				   event.preventDefault();
				}
			});


			$('#start-time').on('dp.change', function(){
				var time = $('#date-time input[name="time"]').val();
				$('#service-list tbody tr').each(function(){	
					time = addTime(time,$(this).find('td:eq(2)').text());	//MUST BE CHANGED TO AJAX TO AVOID CHANGING 
				});
				if(toMinute(time)>toMinute(close_time)){
					$('#date-time input[name="time"]').val(time_check);
					alert('You will exceed the open time of salon.');
				}
				else{
					if(fullSlots()){
						$('#date-time input[name="time"]').val(time_check);
					}
					else{
						time_check = $('#date-time input[name="time"]').val();
						end_time = time;
						$('#end-time').text(end_time);
					}
					checkSlots();
				}
			});
			$('#datepicker').on('dp.change', function(){
				displaySlots();
				// if(fullSlots()){
				// 	$('#date-time input[name="time"]').val(date_check);
				// }
				// else{
				// 	date_check = $('#date-time input[name="time"]').val();
				// }
				// checkSlots();
			});
			function display_services(ct_id){
				$.ajax({
					url:"<?php echo base_url('customer_controller/category_services')?>",
					method:"GET",
					dataType: 'json',
					data:{br_id:branch_id, ct_id:ct_id},
					success:function(data){
						$('#choose-service tbody').html(data.display);
						compare_services();	//compare for disabling buttons of chosen services
					},
					error:function(request){
						alert(request.responseText);
					}
				});
			}
			function reserve(date, time){
				var asid_arr = [];
				var url = $('#url-redirect').text();
				var count = 0;
				$('#service-list tbody tr').each(function(){	//getting all id of services
					asid_arr[count] = $(this).find('button').val();
					count++;
				});
				$.ajax({
					type: 'ajax',
					method: 'POST',
					url: '<?php echo base_url('customer_controller/reserve')?>',
					data: {br_id:branch_id, as_id:asid_arr, date:date, time:time, end_time:end_time},
					dataType: 'json',
					success: function(data){
						if(data=='0'){
							alert("A slot is not available. The page will be reloaded.");
							window.location.reload();
						}
						else{
							alert("Successfully added.");
							window.location.replace(url);
						}
					},
					error: function(request){
						alert('error');
					}
				});
			}
			function toMinute(time){
				var hour = parseInt(time.substring(0, 2))*60;
				var min = parseInt(time.substring(3, 5));
				var total = hour+min;
				return total;
			}
			function timeFormat(time){
				var hour_format = ["00","01","02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23"];
				var hour = (Math.floor(time/60)).toString();
				var min = (time%60).toString();
				return hour_format[hour]+":"+min.substring(0,1)+"0";
			}
			function addTime(time1,time2){		//Adding Time and time format manipulation
				time1 = toMinute(time1);
				time2 = toMinute(time2);
				var total_time = time1+time2;
				var result_hour = (total_time/60).toString();
				var result_min = (total_time%60).toString();
				var remainder_n = result_hour.indexOf(".");
				if(parseInt(result_hour)<10)
					result_hour = "0"+result_hour;
				if(remainder_n<0)
					var result_time = result_hour+":"+result_min.substring(0,1)+"0";
				else
					var result_time = result_hour.substring(0,2)+":"+result_min.substring(0,1)+"0";
				return result_time;
			}
			function subTime(time1,time2){	//Subtracting Time and time format manipulation
				time1 = toMinute(time1);
				time2 = toMinute(time2);
				var total_time = time1-time2;
				var result_hour = (total_time/60).toString();
				var result_min = (total_time%60).toString();
				var remainder_n = result_hour.indexOf(".");
				if(parseInt(result_hour)<10)
					result_hour = "0"+result_hour;
				if(remainder_n<0)
					var result_time = result_hour+":"+result_min.substring(0,1)+"0";
				else
					var result_time = result_hour.substring(0,2)+":"+result_min.substring(0,1)+"0";
				return result_time;
			}
			function compare_services(){	//for disabling add buttons at choosing side of services
				var count = 0;
				var as_add = [];
				var as_choose = []; 
				$('#service-list tbody tr').each(function(){	//getting all id of services
					as_add[count] = $(this).find('button').val();
					count++;
				});
				count=0;
				$('#choose-service tbody tr').each(function(){	//getting all id of services
					as_choose[count] = $(this).find('button').val();
					count++;
				});
				for(var x=0;x<as_choose.length;x++){
					if(as_add.indexOf(as_choose[x])!=(-1)){
						$("#choose-service tbody tr").find('button[value="'+as_choose[x]+'"]').prop('disabled',true);
					}
					else{
						$("#choose-service tbody tr").find('button[value="'+as_choose[x]+'"]').prop('disabled',false);
					}
				}
			}
			function displaySlots(){
				var date = $('#date-time input[name="date"]').val();
				$.ajax({
					type: 'ajax',
					url:"<?php echo base_url('customer_controller/display_slots')?>",
					method:"GET",
					dataType: 'json',
					data:{br_id:branch_id, date:date},
					success:function(data){
						$('#slots-list').html(data);
					},
					error:function(request){
						alert(request.responseText);
					}
				});
			}
			function checkSlots(){	//check if slots
				var start = toMinute($('#date-time input[name="time"]').val());
				var end = toMinute(end_time);

				$("#slots-list input[type='checkbox']").each(function(){
					if(timeSlots(start, end).indexOf($(this).val())!=(-1)){
						$(this).prop('checked',true);
					}
					else{
						$(this).prop('checked',false);
					}
				});
			}
			function fullSlots(){	//check if slots are full
				var start = toMinute($('#date-time input[name="time"]').val());
				var end = toMinute(end_time);
				var check=0;
				$("#slots-list input[type='checkbox']").each(function(){
					if(timeSlots(start, end).indexOf($(this).val())!=(-1)){
						// alert($(this).parent('div').attr('data-name'));
						if($(this).parent('div').attr('data-name')=='b'){
							alert('Time slot '+$(this).val()+' is full.');
							check++;
						}
					}
				});
				if(check>0){
					return true;
				}
				else{
					return false;
				}
			}
			function currentDate(){		//get current date with format
			  var month = [
			    "01", "02", "03",
			    "04", "05", "06", "07",
			    "08", "09", "10",
			    "11", "12"
			  ];

			  var day = new Date().getDate();
			  var monthIndex = new Date().getMonth();
			  var year = new Date().getFullYear();

			  return month[monthIndex] + '/' + day + '/' + year ;
			}
			function timeSlots(start, end){  //create time_format intervals
				var time_slots = [];
				var count = 0;
				while(start<end){	
					time_slots[count] = timeFormat(start)+" - "+timeFormat(start+30);
					count++;
					start += 30;
				}
				return time_slots;
			}
			$('#category a').click(function(e){
				e.preventDefault();
			});
		});
	</script>
</body>
</html>