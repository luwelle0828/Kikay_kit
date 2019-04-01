<!DOCTYPE html> 
<html lang="en">
<head>  
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="shortcut icon" href="<?=base_url()?>assets/images/kikay_icon.png" type="image/x-icon">
    <!-- ========== Title ========== -->
    <title>Kikay Kit</title>
    <!-- ========== STYLESHEETS ========== -->
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/lib/datatable/dataTables.bootstrap.min.css');?>">
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

<!--Header Section -->
<header class="header navbar fixed-top navbar-expand-md">
    <div class="container">
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
<!--Header Section End-->

<!--Profile Section-->
<section style="background-image: url(assets/images/bg/dark_bg.png)"> 
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="inner_cover_content_p">
            <div class="container">
                <div class="media">
                    <div class="media-body pl80 pt150 pb50 center-text">
                        <h3 class="color-light pt10 pb10 allcaps bg-macaroni shadow"><?php echo $info[0]->cs_fname." ".$info[0]->cs_lname?></h3>
                        <div><h6 class="profile color-dark pb10">Address: <?php echo $info[0]->cs_address?></h6></div>
                        <div><h6 class="profile color-dark pb10">Contact: <?php echo $info[0]->cs_contact?></h6></div>
                        <div><h6 class="profile color-dark pb10">Gender: <?php echo $info[0]->cs_gender?></h6></div>
                        <button type="button" class=" btn btn-primary btn-rounded shadow" data-toggle="modal" data-target="#editProfile" style="float: right;"> Edit Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Profile Section End-->

