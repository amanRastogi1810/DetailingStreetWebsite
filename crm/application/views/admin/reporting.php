<?php 
$this->load->model('my_model');
$invoice = $this->my_model->get_data('invoice'); 
include('header.php');
include('menu.php');

?>
<style type="text/css">
  address span{
    color: red;
  }
</style>
<div class="content-wrapper" style="min-height: 542px; overflow: scroll;">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Report
      </h1>
      <ol class="breadcrumb">
         <li class="active">
            User Reporting
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



                  <div id="list1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                     <div class="row">
                        <div class="col-sm-9">
                           <div class="form-group">
                            </div>
                           <br> <br>
                        </div>
                      </div>
                     <div class="row">
<div class="col-sm-12">
  <div class="col-sm-6">
                    <select class="form-control valid" name="search_col" id="search_col">
                        <option value="number">Mobile No. </option>
                        <option value="email">Email Address</option>
                        <option value="vehicle">Car Registration No </option>
                    </select>

      <input type="text" class="form-control" name="search_txt" id="search_txt" placeholder="Enter Selected Option">

                    <button class="btn btn-primary btn-next" type="button" id="btn_searchreport" style="margin-left:10px;">Search </button>
                    <br>
                    <br>
                  </div>

                  <table id="" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="list1_info" style="overflow: auto;" >
                              <thead>
                              <tr role="row">
	                              <th class="header">#</th>
                                 <th class="yellow header headerSortDown">Name</th>
                                  <th class="yellow header headerSortDown">Number</th>
                                 <th class="yellow header headerSortDown">Email</th>
                                 <th class="yellow header headerSortDown">Branch</th>
	                             <th class="yellow header headerSortDown" nowrap="nowrap" width="1%">BookingID</th>
	                             <th class="yellow header headerSortDown" nowrap="nowrap" width="">CustomerID</th>
	                              <th class="red header">Actions</th>
                              </tr>
                              </thead>
                              <tbody id="print">

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
          <h4 class="modal-title">Customer Details </h4>
        </div>
        <div class="modal-body">
         <section class="invoice">
      <!-- title row -->

      <!-- info row -->
      <div class="row invoice-info">

          <div class="col-md-6 invoice-col">
          <h3>Customer Info  :    <span id="cid"></span> </h3>
           <hr>
              <address>

				  Name: <span id="cname"></span><br>
            Phone: <span id="cphone"></span><br>
            Email: <span id="cemail"></span><br>

            Address: <span class="cls_address"></span><br>
            City: <span class="cls_city"></span><br>
            Pincode: <span class="cls_pin"></span>
          </address>

        </div>
        <div class="col-md-6 invoice-col">
			<h3> Booking Info   :   <span id="bid"></span></h3>
           <hr>
			<address>

				Vehicle Registration No. : <span class="car_number"></span><br>
				Vehicle Name: <span class="car_name"></span><br>
				Vehicle Colour: <span class="car_color"></span><br>

				Date :  <span class="pik_date"></span><br>
				PickUp :  <span class="pik_location"></span><br>
				Price: <span class="clsprice"></span><br>
				Advance: <span class="cls_received"></span><br>
				Package: <span class="cls_package"></span>
			</address>

        </div>
        <div class="col-md-12 invoice-col">
         <h3> Customer Invoice   :   <span id="invoice"></span></h3>
           <hr>
			<address>
				Bill Name: <span class="in_bname"></span><br>
				Bill Address: <span class="in_badd"></span><br>
				Bill Email: <span class="in_bemail"></span><br>
				Bill Phone: <span class="in_bphone"></span><br>

				Vehicle : <span class="in_v"></span><br>
				Vehicle Type: <span class="in_vtype"></span><br>
				Vehicle Reg No: <span class="in_vrno"></span><br>
				Vehicle Model: <span class="in_vmodel"></span><br>
				Vehicle color: <span class="in_vcolor"></span><br>

				Coating Studio :  <span class="in_cs"></span><br>
				Grand Total :  <span class="in_gtotal"></span><br>

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





</div>
<script type="text/javascript">
 
   $(document).on('click','#btn_searchreport',function(){

   		search_col =	$('#search_col').val();
   		search_txt =	$('#search_txt').val();
   		// console.log(search_col)
   		// console.log(search_txt)

  /*    if (search_txt == '') {
        alert('please enter uniqe id number .')
      }
      else
      {*/
                $.ajax({
                  type:'post',
                  url:'<?php echo base_url();?>user/report',
                  data:{'search_col':search_col,'search_txt':search_txt},
                  dataType:'text',
                  success:function(htm){
                    // console.log(htm);
                    $('#print').html(htm);
                  }
            });
     // }



   });


   $(document).on('click','.cls_more',function(){


           sno = $(this).attr('data-sno');
           mdata = 'sno='+escape(sno);
	   // console.log(mdata)
            $.ajax({
                 type:'post',
                 url:'<?php echo base_url(); ?>user/get_client_by_bk',
                 data:mdata,
                 dataType:'json',
                  
                 success:function(htm){
                     // console.log(htm);

                      $('#cid').text(htm[0].customer_id);
                      $('#cname').text(htm[0].name);
                      $('#cphone').text(htm[0].number);
                      $('#cemail').text(htm[0].email);

                      $('#bid').text(htm[0].booking_id);

                      $('.car_name').text(htm[0].vehicle_name);
                      $('.car_number').text(htm[0].vehicle);
                      $('.car_color').text(htm[0].vehicle_color);

                      $('.car_remark').text(htm[0].remark_vehicle);
					 $('.pik_date').text(htm[0].date);
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

                      // Invoice

					 $('#invoice').text(htm[0].invoice_number);

					 $('.in_bname').text(htm[0].bill_name);
					 $('.in_badd').text(htm[0].bill_address);
					 $('.in_bemail').text(htm[0].bill_email);
					 $('.in_bphone').text(htm[0].bill_phone);

					 $('.in_v').text(htm[0].vehicle);
					 $('.in_vmodel').text(htm[0].vehicle_model);
					 $('.in_vcolor').text(htm[0].vehicle_color);
					 $('.in_vrno').text(htm[0].vehicle_regno);
					 $('.in_vtype').text(htm[0].vehicle_type);

					 $('.in_cs').text(htm[0].coating_studio);
					 $('.in_gtotal').text(htm[0].grand_total);




                 } 

            });
   });

   // 

   

  // cls_bk_edit

   

   
   
</script>
<?php include('footer.php'); ?>
