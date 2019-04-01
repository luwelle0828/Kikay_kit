    

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
        jQuery(document).ready(function($) {
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
            $('#service-data-table').DataTable({
                destroy: true
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
                autoGroup: true
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
            $("#collapse2").hide();
            $("#trigger2").click(function(){
                if($("#collapse2").is(':hidden')){
                    $("#collapse2").slideDown(100);
                }
                else{
                    $("#collapse2").slideUp(100); 
                }
            });

            $("#user_col").hide();
            $("#user_tri").hover(function(){
                $("#user_col").slideDown(300);
            });
            $("#user_tri").mouseleave(function(){
                $("#user_col").slideUp(300);
            });

            $("#client_col").hide();
            $("#client_tri").hover(function(){
                $("#client_col").slideDown(300);
            });
            $("#client_tri").mouseleave(function(){
                $("#client_col").slideUp(300);
            });

            $("#branch_col").hide();
            $("#branch_tri").hover(function(){
                $("#branch_col").slideDown(300);
            });
            $("#branch_tri").mouseleave(function(){
                $("#branch_col").slideUp(300);
            });

            $("#customer_col").hide();
            $("#customer_tri").hover(function(){
                $("#customer_col").slideDown(300);
            });
            $("#customer_tri").mouseleave(function(){
                $("#customer_col").slideUp(300);
            });

            $("#reservation_col").hide();
            $("#reservation_tri").hover(function(){
                $("#reservation_col").slideDown(300);
            });
            $("#reservation_tri").mouseleave(function(){
                $("#reservation_col").slideUp(300);
            });

            $("#comp").change(function(){
                $("#comp_input").val($("#comp option:selected").text() + " - ");    //ADDED jscript for branch name -> 05-09-2018 Lu
            });

            $('.modal').on('hidden.bs.modal', function(){
                $('.modal').find('form')[0].reset();
            });

            $('#changepass').on('hidden.bs.modal', function(){    //reset
                $("#changepass form")[0].reset();
            });
            
            //ADMIN CLIENT JS
            $('#add-client').on('hidden.bs.modal', function(){    //reset
                $("#add-client form")[0].reset();
            });
            $('#active-client table tbody').on('click', 'button:contains("Update")', function(){
                var id = $(this).val();
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url('admin_controller/ajax_get_company')?>",
                    method: "GET",
                    dataType: 'json',
                    data:{cm_id:id},
                    success:function(result){
                        $('#update-client form')[0].reset();
                        $('#update-client form').attr('action', "<?php echo base_url()?>"+'admin_update_client'+'?id='+result.company[0].cm_id);
                        $('#update-client input[name="company"]').val(result.company[0].cm_company);
                        $('#update-client textarea[name="description"]').val(result.company[0].cm_description);
                    },
                    error:function(request){
                        alert(request.responseText);
                    }
                });
            });
            $('#active-client table tbody').on('click', 'button:contains("Deactivate")', function(){
                var id = $(this).val();
                $('#deact-client a').attr('href',"<?php echo base_url()?>"+'admin_delete_client'+'?id='+id);
            });
            $('#inactive-client table tbody').on('click', 'button:contains("Update")', function(){
                var id = $(this).val();
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url('admin_controller/ajax_get_company')?>",
                    method: "GET",
                    dataType: 'json',
                    data:{cm_id:id},
                    success:function(result){
                        $('#update-client form')[0].reset();
                        $('#update-client form').attr('action', "<?php echo base_url()?>"+'admin_update_client'+'?id='+result.company[0].cm_id);
                        $('#update-client input[name="company"]').val(result.company[0].cm_company);
                        $('#update-client textarea[name="description"]').val(result.company[0].cm_description);
                    },
                    error:function(request){
                        alert(request.responseText);
                    }
                });
            });
            $('#inactive-client table tbody').on('click', 'button:contains("Activate")', function(){
                var id = $(this).val();
                $('#act-client a').attr('href',"<?php echo base_url()?>"+'admin_activate_client'+'?id='+id);
            });


            //ADMIN BRANCHES JS
            $('#add-branch').on('hidden.bs.modal', function(){    //reset
                $("#add-branch form")[0].reset();
            });
            $('#active-branch table tbody').on('click', 'button:contains("Update")', function(){
                var id = $(this).val();
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url('admin_controller/ajax_get_branch')?>",
                    method: "GET",
                    dataType: 'json',
                    data:{br_id:id},
                    success:function(result){
                        $('#update-branch form')[0].reset();
                        var days = result.branch[0].br_days.split(",");
                        $('#update-branch form').attr('action', "<?php echo base_url()?>"+'admin_update_branch'+'?id='+result.branch[0].br_id);
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
                $('#deact-branch a').attr('href',"<?php echo base_url()?>"+'admin_delete_branch'+'?id='+id);
            });
            $('#inactive-branch table tbody').on('click', 'button:contains("Update")', function(){
                var id = $(this).val();
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url('admin_controller/ajax_get_branch')?>",
                    method: "GET",
                    dataType: 'json',
                    data:{br_id:id},
                    success:function(result){
                        var days = result.branch[0].br_days.split(",");
                        $('#update-branch form')[0].reset();
                        $('#update-branch form').attr('action', "<?php echo base_url()?>"+'admin_update_branch'+'?id='+result.branch[0].br_id);
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
                $('#act-branch a').attr('href',"<?php echo base_url()?>"+'admin_activate_branch'+'?id='+id);
            });

            //ADMIN CUSTOMERS JS
            $('#add-customer').on('hidden.bs.modal', function(){    //reset
                $("#add-customer form")[0].reset();
            });
            $('#active-customer table tbody').on('click', 'button:contains("Update")', function(){
                var id = $(this).val();
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url('admin_controller/ajax_get_customer')?>",
                    method: "GET",
                    dataType: 'json',
                    data:{cs_id:id},
                    success:function(result){
                        $('#update-customer form')[0].reset();
                        $('#update-customer form').attr('action', "<?php echo base_url()?>"+'admin_update_customer'+'?id='+result.customer[0].cs_id);
                        $('#update-customer input[name="firstname"]').val(result.customer[0].cs_fname);
                        $('#update-customer input[name="lastname"]').val(result.customer[0].cs_lname);
                        $('#update-customer input[name="address"]').val(result.customer[0].cs_address);
                        $('#update-customer input[name="contact"]').val(result.customer[0].cs_contact);
                    },
                    error:function(request){
                        alert(request.responseText);
                    }
                });
            });
            $('#active-customer table tbody').on('click', 'button:contains("Deactivate")', function(){
                var id = $(this).val();
                $('#deact-customer a').attr('href',"<?php echo base_url()?>"+'admin_delete_customer'+'?id='+id);
            });
            $('#inactive-customer table tbody').on('click', 'button:contains("Update")', function(){
                var id = $(this).val();
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url('admin_controller/ajax_get_customer')?>",
                    method: "GET",
                    dataType: 'json',
                    data:{cs_id:id},
                    success:function(result){
                        $('#update-customer form')[0].reset();
                        $('#update-customer form').attr('action', "<?php echo base_url()?>"+'admin_update_customer'+'?id='+result.customer[0].cs_id);
                        $('#update-customer input[name="firstname"]').val(result.customer[0].cs_fname);
                        $('#update-customer input[name="lastname"]').val(result.customer[0].cs_lname);
                        $('#update-customer input[name="address"]').val(result.customer[0].cs_address);
                        $('#update-customer input[name="contact"]').val(result.customer[0].cs_contact);
                    },
                    error:function(request){
                        alert(request.responseText);
                    }
                });
            });
            $('#inactive-customer table tbody').on('click', 'button:contains("Activate")', function(){
                var id = $(this).val();
                $('#act-customer a').attr('href',"<?php echo base_url()?>"+'admin_activate_customer'+'?id='+id);
            });

            //ADMIN RESERVATION JS
            $('#pending-reserve table tbody').on('click', 'button:contains("Cancel")', function(){
                var id = $(this).val();
                $('#cancel-reserve a').attr('href',"<?php echo base_url()?>"+'admin_delete_reservation'+'?id='+id);
            });

            //ADMIN USER JS
             $('#user-list table tbody').on('click', 'button:contains("Update")', function(){
                var id = $(this).val();
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url('admin_controller/ajax_get_user')?>",
                    method: "GET",
                    dataType: 'json',
                    data:{id:id},
                    success:function(result){
                        $('#update-user form')[0].reset();
                        $('#update-user form').attr('action', "<?php echo base_url()?>"+'admin_update_user'+'?id='+result.user[0].u_id);
                        $('#update-user input[name="username"]').val(result.user[0].u_user);
                    },
                    error:function(request){
                        alert(request.responseText);
                    }
                });
            });
             $('#user-list table tbody').on('click', 'button:contains("Deactivate")', function(){
                var id = $(this).val();
                $('#deact-user a').attr('href',"<?php echo base_url()?>"+'admin_delete_user'+'?id='+id);
            });
            $('#user-list table tbody').on('click', 'button:contains("Activate")', function(){
                var id = $(this).val();
                $('#act-user a').attr('href',"<?php echo base_url()?>"+'admin_activate_user'+'?id='+id);
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
                useCurrent:'day'
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

        });
    </script>

</body>
</html>