
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
                    <a class="nav-item nav-link active" data-toggle="tab" href="#active" role="tab" style="margin-right: 5px"><i class="fa fa-dot-circle-o"></i> Pending Reservations</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#inactive" role="tab"><i class="fa fa-circle-o"></i> Cancelled Reservations</a>
                </div>
            </nav>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="active" role="tabpanel">
                <div class="content mt-3">
                    <div class="row">                            
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Pending Reservations</strong>
                            </div>
                            <div class="card-body">
                            <div class="panel-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr align="middle">
                                            <th>Reservation ID</th>
                                            <th>Branch Name</th>
                                            <th>Customer Name</th>
                                            <th>Date</th>
                                            <th>Time</th>
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
                                                        <!-- <td><?php echo str_replace("’", "'", $val->cm_company)?></td> -->
                                                        <td><?php echo $val->rv_no ?></td>
                                                        <td><?php echo $val->br_name?></td>
                                                        <td><?php echo $val->cs_fname." ".$val->cs_lname?></td>
                                                        <td><?php echo $val->rv_date?></td>
                                                        <td><?php echo $val->rv_time?></td>
                                                        <td><?php echo $val->rv_created_date?></td>
                                                        <td>
                                                            <a href="<?php echo base_url('client_view_reservation'.'?id='.$val->rv_id);?>" class="btn btn-outline-info" style="padding: 2px 5px 2px; border-radius:3px;"><i class="fa fa-eye"></i> View</a>
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
            </div>
            <div class="tab-pane fade" id="inactive" role="tabpanel">
                <div class="content mt-3">
                    <div class="row">                            
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Cancelled Reservations</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr align="middle">
                                            <th>Reservation ID</th>
                                            <th>Branch Name</th>
                                            <th>Customer Name</th>
                                            <th>Date</th>
                                            <th>Time</th>
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
                                                        <td><?php echo $val->rv_no ?></td>
                                                        <td><?php echo $val->br_name?></td>
                                                        <td><?php echo $val->cs_fname." ".$val->cs_lname?></td>
                                                        <td><?php echo $val->rv_date?></td>
                                                        <td><?php echo $val->rv_time?></td>
                                                        <td><?php echo $val->rv_created_date?></td>
                                                        <td>
                                                            <a href="<?php echo base_url('client_view_reservation'.'?id='.$val->rv_id);?>" class="btn btn-outline-info" style="padding: 2px 5px 2px; border-radius:3px;"><i class="fa fa-eye"></i></a>
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
        </div>
    </div>