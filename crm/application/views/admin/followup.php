<?php 
 

      include('header.php'); 
      include('menu.php'); 

?>
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
 
          <div class="nav-tabs-custom" style="overflow-x: auto;">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Today's Followup List</a></li>
              <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Missed Followup List</a></li>
              <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">All Followup List</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="activity">
                <!-- Post -->
              <table id="list1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="list1_info">

                              <!--table-hover--> 

                      <thead style="background-color:#319026; color: white;">
                                          <tr role="row">
                                             <th class="header">#</th>
                                             <th class="yellow header headerSortDown">Priority</th>
                                             <th class="yellow header headerSortDown">Client Name</th>
                                             <th class="yellow header headerSortDown">Email</th>
                                             <th class="yellow header headerSortDown">Mobile No.</th>
                                             <th class="yellow header headerSortDown">Workshop.</th>
                                             <th class="yellow header headerSortDown">Followup Date</th>
                                             <th class="red header">Status</th>
                                             <th class="red header">Actions</th>
                                          </tr>
                                       </thead>

                              <tbody>                      

                                 <?php 

                                         
                                 
                                if ($parentHodList[0]->user_type == 0 && $parentHodList[0]->type == 'superadmin') {
                                  # code...
                                



                                for ($i=0; $i <count($info['today']); $i++) { 
                                   $row = $info['today'][$i];
									$location=$CI->my_model->get_table_by_column('branch','bid',$row->bid);
									if($location){$locationname=$location[0]->name;}else {$locationname='Detailing Street';}

                                   if ($row->status == 1) {
                                     $status = '<span style="color:green">Open</span>';
                                   }
                                   else
                                   {
                                      $status = '<span style="color:red">Closed</span>';
                                   }
                                   echo '<tr><td>'.($i+1).'</td><td><a href="'.(base_url()).'/user/view/'.'id'.'"   >H</a></td><td>'.$row->client_name.'</td><td>'.$row->email.'</td><td>'.$row->mobile.'</td><td>'.$locationname.'</td><td>'.$row->follow_up_date.'</td><td><strong><a href="javascript:void(0);" id="'.$row->sno.'" class="get_sno" >'.$status.'</strong><br></td><td class="crud-actions"><a href="javascript:void(0)" name="cid" data-sno='.$row->sno.' id="'.$row->follow_up_date.'" class="cls_bk_details" title="View" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>--<a href="javascript:void(0)" name="del" data-sno='.$row->sno.' id="'.$row->follow_up_date.'" class="cls_bk_delete" title="Delete"  ><i class="fa fa-remove"></i></a> </td></tr>';
                                }

                              }
                              else
                              {
                                  $value = date('Y-m-d');
                                   $get_branch = $CI->my_model->get_today_follow_br('query',$value,$parentHodList[0]->branch);
                                     for ($i=0; $i <count($get_branch); $i++) {
                                   $row = $get_branch[$i];
										 $location=$CI->my_model->get_table_by_column('branch','bid',$row->bid);
										 if($location){$locationname=$location[0]->name;}else {$locationname='Detailing Street';}

 

                                   if ($row->status == 1) {
                                     $status = '<span style="color:green">Open</span>';
                                   }
                                   else
                                   {
                                      $status = '<span style="color:red">Closed</span>';
                                   }
                                   echo '<tr><td>'.($i+1).'</td><td><a href="'.(base_url()).'/user/view/'.'id'.'"   >H</a></td><td>'.$row->client_name.'</td><td>'.$row->email.'</td><td>'.$row->mobile.'</td><td>'.$locationname.'</td><td>'.$row->follow_up_date.'</td><td><strong><a href="javascript:void(0);" id="'.$row->sno.'" class="get_sno" >'.$status.'</strong><br></td><td class="crud-actions"><a href="javascript:void(0)" name="cid" data-sno='.$row->sno.' id="'.$row->follow_up_date.'" class="cls_bk_details" title="View" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>  </td></tr>';
                                }
                              }

                                 ?>

                                 

                              </tbody>

                           </table>
                
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                 
                  <table id="list2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="list1_info">

                              <!--table-hover--> 

                      <thead style="background-color:#8e2a2a; color: white;">
                                          <tr role="row">
                                             <th class="header">#</th>
                                             <th class="yellow header headerSortDown">Priority</th>
                                             <th class="yellow header headerSortDown">Client Name</th>
                                             <th class="yellow header headerSortDown">Email</th>
                                             <th class="yellow header headerSortDown">Mobile No.</th>
                                             <th class="yellow header headerSortDown">Workshop.</th>
                                             <th class="yellow header headerSortDown">Followup Date</th>
                                             <th class="red header">Status</th>
                                             <th class="red header">Actions</th>
                                          </tr>
                                       </thead>

                              <tbody>                      

                                 <?php 

                                          
                                 
                                if ($parentHodList[0]->user_type == 0 && $parentHodList[0]->type == 'superadmin') {
                                  # code...
                                
                         
 


                                for ($i=0; $i <count($info['missed']); $i++) { 
                                   $row = $info['missed'][$i];
									$location=$CI->my_model->get_table_by_column('branch','bid',$row->bid);
									if($location){$locationname=$location[0]->name;}else {$locationname='Detailing Street';}

                                   if ($row->status == 1) {
                                     $status = '<span style="color:green">Open</span>';
                                   }
                                   else
                                   {
                                      $status = '<span style="color:red">Closed</span>';
                                   }
                                   echo '<tr><td>'.($i+1).'</td><td><a href="'.(base_url()).'/user/view/'.'id'.'"   >H</a></td><td>'.$row->client_name.'</td><td>'.$row->email.'</td><td>'.$row->mobile.'</td><td>'.$locationname.'</td><td>'.$row->follow_up_date.'</td><td><strong><a href="javascript:void(0);" id="'.$row->sno.'" class="get_sno" >'.$status.'</strong><br></td><td class="crud-actions"><a href="javascript:void(0)" name="cid" data-sno='.$row->sno.' id="'.$row->follow_up_date.'" class="cls_bk_details" title="View" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>--<a href="javascript:void(0)" name="del" data-sno='.$row->sno.' id="'.$row->follow_up_date.'" class="cls_bk_delete" title="Delete"  ><i class="fa fa-remove"></i></a>  </td></tr>';
                                }

                              }
