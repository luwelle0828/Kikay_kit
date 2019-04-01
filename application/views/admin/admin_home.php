
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body" id="user_tri">
                            <a href="<?php echo base_url('admin_users');?>">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-user" style="color: #d31f42"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Users</div>
                                    <div class="stat-digit"><?php echo " ".$user[0]->us?></div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div id="user_col">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Active Users</div>
                                        <div class="stat-digit"><?php echo " ".$user_a[0]->us_a?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user text-warning border-warning"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Inactive Users</div>
                                        <div class="stat-digit"><?php echo " ".$user_i[0]->us_i?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body" id="client_tri">
                            <a href="<?php echo base_url('admin_clients');?>">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-world" style="color: #d31f42"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total Clients</div>
                                        <div class="stat-digit"><?php echo " ".$client[0]->cl?></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div id="client_col">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-world text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Active Clients</div>
                                        <div class="stat-digit"><?php echo " ".$client_a[0]->cl_a?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-world text-warning border-warning"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Inactive Clients</div>
                                        <div class="stat-digit"><?php echo " ".$client_i[0]->cl_i?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body" id="branch_tri">
                            <a href="<?php echo base_url('admin_branches');?>">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa fa-sitemap" style="color: #d31f42"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total Branches</div>
                                        <div class="stat-digit"><?php echo " ".$branch[0]->br?></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div id="branch_col">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa fa-sitemap text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Active Branches</div>
                                        <div class="stat-digit"><?php echo " ".$branch_a[0]->br_a?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="fa fa-sitemap text-warning border-warning"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Inactive Branches</div>
                                        <div class="stat-digit"><?php echo " ".$branch_i[0]->br_i?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card" id="customer_tri">
                        <div class="card-body">
                            <a href="<?php echo base_url('admin_customers');?>">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-shopping-cart" style="color: #d31f42"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total Customers</div>
                                        <div class="stat-digit"><?php echo " ".$customer[0]->cs?></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div id="customer_col">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-shopping-cart text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Active Customers</div>
                                        <div class="stat-digit"><?php echo " ".$customer_a[0]->cs_a?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-shopping-cart text-warning border-warning"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Inactive Customers</div>
                                        <div class="stat-digit"><?php echo " ".$customer_i[0]->cs_i?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body" id="reservation_tri">
                            <a href="<?php echo base_url('admin_reservations');?>">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-calendar" style="color: #d31f42"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Reservations</div>
                                    <div class="stat-digit"><?php echo " ".$reserve[0]->rv?></div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div id="reservation_col">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-calendar text-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Active Reservations</div>
                                        <div class="stat-digit"><?php echo " ".$reserve_a[0]->rv_a?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-calendar text-warning border-warning"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Cancelled Reservations</div>
                                        <div class="stat-digit"><?php echo " ".$reserve_c[0]->rv_c?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-unlock" style="color: #d31f42"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Logged-In Users</div>
                                    <div class="stat-digit"><?php echo " ".$logged[0]->lg?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL FOR PASSWORD CHANGE -->
                            
    <div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        <strong>Change Password</strong>
                    </div>
                    <div class="card-body card-block">
                        <form id="login" action="<?php echo base_url('change_pass'.'?id='.$_SESSION['id']);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">Old Password</label></div>
                                <div class="col-12 col-md-9"><input type="password" name="current_pass" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">New Password</label></div>
                                <div class="col-12 col-md-9"><input type="password" name="new_pass" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class="form-control-label">New Password Confirm</label></div>
                                <div class="col-12 col-md-9"><input type="password" name="confirm_pass" class="form-control" required></div>
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
        <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-header">
                            <strong>Error Message</strong>
                        </div>
                        <div class="card-body card-block">
                           <p id="error-message"<?php if(isset($_SESSION['error_message']))?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>