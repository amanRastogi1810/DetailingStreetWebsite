<?php 
 

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

         Service Booking List

         <small> <a href="<?php echo base_url(); ?>user/new_booking" class="btn btn-primary">Add a new</a> </small>

      </h1>

      <ol class="breadcrumb">

         <li class="active">

            Service Booking List

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
                                    <th class="yellow header headerSortDown" nowrap="nowrap" width="1%">Booking No</th>
                                    <th class="yellow header headerSortDown" nowrap="nowrap" width="1%">Type of Booking</th>
                                    <th class="yellow header headerSortDown">Car / Bike Number</th>
                                    <th class="yellow header headerSortDown">Service Remarks</th>
									 <th class="yellow header headerSortDown">Branch</th>
                                    <th class="yellow header headerSortDown">Preferred Date &amp; Time</th>
                                    <th class="red header">Actions</th>
                                 </tr>

                              </thead>

                              <tbody>                      

                                 <?php



                            
  $y =1;
                                if ($parentHodList[0]->user_type == 0 && $parentHodList[0]->type == 'superadmin') {
                                  # code...
                              

                                 foreach ($info['booking_invoice'] as $row) {

									 $location=$CI->my_model->get_table_by_column('branch','bid',$row->bid);
									 if($location){$locationname=$location[0]->name;}else {$locationname='Detailing Street';}
                                   echo '<tr  ><td>'.$y++.'</td><td><a href="javascript:void(0);" title="">'.$row->booking_id.'</a></td><td>new</td><td>'.$row->vehicle.'</td><td>'.$row->remark_vehicle.'</td><td>'.$locationname.'</td><td><strong>Date:</strong>'.$row->date.'<br></td><td class="crud-actions"><a href="javascript:void(0)" name="cid" data-sno='.$row->sno.' id="'.$row->customer_id.'" class="cls_bk_details" title="View" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a><a href="javascript:void(0);" title="Edit" data-toggle="modal" data-target="#edit_booking" id="'.$row->customer_id.'" data-sno='.$row->sno.' class="cls_bk_edit"  ><i class="fa fa-edit"></i></a> | <a href="javascript:void(0)" name="del" data-sno='.$row->sno.' id="'.$row->customer_id.'" class="cls_bk_delete" title="Delete"  ><i class="fa fa-remove"></i></a> </td></tr>';
                                }
                              }
                              else{

                              	$location=$CI->my_model->get_table_by_column('branch','bid',$parentHodList[0]->branch);
                                $get_branch = $CI->my_model->get_booking_invoice($parentHodList[0]->branch);
                                
                                     for ($i=0; $i <count($get_branch); $i++) {
                                   $row = $get_branch[$i];
 
                                   echo '<tr  ><td>'.$y++.'</td><td><a href="javascript:void(0);" title="">'.$row->booking_id.'</a></td><td>new</td><td>'.$row->vehicle.'</td><td>'.$row->remark_vehicle.'</td><td>'.$location[0]->name.'</td><td><strong>Date:</strong>'.$row->date.'<br></td><td class="crud-actions"><a href="javascript:void(0)" name="cid" data-sno='.$row->sno.' id="'.$row->customer_id.'" class="cls_bk_details" title="View" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a></td></tr>';
                                }
                              }

                                 ?>
                              </tbody>

                           </table>

                           <div class="pagination"></div>                        </div>

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

<!--			Name: <span id="cname"></span><br>-->
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

                  
                   
                     <div class="form-group">

                    <label for="zip_code" class="col-sm-12 control-label">Branch: <font class="req">*</font></label>

                    <div class="col-sm-12">
                    
                    <?php 
                    if (isset($get_branch[0])) {
                       ?>
                       <input type="hidden" value="<?php echo $get_branch[0]->bid; ?>" name="bid" id="bid">               
                       <?php
                    }
                    else
                    {
                      $get_bid = $CI->my_model->get_data('branch');


                      echo '<select class="form-control valid" name="bid" id="bid">';
                      for ($i=0; $i < count($get_bid); $i++) { 
                       
                        ?>

                        <option value="<?php echo $get_bid[$i]->bid; ?>"><?php echo $get_bid[$i]->name; ?></option>
                        <?php
                      }
                      echo '</select>';
                    }

                    ?>
                      

                    </div>

                  
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

	   locationname=$(this).parent('td').prev('td').prev('td').html();
	   sno = $(this).attr('data-sno');
	   mdata = 'sno='+escape(sno);
	   console.log('show')

	   console.log(mdata)
            
            $.ajax({
                 type:'post',
                 url:'<?php echo base_url(); ?>user/get_client_by_bk_booking',
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

  // cls_bk_edit

   $(document).on('click','.cls_bk_edit',function(){

           ecid = $(this).attr('id');
           esno = $(this).attr('data-sno');
           emdata = 'sno='+escape(esno);
           console.log('edit')
            console.log(emdata);
            $.ajax({
				type:'post',
				url:'<?php echo base_url(); ?>user/get_client_by_bk_booking',
				data:emdata,
				dataType:'json',
                 success:function(htm){
                    console.log(htm);
      
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
