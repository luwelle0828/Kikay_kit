<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Kikay Kit</title>
   <link rel="shortcut icon" href="<?=base_url()?>assets/images/kikay_icon.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,600" rel="stylesheet">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>"/>
  <link href="assets/css/datetimepicker/bootstrap-datetimepicker.css" rel="stylesheet"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>"/>

  
</head>

<body style="background: url('assets/images/bg/bg-10.jpg'); background-repeat: no-repeat; background-size: cover;">

  
<div class="container">
   <section id="formHolder">

      <div class="row">

         <!-- Brand Box -->
         <div class="col-sm-6 brand">
            <a href="<?php echo base_url('home'); ?>" class="logo">Home</a>

            <div class="heading">
               <h2>Kikay Kit</h2>
               <p>------------</p>
            </div>

            <div class="success-msg">
               <p>Great! You have created your profile</p>
               <a href="#" class="profile">View Profile</a>
            </div>
         </div>


         <!-- Form Box -->
         <div class="col-sm-6 form">
 
            <!-- Signup Form -->
            <div class="form-piece switched">

               <form action="<?php echo base_url('register'.'?id=2'); ?>" id='login' method='post' style="top: 113%;">
                  <span class="title">Client Registration</span>
                  
                  <div class="form-group">
                     <label for="company">Company Name</label>
                     <input type='text' name='company' required>
                     <span class="error"></span>
                  </div>
                  <div class="form-group">
                     <label for="address">Address</label>
                     <input type='text' name='address' required>
                     <span class="error"></span>
                  </div>
                  <div class="form-group">
                     <label for="mobile">Mobile Number</label>
                     <input type='text' name='mobile' required>
                     <span class="error"></span>
                  </div>
                  <div class="form-group">
                     <label for="telephone">Telephone Number</label>
                     <input type='text' name='telephone' required>
                     <span class="error"></span>
                  </div>
                  <div class="form-group" style="position:relative">
                    <label>Opening Time: <i class="fa fa-clock-o"></i></label>
                    <input type='text' name="ot_time" class="form-control" id='open-time'/>
                  </div>
                  <div class="form-group">
                    <label>Closing Time: <i class="fa fa-clock-o"></i></label>
                    <input type='text' name="ct_time" class="form-control" id='close-time'/>
                  </div>
                  <?php
                  $day = array("Sunday","Monday","Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
                  ?>
                  <div class="row form-group" style="margin-top:50px">
                      <div class="col col-md-4"><label>Open Days:</label></div>
                      <div class="col col-md-8">  
                          <div class="form-check">
                              <div class="checkbox">
                              <?php
                                  for($i=0;$i<count($day);$i++)
                                  {
                              echo    '<div class="row checkbox">
                                        <input type="checkbox" name="days[]" value="'.($i+1).'" class="form-check-input col-sm-3"><span class="col-sm-3" style="font-size:12px">'.$day[$i].'</span>
                                      </div>';
                                  }
                              ?>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                     <label for="username"> Username</label>
                     <input type='text' name='username' required>
                     <span class="error"></span>
                  </div>
                  
                  <div class="form-group">
                     <label for="password">Password</label>
                     <input type='password' name='password' required>
                     <span class="error"></span>
                  </div>

                  <div class="form-group">
                     <label for="confirmpass">Confirm Password</label>
                     <input type='password' name='confirmpass' required>
                     <span class="error"></span>
                  </div>

                  <div class="CTA">
                      <input style="cursor:pointer" type='submit' value='Sign Up'>
                     <a href="#" class="switch">Register as Customer</a>
                  </div>
               </form>
            </div><!-- End Signup Form -->

            <!-- Signup Form -->
            <div class="signup form-piece">
               <form action="<?php echo base_url('register'.'?id=4'); ?>" method='post'>
                  <span class="title">Customer Registration</span>
              
                  <div class="form-group">
                     <label for="firstname"> First Name</label>
                     <input type='text' name='firstname' required>
                     <span class="error"></span>
                  </div>

                  <div class="form-group">
                     <label for="lastname"> Last Name</label>
                     <input type='text' name='lastname' required>
                     <span class="error"></span>
                  </div>

                  <div class="form-group">
                     <label for="address"> Address</label>
                     <input type='text' name='address' required>
                     <span class="error"></span>
                  </div>

                  <div class="form-group">
                     <label for="contact">Contact</label>
                     <input type='text' name='contact' required>
                  </div>
                  <div class="form-group">
                     <select name="gender" class="dropdown dropform">
                        <option class="dropdown" value="0" hidden selected>Gender</option>
                        <option class="dropdown" value="male">Male</option>
                        <option class="dropdown" value="female">Female</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <label for="username"> Username</label>
                     <input type='text' name='username' required>
                     <span class="error"></span>
                  </div>

                  <div class="form-group">
                     <label for="password">Password</label>
                     <input type='password' name='password' required>
                     <span class="error"></span>
                  </div>

                  <div class="form-group">
                     <label for="confirmpass">Confirm Password</label>
                     <input type='password' name="confirmpass" required>
                     <span class="error"></span>
                  </div>

                  <div class="CTA">
                    <input style="cursor:pointer" type='submit' value='Sign Up'>
                    <a href="#" class="switch">Register as Client</a>
                  </div>
               </form>
            </div><!-- End Signup Form -->
         </div>
      </div>

   </section>


   <footer>
      <p style="color:white">
        <a>Kikay Kit &copy;2018</a>
      </p>
   </footer>

</div>
   
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>" ></script>  
<script src="<?php echo base_url('assets/js/popper.js');?>" ></script>  
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>" ></script>
<script src="<?php echo base_url('assets/js/datetimepicker/moment/moment.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/datetimepicker/bootstrap-datetimepicker.min.js');?>"></script>
<!-- INPUT MASK -->
<script src="<?php echo base_url('assets/js/input-mask/jquery.inputmask.js"');?>"></script>
<script src="<?php echo base_url('assets/js/input-mask/jquery.inputmask.extensions.js"');?>"></script>
<script src="<?php echo base_url('assets/js/input-mask/jquery.inputmask.numeric.extensions.js"');?>"></script>
<script src="<?php echo base_url('assets/js/input-mask/jquery.inputmask.date.extensions.js"');?>"></script>
<script src="<?php echo base_url('assets/js/input-mask/jquery.inputmask.phone.extensions.js"');?>"></script>
<script  src="assets/js/index.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
         $('#open-time').datetimepicker({
              format: 'HH:mm',
              stepping: 30,
              useCurrent:'day',
              icons: {
                  up: "fa fa-toggle-up fa-2x",
                  down: "fa fa-toggle-down fa-2x",
                  next: 'fa fa-toggle-right fa-2x',
                  previous: 'fa fa-toggle-left fa-2x'
              }
          });
          $('#close-time').datetimepicker({
              format: 'HH:mm',
              stepping: 30,
              useCurrent:'day',
              icons: {
                  up: "fa fa-toggle-up fa-2x",
                  down: "fa fa-toggle-down fa-2x",
                  next: 'fa fa-toggle-right fa-2x',
                  previous: 'fa fa-toggle-left fa-2x'
              }
          });
          $('#open-time').keypress(function(e){
              return false;
          })
          $('#close-time').keypress(function(e){
              return false;
          })
          $('#open-time').keydown(function(e) {
              if ( event.which == 8 ) {
                 event.preventDefault();
              }
          });
          $('#close-time').keydown(function(e) {
              if ( event.which == 8 ) {
                 event.preventDefault();
              }
          });
          $('input[name="mobile"]').inputmask("(+99)999 999 9999", {"placeholder": "(+XX) XXX XXX XXXX"});
          $('input[name="contact"]').inputmask("(+99)999 999 9999", {"placeholder": "(+XX) XXX XXX XXXX"});
          $('input[name="telephone"]').inputmask("999 99 99", {"placeholder": "XXX XX XX"});
      });
   </script>
</body>

</html>

