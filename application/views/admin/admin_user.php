    
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Users</h1>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="user-list" class="content mt-3">
            <div class="row">                            
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr align="middle">
                                        <th>User ID</th>
                                        <th>Username</th>
                                        <th>User Type</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if($user!=NULL){
                                            foreach($user as $val){       
                                        ?>
                                                    <tr align="middle">
                                                        <td><?php echo $val->u_id?></td>
                                                        <td><?php echo $val->u_user?></td>
                                                        <td><?php echo $val->ut_type?></td>
                                                        <td><?php echo $val->u_status?></td>
                                                        <td><?php echo $val->u_created_date?></td>
                                                        <td>
                                                            <button value="<?php echo $val->u_id?>" class="btn btn-outline-warning" style="padding: 2px 6px 2px; border-radius: 3px;" data-toggle="modal" data-target="#update-user"><i class="fa fa-pencil"></i> Update</button>
                                                                 
                                        <?php              
                                                        if ($val->ut_type!= "admin") { 
                                                            if($val->u_status == 'A'){   
                                                            echo'    
                                                            <button value="'.$val->u_id.'" class="btn btn-outline-danger" style="padding: 2px 8px 2px; border-radius:3px;" data-toggle="modal" data-target="#deact-user"><i class="fa fa-level-down"></i> Deactivate</button>';
                                            ?>                                        
                                            <?php           }
                                                            else {   ?>
                                            <?php                 
                                                                echo'    
                                                                <button value="'.$val->u_id.'" class="btn btn-outline-success" style="padding: 2px 8px 2px; border-radius:3px;" data-toggle="modal" data-target="#act-user"><i class="fa fa-level-up"></i> &nbsp&nbspActivate&nbsp&nbsp</button>';                  
                                                           }
                                                        }
                                            ?>
                                                        </td>
                                                    </tr>
                                        <?php 
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

    <!-- UPDATE USER MODAL -->
    <div class="modal fade" id="update-user" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document"> 
            <div class="modal-content">
                <div class="card" align="left">
                    <div class="card-header">
                        <strong>Update Information</strong>
                    </div>
                    <div class="card-body card-block">
                        <form id="login" action="" method="post" enctype="multipart/form-data" class="form-horizontal">                                  
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Username</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="username" class="form-control" value="" required></div>
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

    <!-- DEACTIVATE USER MODAL -->
    <div class="modal fade" id="deact-user" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
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
                        Please Confirm User Deactivation
                    </p>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url('admin_delete_user'.'?id='.$val->u_id);?>" class="btn btn-primary">Confirm</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>  

    <!-- ACTIVATE USER MODAL -->
    <div class="modal fade" id="act-user" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
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
                        Please Confirm User Activation
                    </p>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url('admin_activate_user'.'?id='.$val->u_id);?>" class="btn btn-primary">Confirm</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>   