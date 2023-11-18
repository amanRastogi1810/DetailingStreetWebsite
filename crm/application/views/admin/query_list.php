<?php 
 
include('header.php'); ?>

<?php include('menu.php'); ?>

<div class="content-wrapper" style="min-height: 542px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>

         Service Query List

         <small> <a href="<?php echo base_url(); ?>user/add_query" class="btn btn-primary">Add a new</a> </small>

      </h1>

      <ol class="breadcrumb">

         <li class="active">

            Service Query List

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

                           <br><br>

                        </div>

                                             </div>

                     <div class="row">

                        <div class="col-sm-12">

                           <table id="list1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="list1_info">

                              <!--table-hover--> 

                              <thead>

                             <tr role="row">
                    <th class="header">#</th>
                    <th class="yellow header headerSortDown">Priority</th>
                    <th class="yellow header headerSortDown">Client Name</th>                    
                    <th class="yellow header headerSortDown">Mobile No.</th>
                    <th class="yellow header headerSortDown">Query Date &amp; Time</th>
                    <th class="yellow header headerSortDown">Followup Date</th>
                    <th class="yellow header headerSortDown">Location</th>
                    <th class="red header">Actions</th>
                  </tr>

                              </thead>

                              <tbody>                      

                                 <?php 

                                 
                                if ($parentHodList[0]->user_type == 0 && $parentHodList[0]->type == 'superadmin') {
                                  # code...
                                

                                for ($i=0; $i <count($info['query']); $i++) {
                                   $row = $info['query'][$i];
                                   $location=$CI->my_model->get_table_by_column('branch','bid',$row->bid);
                                   if($location){$locationname=$location[0]->name;}else {$locationname='Detailing Street';}
                                   echo '<tr class="viewed"><td>'.($i+1).'</td><td></td><td>'.$row->client_name.'</td><td>'.$row->mobile.'</td><td><b>Date : </b>'.$row->query_date.'<br></td><td>'.$row->follow_up_date.'</td><td class="qLocation">'.$locationname.'</td><td class="crud-actions"><a href="javascript:void(0);" title="View Details" data-toggle="modal" data-target="#myModal_view" class="cls_view" data-sno="'.$row->sno.'" ><i class="fa fa-eye"></i></a> <a href="javascript:void(0);" title="Edit " data-sno="'.$row->sno.'" data-toggle="modal" data-target="#myModal_editquery"  class="cls_edit" ><i class="fa fa-pencil"></i></a></td></tr>';
                                }
                              }
                              else
                              {

                                
                                $get_branch = $CI->my_model->get_table_by_column('query','bid',$parentHodList[0]->branch);
                                     for ($i=0; $i <count($get_branch); $i++) {
                                   $row = $get_branch[$i];
										 $location=$CI->my_model->get_table_by_column('branch','bid',$row->bid);
										 if($location){$locationname=$location[0]->name;}else {$locationname='Detailing Street';}

                                   echo '<tr class="viewed"><td>'.($i+1).'</td><td></td><td>'.$row->client_name.'</td><td>'.$row->mobile.'</td><td><b>Date : </b>'.$row->query_date.'<br></td><td>'.$row->follow_up_date.'</td><td class="qLocation">'.$locationname.'</td><td class="crud-actions"><a href="javascript:void(0);" title="View Details" data-toggle="modal" data-target="#myModal_view" class="cls_view" data-sno="'.$row->sno.'" ><i class="fa fa-eye"></i></a> </td></tr>';
                                }

                              }



                                 ?>
                                       <!-- <tr class="viewed"><td>1</td><td></td><td>Mayank Bhatnagar</td><td>9871753634</td><td><b>Date : </b>25th Apr 2018<br><b>Time : </b>09:10 PM</td><td></td><td class="qLocation">RADIANT DETAILERS</td><td class="crud-actions"><a href="https://crm.onyxaa.com/admin/query/change_status/4874" id="fb-lnk-4874" rel="facebox" title="Change Status"><i class="fa fa-check"></i></a><a href="https://crm.onyxaa.com/admin/query/add_followup_date/4874" title="Add Followup Date"><i class="fa fa-calendar"></i></a><a href="https://crm.onyxaa.com/admin/query/transfer_quote/4874" id="fb-lnk-4874" rel="facebox" title="Transfer Query"><i class="fa fa-exchange"></i></a></td></tr> -->

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

</div>


<div class="modal fade  in" id="myModal_view"  role="dialog" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Query Details </h4>
        </div>
        <div class="modal-body">
         <section class="invoice">
      <div class="row invoice-info">
        
          <div class="col-md-6 invoice-col">
          <h3>Customer Info </h3>
           <address>
			   <i class="fa fa-user">    :</i><span id="qname"></span><br>
			   <p> <i class="fa fa-envelope"> : </i><span id="qemail"></span><br></p>
			   <p><i class="fa fa-phone"></i>: <span id="qmobile"></span><br></p>
			   <p><i class="fa fa-calendar"> </i><b>Query Date</b> : <span id="qdate"> </span><br></p>
			   <p><i class="fa fa-calendar"> </i><b>Followup Date</b> : <span id="followndate"> </span><br></p>
			   <p><i class="fa fa-map-marker"> </i> : <span id="location"> </span><br></p>
			   <p><i class="fa fa-car"> </i>: <span id="car_name"> </span><br></p>
             
          </address>
           
        </div>
		  <div class="col-md-6">
			  <br><br>
			  <p><i class="fa fa-comment"> </i> : <span style="	color: green;"> Comments </span></p>
			  <div class="box box-widget" style="height: 200px;overflow-y: scroll;">

				  <!-- /.box-header -->

				  <!-- /.box-body -->
				  <div class="box-footer box-comments">
					  <div class="comment-text">

					  </div>



				  </div>

			  </div>
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


