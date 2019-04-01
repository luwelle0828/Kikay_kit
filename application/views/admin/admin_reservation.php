
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Reservations</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="default-tab">
            <div class="content mt-3">
                <nav>
                    <div class="nav nav-pills mb-3 mt-2" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#pending-reserve" role="tab" style="margin-right: 5px"><i class="fa fa-dot-circle-o"></i> Pending Reservations</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#paid-reserve" role="tab" style="margin-right: 5px"><i class="fa fa-circle-o"></i> Paid Reservations</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#cancelled-reserve" role="tab"><i class="fa fa-circle-o"></i> Cancelled Reservations</a>
                    </div>
                </nav>
            </div>
            
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="pending-reserve" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="content mt-3">
                        <div class="row">                            
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Pending Reservations</strong>
                                    </div>
                                    <div class="card-body">
                                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr align="middle">
                                                    <th>Reservation ID</th>
                                                    <th>Customer Name</th>
                                                    <th>Branch Name</th>
                                                    <th>Created Date</th>
                                                    <th>Tools</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if($reserve!=NULL){
                                                        foreach($reserve as $val){
                                                            if($val->rv_status == 'Pending'){
                                                                
                                                    ?>
                                                                <tr align="middle">
                                                                    <td><?php echo $val->rv_code?></td>
                                                                    <td><?php echo $val->cs_fname." ".$val->cs_lname?></td>
                                                                    <td><?php echo $val->br_name?></td>
                                                                    <td><?php echo $val->rv_created_date?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('admin_view_reservation'.'?id='.$val->rv_id);?>" class="btn btn-outline-info" style="padding: 2px 5px 2px; border-radius:3px;"><i class="fa fa-eye"></i> View</a>
                                                                        <button value="<?php echo $val->rv_id?>" class="btn btn-outline-danger" style="padding: 2px 8px 2px; border-radius:3px;" data-toggle="modal" data-target="#cancel-reserve"><i class="fa fa-level-down"></i> Cancel</button>
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
                </div>
                <div class="tab-pane fade" id="paid-reserve" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="content mt-3">
                        <div class="row">                            
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Pending Reservations</strong>
                                    </div>
                                    <div class="card-body">
                                        <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                                            <thead>
                                                <tr align="middle">
                                                    <th>Reservation ID</th>
                                                    <th>Customer Name</th>
                                                    <th>Branch Name</th>
                                                    <th>Created Date</th>
                                                    <th>Tools</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if($reserve!=NULL){
                                                        foreach($reserve as $val){
                                                            if($val->rv_status == 'Paid'){
                                                                
                                                    ?>
                                                                <tr align="middle">
                                                                    <td><?php echo $val->rv_code?></td>
                                                                    <td><?php echo $val->cs_fname." ".$val->cs_lname?></td>
                                                                    <td><?php echo $val->br_name?></td>
                                                                    <td><?php echo $val->rv_created_date?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('admin_view_reservation'.'?id='.$val->rv_id);?>" class="btn btn-outline-info" style="padding: 2px 5px 2px; border-radius:3px;"><i class="fa fa-eye"></i> View</a>
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
                </div>
                <div class="tab-pane fade" id="cancelled-reserve" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="content mt-3">
                        <div class="row">                            
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Cancelled Reservations</strong>
                                    </div>
                                    <div class="card-body">
                                        <table id="bootstrap-data-table3" class="table table-striped table-bordered">
                                            <thead>
                                                <tr align="middle">
                                                    <th>Reservation ID</th>
                                                    <th>Customer Name</th>
                                                    <th>Branch Name</th>
                                                    <th>Created Date</th>
                                                    <th>Tools</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if($reserve!=NULL){
                                                        foreach($reserve as $val){
                                                            if($val->rv_status == 'Cancelled'){
                                                                
                                                    ?>
                                                                <tr align="middle">
                                                                    <td><?php echo $val->rv_code?></td>
                                                                    <td><?php echo $val->cs_fname." ".$val->cs_lname?></td>
                                                                    <td><?php echo $val->br_name?></td>
                                                                    <td><?php echo $val->rv_created_date?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('admin_view_reservation'.'?id='.$val->rv_id);?>" class="btn btn-outline-info" style="padding: 2px 5px 2px; border-radius:3px;"><i class="fa fa-eye"></i></a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CANCEL RESERVATION MODAL -->
    <div class="modal fade" id="cancel-reserve" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
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
                        Please Confirm To Cancel Reservation
                    </p>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url('admin_delete_reservation'.'?id='.$val->rv_id);?>" class="btn btn-primary">Confirm</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>