    
    <!-- MODAL FOR PASSWORD CHANGE -->
                            
    <div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        <strong>Change Password</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="<?php echo base_url('change_pass'.'?id='.$_SESSION['id']);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
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
    </div>

    <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>" ></script>
    <script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins.js');?>"></script>
    <script src="<?php echo base_url('assets/js/main2.js');?>"></script>  

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

    <!-- INPUT MASK -->
    <script src="<?php echo base_url('assets/js/input-mask/jquery.inputmask.js"');?>"></script>
    <script src="<?php echo base_url('assets/js/input-mask/jquery.inputmask.extensions.js"');?>"></script>
    <script src="<?php echo base_url('assets/js/input-mask/jquery.inputmask.numeric.extensions.js"');?>"></script>
    <script src="<?php echo base_url('assets/js/input-mask/jquery.inputmask.date.extensions.js"');?>"></script>
    <script src="<?php echo base_url('assets/js/input-mask/jquery.inputmask.phone.extensions.js"');?>"></script>
        
    <script src="<?php echo base_url('assets/js/image-upload/jquery.upload-1.0.2.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/datetimepicker/moment/moment.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/datetimepicker/bootstrap-datetimepicker.min.js');?>"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('#bootstrap-data-table').DataTable({
                destroy: true,
                "order": [[ 0, 'desc']]
            });
            $('#bootstrap-data-table2').DataTable({
                destroy: true,
                "order": [[ 0, 'desc']]
            });
            $('#bootstrap-data-table3').DataTable({
                destroy: true,
                "order": [[ 0, 'desc']]
            });

            $('.numbersOnly').on('keypress', function(e) {
                var k = e.which;
                /* numeric inputs can come from the keypad or the numeric row at the top */
                if ( (k < 48 || k > 57)) {
                    e.preventDefault();
                    return false;
                }
            });

            //input mask
            $('input[name="mobile"]').inputmask("(+99)999 999 9999", {"placeholder": "(+XX) XXX XXX XXXX"});
            $('input[name="contact"]').inputmask("(+99)999 999 9999", {"placeholder": "(+XX) XXX XXX XXXX"});
            $('input[name="telephone"]').inputmask("999 99 99", {"placeholder": "XXX XX XX"});
            $('input[name="price"]').inputmask("decimal", {
                radixPoint: ".",
                digits: 2,
                autoGroup: true,
            }).css("text-align","left");

            $("#collapse").hide();
            $("#trigger").click(function(){
                if($("#collapse").is(':hidden')){
                    $("#collapse").slideDown(100);
                }
                else{
                    $("#collapse").slideUp(100); 
                }
            }); 

            $('#changepass').on('hidden.bs.modal', function(){    //reset
                $("#changepass form")[0].reset();
            });

            //CLIENT HOME JS
            $('#update-info-btn').click(function(){
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url('client_controller/ajax_get_info')?>",
                    dataType: 'json',
                    success:function(result){
                        var days = result.info[0].br_days.split(",");
                        console.log(result);
                        $('#update-info form')[0].reset();
                        $('#update-info input[name="company"]').val(result.info[0].cm_company);
                        $('#update-info textarea[name="description"]').val(result.info[0].cm_desc);
                        $('#update-info input[name="location"]').val(result.info[0].br_location);
                        $('#update-info input[name="mobile"]').val(result.info[0].br_mobile);
                        $('#update-info input[name="slots"]').val(result.info[0].br_slots);
                        $('#update-info input[name="telephone"]').val(result.info[0].br_telephone);
                        $('#update-info input[name="ot_time"]').val(result.info[0].br_opening);
                        $('#update-info input[name="ct_time"]').val(result.info[0].br_closing);
                        for(var i=0;i<days.length;i++){
                            $('#update-info input[name="days[]"][value="'+days[i]+'"]').prop('checked',true);
                        }
                    },
                    error:function(request){
                        alert(request.responseText);
                    }
                });
            });
            $('#info-image-btn').click(function(){
                $('#update-client-image form')[0].reset();
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url('client_controller/ajax_get_info')?>",
                    dataType: 'json',
                    success:function(result){
                        $('#new-image').attr('src', "<?php echo base_url()?>"+"assets/images/branch-images/"+result.info[0].br_image);
                    },
                    error:function(request){
                        alert(request.responseText);
                    }
                });
            });

            //CLIENT BRANCH JS
            $('#add-branch').on('hidden.bs.modal', function(){    //reset
                $("#add-branch form")[0].reset();
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url('client_controller/ajax_company_name')?>",
                    method: "GET",
                    dataType: 'json',                    
                    success:function(result){
                        $('#add-branch form input[name="branch_pre"]').val(result[0].cm_company+" - ");
                    },
                    error:function(request){
                        alert(request.responseText);
                    }
                });
            });
            $('#active-branch table tbody').on('click', 'button:contains("Update")', function(){
                var id = $(this).val();
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url('client_controller/ajax_get_branch')?>",
                    method: "GET",
                    dataType: 'json',
                    data:{br_id:id},
                    success:function(result){
                        var days = result.branch[0].br_days.split(",");
                        $('#update-branch form')[0].reset();
                        $('#update-branch form').attr('action', "<?php echo base_url()?>"+'client_update_branch'+'?id='+result.branch[0].br_id);
                        $('#update-branch img').attr('src', "<?php echo base_url()?>"+"assets/images/branch-images/"+result.branch[0].br_image);
                        $('#update-branch input[name="branch_pre"]').val(result.branch[0].cm_company+" - ");
                        $('#update-branch input[name="branch_ex"]').val(result.branch[0].br_name.replace(result.branch[0].cm_company+" - ",""));
                        $('#update-branch input[name="location"]').val(result.branch[0].br_location);
                        $('#update-branch input[name="mobile"]').val(result.branch[0].br_mobile);
                        $('#update-branch input[name="telephone"]').val(result.branch[0].br_telephone);
                        $('#update-branch input[name="slots"]').val(result.branch[0].br_slots);
                        $('#update-branch input[name="ot_time"]').val(result.branch[0].br_opening);
                        $('#update-branch input[name="ct_time"]').val(result.branch[0].br_closing);
                        for(var i=0;i<days.length;i++){
                            $('#update-branch input[name="days[]"][value="'+days[i]+'"]').prop('checked',true);
                        }
                    },
                    error:function(request){
                        alert(request.responseText);
                    }
                });
            });
            $('#active-branch table tbody').on('click', 'button:contains("Deactivate")', function(){
                var id = $(this).val();
                $('#deact-branch a').attr('href',"<?php echo base_url()?>"+'client_delete_branch'+'?id='+id);
            });
            $('#inactive-branch table tbody').on('click', 'button:contains("Update")', function(){
                var id = $(this).val();
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url('client_controller/ajax_get_branch')?>",
                    method: "GET",
                    dataType: 'json',
                    data:{br_id:id},
                    success:function(result){
                        var days = result.branch[0].br_days.split(",");
                        $('#update-branch form')[0].reset();
                        $('#update-branch form').attr('action', "<?php echo base_url()?>"+'client_update_branch'+'?id='+result.branch[0].br_id);
                        $('#update-branch img').attr('src', "<?php echo base_url()?>"+"assets/images/branch-images/"+result.branch[0].br_image);
                        $('#update-branch input[name="branch_pre"]').val(result.branch[0].cm_company+" - ");
                        $('#update-branch input[name="branch_ex"]').val(result.branch[0].br_name.replace(result.branch[0].cm_company+" - ",""));
                        $('#update-branch input[name="location"]').val(result.branch[0].br_location);
                        $('#update-branch input[name="mobile"]').val(result.branch[0].br_mobile);
                        $('#update-branch input[name="telephone"]').val(result.branch[0].br_telephone);
                        $('#update-branch input[name="slots"]').val(result.branch[0].br_slots);
                        $('#update-branch input[name="ot_time"]').val(result.branch[0].br_opening);
                        $('#update-branch input[name="ct_time"]').val(result.branch[0].br_closing);
                        for(var i=0;i<days.length;i++){
                            $('#update-branch input[name="days[]"][value="'+days[i]+'"]').prop('checked',true);
                        }
                    },
                    error:function(request){
                        alert(request.responseText);
                    }
                });
            });
            $('#inactive-branch table tbody').on('click', 'button:contains("Activate")', function(){
                var id = $(this).val();
                $('#act-branch a').attr('href',"<?php echo base_url()?>"+'client_activate_branch'+'?id='+id);
            });


            //CLIENT CATEGORY JS
            $('#add-category').on('hidden.bs.modal', function(){    //reset
                $("#add-category form")[0].reset();
            });
            $('#categories table tbody').on('click', 'button:contains("Update")', function(){
                var id = $(this).val();
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url('client_controller/ajax_get_category')?>",
                    method: "GET",
                    dataType: 'json',
                    data:{ct_id:id},
                    success:function(result){
                        $('#update-category form')[0].reset();
                        $('#update-category form').attr('action', "<?php echo base_url()?>"+'client_update_category'+'?id='+result.category[0].ct_id);
                        $('#update-category input[name="category"]').val(result.category[0].ct_name);
                    },
                    error:function(request){
                        alert(request.responseText);
                    }
                });
            });
            $('#categories table tbody').on('click', 'button:contains("Deactivate")', function(){
                var id = $(this).val();
                $('#deact-category a').attr('href',"<?php echo base_url()?>"+'client_delete_category'+'?id='+id);
            });
            $('#categories table tbody').on('click', 'button:contains("Activate")', function(){
                var id = $(this).val();
                $('#act-category a').attr('href',"<?php echo base_url()?>"+'client_activate_category'+'?id='+id);
            });

            //CLIENT SERVICE JS
            $('#add-service').on('hidden.bs.modal', function(){    //reset
                $('#add-service form')[0].reset();
                $('#add-service').find('#new-image').attr('src',"<?php echo base_url()?>"+'assets/images/service-images/default.png');
            });
            $('#active-service table tbody').on('click', 'button:contains("Update")', function(){
                var id = $(this).val();
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url('client_controller/ajax_get_service')?>",
                    method: "GET",
                    dataType: 'json',
                    data:{sv_id:id},
                    success:function(result){
                        $('#update-service form')[0].reset();
                        $('#update-service form').attr('action', "<?php echo base_url()?>"+'client_update_service'+'?id='+result.service[0].sv_id);
                        $('#update-service select option[value="'+result.service[0].ct_id+'"]').prop('selected',true);  
                        $('#update-service img').attr('src', "<?php echo base_url()?>"+"assets/images/service-images/"+result.service[0].sv_image);
                        $('#update-service input[name="service"]').val(result.service[0].sv_name);
                        $('#update-service input[name="price"]').val(result.service[0].sv_price);
                        $('#update-service input[name="duration"]').val(result.service[0].sv_estimated);
                    },
                    error:function(request){
                        alert(request.responseText);
                    }
                });
            });
            $('#active-service table tbody').on('click', 'button:contains("Deactivate")', function(){
                var id = $(this).val();
                $('#deact-service a').attr('href',"<?php echo base_url()?>"+'client_delete_service'+'?id='+id);
            });
            $('#inactive-service table tbody').on('click', 'button:contains("Update")', function(){
                var id = $(this).val();
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url('client_controller/ajax_get_service')?>",
                    method: "GET",
                    dataType: 'json',
                    data:{sv_id:id},
                    success:function(result){
                        $('#update-service form')[0].reset();
                        $('#update-service select option[value="'+result.service[0].ct_id+'"]').prop('selected',true);
                        $('#update-service form').attr('action', "<?php echo base_url()?>"+'client_update_service'+'?id='+result.service[0].sv_id);
                        $('#update-service img').attr('src', "<?php echo base_url()?>"+"assets/images/service-images/"+result.service[0].sv_image);
                        $('#update-service input[name="service"]').val(result.service[0].sv_name);
                        $('#update-service input[name="price"]').val(result.service[0].sv_price);
                        $('#update-service input[name="duration"]').val(result.service[0].sv_estimated);
                    },
                    error:function(request){
                        alert(request.responseText);
                    }
                });
            });
            $('#inactive-service table tbody').on('click', 'button:contains("Activate")', function(){
                var id = $(this).val();
                $('#act-service a').attr('href',"<?php echo base_url()?>"+'client_activate_service'+'?id='+id);
            });


            // DATE & TIME PICKER
            $('#open-time').datetimepicker({
                format: 'HH:mm',
                stepping: 30,
                useCurrent:'day',icons: {
                    up: "fa fa-toggle-up fa-2x",
                    down: "fa fa-toggle-down fa-2x",
                    next: 'fa fa-toggle-right fa-2x',
                    previous: 'fa fa-toggle-left fa-2x'
                }
            });
            $('#close-time').datetimepicker({
                format: 'HH:mm',
                stepping: 30,
                useCurrent:'day',icons: {
                    up: "fa fa-toggle-up fa-2x",
                    down: "fa fa-toggle-down fa-2x",
                    next: 'fa fa-toggle-right fa-2x',
                    previous: 'fa fa-toggle-left fa-2x'
                }
            });
            $('#update-open-time').datetimepicker({
                format: 'HH:mm',
                stepping: 30,
                useCurrent:'day',icons: {
                    up: "fa fa-toggle-up fa-2x",
                    down: "fa fa-toggle-down fa-2x",
                    next: 'fa fa-toggle-right fa-2x',
                    previous: 'fa fa-toggle-left fa-2x'
                }
            });
            $('#update-close-time').datetimepicker({
                format: 'HH:mm',
                stepping: 30,
                useCurrent:'day',icons: {
                    up: "fa fa-toggle-up fa-2x",
                    down: "fa fa-toggle-down fa-2x",
                    next: 'fa fa-toggle-right fa-2x',
                    previous: 'fa fa-toggle-left fa-2x'
                }
            });
            $('#service-time').datetimepicker({
                format: 'HH:mm',
                stepping: 30,
                useCurrent:'day',
                useCurrent:'day',icons: {
                    up: "fa fa-toggle-up fa-2x",
                    down: "fa fa-toggle-down fa-2x",
                    next: 'fa fa-toggle-right fa-2x',
                    previous: 'fa fa-toggle-left fa-2x'
                }
            });
            $('#update-service-time').datetimepicker({
                format: 'HH:mm',
                stepping: 30,
                useCurrent:'day',
                useCurrent:'day',icons: {
                    up: "fa fa-toggle-up fa-2x",
                    down: "fa fa-toggle-down fa-2x",
                    next: 'fa fa-toggle-right fa-2x',
                    previous: 'fa fa-toggle-left fa-2x'
                }
            });
            $('#open-time input').keypress(function(e){
                return false;
            })
            $('#close-time input').keypress(function(e){
                return false;
            })
            $('#open-time input').keydown(function(e) {
                if ( event.which == 8 ) {
                   event.preventDefault();
                }
            });
            $('#close-time input').keydown(function(e) {
                if ( event.which == 8 ) {
                   event.preventDefault();
                }
            });
            $('#update-open-time input').keypress(function(e){
                return false;
            })
            $('#update-close-time input').keypress(function(e){
                return false;
            })
            $('#update-open-time input').keydown(function(e) {
                if ( event.which == 8 ) {
                   event.preventDefault();
                }
            });
            $('#update-close-time input').keydown(function(e) {
                if ( event.which == 8 ) {
                   event.preventDefault();
                }
            });
            $('#service-time input').keypress(function(e){
                return false;
            })
            $('#service-time input').keydown(function(e) {
                if ( event.which == 8 ) {
                   event.preventDefault();
                }
            });
            $('#update-service-time input').keypress(function(e){
                return false;
            })
            $('#udpate-service-time input').keydown(function(e) {
                if ( event.which == 8 ) {
                   event.preventDefault();
                }
            });


            //IMAGE UPLOAD
            $("#image-upload").change(function(){
                readImage(this);
            });
            function readImage(input){
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    var x = $("#image-upload").val();
                    reader.onload = function(e) {
                        $('#new-image')
                            .attr('src', e.target.result)
                            .width(300)
                            .height(200);
                    }; 
                    reader.readAsDataURL(input.files[0]);   
                }
            }      
            $('#addservice').on('hidden.bs.modal', function(){    //reset
                $('#new-image').attr('src','./assets/images/service-images/default.png');
                $('#addservice input').each(function(){
                    $(this).val("");
                });
            });
        });
       
        // $('.input-group date').on('keypress','input',function(e) {
        //     return false;
        // });
        // $('.input-group date').find('input').keydown(function(e) {
        //     if ( event.which == 8 ) {
        //        event.preventDefault();
        //     }
        // });
    </script>
</body>
</html>