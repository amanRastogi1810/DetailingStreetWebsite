<?php


$this->load->model('my_model');




$invoice = $this->my_model->get_data('invoice');


include('header.php');

?>

<?php include('menu.php'); ?>


<style type="text/css">
  address span{
    color: red;
  }
</style>
<div class="content-wrapper" style="min-height: 542px;">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Invoice List <small> <a href="<?php echo base_url(); ?>user/invoice" class="btn btn-primary">Create New</a> </small>
      </h1>
      <ol class="breadcrumb">
         <li class="active">
            Invoice Booking List
         </li>
      </ol>

   </section>

   <!-- Main content -->

   <section class="content">

      <div class="row">

         <div class="col-xs-12">

            <div class="box box-primary">

               <!-- /.box-header -->

               <div class="box-body">



                  <div id="list1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap" style="overflow: auto;">

                     <div class="row">



                        <div class="col-sm-9">

                           <div class="form-group">

                            </div>

                           <br><br>

                        </div>

                                             </div>

                     <div class="row">

                        <div class="col-sm-12">

                           <table id="list1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="list1_info" style="sc">

                              <!--table-hover-->

                              <thead>

                                 <tr role="row">

                                    <th class="header">#</th>
                                    <th class="yellow header headerSortDown" nowrap="nowrap" width="1%">Invoice</th>
                                    <th class="yellow header headerSortDown" nowrap="nowrap" width="">Customer</th>
                                    <th class="yellow header headerSortDown" nowrap="nowrap" width="">BookingId</th>
                                    <th class="yellow header headerSortDown">Name</th>
                                    <th class="yellow header headerSortDown">PayDate</th>
                                    <th class="yellow header headerSortDown">Email</th>
                                    <th class="red header">Actions</th>
                                 </tr>

                              </thead>
                              <tbody>
                                 <?php

 if ($parentHodList[0]->user_type == 0 && $parentHodList[0]->type == 'superadmin') {
                                  # code...



                              //  for($i=0; $i < count($info['invoice']); $i++) {
                                  $i = 1;
                                  foreach ($info['invoice'] as $row ) {
                                    # code...
                               //   }
                                   $aa = base_url();
                                  // $this->load->library('encryption');
                                  // $code = $this->encryption->encode($row->invoice_number);
                                   // $row = $info['invoice'][$i];
                                    $base_64 = base64_encode($row->invoice_number);
                                    $url_param = rtrim($base_64, '=');
									  $newDate = date("Y-m-d", strtotime($row->paydate));
                                    // and later:
                                    $base_64 = $url_param . str_repeat('=', strlen($url_param) % 4);
                                   // $data = base64_decode($base_64);
                                   echo '<tr><td>'.($i++).'</td><td><a href="javascript:void(0);" title="">'.$row->invoice_number.'</a></td><td>'.$row->customer_id.'</td><td>'.$row->booking_id.'</td>
                                           <td>'.$row->bill_name.'</td>
                                           <td><span style="display: none;">'.$newDate.'</span>'.$row->paydate.'</td>
                                           <td>'.$row->bill_email.'<br></td><td class="crud-actions"> <a href="'.$aa.'user/invoice_update?id='.base64_encode($row->invoice_number).'" target="_blank" title="Edit Invoice" ><i class="fa fa-edit"></i> </a> | <a href="'.$aa.'user/clientinvoive/'.$url_param.'" target="_blank" ><i class="fa fa-file-pdf-o"></i> </a> | <a href="'.$aa.'crm/clientinvoive/'.$url_param.'" target="_blank" ><i class="fa fa-download"></i> </a> | <a href="javascript:void(0);" id="btn_sendmail" data-invoice="'.$url_param.'" data-mail="'.$row->bill_email.'"  title="Send mail to '.$row->bill_name.'" ><i class="fa fa-envelope"></i></a></td></tr>';
                                }

                              }
                              else
                              {


                                 $get_branch = $CI->my_model->select_invoice_br($parentHodList[0]->branch);
                                $i = 1;
                                     for ($j=0; $j <count($get_branch); $j++) {
                                   $row = $get_branch[$j];


                                //  foreach ($info['invoice'] as $row ) {

                                   $aa = base_url();

                                    $base_64 = base64_encode($row->invoice_number);
                                    $url_param = rtrim($base_64, '=');

                                    $base_64 = $url_param . str_repeat('=', strlen($url_param) % 4);

                                   echo '<tr><td>'.($i++).'</td><td><a href="javascript:void(0);" title="">'.$row->invoice_number.'</a></td><td>'.$row->customer_id.'</td><td>'.$row->booking_id.'</td><td>'.$row->bill_name.'</td><td>'.$row->paydate.'</td><td>'.$row->bill_email.'<br></td><td class="crud-actions">  <a href="'.$aa.'user/clientinvoive/'.$url_param.'" target="_blank" ><i class="fa fa-file-pdf-o"></i> </a> | <a href="'.$aa.'crm/clientinvoive/'.$url_param.'" target="_blank" ><i class="fa fa-download"></i> </a> | <a href="javascript:void(0);" id="btn_sendmail" data-invoice="'.$url_param.'" data-mail="'.$row->bill_email.'"  title="Send mail to '.$row->bill_name.'" ><i class="fa fa-envelope"></i></a></td></tr>';
                                }


                              }

                                ?>

                              </tbody>
                           </table>
                      <div class="pagination"></div>
                </div>

                     </div>

                     <p>&nbsp;</p>

                  </div>

               </div>

               <!-- /.box-body -->

            </div>

            <!-- /.box -->

         </div>

         <!-- /.col -->

      </div>

      <!-- /.row -->

   </section>

   <!-- /.content -->


