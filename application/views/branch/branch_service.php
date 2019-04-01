
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Services</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="default-tab">
            <div class="content mt-3">
                <nav>
                    <div class="nav nav-pills mb-3 mt-2" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#active-service" role="tab" style="margin-right: 5px"><i class="fa fa-dot-circle-o"></i> Active Services</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#inactive-service" role="tab"><i class="fa fa-circle-o"></i> Inactive Services</a>
                    </div>
                </nav>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="active-service" role="tabpanel">
                    <div class="content mt-3">
                        <div class="row">                            
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Active Services</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="panel-body">
                                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr align="middle">
                                                        <th>Service Name</th>
                                                        <th>Suggested Price</th>
                                                        <th>Suggested Duration</th>
                                                        <th>Service Price</th>
                                                        <th>Service Duration</th>
                                                        <th>Tools</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if($avail!=NULL){
                                                            foreach($avail as $val){
                                                                if($val->as_status == 'A'){
                                                                    
                                                        ?>
                                                                    <tr align="middle">
                                                                        <td><?php echo $val->sv_name?></td>
                                                                        <td><?php echo $val->sv_price?></td>
                                                                        <td><?php echo $val->sv_estimated?></td>
                                                                        <td><?php echo $val->as_price?></td>
                                                                        <td><?php echo $val->as_duration?></td>
                                                                        <td>
                                                                            <button value="<?php echo $val->as_id?>" class="btn btn-outline-warning" style="padding: 2px 6px 2px; border-radius: 3px;" data-toggle="modal" data-target="#update-service"><i class="fa fa-pencil"></i> Update</button>
                                                                            <button value="<?php echo $val->as_id?>" class="btn btn-outline-danger" style="padding: 2px 8px 2px; border-radius:3px;" data-toggle="modal" data-target="#deact-service"><i class="fa fa-level-down"></i> Deactivate</button>
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
                
                <div class="tab-pane fade" id="inactive-service" role="tabpanel">
                    <div class="content mt-3">
                        <div class="row">                            
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Inactive Services</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="panel-body">
                                            <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr align="middle">
                                                        <th>Service Name</th>
                                                        <th>Suggested Price</th>
                                                        <th>Suggested Duration</th>
                                                        <th>Service Price</th>
                                                        <th>Service Duration</th>
                                                        <th>Tools</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if($avail!=NULL){
                                                            foreach($avail as $val){
                                                                if($val->as_status == 'I'){
                                                    ?>
                                                                    <tr align="middle">
                                                                        <td><?php echo $val->sv_name?></td> 
                                                                        <td><?php echo $val->sv_price?></td>
                                                                        <td><?php echo $val->sv_estimated?></td>
                                                                        <td><?php echo $val->as_price?></td>
                                                                        <td><?php echo $val->as_duration?></td>
                                                                        <td>
                                                                        <button value="<?php echo $val->as_id?>" class="btn btn-outline-warning" style="padding: 2px 6px 2px; border-radius: 3px;" data-toggle="modal" data-target="#update-service"><i class="fa fa-pencil"></i> Update</button>
                                                                        
                                                    <?php           if($val->as_price != NULL && $val->as_duration != NULL ){
                                                    ?> 
                                                                        <button value="<?php echo $val->as_id?>" class="btn btn-outline-success" style="padding: 2px 8px 2px; border-radius:3px;" data-toggle="modal" data-target="#act-service"><i class="fa fa-level-up"></i> Activate</button>
                                                                             
                                                        <?php           }
                                                        ?>
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
        </div>
    </div>



    <div class="modal fade" id="update-service" tabindex="-1" role="dialog" aria-hidden="true">
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
                                </div>
                            </div>                      
                           <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Service Name: </label></div>
                                <div class="col-12 col-md-9"><label id="name"></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Suggested Price: </label></div>
                                <div class="col-12 col-md-9"><label id="sg_price"></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Suggested Duration: </label></div>
                                <div class="col-12 col-md-9"><label id="sg_duration"></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Service Price</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="price" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Service Duration</label></div>
                                <div class="col col-md-9">
                                    <div class="input-group date" id="service-time">
                                        <input type="text" name="duration" class="form-control" value="" required />
                                        <span class="input-group-addon" style="cursor:pointer">
                                            <span class="fa fa-clock-o"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Update
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


    <div class="modal fade" id="deact-service" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
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
                        Please Confirm Service Deactivation
                    </p>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-primary">Confirm</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="act-service" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
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
                        Please Confirm Service Activation
                    </p>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-primary">Confirm</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>    