
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Information</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="row">                   
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php
                                $day = array("Sunday","Monday","Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
                                $day_arr = explode(",",$info[0]->br_days);
                            ?>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class="form-control-label"><b>Branch Image: </b></label></div>
                                <div class="col-12 col-md-10">
                                    <img id="branch-img" src="./assets/images/branch-images/<?php echo $info[0]->br_image?>" alt="branch image" height="200" width="300" style="border: gray; border-style: solid;" />
                                    <br>
                                    <button id="info-image-btn" class="btn btn-warning" style="margin-top: 10px; border-radius:3px; margin-right: 5px" data-toggle="modal" data-target="#update-branch-image"><i class="fa fa-pencil"></i> Update Image</a>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class="form-control-label"><b>Branch Name: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $info[0]->br_name?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class="form-control-label"><b>Branch Location: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $info[0]->br_location?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class="form-control-label"><b>Mobile Number: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $info[0]->br_mobile?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class="form-control-label"><b>Telephone Number: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $info[0]->br_telephone?></label></div>
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
                                <div class="col-12 col-md-10"><label><?php echo $info[0]->br_opening.' - '.$info[0]->br_closing?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class="form-control-label"><b>Reservation Slots: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $info[0]->br_slots?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <button id="update-info-btn" class="btn btn-warning" style="border-radius:3px; margin-right: 5px" data-toggle="modal" data-target="#update-info" ><i class="fa fa-pencil"></i> Edit Information</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="update-info" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="card" align="left">
                        <div class="card-header">
                            <strong>Update Information</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php echo base_url('branch_update_info'.'?id='.$info[0]->br_id); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class="form-control-label">Branch Name</label></div>
                                    <div class="col-md-2"><input type="text" name="name_pre" class="form-control" style="width:115px;" value="" readonly required></div>
                                    <div class="col-md-7"><input type="text" name="name" class="form-control" value="" required></div>
                                </div>                                               
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class="form-control-label">Location</label></div>
                                    <div class="col-12 col-md-9"><input type="text" name="location" class="form-control" value="<?php echo $info[0]->br_location?>" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class="form-control-label">Mobile No.</label></div>
                                    <div class="col-12 col-md-9"><input type="text" name="mobile" class="form-control" value="<?php echo $info[0]->br_mobile?>" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class="form-control-label">Telephone No.</label></div>
                                    <div class="col-12 col-md-9"><input type="text" name="telephone" class="form-control" value="<?php echo $info[0]->br_telephone?>" required></div>
                                </div>
                                <?php
                                    $day = array("Sunday","Monday","Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
                                    $day_arr = explode(",",$info[0]->br_days);
                                ?>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Open Days</label></div>
                                    <div class="col col-md-9">  
                                        <div class="form-check">
                                            <div class="checkbox">
                                            <?php
                                                for($i=0;$i<count($day);$i++)
                                                {
                                                    if(in_array(($i+1), $day_arr)){
                                                    echo'
                                                        <div class="checkbox">
                                                            <label for="checkbox1" class="form-check-label ">
                                                                <input type="checkbox" name="days[]" value="'.($i+1).'" class="form-check-input" checked>'.$day[$i].'
                                                            </label>
                                                        </div>';
                                                    }
                                                    else{
                                                    echo'
                                                        <div class="checkbox">
                                                            <label for="checkbox1" class="form-check-label ">
                                                                <input type="checkbox" name="days[]" value="'.($i+1).'" class="form-check-input">'.$day[$i].'
                                                            </label>
                                                        </div>';
                                                    }
                                                }
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Opening Time</label></div>
                                    <div class="col col-md-9">
                                        <div class="input-group date" id="open-time">
                                            <input type="text" name="ot_time" class="form-control" value="<?php echo $info[0]->br_opening?>" required />
                                            <span class="input-group-addon" style="cursor:pointer">
                                                <span class="fa fa-clock-o"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Closing Time</label></div>
                                    <div class="col col-md-9">
                                        <div class="input-group date" id="close-time">
                                            <input type="text" name="ct_time" class="form-control" value="<?php echo $info[0]->br_closing?>" required />
                                            <span class="input-group-addon" style="cursor:pointer">
                                                <span class="fa fa-clock-o"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class="form-control-label">Reservation Slots: </label></div>
                                    <div class="col-12 col-md-9"><input type="number" name="slots" class="form-control numbersOnly" value="" required></div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Update
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                                    <i class="fa fa-ban"></i> Cancel
                                </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  

    <!-- MODAL FOR IMAGE UPDATE -->

    <div class="modal fade" id="update-branch-image" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="card" align="left">
                    <div class="card-header">
                        <strong>Update Image</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col-12 col-md-12 offset-md-2">
                                <img id="new-image" src="./assets/images/branch-images/<?php echo $info[0]->br_image?>" alt="branch image" height="200" width="300" style="border: gray; border-style: solid;"/>  
                            </div>
                            <div class="col-12 col-md-12 offset-md-2 upload-btn-wrapper">
                                <button class="btn btn-secondary btn-sm" style="margin-top: 10px">Upload Image</button>
                                <form action="client_controller/branch_upload" method="post" enctype="multipart/form-data">
                                    <input type="file" class="fileToUpload image-upload" name="image" accept="image/gif, image/jpeg, image/png"/>
                            </div>
                            <br>
                        </div>
                        <input type="hidden" class="form-control  input-sm" id="txtpicturepath" name="txtpicturepath">
                        <input type="hidden" class="form-control  input-sm" id="txtimage" name="txtimage">
                        <button type="submit" class="btn btn-primary btn-sm image-update" name="submit" disabled>
                            <i class="fa fa-dot-circle-o"></i> Update
                        </button>
                        </form>
                        <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                            <i class="fa fa-ban"></i> Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>