
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1><?php echo $branch[0]->br_name?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="default-tab">
        <div class="content mt-3">
            <div class="row">                            
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Information</strong>
                        </div>
                        <?php
                            $day = array("Sunday","Monday","Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
                            $day_arr = explode(",",$branch[0]->br_days);
                        ?>
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col col-md-2"><label class="form-control-label"><b>Branch Image: </b></label></div>
                                <div class="col-12 col-md-10"><img id="branch-img" src="./assets/images/branch-images/<?php echo $branch[0]->br_image?>" alt="branch image" height="200" width="300" style="border: gray; border-style: solid;" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label"><b>Branch Name: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $branch[0]->br_name?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label"><b>Branch Location: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $branch[0]->br_location?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label"><b>Mobile No.: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $branch[0]->br_mobile?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label"><b>Telephone No.: </b></label></div>
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
                                <div class="col col-md-2"><label class=" form-control-label"><b>Business Hours: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $branch[0]->br_opening.' - '.$branch[0]->br_closing?></label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class="form-control-label"><b>Reservation Slots: </b></label></div>
                                <div class="col-12 col-md-10"><label><?php echo $branch[0]->br_slots?></label></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="trigger">
                            <strong class="card-title">Service Details</strong>
                        </div>
                        <div id=collapse>
                            <div class="card-body">
                                <div class="panel-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr align="middle">
                                                <td>Service Name</td>
                                                <td>Service Price</td>
                                                <td>Service Duration</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if($service!=NULL) {
                                                foreach($service as $val){
                                                ?>
                                                    <tr align="middle">
                                                        <td><?php echo $val->sv_name?></td>
                                                        <td><?php echo $val->as_price?></td>
                                                        <td><?php echo $val->as_duration?></td>
                                                    </tr>
                                            <?php
                                                } 
                                            }
                                            else {
                                                //change this line into pop-up/error message
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table').DataTable(); 

            $("#collapse").hide();
            $("#trigger").click(function(){
                if($("#collapse").is(':hidden')){
                    $("#collapse").slideDown(100);
                }
                else{
                    $("#collapse").slideUp(100); 
                }
            }); 
        });
    </script>