else
{

       $value = date('Y-m-d');
                                   $get_branch1 = $CI->my_model->get_miss_follow_br('query',$value,$parentHodList[0]->branch);
                                     for ($i=0; $i <count($get_branch1); $i++) {
                                   $row = $get_branch1[$i];
										 $location=$CI->my_model->get_table_by_column('branch','bid',$row->bid);
										 if($location){$locationname=$location[0]->name;}else {$locationname='Detailing Street';}


                                   if ($row->status == 1) {
                                     $status = '<span style="color:green">Open</span>';
                                   }
                                   else
                                   {
                                      $status = '<span style="color:red">Closed</span>';
                                   }
                                   echo '<tr><td>'.($i+1).'</td><td><a href="'.(base_url()).'/user/view/'.'id'.'"   >H</a></td><td>'.$row->client_name.'</td><td>'.$row->email.'</td><td>'.$row->mobile.'</td><td>'.$locationname.'</td><td>'.$row->follow_up_date.'</td><td><strong><a href="javascript:void(0);" id="'.$row->sno.'" class="get_sno" >'.$status.'</strong><br></td><td class="crud-actions"><a href="javascript:void(0)" name="cid" data-sno='.$row->sno.' id="'.$row->follow_up_date.'" class="cls_bk_details" title="View" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a> </td></tr>';
                                }

}


                                 ?>

                                
                                      

                              </tbody>

                           </table>
                 
                
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                  
                         <table id="list3" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="list1_info">

                              <!--table-hover--> 

                      <thead style="background-color:#2a8266; color: white;">
                                          <tr role="row">
                                             <th class="header">#</th>
                                             <th class="yellow header headerSortDown">Priority</th>
                                             <th class="yellow header headerSortDown">Client Name</th>
                                             <th class="yellow header headerSortDown">Email</th>
                                             <th class="yellow header headerSortDown">Mobile No.</th>
                                             <th class="yellow header headerSortDown">Workshop.</th>
                                             <th class="yellow header headerSortDown">Followup Date</th>
                                             <th class="red header">Status</th>
                                             <th class="red header">Actions</th>
                                          </tr>
                                       </thead>

                              <tbody>                      

                                 <?php 

                                 
                                if ($parentHodList[0]->user_type == 0 && $parentHodList[0]->type == 'superadmin') {
                                  # code...
                                

                                for ($i=0; $i <count($info['all']); $i++) { 
                                   $row = $info['all'][$i];
									$location=$CI->my_model->get_table_by_column('branch','bid',$row->bid);
									if($location){$locationname=$location[0]->name;}else {$locationname='Detailing Street';}

                                   if ($row->status == 1) {
                                     $status = '<span style="color:green">Open</span>';

                                        echo '<tr><td>'.($i+1).'</td><td><a href="'.(base_url()).'/user/view/'.'id'.'"   >H</a></td><td>'.$row->client_name.'</td><td>'.$row->email.'</td><td>'.$row->mobile.'</td><td>'.$locationname.'</td><td>'.$row->follow_up_date.'</td><td><strong><a href="javascript:void(0);" id="'.$row->sno.'" class="get_sno" >'.$status.'</strong><br></td><td class="crud-actions"><a href="javascript:void(0)" name="cid" data-sno='.$row->sno.' id="'.$row->follow_up_date.'" class="cls_bk_details" title="View" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a> --<a href="javascript:void(0)" name="del" data-sno='.$row->sno.' id="'.$row->follow_up_date.'" class="cls_bk_delete" title="Delete"  ><i class="fa fa-remove"></i></a> </td></tr>';
                                   }
                                  /* else
                                   {
                                      $status = '<span style="color:red">Closed</span>';
                                   }*/
                                
                                }

                              }
                              else
                              {

                       
                                   $get_branch1 = $CI->my_model->get_table_by_column('query','bid',$parentHodList[0]->branch);
                                     for ($i=0; $i <count($get_branch1); $i++) {
                                   $row = $get_branch1[$i];
										 $location=$CI->my_model->get_table_by_column('branch','bid',$row->bid);
										 if($location){$locationname=$location[0]->name;}else {$locationname='Detailing Street';}


                                   if ($row->status == 1) {
                                     $status = '<span style="color:green">Open</span>';

                                        echo '<tr><td>'.($i+1).'</td><td><a href="'.(base_url()).'/user/view/'.'id'.'"   >H</a></td><td>'.$row->client_name.'</td><td>'.$row->email.'</td><td>'.$row->mobile.'</td><td>'.$locationname.'</td><td>'.$row->follow_up_date.'</td><td><strong><a href="javascript:void(0);" id="'.$row->sno.'" class="get_sno" >'.$status.'</strong><br></td><td class="crud-actions"><a href="javascript:void(0)" name="cid" data-sno='.$row->sno.' id="'.$row->follow_up_date.'" class="cls_bk_details" title="View" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>  </td></tr>';
                                   }
                                  /* else
                                   {
                                      $status = '<span style="color:red">Closed</span>';
                                   }*/

                                }

                              }

                                 ?>
 

                              </tbody>

                           </table>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        


                          

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
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Followup Details || <span class="cls_status"> </span></h4>
        </div>
        <div class="modal-body">
         <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-md-6">
          <h2 class="page-header" style="font-size: 15px">
            <i class="fa fa-user"></i> <span id="cname"></span>
          </h2>
          <p> <small class="" style="font-size: 15px"><i class="fa fa-car"> </i>: <span id="cid"></span>
              <p><i class="fa fa-phone"></i>  : <span id="cphone"></span> </p>
            </small> 
          </p>
          <p><i class="fa fa-envelope"> </i> : <span class="cls_email"> </span>  </p>
             <p><i class="fa fa-calendar"> </i> : First Follow Up: <span class="flw_date"></span></p>
              <p><i class="fa fa-calendar"> </i> : Last Follow Up: <span class="lst_flw_date"></span></p>
			<p><i class="fa fa-map-marker"> </i> : <span id="location"> </span><br></p>
            <p><i class="fa fa-comment"> </i> : <span style="color: green;"> Comments </span>  
              

           </p>
           <div class=" ">
          <!-- Box Comment -->
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
        <div class="col-md-6">
         <form id="form_status">
                    
    <div class="form-group">
                  <label>Select Status</label>
                  <select class="form-control" id="sel_status" name="sel_status">
                    <option value="1">Open</option>
                    <option value="0" >Close</option>
                  </select>
                </div>

                <div class="form-group">

                        <label for="" class=" control-label">Comment :</label>

                        <div class=" ">

                          <textarea class="form-control" pattern="[a-zA-Z0-9\s]+" rows="3" placeholder="Comment" id="comment" name="comment"></textarea>

                        </div>                        

                     </div>

                     <div class="form-group">

                        <label for="" class=" control-label">Follow-Up Date :</label>

                        <div class=" ">
                          <input type="hidden" name="id_query" id="id_query" class="form-control"  >
                          <input type="datetime" name="followup_date" id="followup_date" class="form-control" placeholder="Enter Follow Up Date">

                        </div>                        

                     </div>
                        <div class="form-group">

                     <label class=" control-label"></label>

                     <button class="btn btn-primary" id="btn_update_status" type="button" style="margin-right:10px;">Update</button>

                    

                  </div>
                  
                  </form>
                  </div>
        <!-- /.col -->
      </div>
      <!-- info row -->

                    
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
   $(document).ready(function() {

    $('#list1').DataTable();
    $('#list2').DataTable();
    $('#list3').DataTable();

        $('#followup_date').datetimepicker({
          dateFormat: 'yyyy:mm:dd',
			minDate:new Date(),
        });
  });



   $(document).on('click','.cls_bk_details',function(){

           qid = $(this).attr('data-sno');
           mdata = 'qid='+escape(qid);

	   locationname=$(this).parent('td').prev('td').prev('td').prev('td').html();


	   $.ajax({
                 type:'post',
                 url:'<?php echo base_url(); ?>user/get_query_byid',
                 data:mdata,
                 dataType:'json',
                 success:function(htm){
                
                      $('#id_query').val(htm[0].sno);
                      $('#cid').text(htm[0].car_name);
                      $('#cname').text(htm[0].client_name);
                      $('#cphone').text(htm[0].mobile);
                      $('#cemail').text(htm[0].email);
                      $('#location').text(locationname);
                      $('.flw_date').text(htm[0].query_date);
                      $('.lst_flw_date').text(htm[0].last_update);
                      $('.comment').text(htm[0].comment);	
                      $('.cls_email').text(htm[0].email);

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

                   /*   <div class="box-comment">
                <div class="comment-text">
                      <span class="username">
                        Maria Gonzales
                        <span class="text-muted pull-right">2018-05-12</span>
                      </span><!-- /.username -->
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
                
              </div>*/


                      if (htm[0].status == '0') {

                        $('.cls_status').html('<span style="color:red">Closed</span>');
                      }
                      else
                      {
                        $('.cls_status').html('<span style="color:green">Open</span>');
                      }
                      
                 } 
        });
});


$('#btn_update_status').click(function(){

    form = $('#form_status').serialize();

   

    $.ajax({
                 type:'post',
                 url:'<?php echo base_url(); ?>user/update_query',
                 data:form,
                 dataType:'json',
                 cache:false,
                 success:function(htm){

                  console.log(htm);

              if (htm.success == true) {
                        console.log(htm.message);
                      //  alert('Date saved !');

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


$('.cls_bk_delete').click(function(){

sno =   $(this).attr('data-sno');

$.confirm({
    title: 'Confirm Alert!',
    content: 'Are you sure you want to delete this record..',
     type: 'yellow',
    buttons: {
        confirm: function () {
                $.ajax({
                 type:'post',
                 url:'<?php echo base_url(); ?>user/del_fullowup',
                 data:'sno='+escape(sno),
                 cache:false,
                 success:function(htm){

                //  alert('Deleted='+htm);

                    $.alert({
              animationBounce: 1.5,
    title: 'Successfully !',
    content: 'Record deleted successfully..',
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
