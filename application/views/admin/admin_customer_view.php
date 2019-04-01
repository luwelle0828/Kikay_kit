
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo $customer[0]->cs_fname." ".$customer[0]->cs_lname?></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="row">                            
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Information</strong>
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label"><b>Customer Name: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $customer[0]->cs_fname." ".$customer[0]->cs_lname?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label"><b>Customer Address: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $customer[0]->cs_address?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label"><b>Contact No.: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $customer[0]->cs_contact?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label"><b>Gender: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $customer[0]->cs_gender?></label></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="trigger">
                            <strong>Reservations</strong>
                        </div>
                        <div id="collapse">
                            <div class="card-body">
                                <div class="default-tab">
                                    <nav>
                                        <div class="nav nav-pills mb-3 mt-2" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" data-toggle="tab" href="#active" role="tab" style="margin-right: 5px"><i class="fa fa-dot-circle-o"></i> Active Reservations</a>
                                            <a class="nav-item nav-link" data-toggle="tab" href="#inactive" role="tab"><i class="fa fa-circle-o"></i> Inactive Reservations</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="active" role="tabpanel">
                                            <div class="content mt-3">
                                                <div class="animated fadeIn">
                                                    <div class="row">                            
                                                        <div class="col-md-12">
                                                            <div class="">
                                                                <div class="card-header">
                                                                    <strong class="card-title">Active Reservations</strong>
                                                                </div>
                                                                <div class="card-body">
                                                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                                        <thead>
                                                                            <tr align="middle">
                                                                                <th>Reservation ID</th>
                                                                                <th>Reservation Date</th>
                                                                                <th>Reservation Time</th>
                                                                                <th>Branch Name</th>
                                                                                <th>Date Sent</th>
                                                                                <th>Tools</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                                if($reserve!=NULL) {
                                                                                    foreach($reserve as $val) { 
                                                                                        if($val->rv_status == 'A'){
                                                                            ?>
                                                                                        <tr align="middle">
                                                                                            <td><?php echo $val->rv_id?></td>
                                                                                            <td><?php echo $val->rv_date?></td>
                                                                                            <td><?php echo $val->rv_time?></td>
                                                                                            <td><?php echo str_replace("’", "'", $val->br_name)?></td>
                                                                                            <td><?php echo $val->rv_created_date?></td>
                                                                                            <td>
                                                                            <?php                 
                                                                                                echo'    
                                                                                                <a href="#" class="btn btn-outline-danger" style="padding: 1px 8px 1px; border-radius:3px;" data-toggle="modal" data-target="#deacclient'.$val->rv_id.'"><i class="fa fa-level-down"></i></a>';
                                                                            ?>
                                                                                                <!-- MODAL FOR RESERVATION DEACTIVATION -->
                                                                            <?php
                                                                                                echo'
                                                                                                <div class="modal fade" id="deacclient'.$val->rv_id.'" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                                                                                    <div class="modal-dialog modal-sm" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title" id="smallmodalLabel">Confirm Deactivation</h5>
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body">
                                                                                                                <p align="middle">
                                                                                                                    Please Confirm Client Deactivation
                                                                                                                </p>
                                                                                                            </div>';?>
                                                                                                            <div class="modal-footer">
                                                                                                                <a href="<?php echo base_url('admin_delete_creservation'.'?id='.$val->rv_id);?>" class="btn btn-primary">Confirm</a>
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>  
                                                                            <?php
                                                                                        }
                                                                                    }
                                                                                } 
                                                                                else {
                                                                                    //change this line into pop-up/error message
                                                                                }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="inactive" role="tabpanel">
                                            <div class="content mt-3">
                                                <div class="animated fadeIn">
                                                    <div class="row">                            
                                                        <div class="col-md-12">
                                                            <div class="">
                                                                <div class="card-header">
                                                                    <strong class="card-title">Inactive Reservations</strong>
                                                                </div>
                                                                <div class="card-body">
                                                                    <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                                                                        <thead>
                                                                            <tr align="middle">
                                                                                <th>Reservation ID</th>
                                                                                <th>Reservation Date</th>
                                                                                <th>Reservation Time</th>
                                                                                <th>Branch Name</th>
                                                                                <th>Date Sent</th>
                                                                                <th>Tools</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                                if($reserve!=NULL) {
                                                                                    foreach($reserve as $val) { 
                                                                                        if($val->rv_status == 'I'){
                                                                            ?>
                                                                                        <tr align="middle">
                                                                                            <td><?php echo $val->rv_id?></td>
                                                                                            <td><?php echo $val->rv_date?></td>
                                                                                            <td><?php echo $val->rv_time?></td>
                                                                                            <td><?php echo str_replace("’", "'", $val->br_name)?></td>
                                                                                            <td><?php echo $val->rv_created_date?></td>
                                                                                            <td>
                                                                            <?php                 
                                                                                                echo'    
                                                                                                <a href="#" class="btn btn-outline-success" style="padding: 1px 8px 1px; border-radius:3px;" data-toggle="modal" data-target="#acreserve'.$val->rv_id.'"><i class="fa fa-level-up"></i></a>';
                                                                            ?>
                                                                                                <!-- MODAL FOR RESERVATION ACTIVATION -->
                                                                            <?php
                                                                                                echo'
                                                                                               
                                                                                                <div class="modal fade" id="acreserve'.$val->rv_id.'" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                                                                                    <div class="modal-dialog modal-sm" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title" id="smallmodalLabel">Confirm Activation</h5>
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body">
                                                                                                                <p align="middle">
                                                                                                                    Please Confirm Reservation Activation
                                                                                                                </p>
                                                                                                            </div>';?>
                                                                                                            <div class="modal-footer">
                                                                                                                <a href="<?php echo base_url('admin_activate_creservation'.'?id='.$val->rv_id);?>" class="btn btn-primary">Confirm</a>
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>  
                                                                            <?php
                                                                                        }
                                                                                    }
                                                                                } 
                                                                                else {
                                                                                    //change this line into pop-up/error message
                                                                                }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>