<div class="modal fade  in" id="myModal_editquery"  role="dialog" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Query Details Edit </h4>
        </div>
        <div class="modal-body">
          <div class="modal-body">
         <form role="form" name="query_form_details" id="query_form_details">

          <input type="hidden" class="form-control" id="query_sno"  name="query_sno"  >

          <div class="col-md-12">
            
              <div class="box-body" >

                <div class="form-group">
                  <label for="exampleInputEmail1">Name  </label>
                  <input type="text" class="form-control" id="query_name" name="query_name" >
                </div>

                  <div class="form-group">
                  <label for="exampleInputEmail1">Email </label>
                  <input type="text" class="form-control" id="query_email" name="query_email" placeholder="Enter Email">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Phone </label>
                  <input type="text" class="form-control" id="query_phone" name="query_phone" placeholder="Enter Phone">
                </div>

                 <div class="form-group">
                  <label for="exampleInputEmail1">Query Date </label>
                  <input type="text" class="form-control" id="query_mobile" name="query_date" readonly="true"  >
                </div>
 

                 <div class="form-group">
                  <label for="exampleInputEmail1">Followup Date </label>
                  <input type="text" class="form-control" id="query_follow" name="query_follow" placeholder="Enter Date">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Car </label>
                  <input type="text" class="form-control" id="query_car" name="query_car" placeholder="Enter Car">
                </div>

                 <div class="form-group">

                    <label for="branch_code" class="control-label">Branch: <font class="req">*</font></label>

                    <div class="">
                    
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

              <div class="box-footer">
                <button type="button" class="btn btn-primary" id="qiery_edit_btn" style="float: right;">Update</button>
              </div>
            
            </form>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<script type="text/javascript">
   $(document).ready(function() {
   $('#list1').DataTable({
		"sScrollX": "100%",
		"bScrollCollapse": true,
		"bJQueryUI": true,
		"bAutoWidth": false
	});


});


   $(document).on('click','.cls_view',function(){

    sno = $(this).attr('data-sno');
    mdata = 'sno='+escape(sno);

    locationname=$(this).parent('td').prev('td').html();

          $.ajax({
              type:'post',
              url:'<?php echo base_url(); ?>user/get_query_details',
              data:mdata,
              dataType:'json',
              success:function(htm)
              { 
                // console.log(htm);
                $('#qname').text(htm[0].client_name);
                $('#qemail').text(htm[0].email);
                $('#qmobile').text(htm[0].mobile);
                $('#qdate').text(htm[0].query_date);
                $('#followndate').text(htm[0].follow_up_date);


                $('#location').text(locationname);
                
                $('#car_name').text(htm[0].car_name);
				  // $('.comment').text(htm[0].comment);

				  comment_data =  htm[0].comment;

				  // console.log(comment_data);

				  var comment_array = comment_data.split(';');
				  // console.log(comment_array);
				  $.each(comment_array,function(i,val){


					  newcomnt = val.split('&');

// console.log(newcomnt)
					  $('.comment-text').append(newcomnt[0]);
					  $('.comment-text').append('<br>');
					  $('.comment-text').append(newcomnt[1]);
					  /*  $.each(newcomnt,function(ij,val1){
							$('.comment-text').append('<span class="username"><span class="text-muted pull-right datenew"></span></span>'+val1);
						});*/
					  // $('.comment-text').append('<p></p>');
                     $('.comment-text').append('<hr>');
				  });

			  }
          });

   });


      $(document).on('click','.cls_edit',function(){

      sno = $(this).attr('data-sno');
      mdata = 'sno='+escape(sno);
 
          $.ajax({
              type:'post',
              url:'<?php echo base_url(); ?>user/get_query_details',
              data:mdata,
              dataType:'json',
              success:function(htm)
              { 
                console.log(htm[0].client_name);
                $('#query_name').val(htm[0].client_name);
                $('#query_email').val(htm[0].email);
                $('#query_phone').val(htm[0].mobile);
                $('#query_mobile').val(htm[0].query_date);
                $('#query_follow').val(htm[0].follow_up_date);
                $('#location').val('INDIA');
                $('#query_car').val(htm[0].car_name);
                $('#query_sno').val(htm[0].sno);


              }
          });

   });

      

      $('#qiery_edit_btn').click(function(){



          datanew = $('#query_form_details').serialize();

           $.ajax({
              type:'post',
              url:'<?php echo base_url(); ?>user/update_query_new',
              data:datanew,
              dataType:'json',
              success:function(htm)
              { 

                console.log(htm);

                if (htm.success == true) {
                 // alert('data saved !');
                               $.alert({
              animationBounce: 1.5,
    title: 'Success',
    content: 'Record saved successfully..',
    type: 'green'
});
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

</script>
<?php include('footer.php'); ?>
