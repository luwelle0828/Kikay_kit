
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo $company[0]->cm_company?></h1>
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
                                <div class="col col-md-2"><label class="form-control-label"><b>Company Name: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $company[0]->cm_company?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class="form-control-label"><b>Company Description: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $company[0]->cm_description?></label></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="trigger">
                            <strong>Available Services</strong>
                        </div>
                        <div id="collapse">
                            <div class="card-body">
                                <div class="animated fadeIn">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr align="middle">
                                                <th>Service Name</th>
                                                <th>Service Price</th>
                                                <th>Service Duration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($service as $val){         
                                            ?>
                                                    <tr align="middle">
                                                        <td><?php echo $val->sv_name?></td>
                                                        <td><?php echo $val->sv_price?></td>
                                                        <td><?php echo $val->sv_estimated?></td>   
                                                    </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="trigger2">
                            <strong>Branches</strong>
                        </div>
                        <div id="collapse2">
                            <div class="card-body">
                                <div class="default-tab">
                                    <nav>
                                        <div class="nav nav-pills mb-3 mt-2" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" data-toggle="tab" href="#active" role="tab" style="margin-right: 5px"><i class="fa fa-dot-circle-o"></i> Active Branches</a>
                                            <a class="nav-item nav-link" data-toggle="tab" href="#inactive" role="tab"><i class="fa fa-circle-o"></i> Inactive Branches</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="active" role="tabpanel">
                                            <div class="content mt-3">
                                                <div class="animated fadeIn">
                                                    <div class="row">                            
                                                        <div class="col-md-12">
                                                            <div class="">
                                                                <div class="card-header">
                                                                    <strong class="card-title">Active Branches</strong>
                                                                </div>
                                                                <div class="card-body">
                                                                    <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                                                                        <thead>
                                                                            <tr align="middle">
                                                                                <th>Branch ID</th>
                                                                                <th>Branch Name</th>
                                                                                <th>Location</th>
                                                                                <th>Tools</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            foreach($branch as $val){
                                                                                if($val->u_status == 'A'){
                                                                                    
                                                                            ?>
                                                                                    <tr align="middle">
                                                                                        <td><?php echo $val->br_code?></td>
                                                                                        <td><?php echo $val->br_name?></td>
                                                                                        <td><?php echo $val->br_location?></td>
                                                                                        <td>
                                                                                            <a href="<?php echo base_url('admin_view_cbranch'.'?id='.$val->br_id);?>" class="btn btn-outline-info" style="padding: 1px 5px 1px; border-radius:3px;"><i class="fa fa-eye"></i> View</a>
                                                                                        </td>
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

                                        <div class="tab-pane fade" id="inactive" role="tabpanel">
                                            <div class="content mt-3">
                                                <div class="animated fadeIn">
                                                    <div class="row">                            
                                                        <div class="col-md-12">
                                                            <div class="">
                                                                <div class="card-header">
                                                                    <strong class="card-title">Inactive Branches</strong>
                                                                </div>
                                                                <div class="card-body">
                                                                    <table id="bootstrap-data-table3" class="table table-striped table-bordered">
                                                                        <thead>
                                                                            <tr align="middle">
                                                                                <th>Branch ID</th>
                                                                                <th>Branch Name</th>
                                                                                <th>Location</th>
                                                                                <th>Tools</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            foreach($branch as $val){
                                                                                if($val->u_status == 'I'){
                                                                                    
                                                                            ?>
                                                                                    <tr align="middle">
                                                                                        <td><?php echo $val->br_code?></td>
                                                                                        <td><?php echo $val->br_name?></td>
                                                                                        <td><?php echo $val->br_location?></td>
                                                                                        <td>
                                                                                            <a href="<?php echo base_url('admin_view_cbranch'.'?id='.$val->br_id);?>" class="btn btn-outline-info" style="padding: 1px 5px 1px; border-radius:3px;"><i class="fa fa-eye"></i> View</a>
                                                                                        </td>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>