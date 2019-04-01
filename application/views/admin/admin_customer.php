
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Customers</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="default-tab">
            <div class="content mt-3">
                <nav>
                    <div class="nav nav-pills mb-3 mt-2" id="nav-tab" role="tablist">
                        <a href="#" class="btn btn-success" style="border-radius:3px; margin-right: 5px" data-toggle="modal" data-target="#add-customer" ><i class="fa fa-plus-circle"></i> Add Customer</a>
                        <a class="nav-item nav-link active" data-toggle="tab" href="#active-customer" role="tab" style="margin-right: 5px"><i class="fa fa-dot-circle-o"></i> Active Customers</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#inactive-customer" role="tab"><i class="fa fa-circle-o"></i> Inactive Customers</a>
                    </div>
                </nav>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="active-customer" role="tabpanel">
                    <div class="content mt-3">
                        <div class="row">                            
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Active Customers</strong>
                                    </div>
                                    <div class="card-body">
                                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr align="middle">
                                                    <th>Customer ID</th>
                                                    <th>Customer Name</th>
                                                    <th>Created Date</th>
                                                    <th>Tools</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if($customer!=NULL){
                                                        foreach($customer as $val){
                                                            if($val->u_status == 'A'){
                                                                
                                                    ?>
                                                                <tr align="middle">
                                                                    <td><?php echo $val->cs_code?></td>
                                                                    <td><?php echo $val->cs_fname." ".$val->cs_lname?></td>
                                                                    <td><?php echo $val->u_created_date?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('admin_view_customer'.'?id='.$val->cs_id);?>" class="btn btn-outline-info" style="padding: 2px 5px 2px; border-radius:3px;"><i class="fa fa-eye"></i> View</a>
                                                                        <button value="<?php echo $val->cs_id?>" class="btn btn-outline-warning" style="padding: 2px 6px 2px; border-radius: 3px;" data-toggle="modal" data-target="#update-customer"><i class="fa fa-pencil"></i> Update</button>
                                                                        <button value="<?php echo $val->cs_id?>" class="btn btn-outline-danger" style="padding: 2px 8px 2px; border-radius:3px;" data-toggle="modal" data-target="#deact-customer"><i class="fa fa-level-down"></i> Deactivate</button>
                                                                        
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
                <div class="tab-pane fade" id="inactive-customer" role="tabpanel">
                    <div class="content mt-3">
                        <div class="row">                            
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Inactive Customers</strong>
                                    </div>
                                    <div class="card-body">
                                        <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                                            <thead>
                                                <tr align="middle">
                                                    <th>Customer ID</th>
                                                    <th>Customer Name</th>
                                                    <th>Created Date</th>
                                                    <th>Tools</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php
                                                    if($customer!=NULL){
                                                        foreach($customer as $val){
                                                            if($val->u_status == 'I'){
                                                                
                                                    ?>
                                                                <tr align="middle">
                                                                    <td><?php echo $val->cs_code?></td>
                                                                    <td><?php echo $val->cs_fname." ".$val->cs_lname?></td>
                                                                    <td><?php echo $val->u_created_date?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('admin_view_customer'.'?id='.$val->cs_id);?>" class="btn btn-outline-info" style="padding: 1px 5px 1px; border-radius:3px;"><i class="fa fa-eye"></i> View</a>
                                                                        <button value="<?php echo $val->cs_id?>" class="btn btn-outline-warning" style="padding: 2px 6px 2px; border-radius: 3px;" data-toggle="modal" data-target="#update-customer"><i class="fa fa-pencil"></i> Update</button>
                                                                        <button value="<?php echo $val->cs_id?>" class="btn btn-outline-success" style="padding: 1px 8px 1px; border-radius:3px;" data-toggle="modal" data-target="#act-customer"><i class="fa fa-level-up"></i> Activate</button>
                                                
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

    <!-- MODAL FOR ADD CUSTOMER BUTTON -->

    <div class="modal fade" id="add-customer" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        <strong>Add Customer</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="<?php echo base_url('admin_add_customer'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                                <div class="col col-md-3"><label class="form-control-label">First Name</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="firstname" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Last Name</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="lastname" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Address</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="address" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Contact No.</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="contact" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Gender</label></div>
                                <div class="col-12 col-md-9">
                                    <select id="comp" name="gender" class="form-control">
                                        <option selected hidden>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
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

    <!-- UPDATE CUSTOMER MODAL -->

    <div class="modal fade" id="update-customer" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card" align="left">
                    <div class="card-header">
                        <strong>Update Information</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">                                           
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">First Name</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="firstname" class="form-control" value="'.$val->cs_fname.'" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Last Name</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="lastname" class="form-control" value="'.$val->cs_lname.'" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Address</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="address" class="form-control" value="'.$val->cs_address.'" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Contact</label></div>
                                <div class="col-12 col-md-9"><input type="text" name="contact" class="form-control" value="'.$val->cs_contact.'" required></div>
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


    <div class="modal fade" id="deact-customer" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
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
                        Please Confirm Customer Deactivation
                    </p>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-primary">Confirm</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="act-customer" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
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
                        Please Confirm Customer Activation
                    </p>
                </div>                
                <div class="modal-footer">
                    <a href="" class="btn btn-primary">Confirm</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>