<!-- Modal -->
  <div class="modal fade " id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Booking Details </h4>
        </div>
        <div class="modal-body">
         <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-md-6">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <span id="cname"></span>
            <small class="pull-right">ID: <span id="cid"></span></small>
          </h2>
        </div>

         <div class="col-md-6">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <span id="cname"></span>
            <small class="pull-right">Booking ID: <span id="bid"></span></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">

          <div class="col-md-6 invoice-col">
          <h3>Customer Info </h3>

              <address>

            Phone: <span id="cphone"></span><br>
            Email: <span id="cemail"></span><br>

            Address: <span class="cls_address"></span><br>
            City: <span class="cls_city"></span><br>
            Pincode: <span class="cls_pin"></span>
          </address>

        </div>
        <div class="col-md-6 invoice-col">
         <h3> Customer Booking Info</h3>

              <address>

            Car / Bike Name: <span class="car_name"></span><br>
            Car / Bike Number: <span class="car_number"></span><br>
            Car / Bike colour: <span class="car_color"></span><br>
            Car / Bike Remarks: <span class="car_remark"></span><br>

            Pickup Location: <span class="pik_location"></span><br>
            Remarks: <span class="remark"></span><br>
            Price: <span class="clsprice"></span><br>
            Advance Received: <span class="cls_received"></span><br>
            Package : <span class="cls_package"></span><br>
            Preferred Date: <span class="date_pre"></span>
          </address>

        </div>

      </div>

      <div class="row" id="jdata">

      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">

      </div>
    </section>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


    <div class="modal fade" id="edit_booking" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Edit Booking  </h4>
        </div>
        <div class="modal-body">
         <form role="form" name="edit_form" id="edit_form">
          <div class="col-md-4">
              <div class="box-body">

                <div class="form-group">
                  <label for="exampleInputEmail1">Member ID </label>
                  <input type="text" class="form-control" id="ecid" name="ecid" readonly="true"  >
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Name </label>
                  <input type="text" class="form-control" id="ecname" name="ecname" placeholder="Enter Name">
                </div>

                 <div class="form-group">
                  <label for="exampleInputEmail1">Number </label>
                  <input type="text" class="form-control" id="ecnumber" name="ecnumber" placeholder="Enter Number">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email </label>
                  <input type="email" class="form-control" id="ecemail" name="ecemail" placeholder="Enter Email">
                </div>

                 <div class="form-group">
                  <label for="exampleInputEmail1">Address </label>
                  <input type="text" class="form-control" id="ecaddress" name="ecaddress" placeholder="Enter Address">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">City  </label>
                  <input type="text" class="form-control" id="ecity" name="ecity" placeholder="Enter City">
                </div>
              </div>
             </div>
             <div class="col-md-4">
                 <div class="box-body">

                <div class="form-group">
                  <label for="exampleInputEmail1">Booking ID </label>
                  <input type="text" class="form-control" id="ebookid" name="ebookid" readonly="true"  >
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Car Name </label>
                  <input type="text" class="form-control" id="ecarname" name="ecarname" placeholder="Enter Name">
                </div>

                 <div class="form-group">
                  <label for="exampleInputEmail1">Car Number </label>
                  <input type="text" class="form-control" id="ecarnumber" name="ecarnumber" placeholder="Enter Number">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1"> Car Color </label>
                  <input type="email" class="form-control" id="ecarcolor" name="ecarcolor" placeholder="Enter colour">
                </div>

                  <div class="form-group">
                  <label for="exampleInputEmail1"> Pickup Location </label>
                  <input type="email" class="form-control" id="epiklocation" name="epiklocation" placeholder="Enter Location">
                </div>


              </div>

             </div>
                          <div class="col-md-4">
                 <div class="box-body">

                 <div class="form-group">
                  <label for="exampleInputEmail1">Price </label>
                  <input type="text" class="form-control" id="eprice" name="eprice" placeholder="Enter price">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Advance Price </label>
                  <input type="text" class="form-control" id="eadvprice" name="eadvprice" placeholder="Enter Price">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Package  </label>
                  <select   id="epackage" name="epackage" class="form-control">

                         <option value="Silver">Silver </option>

                         <option value="Gold">Gold</option>

                         <option value="Platinum">Platinum</option>

                         <option value="Platinum Plus">Platinum Plus</option>

                      </select>

                </div>

                 <div class="form-group">
                  <label for="exampleInputEmail1">Date </label>
                  <input type="text" class="form-control" id="epredate" name="epredate" placeholder="Enter Date">
                </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Remark </label>
                  <input type="text" class="form-control" id="eremark" name="eremark" placeholder="Enter Remark">
                </div>

              </div>

             </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" class="btn btn-primary" id="edit_btn" style="float: right;">Update</button>
              </div>
            </form>
        </div>

      </div>

    </div>
  </div>



