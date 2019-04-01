<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Kikay Kit</title>
  <link rel="shortcut icon" href="<?=base_url()?>assets/images/kikay_icon.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,600" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel="stylesheet" href="assets/css/login_style.css">

  
</head>

<body style="background: url('assets/images/bg/bg-10.jpg'); background-repeat: no-repeat; background-size: cover;">

  
<div class="container">
   <section id="formHolder">
      <div class="row">
         <div class="col-sm-6 brand"> <!-- Brand Box -->
            <a href="<?php echo base_url('home'); ?>" class="logo">Home</a>

            <div class="heading">
               <h2>Kikay Kit</h2>
               <p>-----------</p>
            </div>

            <div class="success-msg">
               <p>Great! You are one of our members now</p>
               <a href="#" class="profile">Your Profile</a>
            </div>
         </div>
         <div class="col-sm-6 form"><!-- Form Box -->
            <div class="login form-piece">
               	<form class="login-form" id='login' action="<?php echo base_url('login'); ?>" method='post'>    
                	<?php if(isset($_SESSION['error'])){	
        						echo '<p style="color:red;">'."*".$_SESSION['error']."*".'</p>';
        						session_destroy(); 
        						}
        					?>
                  	<div class="form-group">
                    	<label for="username">Username</label>
                    	<input style="color: #e1315b;" type='text' name='username' id='username' required>
                  	</div>
                  	<div class="form-group">
                     	<label for='password'>Password</label>
                     	<input type='password' name='password' id='password' required>
                  	</div>
                  	<div class="CTA">
                     	<input type='submit' name='insert' value='Login'>
                  	</div>
               	</form>
            </div><!-- End Login Form -->
         </div>
      </div>
   </section>
   <footer>
    	<p>
        	<a>Kikay Kit &copy;2018</a>
      	</p>
   </footer>
</div>
	
	<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script  src="assets/js/index.js"></script>
</body>
</html>
