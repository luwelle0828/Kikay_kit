
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo $reserve[0]->rv_no?></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="default-tab">
            <div class="content mt-3">
                <div class="row">                            
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Information</strong>
                            </div>
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label"><b>Reservation No.: </b></label></div>
                                    <div class="col-12 col-md-10"><label><?php echo $reserve[0]->rv_no?></label></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label"><b>Customer Name: </b></label></div>
                                    <div class="col-12 col-md-10"><label><?php echo $reserve[0]->cs_fname." ".$reserve[0]->cs_lname?></label></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label"><b>Branch Name: </b></label></div>
                                    <div class="col-12 col-md-10"><label><?php echo $reserve[0]->br_name?></label></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label"><b>Date Reserved: </b></label></div>
                                    <div class="col-12 col-md-10"><label><?php echo $reserve[0]->rv_date?></label></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label"><b>Time Reserved: </b></label></div>
                                    <div class="col-12 col-md-10"><label><?php echo $reserve[0]->rv_time?></label></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label"><b>Created Date: </b></label></div>
                                    <div class="col-12 col-md-10"><label><?php echo $reserve[0]->rv_created_date?></label></div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="trigger">
                                <strong class="card-title">Reservation Details</strong>
                            </div>
                            <div class="card-body" id="collapse">
                                <div class="panel-body">
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label class=" form-control-label"><b><i>Services Availed </i></b></label></div>
                                    </div>
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr align="middle">
                                                <td>Service Name</td>
                                                <td>Service Price</td>
                                                <td>Service Duration</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            $refund = 0;
                                            if($service!=NULL) {
                                                foreach($service as $val) {
                                                    if($val->as_status == "A" && $val->sv_status =="A"){
                                                        $total += $val->as_price;   
                                                ?>
                                                        <tr align="middle">
                                                            <td><?php echo $val->sv_name?></td>
                                                            <td><?php echo $val->as_price?></td>
                                                            <td><?php echo $val->as_duration?></td>
                                                        </tr>
                                                <?php
                                                    }
                                                    else{
                                                        $refund += $val->as_price //change to sv_price
                                                    ?>
                                                        <tr align="middle">
                                                            <td><?php echo $val->sv_name."Not Available"?></td>
                                                            <td><?php echo '0'?></td>
                                                        </tr>
                                                <?php   }
                                                }
                                            }
                                            else {
                                                echo 'NO  DATA FOUND';
                                            }   
                                            ?>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label class=" form-control-label"><b><i>Total & Refunds </i></b></label></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label class=" form-control-label"><b>Total </b></label></div>
                                        <div class="col-12 col-md-10"><label><?php echo $total?></label></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label class=" form-control-label"><b>Refund </b></label></div>
                                        <div class="col-12 col-md-10"><label><?php echo $refund?></label></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>