</div>
<script type="text/javascript">
   $(document).ready(function() {
    $('#list1').DataTable();
} );


   $(document).on('click','.cls_bk_details',function(){

           cid = $(this).attr('id');
           sno = $(this).attr('data-sno');
           mdata = 'cid='+escape(cid)+'&sno='+escape(sno);

            $.ajax({
                 type:'post',
                 url:'<?php echo base_url(); ?>user/get_client_by_bk',
                 data:mdata,
                 dataType:'json',

                 success:function(htm){
                     console.log(htm);

                      $('#cid').text(htm[0].customer_id);
                      $('#cname').text(htm[0].name);
                      $('#cphone').text(htm[0].number);
                      $('#cemail').text(htm[0].email);

                      $('#bid').text(htm[0].booking_id);

                      $('.car_name').text(htm[0].vehicle_name);
                      $('.car_number').text(htm[0].vehicle);
                      $('.car_color').text(htm[0].vehicle_color);

                      $('.car_remark').text(htm[0].remark_vehicle);
                      $('.pik_location').text(htm[0].pickup);
                      $('.remark').text(htm[0].remark_package);

                      /*$('.cls_advance').text(htm[0].advance);*/


                      $('.clsprice').text(htm[0].price);
                      $('.cls_received').text(htm[0].advance);
                      $('.cls_package').text(htm[0].package);
                      $('.date_pre').text(htm[0].date);



                            $('.cls_address').text(htm[0].address);
                      $('.cls_city').text(htm[0].city);
                      $('.cls_pin').text(htm[0].pincode);



                 }

            });
   });

   //

   $(document).on('click','#btn_sendmail',function(){

    var email = $(this).attr('data-mail');
    var invoice = $(this).attr('data-invoice');


$.confirm({
    title: 'Confirm Alert!',
    content: 'Are you sure you want to send invoice to '+email,
     type: 'orange',
    buttons: {
        confirm: function () {
                $.ajax({

          type:'post',
          url:'<?php echo base_url(); ?>user/send_invoice',
          data:{'mail':email,'invoice':invoice},
         // dataType:'json',
          success:function(htm){
            if (htm == '1') {

                                     $.alert({
              animationBounce: 1.5,
    title: 'Success',
    content: 'Invoice sent successfully..',
     type: 'green'
});

            }
            else if(htm == '0')
            {
                 $.alert({
              animationBounce: 1.5,
    title: 'Error',
    content: 'Problem With Email Server !',
     type: 'red'
});
            }
            else
            {
                  $.alert({
              animationBounce: 1.5,
    title: 'Error',
    content: 'Invalid Email',
     type: 'red'
});
            }

          }
    });
        },
        cancel: function () {
             $.alert('cancel');
        }
    }
});



   });

  // cls_bk_edit

   $(document).on('click','.cls_bk_edit',function(){

           ecid = $(this).attr('id');
           esno = $(this).attr('data-sno');
           emdata = 'cid='+escape(ecid)+'&sno='+escape(esno);

            $.ajax({
                 type:'post',
                 url:'<?php echo base_url(); ?>user/get_client_by_bk',
                 data:emdata,
                 dataType:'json',
                 success:function(htm){


                      $('#ecid').val(htm[0].customer_id);
                      $('#ecname').val(htm[0].name);
                      $('#ecnumber').val(htm[0].number);
                      $('#ecemail').val(htm[0].email);
                      $('#ecaddress').val(htm[0].address);
                      $('#ecity').val(htm[0].city);

                      $('#ebookid').val(htm[0].booking_id);
                      $('#ecarname').val(htm[0].vehicle_name);
                      $('#ecarnumber').val(htm[0].vehicle);
                      $('#ecarcolor').val(htm[0].vehicle_color);

                    //   $('.car_remark').text(htm[0].remark_vehicle);
                     /*$('.cls_advance').text(htm[0].advance);*/

                      $('#epiklocation').val(htm[0].pickup);
                      $('eremark').val(htm[0].remark_package);
                      $('#eprice').val(htm[0].price);
                      $('#eadvprice').val(htm[0].advance);
                      $('#epackage').val(htm[0].package);
                      $('#epredate').val(htm[0].date);

                      //$('epr').text(htm[0].date);
                           //  $('#pincode').text(htm[0].pincode);
                 }

            });

   });

   $('#edit_btn').click(function(){

        from_edit = $('#edit_form').serialize();



            $.ajax({
                 type:'post',
                 url:'<?php echo base_url(); ?>user/update_client',
                 data:from_edit,
                 dataType:'json',
                 success:function(htm){
                     console.log(htm);
                     console.log(htm.messages);
             if (htm.success == true) {

                  console.log(htm.message);
               //   alert('Date saved !');

                              $.alert({
              animationBounce: 1.5,
    title: 'Success',
    content: 'Record saved successfully..',
     type: 'green'
});

                  $('.close').trigger('click');
              }
              else

              {



                  $.each(htm.messages,function(key,value) {

                     element = $('#'+key);

                     element.closest('div.form-group')

                     .removeClass('has-error')

                     .addClass(value.length > 0 ? 'has-error':'has-success')

                     .find('.text-danger').remove();

                     element.after(value);

                  });



              }
                 }

            });

   });

   $('.cls_bk_delete').click(function(){

sno =   $(this).attr('data-sno');

$.confirm({
    title: 'Confirm Alert!',
    content: 'Are you sure you want to delete this record..',
     type: 'orange',
    buttons: {
        confirm: function () {
              $.ajax({
                 type:'post',
                 url:'<?php echo base_url(); ?>user/del_fullowup_booking',
                 data:'sno='+escape(sno),
                 cache:false,
                 success:function(htm){

               //   alert('Deleted='+htm);

                              $.alert({
              animationBounce: 1.5,
    title: 'Successfully Deleted',
    content: 'Record was deleted successfully..',
     type: 'green'
});

                  location.reload();

                 }

               });
        },
        cancel: function () {
             $.alert('Your Record is safe now ');
        }
    }
});








});

</script>
<?php include('footer.php'); ?>
