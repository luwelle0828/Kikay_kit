
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Branches</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="default-tab">
            <div class="content mt-3">
                <nav>
                    <div class="nav nav-pills mb-3 mt-2" id="nav-tab" role="tablist">
                        <a href="#" class="btn btn-success" style="border-radius:3px; margin-right: 5px" data-toggle="modal" data-target="#add-branch" ><i class="fa fa-plus-circle"></i> Add Branch</a>
                        <a class="nav-item nav-link active" data-toggle="tab" href="#active-branch" role="tab" style="margin-right: 5px"><i class="fa fa-dot-circle-o"></i> Active Branches</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#inactive-branch" role="tab"><i class="fa fa-circle-o"></i> Inactive Branches</a>
                    </div>
                </nav>      
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="active-branch" role="tabpanel">
                    <div class="content mt-3">
                        <div class="row">                            
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Active Branches</strong>
                                    </div>
                                    <div class="card-body">
                                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr align="middle">
                                                    <th>Branch ID</th>
                                                    <th>Branch Name</th>
                                                    <th>Branch Location</th>
                                                    <th>Created Date</th>
                                                    <th>Tools</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if($branch!=NULL){
                                                    foreach($branch as $val){
                                                        if($val->u_status == 'A'){
                                                            
                                                ?>
                                                            <tr align="middle">
                                                                <td><?php echo $val->br_code?></td>
                                                                <td><?php echo $val->br_name?></td>
                                                                <td><?php echo $val->br_location?></td>
                                                                <td><?php echo $val->u_created_date?></td>
                                                                <td>
                                                                    <a href="<?php echo base_url('admin_view_branch'.'?id='.$val->br_id);?>" class="btn btn-outline-info" style="padding: 2px 5px 2px; border-radius:3px;"><i class="fa fa-eye"></i> View</a>
                                                                    <button value="<?php echo $val->br_id?>" class="btn btn-outline-warning" style="padding: 2px 6px 2px; border-radius: 3px;" data-toggle="modal" data-target="#update-branch"><i class="fa fa-pencil"></i> Update</button>  
                                                                    <button value="<?php echo $val->br_id?>" class="btn btn-outline-danger" style="padding: 2px 8px 2px; border-radius:3px;" data-toggle="modal" data-target="#deact-branch"><i class="fa fa-level-down"></i> Deactivate</button>      
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
                <div class="tab-pane fade" id="inactive-branch" role="tabpanel">
                    <div class="content mt-3">
                        <div class="row">                            
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Inactive Branches</strong>
                                    </div>
                                    <div class="card-body">
                                        <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                                            <thead>
                                                <tr align="middle">
                                                    <th>Branch ID</th>
                                                    <th>Branch Name</th>
                                                    <th>Branch Location</th>
                                                    <th>Created Date</th>
                                                    <th>Tools</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if($branch!=NULL){
                                                        foreach($branch as $val){
                                                            if($val->u_status == 'I'){
                                                                
                                                ?>
                                                                <tr align="middle">
                                                                    <td><?php echo $val->br_code?></td>
                                                                    <td><?php echo $val->br_name?></td>
                                                                    <td><?php echo $val->br_location?></td>
                                                                    <td><?php echo $val->u_created_date?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('admin_view_branch'.'?id='.$val->br_id);?>" class="btn btn-outline-info" style="padding: 2px 5px 2px; border-radius:3px;"><i class="fa fa-eye"></i> View</a>
                                                                        <button value="<?php echo $val->br_id?>" class="btn btn-outline-warning" style="padding: 2px 6px 2px; border-radius: 3px;" data-toggle="modal" data-target="#update-branch"><i class="fa fa-pencil"></i> Update</button>
                                                                        <button value="<?php echo $val->br_id?>" class="btn btn-outline-success" style="padding: 2px 8px 2px; border-radius:3px;" data-toggle="modal" data-target="#act-branch"><i class="fa fa-level-up"></i> Activate</button>
                                                                       
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

    <!-- MODAL FOR ADD BRANCH BUTTON -->

    <div class="modal fade" id="add-branch" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        <strong>Add Branch</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="<?php echo base_url('admin_add_branch'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Company</label></div>
                                <div class="col-12 col-md-9">
                                    <select id="comp" name="company" class="form-control">
                                        <option value="0" selected hidden>Select Company</option>
                            <?php       foreach($company as $cm){
                                            echo "<option value=".$cm->cm_id.">".$cm->cm_company."</option>";                       
                                        }   
                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Username</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="username" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Password</label></div>
                                <div class="col-12 col-md-9"><input type="password" name="password" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Confirm Password</label></div>
                                <div class="col-12 col-md-9"><input type="password" name="confirmpass" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Branch Name</label></div>
                                <div class="col-md-3"><input type="text" id="comp_input" name="branch_pre" class="form-control" readonly required></div>
                                <div class="col-md-6"><input type="text" name="branch_ex" placeholder="" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Branch Location</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="location" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Mobile No.</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="mobile" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Telephone No.</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="telephone" class="form-control" required></div>
                            </div>
                            <?php
                            $day = array("Sunday","Monday","Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
                            ?>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Open Days</label></div>
                                <div class="col col-md-9">  
                                    <div class="form-check">
                                        <div class="checkbox">
                                        <?php
                                            for($i=0;$i<count($day);$i++)
                                            {
                                        echo    '<div class="checkbox">
                                                    <label for="checkbox1" class="form-check-label ">
                                                        <input type="checkbox" name="days[]" value="'.($i+1).'" class="form-check-input">'.$day[$i].'
                                                    </label>
                                                </div>';
                                            }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Opening Time</label></div>
                                <div class="col col-md-9">
                                    <div class='input-group date' id="open-time">
                                        <input type='text' name='ot_time' class='form-control' required />
                                        <span class='input-group-addon' style="cursor:pointer">
                                            <span class="fa fa-clock-o"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Closing Time</label></div>
                                <div class="col col-md-9">
                                    <div class='input-group date' id="close-time">
                                        <input type='text' name='ct_time' class='form-control' required />
                                        <span class='input-group-addon' style="cursor:pointer">
                                            <span class="fa fa-clock-o"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Confirm
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                                <i class="fa fa-ban"></i> Cancel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  

    <!-- UPDATE BRANCH MODAL -->
    <div class="modal fade" id="update-branch" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card" align="left">
                    <div class="card-header">
                        <strong>Update Information</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">       
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Branch Image</label></div>
                                <div class="col-12 col-md-9 upload-btn-wrapper">
                                    <img id="new-image" src="" alt="branch image" height="200" width="300" style="border: gray; border-style: solid;"/>
                                    <br>
                                    <div class="upload-btn-wrapper">
                                        <button class="btn btn-secondary btn-sm" style="margin-top: 10px">Upload Image</button>
                                        <input type="file" class="fileToUpload" id="image-upload" name="image" accept="image/gif, image/jpeg, image/png"/>
                                    </div>
                                </div>
                            </div>                      
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Branch Name</label></div>
                                <div class="col-md-2"><input type="text" name="branch_pre" class="form-control" style="width:115px;" value="" readonly required></div>
                                <div class="col-md-7"><input type="text" id="" name="branch_ex" class="form-control" value="" required></div>
                            </div>                                           
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Branch Location</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="location" class="form-control" value="" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Mobile No.</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="mobile" class="form-control" value="" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Telephone No.</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="telephone" class="form-control" value="" required></div>
                            </div>
                            <?php
                                $day = array("Sunday","Monday","Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
                            ?>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Open Days</label></div>
                                <div class="col col-md-9">  
                                    <div class="form-check">
                                        <div class="checkbox">
                                        <?php
                                            for($i=0;$i<count($day);$i++)
                                            {
                                                echo'
                                                    <input type="checkbox" name="days[]" value="'.($i+1).'" class="form-check-input">'.$day[$i].'<br>';
                                            }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Opening Time</label></div>
                                <div class="col col-md-9">
                                    <div class="input-group date" id="update-open-time">
                                        <input type="text" name="ot_time" class="form-control" value="" required />
                                        <span class="input-group-addon" style="cursor:pointer">
                                            <span class="fa fa-clock-o"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Closing Time</label></div>
                                <div class="col col-md-9">
                                    <div class="input-group date" id="update-close-time">
                                        <input type="text" name="ct_time" class="form-control" value="" required />
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
                                <i class="fa fa-dot-circle-o"></i> Confirm
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                                <i class="fa fa-ban"></i> Cancel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DEACTIVATE BRANCH MODAL -->
    <div class="modal fade" id="deact-branch" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
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
                        Please Confirm Branch Deactivation
                    </p>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-primary">Confirm</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>         

    <!-- ACTIVATE BRANCH MODAL -->
    <div class="modal fade" id="act-branch" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
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
                        Please Confirm Branch Activation
                    </p>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-primary">Confirm</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>