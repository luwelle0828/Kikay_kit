<!DOCTYPE html>
<html>
<head>
	<title>Customer Home</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
	<!---------------Header---------------->
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
	<!---------------Body---------------->
	
	<div class="container-fluid" style="min-height:550px ; background-color:WhiteSmoke">
		<div class="col-sm-1" style="padding-top:50px; background-color:whitesmoke">
			<p style="padding-bottom: 30px">DASHBOARD</p>
			<ul class="nav menu">
				<li class="active"><a href="<?php echo base_url('customer_home');?>">Client Information</a></li>
				<li><a href="<?php echo base_url('customer_salon');?>">Search Salon</a></li>
				<li><a href="<?php echo base_url('customer_reservations');?>">Reservations</a></li>
			</ul>
		</div>
		<div class="col-sm-11" style="float:left; min-height:550px; padding-bottom:20px ;padding-top:50px; background-color:PaleTurquoise"> 
			<div class="container-fluid">
				<h3>Customer Information</h3>
					<form align="center" id='login' action="<?php echo base_url('customer_update_info'.'?id='.$info[0]->cs_id); ?>" method='post'>
						<label>First Name:</label>
						<input type='text' value="<?php echo $info[0]->cs_fname?>" name='fname' required /><br>
						<label>Last Name:</label>
						<input type='text' value="<?php echo $info[0]->cs_lname?>" name='lname' required /><br>
						<label>Address:</label>
						<input type='text' value="<?php echo $info[0]->cs_address?>" name='address' required /><br>
						<label>Contact Number:</label>
						<input type='text' value="<?php echo $info[0]->cs_contact?>" name='contact' required /><br>
						
						<input type='submit' value='Update'/>
						<a href="<?php echo base_url('customer_home');?>">Cancel</a>
					</form>
			</div>
		</div>
	</div>
	
	<!---------------Footer---------------->
	<div class="container-fluid" style="min-height:85px ; background-color:whitesmoke">
		<div style=" width: 300px; margin:25px auto;">
			<p>Footer :)</p>
		</div>
	</div>
	
</body>
</html>