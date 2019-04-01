
        <div id="mySidenav" class="sidenavr">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="content mt-3">
            <div class="row">                   
                <div class="col-md-12">

                    <div class="card" id="reservation">  
                        <div class="card-body">
                            <div class="card">
                                <div id="search">
                                    <!-- time picker here -->
                                    <!-- <div class='input-group date' id='datepicker'>
                                            <input id='pick-date' type='text' class="form-control" />
                                            <span class="input-group-addon">
                                               <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                    </div> -->
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="datepicker" name="date" readonly/>
                                        <span class="input-group-addon addon" ><span class="fa fa-calendar"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="min-height: 700px">
                                <div class="content mt-3">
                                    <nav>
                                        <div class="nav nav-pills mb-3 mt-2" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" data-toggle="tab" href="#active" role="tab" style="margin-right: 5px"><i class="fa fa-dot-circle-o"></i> Active Reservations</a>
                                            <a class="nav-item nav-link" data-toggle="tab" href="#inactive" role="tab"><i class="fa fa-circle-o"></i> Inactive Reservations</a>
                                        </div>
                                    </nav>
                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="active" role="tabpanel">
                                        <div class="content mt-3">
                                            <div class="row">                            
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <strong class="card-title">Active Reservations</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="panel-body">
                                                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <tr align="middle">
                                                                            <th>Date</th>
                                                                            <th>Reservation No.</th>
                                                                            <th>Customer Name</th>
                                                                            <th>Time</th>
                                                                            <th>Tools</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="active-reservation">
                                                                        
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
                                            <div class="row">                            
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <strong class="card-title">Inactive Reservations</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <div id="inactive-panel" class="panel-body">
                                                                <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <tr align="middle">
                                                                            <th>Date</th>
                                                                            <th>Reservation No.</th>
                                                                            <th>Customer Name</th>
                                                                            <th>Time</th>
                                                                            <th>Tools</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="inactive-reservation">
                                                                        
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

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1 style=" cursor:pointer" onclick="openNav()">POS</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="row">                   
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class="form-control-label"><b>Reservation No.: </b></label></div>
                                        <div class="col-12 col-md-9"><label id="rs-no">RS00000000</label></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class="form-control-label"><b>Customer Name: </b></label></div>
                                        <div class="col-12 col-md-9"><label id="rs-name">-</label></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class="form-control-label"><b>Date: </b></label></div>
                                        <div class="col-12 col-md-9"><label id="rs-date">-</label></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class="form-control-label"><b>Start Time: </b></label></div>
                                        <div class="col-12 col-md-9"><label id="rs-start">-</label></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class="form-control-label"><b>End Time: </b></label></div>
                                        <div class="col-12 col-md-9"><label id="rs-end">-</label></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class="form-control-label"><b>Created Date: </b></label></div>
                                        <div class="col-12 col-md-9"><label id="rs-create">-</label></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class="form-control-label"><b>Services: </b></label></div>
                                        <div class="col-12 col-md-6">
                                            <select id="service-choose" class="form-control" name="service" disabled>
                                                <option selected hidden>Select Service</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-3" align="middle">
                                            <button id="add-service" class="btn btn-outline-success" style="padding: 2px 7px 2px; border-radius:3px;" disabled><i class="fa fa-plus-circle"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="panel-body" id="service-list">
                                        <table class="table">
                                            <thead>
                                                <tr align="middle">
                                                    <th>#</th>
                                                    <th>Service</th>
                                                    <th>Duration</th>
                                                    <th>Price</th>
                                                    <th>Tools</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class="form-control-label"><b>Services: </b></label></div>
                                            <div class="col-12 col-md-6">
                                                <select id="change-status" class="form-control" disabled>
                                                    <option>Pending</option>
                                                    <option>Cancelled</option>
                                                    <option>Paid</option> <!-- Put "Paid" temporarily until payment module is implemented-->
                                                </select>
                                            </div>
                                        <div class="col-12 col-md-3" align="middle">
                                            <button id="update-changes" class="btn btn-outline-warning" style="padding: 2px 7px 2px; border-radius:3px;" disabled><i class="fa fa-refresh"></i></button>
                                            <button id="cancel-changes" class="btn btn-outline-danger" style="padding: 2px 7px 2px; border-radius:3px;" disabled><i class="fa fa-times-circle"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class="form-control-label"><b>Total: </b></label></div>
                                        <div class="col-12 col-md-1"><label>PHP</label></div>
                                        <div class="col-12 col-md-8"><label id="total-price">00.00</label></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="<?php echo base_url('assets/pos/js/jquery-3.3.1.min.js');?>" ></script>
    <script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins.js');?>"></script>
    <script src="<?php echo base_url('assets/js/main.js');?>"></script>

    <script src="<?php echo base_url('assets/js/lib/data-table/datatables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/dataTables.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/dataTables.buttons.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/buttons.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/jszip.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/pdfmake.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/vfs_fonts.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/buttons.html5.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/buttons.print.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/buttons.colVis.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/datatables-init.js');?>"></script>

    <!-- POS -->
    <script src="<?php echo base_url('assets/pos/jquery-ui/jquery-ui.js');?>"></script>    
    <script src="<?php echo base_url('assets/pos/js/bootstrap.min.js');?>" ></script>

