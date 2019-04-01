              
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
        </div>

        <script type="text/javascript">
        $(document).ready(function() {
            // 
            $('#bootstrap-data-table').DataTable({
                destroy: true,
            });
            $('#bootstrap-data-table2').DataTable({
                destroy: true,
            });
            $('#bootstrap-data-table3').DataTable({
                destroy: true,
            });
        });

        function openNav() {
            document.getElementById("mySidenav").style.width = "770px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            showReservation();

            //reservation list function
            function showReservation(){
                $.ajax({
                    type: 'ajax',
                    url: '<?php echo base_url('pos/show_reservations')?>',
                    dataType: 'json',
                    success: function(result){
                        var aTable = $('#bootstrap-data-table').dataTable( {"bRetrieve": true} );
                        var iTable = $('#bootstrap-data-table2').dataTable( {"bRetrieve": true} );
                        aTable.fnClearTable();
                        iTable.fnClearTable();
                        if(result[0][5] == "Cancelled"){        //result[0][5] is status in controller
                            iTable.fnAddData(result);
                        }
                        else{
                            aTable.fnAddData(result);
                        }
   
                    },
                    error: function(){
                        alert("No data found.");
                    }
                }); 
            }

            //view reservation function
            $('#reservation').on('click', '#view-reserve', function(){
                var id = $(this).val();
                $.ajax({
                    type: 'ajax',
                    method: 'GET',
                    url: '<?php echo base_url('pos/view_reservation')?>',
                    data: {id:id},
                    dataType: 'json',
                    success: function(result){
                        var reserve = result.reserve;
                        var avail = result.avail;
                        var service = result.service;
                        
                        //RESERVATION DETAILS
                        $('#rs-no').text(reserve[0].rv_no);
                        $('#rs-name').text(reserve[0].cs_fname+" "+reserve[0].cs_lname);
                        $('#rs-date').text(reserve[0].rv_date);
                        $('#rs-start').text(reserve[0].rv_time);
                        $('#rs-end').text("-");
                        $('#rs-create').text(reserve[0].rv_created_date);
            
                        service_option(service, avail); //Services in Combo box
                        reservation_buttons(reserve);   //Buttons = add service, update, cancel
                        reservation_services(service);  //Reservation service list

                    },
                    error: function(){
                        alert("No data found.");
                    }
                });
            });

            //add service clicked function
            $('#add-service').click(function(){
                var sv_selected = $('#service-choose').find('option:selected').val();
                if(sv_selected == 0){
                    alert("PLEASE SELECT A SERVICE.");
                }
                else{
                    var sv_count = $('#service-list tr').length;    //counting number of rows for appending another row + 1
                    $('#service-choose').find('option:selected').prop('disabled', true);    //disabling selected option after adding
                    $.ajax({
                        type: 'ajax',
                        method: 'GET',
                        url: '<?php echo base_url('pos/chosen_service')?>',
                        data: {id:sv_selected},
                        dataType: 'json',
                        success: function(result){
                            var list_sv = '';
                            var total = parseFloat($('#total-price').text());
                            list_sv += '<tr id="'+result[0].as_id+'" align="middle">' +
                                            '<td>'+sv_count+'</td>' +
                                            '<td>'+result[0].sv_name+'</td>' +
                                            '<td>'+result[0].as_duration+'</td>' +
                                            '<td>'+result[0].as_price+'</td>' +
                                            '<td>' +
                                                '<button id="cancel-service" value="'+result[0].as_id+'" class="btn btn-outline-danger" style="padding: 2px 8px 2px; border-radius:3px;"><i class="fa fa-times-circle"></i></button>'
                                            '</td>' +
                                        '</tr>';
                            $('#service-list tbody').append(list_sv);
                            total += parseFloat(result[0].as_price);
                            $('#total-price').text(total);
                        },
                        error: function(){
                            alert("No data found.");
                        }
                    });
                    $("#service-choose").val("0");
                }
            });

            $('#update-changes').click(function(){
                var reserve_id = $(this).val();
                var asid_arr = [];  //array of chosen services' id 
                var reserve_stat = $('#change-status').val();
                var count = 0;
                $('#service-list tbody tr').each(function(){    //getting all id of services
                    asid_arr[count] = $(this).attr('id');
                    count++;
                });
                $.ajax({
                    type: 'ajax',
                    method: 'GET',
                    url: '<?php echo base_url('pos/update_reservation')?>',
                    data: {as_id:asid_arr, rv_id:reserve_id, status:reserve_stat},
                    dataType: 'json',
                    success: function(result){
                        alert('Reservation Updated Successfully.');

                        if(result[0].rv_status != 'Pending'){   //disabling of buttons if updated to "Cancelled"
                            $('#add-service').prop('disabled', true); 
                            $('#update-changes').prop('disabled', true);
                            $('#cancel-changes').prop('disabled', true);
                            $('#change-status').prop('disabled', true);
                        }
                        $( "#datepicker" ).trigger( "change" );     //trigerred to refresh reservation list
                    },
                    error: function(){
                        alert("Reservation Update Failed.");
                    }
                });
            });

            $('#cancel-changes').click(function(){
                var id = $(this).val();
                $.ajax({
                    type: 'ajax',
                    method: 'GET',
                    url: '<?php echo base_url('pos/view_reservation')?>',
                    data: {id:id},
                    dataType: 'json',
                    success: function(result){
                        var reserve = result.reserve;
                        var avail = result.avail;
                        var service = result.service;
                        
                        //RESERVATION DETAILS
                        $('#rs-no').text(reserve[0].rv_no);
                        $('#rs-name').text(reserve[0].cs_fname+" "+reserve[0].cs_lname);
                        $('#rs-date').text(reserve[0].rv_date);
                        $('#rs-start').text(reserve[0].rv_time);
                        $('#rs-end').text("-");
                        $('#rs-create').text(reserve[0].rv_created_date);
            
                        service_option(service, avail); //Services in Combo box
                        reservation_buttons(reserve);   //Buttons = add service, update, cancel
                        reservation_services(service);  //Reservation service list

                    },
                    error: function(){
                        alert("No data found.");
                    }
                });
            });

            $('#service-list').on('click', '#cancel-service', function(){
                var id = $(this).val();
                var count = 0;
                $('#service-choose option[value="'+id+'"]').prop('disabled',false); //enabling the option(item in combo box) of the deleted service
                // $('#option'+id+'').prop('disabled',false);
                $(this).closest('tr').remove();     //remove row in service list
                $('#service-list tbody tr').each(function(){    //changing count number of items
                    count++;
                    $(this).children('td:first').text(count);
                });
                $.ajax({
                    type: 'ajax',
                    method: 'GET',
                    url: '<?php echo base_url('pos/chosen_service')?>',
                    data: {id:id},
                    dataType: 'json',
                    success: function(result){
                        var total = parseFloat($('#total-price').text()) - parseFloat(result[0].as_price);  //subtracting total
                        $('#total-price').text(total);
                    },
                    error: function(){
                        alert("No data found.");
                    }
                });
            });

            //show datepicker
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            }).val(currentDate());
            
            //When date is changed or when datepicker is clicked
            $('#datepicker').datepicker().on('changeDate', function(ev){                 
                $('datepicker').change();   //call function when input is updated
            });
            $('#datepicker').change( function(){
                //PUT AJAX HERE TO CHANGE RESERVATION LIST BASED ON DATEPICKER VALUE
                var date= $('#datepicker').val();
                $.ajax({
                    type: 'ajax',
                    method: 'GET',
                    url: '<?php echo base_url('pos/new_reservation')?>',
                    data: {date:date},
                    dataType: 'json',
                    success: function(result){
                        var aTable = $('#bootstrap-data-table').dataTable( {"bRetrieve": true} );
                        var iTable = $('#bootstrap-data-table2').dataTable( {"bRetrieve": true} );
                        aTable.fnClearTable();
                        iTable.fnClearTable();
                        if(result[0][5] == "Cancelled"){        //result[0][5] is status in controller
                            iTable.fnAddData(result);
                        }
                        else{
                            aTable.fnAddData(result);
                        }
   
                        
                    },
                    error: function(){
                        alert("No data found.");
                    }
                });
            });

            //DECLARED FUNCTIONS
            function reservation_list(result){      //function for displaying list of reservations
                //Reset table values first
                console.log(result);
                // var oTable = $('#bootstrap-data-table').dataTable( {"bRetrieve": true} );
                // oTable.fnClearTable();
                //  if (result!='') {
                //     oTable.fnAddData(result);
                // }
                // $('#active-reservation').html('');
                // $('#inactive-reservation').html('');

                // for(var i=0; i<result.length; i++){
                //     var list_rv = '';
                //     list_rv += '<tr align="middle">' +
                //                 '<td>'+result[i].rv_date+'</td>' +
                //                 '<td>'+result[i].rv_no+'</td>' +
                //                 '<td>'+result[i].cs_fname+" "+result[i].cs_lname+'</td>' +
                //                 '<td>'+result[i].rv_time+'</td>' +
                //                 '<td>' +
                //                     '<button id="view-reserve" value="'+result[i].rv_id+'" class="btn btn-info">View</button>'
                //                 '</td>' +
                //             '</tr>';
                //     if(result[i].rv_status == 'Pending' || result[i].rv_status == 'Paid'){

                //         $('#active-reservation').append(list_rv);
                //     }
                //     else{
                //         $('#inactive-reservation').append(list_rv);
                //     }
                // }       
            }
            function service_option(service, avail){    //function for displaying list of service in combo box
                var list_as = '<option value="0" selected hidden>Select Service</option>';
                var rs_arr = [];
                for(var i=0; i<service.length; i++){    //putting values inside array for checking if service is already chosen and disabling option
                    rs_arr.push(service[i].as_id);
                }
                for(var i=0; i<avail.length; i++){      //displaying of values inside combo box
                    if($.inArray(avail[i].as_id, rs_arr) == -1){
                        list_as += '<option value="'+ avail[i].as_id + '">' + avail[i].sv_name + '</option>';
                    }
                    else{
                        list_as += '<option value="'+ avail[i].as_id + '" disabled>' + avail[i].sv_name + '</option>';
                    }
                }
                $('#service-choose').html(list_as);
            }
            function reservation_buttons(reserve){      //function for enable buttons and put reservation_id as value in buttons
                if(reserve[0].rv_status == 'Pending'){
                    $('#add-service').prop('disabled', false); 
                    $('#add-service').val(reserve[0].rv_id);    
                    $('#update-changes').prop('disabled', false);
                    $('#update-changes').val(reserve[0].rv_id);
                    $('#cancel-changes').prop('disabled', false);
                    $('#cancel-changes').val(reserve[0].rv_id);
                    $('#service-choose').prop('disabled', false);
                    $('#change-status').prop('disabled', false);
                }
                $("#change-status").val(reserve[0].rv_status);
            }
            function reservation_services(service){     //function for displaying services that are reserved by customer
                var list_sv = "";
                var total = 0.00;
                for(var i=0; i<service.length; i++){
                    list_sv += '<tr id="'+service[i].as_id+'" align="middle">' +
                                '<td>'+(i+1)+'</td>' +
                                '<td>'+service[i].sv_name+'</td>' +
                                '<td>'+service[i].as_duration+'</td>' +
                                '<td>'+service[i].as_price+'</td>' +
                                '<td>' +
                                    '<button id="cancel-service" value="'+service[i].as_id+'" class="btn btn-outline-danger" style="padding: 2px 8px 2px; border-radius:3px;"><i class="fa fa-times-circle"></i></button>'
                                '</td>' +
                            '</tr>';
                    total += parseFloat(service[i].as_price);

                    $('#service-list tbody').html(list_sv);
                    $('#total-price').text(total);
                }
            }
            function currentDate(){     //get current date with format
              var month = [
                "01", "02", "03",
                "04", "05", "06", "07",
                "08", "09", "10",
                "11", "12"
              ];

              var day = new Date().getDate();
              var monthIndex = new Date().getMonth();
              var year = new Date().getFullYear();

              return year + '-' + month[monthIndex] + '-' + day ;
            }

        });
    </script>

</body>
</html>