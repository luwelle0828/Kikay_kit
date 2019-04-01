
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Clients</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="default-tab">
            <div class="content mt-3">
                <nav>
                    <div class="nav nav-pills mb-3 mt-2" id="nav-tab" role="tablist">
                        <a href="#" class="btn btn-success" style="border-radius:3px; margin-right: 5px" data-toggle="modal" data-target="#add-client" ><i class="fa fa-plus-circle"></i> Add Client</a>
                        <a class="nav-item nav-link active" data-toggle="tab" href="#active-client" role="tab" style="margin-right: 5px"><i class="fa fa-dot-circle-o"></i> Active Clients</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#inactive-client" role="tab"><i class="fa fa-circle-o"></i> Inactive Clients</a>
                    </div>
                </nav>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="active-client" role="tabpanel">
                    <div class="content mt-3">
                        <div class="row">                            
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Active Clients</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="panel-body">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr align="middle">
                                                        <th>Company ID</th>
                                                        <th>Company Name</th>
                                                        <th>Created Date</th>
                                                        <th>Tools</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="active-client">
                                                    <?php
                                                        if($company!=NULL){
                                                            foreach($company as $val){
                                                                if($val->u_status == 'A'){
                                                                    
                                                        ?>
                                                                    <tr align="middle">
                                                                        <td><?php echo $val->cm_code?></td>
                                                                        <td><?php echo $val->cm_company?></td>
                                                                        <td><?php echo $val->u_created_date?></td>
                                                                        <td>
                                                                            <a href="<?php echo base_url('admin_view_client'.'?id='.$val->cm_id);?>" class="btn btn-outline-info" style="padding: 2px 5px 2px; border-radius:3px;"><i class="fa fa-eye"></i> View</a>
                                                                            <button class="btn btn-outline-warning" value="<?php echo $val->cm_id?>" style="padding: 2px 6px 2px; border-radius: 3px;" data-toggle="modal" data-target="#update-client"><i class="fa fa-pencil"></i> Update</button>
                                                                            <button href="#" class="btn btn-outline-danger" value="<?php echo $val->cm_id?>" style="padding: 2px 8px 2px; border-radius:3px;" data-toggle="modal" data-target="#deact-client"><i class="fa fa-level-down"></i> Deactivate</button>
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
                <div class="tab-pane fade" id="inactive-client" role="tabpanel">
                    <div class="content mt-3">
                        <div class="row">                            
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Inactive Clients</strong>
                                    </div>
                                    <div class="card-body">
                                        <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                                            <thead>
                                                <tr align="middle">
                                                    <th>Company ID</th>
                                                    <th>Company Name</th>
                                                    <th>Created Date</th>
                                                    <th>Tools</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if($company!=NULL){
                                                        foreach($company as $val){
                                                            if($val->u_status == 'I'){
                                                                
                                                ?>
                                                                <tr align="middle">
                                                                    <td><?php echo $val->cm_code?></td>
                                                                    <td><?php echo $val->cm_company?></td>
                                                                    <td><?php echo $val->u_created_date?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('admin_view_client'.'?id='.$val->cm_id);?>" class="btn btn-outline-info" style="padding: 2px 5px 2px; border-radius:3px;"><i class="fa fa-eye"></i> View</a>
                                                                        <button href="#" class="btn btn-outline-warning" value="<?php echo $val->cm_id?>" style="padding: 2px 6px 2px; border-radius: 3px;" data-toggle="modal" data-target="#update-client"><i class="fa fa-pencil"></i> Update</button>
                                                                        <button href="#" class="btn btn-outline-success" value="<?php echo $val->cm_id?>" style="padding: 2px 8px 2px; border-radius:3px;" data-toggle="modal" data-target="#act-client"><i class="fa fa-level-up"></i> Activate</button>
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

    <!-- MODAL FOR ADD CLIENT BUTTON -->

    <div class="modal fade" id="add-client" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        <strong>Add Client</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="<?php echo base_url('admin_add_client'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="" class="form-control-label">Username</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="username" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="" class="form-control-label">Password</label></div>
                                <div class="col-12 col-md-9"><input type="password" name="password" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="" class="form-control-label">Confirm Password</label></div>
                                <div class="col-12 col-md-9"><input type="password" name="confirmpass" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="" class="form-control-label">Company Name</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="company" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="" class="form-control-label">Address</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="address" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="" class="form-control-label">Mobile No.</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="mobile" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="" class="form-control-label">Telephone No.</label></div>
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
                                <div class="col col-md-3"><label class=" form-control-label">Opening Time</label></div>
                                <div class="col col-md-9">
                                    <div class='input-group date' id='open-time'>
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
                                    <div class='input-group date' id='close-time'>
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

    <!-- MODAL FOR UPDATE CLIENT -->
    <div class="modal fade" id="update-client" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card" align="left">
                    <div class="card-header">
                        <strong>Update Information</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="<?php echo base_url('admin_update_client'.'?id='.$val->cm_id);?>" method="post" enctype="multipart/form-data" class="form-horizontal">                                          
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Company Name</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="company" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Company Description</label></div>
                                <div class="col-12 col-md-9"><textarea cols="50" rows="10" name="description" class="form-control" required></textarea></div>
                            </div>
                            <div>
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

    <!-- MODAL FOR DEACTIVATION -->
    <div class="modal fade" id="deact-client" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
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
                </div>
                <div class="modal-footer">
                    <a href="a" class="btn btn-primary btn-sm">Confirm</a>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="act-client" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
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
                        Please Confirm Client Activation
                    </p>
                </div>                <div class="modal-footer">
                    <a href="a" class="btn btn-primary">Confirm</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>