<!--Active Reservation Table Section-->
<section class="pt50 plr10 mt30">
    <div class="mb50">
        <h3 class="color-light center-text bg-macaroni pt10 pb10 shadow">
            <i class="ion-ios-calendar-outline"></i> My Reservations
        </h3>
    </div>
    <div class="container-fluid hideme" style="min-height: 100px">
        <div class="container-fluid">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#pending">Pending</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#paid">Paid</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#cancelled">Cancelled</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="pending" class="tab-pane active" role="tabpanel">
                    <label>Pending</label>
                    <div class="container-fluid well">
                        <table id="reserve-pending-table" class="table table-bordered hideme shadow">
                            <thead class="center-text">
                                <tr class="bg-gray">
                                    <th>Reservation Number</th>
                                    <th>Branch Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
                            <tbody class="center-text">
                                <?php
                                    if($reserve!=NULL){
                                        foreach($reserve as $val){
                                            if($val->rv_status == "Pending"){
                                    ?>
                                            <tr>
                                                    <td><?php echo $val->rv_no ?></td>
                                                    <td><?php echo $val->br_name?></td>
                                                    <td><?php echo $val->rv_date?></td>
                                                    <td><?php echo $val->rv_time?></td>
                                                    <td><?php echo $val->rv_status?></td>
                                                    <td><?php echo $val->rv_created_date?></td>
                                                    <td><button value="<?php echo $val->rv_id ?>" class="btn btn-info" data-toggle="modal" data-target="#view-reserve-modal">View</button>
                                                        <button data-toggle="modal" data-target="#update-reserve-modal" value="<?php echo $val->rv_id ?>" class="btn btn-warning">Update</button>
                                                        <button data-toggle="modal" data-target="#delete-reserve-modal" value="<?php echo $val->rv_id ?>" class="btn btn-danger">Cancel</button>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="paid" class="tab-pane" role="tabpanel">
                    <label>Paid</label>
                    <div class="container-fluid well">
                        <table id="reserve-paid-table" class="table table-bordered shadow">
                            <thead>
                                <tr class="bg-gray">
                                    <th>Reservation Number</th>
                                    <th>Branch Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($reserve!=NULL){
                                        foreach($reserve as $val){
                                            if($val->rv_status == "Paid"){
                                    ?>
                                            <tr>
                                                    <td><?php echo $val->rv_no ?></td>
                                                    <td><?php echo $val->br_name?></td>
                                                    <td><?php echo $val->rv_date?></td>
                                                    <td><?php echo $val->rv_time?></td>
                                                    <td><?php echo $val->rv_status?></td>
                                                    <td><?php echo $val->rv_created_date?></td>
                                                    <td><button data-toggle="modal" data-target="#view-reserve-modal" value="<?php echo $val->rv_id ?>" class="btn btn-info">View</button></td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="cancelled" class="tab-pane" role="tabpanel">
                    <label>Cancelled</label>
                    <div class="container-fluid well">
                        <table id="reserve-cancelled-table" class="table table-bordered shadow">
                            <thead>
                                <tr class="bg-gray">
                                    <th>Reservation Number</th>
                                    <th>Branch Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($reserve!=NULL){
                                        foreach($reserve as $val){
                                            if($val->rv_status == "Cancelled"){
                                    ?>
                                            <tr>
                                                    <td><?php echo $val->rv_no ?></td>
                                                    <td><?php echo $val->br_name?></td>
                                                    <td><?php echo $val->rv_date?></td>
                                                    <td><?php echo $val->rv_time?></td>
                                                    <td><?php echo $val->rv_status?></td>
                                                    <td><?php echo $val->rv_created_date?></td>
                                                    <td><button data-toggle="modal" data-target="#view-reserve-modal" value="<?php echo $val->rv_id ?>" class="btn btn-info">View</button>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                    }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Top Salons Section-->
<section class="pt50 pb100 plr10">
    <div class="mb50">
        <h3 class="color-light center-text bg-macaroni pt10 pb10 hideme shadow">
            Top Salons
        </h3>
    </div>	
    <div class="row justify-content-center no-gutters">
    	    <?php 
				for($x=0;$x<5;$x++){
			?>	
        <div class="col-md-3 col-sm-6 ptrdl10 mtrdl20 hideme">
            <div class="speaker_box shadow">
                <div class="speaker_img" style="border: #e1315b; size:0.1px; border-style:solid;">
                    <img src="./assets/images/branch-images/<?php echo $top[$x]->br_image?>" alt="<?php echo $top[$x]->br_name.'-image'?>" height="350" width="350">
                    <a href="<?php echo base_url('customer_salon_view'.'?id='.$top[$x]->br_id);?>">
                        <div class="info_box">
                            <h5 class="name"><?php echo $top[$x]->br_name?></h5>
                            <p class="position"><?php echo $top[$x]->br_location?></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php	
				}
			?>
    </div>
</section>
<!--Top Salons End-->

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

<!--Update Profile Section (Modal)-->
<div class="modal fade" id="editProfile" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel-2">Update Profile</h4>
                </div>

                <div class="modal-body">
                    <form action="<?php echo base_url('customer_update_info'.'?id='.$info[0]->cs_id); ?>" method='post'>
                        <label class="color-dark edit-input-label">First Name:</label>
                            <input class="color-dark edit-input" style="width: 305px" type='text' value="<?php echo $info[0]->cs_fname?>" name='fname' required /><br>
                        <label class="color-dark edit-input-label">Last Name:</label>
                            <input class="color-dark edit-input" style="width: 307px" type='text' value="<?php echo $info[0]->cs_lname?>" name='lname' required /><br>
                        <label class="color-dark edit-input-label">Address:</label>
                            <input class="color-dark edit-input" style="width: 300px" type='text' value="<?php echo $info[0]->cs_address?>" name='address' required /><br>
                        <label class="color-dark edit-input-label">Contact Number:</label>
                            <input class="color-dark edit-input" style="width: 250px" type='text' value="<?php echo $info[0]->cs_contact?>" name='contact' required /><br>
                </div>

                <div class="modal-footer">
                    <input class="btn btn-primary mb20" type='submit' value='Update'/>            
                    </form>
                    <button type="button" class="btn btn-light mb20" data-dismiss="modal">Close</button>
                </div>
            </div><!--modal-content-->
        </div><!--modal-dialog-->
 </div><!--modal-->
<!--Edit Profile End-->

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

<!-- VIEW RESERVE MODAL -->
    <div class="modal fade" id="view-reserve-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 80%" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Reservation</h5>
                </div>
                <div class="modal-body">
                    <h4 class="center-text color-light bg-macaroni pt5 pt5">Customer Details</h4>
                    <div class="container-fluid" id="reserve-details">
                    </div>
                    <div class="container-fluid">
                        <h4 class="center-text color-light bg-macaroni pt5 pb5">Services Reserved</h4>
                        <table id="reserve-services" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr class="bg-gray">
                                    <td>Service Name</td>
                                    <td>Price</td>
                                    <td>Duration</td>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary shadow" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>

    </div>
    <!-- UPDATE INFO MODAL -->
    <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Profile</h5>
                </div>
                <div class="modal-body">
                    <form align="center" action="<?php echo base_url('customer_update_info'.'?id='.$info[0]->cs_id); ?>" method='post'>
                        <label>First Name:</label>
                        <input type='text' value="<?php echo $info[0]->cs_fname?>" name='fname' required /><br>
                        <label>Last Name:</label>
                        <input type='text' value="<?php echo $info[0]->cs_lname?>" name='lname' required /><br>
                        <label>Address:</label>
                        <input type='text' value="<?php echo $info[0]->cs_address?>" name='address' required /><br>
                        <label>Contact Number:</label>
                        <input type='text' value="<?php echo $info[0]->cs_contact?>" name='contact' required /><br>
                </div>
                <div class="modal-footer">
                    <input type='submit' class="btn btn-primary" value='Update'/>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- DELETE RESERVE MODAL -->
    <div class="modal fade" id="delete-reserve-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Reservation</h5>
                </div>
                <div class="modal-body">
                    <span id="message">Delete Reservation?</span>
                </div>
                <div class="modal-footer">
                    <button value="" type="button" class="btn btn-primary">Confirm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<!--Reservation View End-->

<!-- jquery -->
<script src="assets/js/jquery.min.js"></script>
<!-- bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/js/lib/data-table/datatables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/lib/data-table/dataTables.bootstrap.min.js');?>"></script>
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
<!-- INPUT MASK -->
<script src="<?php echo base_url('assets/js/input-mask/jquery.inputmask.js"');?>"></script>
<script src="<?php echo base_url('assets/js/input-mask/jquery.inputmask.extensions.js"');?>"></script>
<script src="<?php echo base_url('assets/js/input-mask/jquery.inputmask.numeric.extensions.js"');?>"></script>
<script src="<?php echo base_url('assets/js/input-mask/jquery.inputmask.date.extensions.js"');?>"></script>
<script src="<?php echo base_url('assets/js/input-mask/jquery.inputmask.phone.extensions.js"');?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#reserve-pending-table').DataTable({
            "order": [[ 0, 'desc']],
            lengthMenu:[5,10,20]
        });
        $('#reserve-paid-table').DataTable({
            destroy: true,
            "order": [[ 0, 'desc']],
            lengthMenu:[5,10,20]
        });
        $('#reserve-cancelled-table').DataTable({
            destroy: true,
            "order": [[ 0, 'desc']],
            lengthMenu:[5,10,20]
        });
        $('#reserve-services').DataTable({
            destroy: true,
            "order": [[ 0, 'desc']],
            searching: false,
            bLengthChange: false
        });
        $('input[name="contact"]').inputmask("(+99)999 999 9999", {"placeholder": "(+XX) XXX XXX XXXX"});
        $('#reserve-pending-table').on('click', 'button:contains("View")', function(){
            var id = $(this).val();
            $.ajax({
                type: 'ajax',
                method: 'GET',
                url: '<?php echo base_url('customer_controller/reservation_view')?>',
                data: {id:id},
                dataType: 'json',
                success: function(result){
                    $('#reserve-details').html(result.display);
                    var table = $('#reserve-services').dataTable();
                    table.fnClearTable();
                    table.fnAddData(result.service_list);
                },
                error: function(request){
                    alert(request.responseText);
                }
            });
        });
        $('#reserve-pending-table').on('click', 'button:contains("Cancel")', function(){
            $('#delete-reserve-modal').find('button:contains("Confirm")').val($(this).val());
        });
        $('#delete-reserve-modal').on('click', 'button:contains("Confirm")',function(){
            var id = $(this).val();
            $.ajax({
                type: 'ajax',
                method: 'GET',
                url: '<?php echo base_url('customer_controller/cancel_reservation')?>',
                data: {id:id},
                success: function(){
                    alert('Successfully Deleted.');
                    window.location.reload();
                },
                error: function(request){
                    alert(request.responseText);
                }
            });
        });
        $('#reserve-paid-table').on('click', 'button:contains("View")', function(){
            var id = $(this).val();
            $.ajax({
                type: 'ajax',
                method: 'GET',
                url: '<?php echo base_url('customer_controller/reservation_view')?>',
                data: {id:id},
                dataType: 'json',
                success: function(result){
                    $('#reserve-details').html(result.display);
                    var table = $('#reserve-services').dataTable();
                    table.fnClearTable();
                    table.fnAddData(result.service_list);
                },
                error: function(request){
                    alert(request.responseText);
                }
            });
        });
        $('#reserve-cancelled-table').on('click', 'button:contains("View")', function(){
            var id = $(this).val();
            $.ajax({
                type: 'ajax',
                method: 'GET',
                url: '<?php echo base_url('customer_controller/reservation_view')?>',
                data: {id:id},
                dataType: 'json',
                success: function(result){
                    $('#reserve-details').html(result.display);
                    var table = $('#reserve-services').dataTable();
                    table.fnClearTable();
                    table.fnAddData(result.service_list);
                },
                error: function(request){
                    alert(request.responseText);
                }
            });
        });
    });
</script>
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

