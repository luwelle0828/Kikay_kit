<!DOCTYPE html>
<html>
<head>
	<title>Customer Reservation</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
	<!---------------Header--------------->
	<div class="container-fluid" style="min-height:100px ; background-color:whitesmoke">
		<div class="col-sm-10">
			<p style="padding-top:25px; font-size:30px; float:left; margin-right:20px"><b>LOGO HERE</b> <('o'<)</p>
		</div>
		<div class="col-sm-2">
			<div style="padding: 30px 0px 10px 20px">
				<p style="float:left; padding-right:15px"><?php echo 'Welcome '.$_SESSION['user'];?><p>
				<a href="<?php echo base_url('logout'); ?>">LOGOUT</a>
			</div>
			<div style="padding: 0px 0px 10px 90px">
				<a href="<?php echo base_url('change_pass_form'); ?>">Change Password</a>
			</div>
		</div>
	</div>
	<!---------------Body--------------->
	
	<div class="container-fluid" style="min-height:550px ; background-color:WhiteSmoke">
		<div class="col-sm-1" style="padding-top:50px; background-color:whitesmoke">
			<p style="padding-bottom: 30px">DASHBOARD</p>
			<ul class="nav menu">
				<li><a href="<?php echo base_url('customer_home');?>">Home</a></li>
				<li><a href="<?php echo base_url('customer_salon');?>">Search Salon</a></li>
				<li class="active"><a href="<?php echo base_url('customer_reservations');?>">Reservations</a></li>
			</ul>
		</div>
		<div class="col-sm-11" style="float:left; min-height:550px; padding-bottom:20px ;padding-top:50px; background-color:PaleTurquoise"> 
			<div>
				<h3>Reservations</h3>
				<div class="col-sm-8">
					
				</div>
				<div class="col-sm-4" style="padding-left:80px">
					<form id='search_id' action="<?php echo base_url('customer_search_reservation'); ?>" method='post'>
						<label>Search</label>
						<input type='text' name='search_name' placeholder='Type to Search' id=''/>
						
						<input type='submit' name='search' value='search' />
						<input type='submit' name='reset' value='reset' />
					</form>
				</div>
			</div>
			<label>Active</label>
			<div class="container-fluid">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>Reservation Number</td>
							<td>Branch Name</td>
							<td>Date</td>
							<td>Time</td>
							<td>Status</td>
							<td>Tools</td>
						</tr>
					</thead>
					<tbody>
						<?php
							if($reserve!=NULL){
								foreach($reserve as $val){
									if($val->rv_status == "Pending" || $val->rv_status == "Paid"){
							?>
									<tr>
											<td><?php echo $val->rv_code?></td>
											<td><?php echo $val->br_name?></td>
											<td><?php echo $val->rv_date?></td>
											<td><?php echo $val->rv_time?></td>
											<td><?php echo $val->rv_status?></td>
											<td><a href="<?php echo base_url('customer_view_reservation'.'?id='.$val->rv_id);?>" class="btn btn-info">View</a>
											</td>
										</tr>
								<?php
									}
								}
							}
							else{
									echo 'NO DATA FOUND'; //change this line into pop-up/error message
							}?>
					</tbody>
				</table>
			</div>
			<label>Inactive</label>
			<div class="container-fluid">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>Reservation Number</td>
							<td>Branch Name</td>
							<td>Date</td>
							<td>Time</td>
							<td>Status</td>
							<td>Tools</td>
						</tr>
					</thead>
					<tbody>
						<?php
							if($reserve!=NULL){
								foreach($reserve as $val){
									if($val->rv_status == "Cancelled"){
							?>
									<tr>
											<td><?php echo $val->rv_code?></td>
											<td><?php echo $val->br_name?></td>
											<td><?php echo $val->rv_date?></td>
											<td><?php echo $val->rv_time?></td>
											<td><?php echo $val->rv_status?></td>
											<td><a href="<?php echo base_url('customer_view_reservation'.'?id='.$val->rv_id);?>" class="btn btn-info">View</a>
											</td>
										</tr>
								<?php
									}
								}
							}
							else{
									echo 'NO DATA FOUND'; //change this line into pop-up/error message
							}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	<!---------------Footer--------------->
	<div class="container-fluid" style="min-height:85px ; background-color:whitesmoke">
		<div style=" width: 300px; margin:25px auto;">
			<p>Footer :)</p>
		</div>
	</div>
	
</body>
</html>