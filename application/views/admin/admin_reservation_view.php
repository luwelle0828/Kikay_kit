
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo $reserve[0]->rv_no?></h1>
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
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="trigger">
                            <strong>Services Reserved</strong>
                        </div>
                        <div id="collapse">
                            <div class="animated fadeIn">
                                <div class="card-body">
                                    <table id="service-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr align="middle">
                                                <th>Service Name</th>
                                                <th>Price</th>
                                                <th>Duration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($rservice as $val){ ?>
                                                    <tr align="middle">
                                                        <td><?php echo str_replace("’", "'", $val->sv_name)?></td>
                                                        <td><?php echo $val->as_price?></td>
                                                        <td><?php echo $val->as_duration?></td>
                                                    </tr>
                                            <?php
                                                } ?>
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