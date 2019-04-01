
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo $branch[0]->br_name?></h1>
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
                            <?php
                                $day = array("Sunday","Monday","Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
                                $day_arr = explode(",",$branch[0]->br_days);
                            ?>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class="form-control-label"><b>Branch Image: </b></label></div>
                                <div class="col-12 col-md-10"><img id="branch-img" src="./assets/images/branch-images/<?php echo $branch[0]->br_image?>" alt="branch image" height="200" width="300" style="border: gray; border-style: solid;" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class="form-control-label"><b>Branch Name: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $branch[0]->br_name?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class="form-control-label"><b>Branch Location: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $branch[0]->br_location?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class="form-control-label"><b>Mobile Number: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $branch[0]->br_mobile?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class="form-control-label"><b>Telephone Number: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $branch[0]->br_telephone?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class="form-control-label"><b>Open Days: </b></label></div>
                                <div class="col-12 col-md-10">
                                    <?php 
                                    foreach($day_arr as $index=>$days){
                                        if($index==(count($day_arr)-1)){
                                            echo '<span>'.$day[($days-1)].'</span>';
                                        }
                                        else{
                                            echo '<span>'.$day[($days-1)].", ".'</span>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class="form-control-label"><b>Business Hours: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $branch[0]->br_opening." - ".$branch[0]->br_closing?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class="form-control-label"><b>Reservation Slots: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $branch[0]->br_slots?></label></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="trigger">
                            <strong>Available Services</strong>
                        </div>
                        <div id="collapse">
                            <div class="animated fadeIn">
                            <div class="card-body">
                                <table id="service-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr align="middle">
                                            <th>Service Name</th>
                                            <th>Service Price</th>
                                            <th>Service Duration</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($avail as $val){ 
                                                if($val->as_status == 'A' && $val->sv_status == 'A'){   ?>
                                                <tr align="middle">
                                                    <td><?php echo str_replace("’", "'", $val->sv_name)?></td>
                                                    <td><?php echo $val->as_price?></td>
                                                    <td><?php echo $val->as_duration?></td>
                                                </tr>
                                        <?php
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