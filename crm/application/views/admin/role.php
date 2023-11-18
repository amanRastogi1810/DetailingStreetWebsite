<?php 
 

 include('header.php'); ?>

<?php include('menu.php'); ?>


<style type="text/css">
  address span{
    color: red;
  }
</style>
<style>	
/* The container */
.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 17px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>
<div class="content-wrapper" style="min-height: 542px;">

   <!-- Content Header (Page header) -->

   <section class="content-header">

      <h1>

         Manage User Role

         <small> <a   data-toggle="modal" href="#myModal"  class="btn btn-primary">Add a new</a> </small>

      </h1>

      <ol class="breadcrumb">

         <li class="active">

            Manage User Role

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
                                    <th class="yellow header headerSortDown" nowrap="nowrap" >Role</th>
                                    <th class="yellow header headerSortDown" nowrap="nowrap">User</th>
                                   <!--  <th class="yellow header headerSortDown">Role</th>  -->
                                    <th class="red header">Actions</th>
                                 </tr>

                              </thead>

                              <tbody>                      
                             	
                              	<?php
                              	 $admin = $info['admin'];
                              	// $admin = $info['admin'];

                              	  $admin_role = $info['admin_role'];
                              	  $module = $info['module'];
                                          	
                                        if(count($admin_role) > 0)
                                        {
                                        $count = 1;
                              

                                 

                                   //     $deptArray = get_department();
                                        foreach($admin_role as $row){

                                             $array_model = array();

                                            for ($i=0; $i < count($module) ; $i++) { 
                                                 $array_model[] = $module[$i]->name;
                                            }

                                            $explo = explode(",",$row->mid);
 
                                            $array_usmod = array();        
                                				
                                		 
									?>


                                        <tr id="btn_rm_<?php echo $row->sno; ?>" >
                                            <td><?php echo $count++; ?></td>
                                            <td><?php

                                                    $data = explode(",",$row->mid);
        $where_m = array('mid'=>$data);
        $orderby1 = array('mid' => 'ASC');

        $all_menu1 =$CI->my_model->get_dynamic_wherein('module',$where_m,$orderby1);
 foreach ($all_menu1 as $row12) { 
 	echo $row12->name." ||";

 }?></td>
                                            <td><?php 

                                            $da = $CI->my_model->get_table_by_column('admin_login','sno',$row->uid);

                                            echo  $da[0]->name; ?></td>
											<?php
											echo '<td class="crud-actions">
												 <a href="javascript:void(0)" name="del" data-sno='.$row->sno.' id="'.$row->sno.'" class="cls_bk_delete" title="Delete"  ><i class="fa fa-remove"></i></a> </td>
                                        </tr>'
											?>
									<?php
                                        }
                                        
                                        } else {
                                    ?>
                                        <tr>
                                            <td colspan="9" class="text-center"> No Record Added. </td>
                                        </tr>
                                    <?php

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

<div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                        <h4 class="modal-title" style="text-align:center">Add User Role</h4>
                    </div>
                    <div class="modal-body">
                        <section class="invoice">

      <div class="row">
        
        
         <form id="form_user_role" name="form_user_role">
          <div class="col-md-6">
                   
                         <div class="form-group">
                        <label for="" class=" control-label" style="font-size: 22px;">Select Module :</label>
                                              
                     </div>
<?php 

  foreach ($info['module'] as $row) {
    ?> 
        <label class="container"><?php echo $row->name; ?>
  <input type="checkbox" name="module[]" value="<?php echo $row->mid; ?>" class="cls_module"    >
  <span class="checkmark"></span>
</label>

    <?php
  }
?>
                 
                  </div>
                    <div class="col-md-6">  
                    <div class="form-group">
                                  <label>Select User</label>
                                  <select class="form-control" id="userid" name="userid">
                                   <option value="">Select</option>
                                    <?php 
                                        foreach ($info['admin'] as $row )
                                        {
                                      ?> 
                                        <option value="<?php echo $row->sno; ?>"   >
                                                 <?php echo $row->name; ?>
                                        </option>
                                    <?php }?>
                                   
                                  </select>
                                  <input type="hidden" name="user" value="<?php echo $parentHodList[0]->sno; ?>" id="user">
                     </div>

                        <div class="form-group">

                     <label class=" control-label"></label>

                     <button class="btn btn-primary" name="btn_add_user" id="btn_add_user" type="button" style="margin-right:10px;float: right;">Create Now</button>

                    

                  </div>

                
  </div>

                   </form>
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
                        
                    </div>
                </div>
            </div>
        </div>


	<div class="modal fade" id="edit_modal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
					<h4 class="modal-title" style="text-align:center">Edit User Role</h4>
				</div>
				<div class="modal-body">
					<section class="invoice">

						<div class="row">


							<form id="form_user_role" name="form_user_role">
								<div class="col-md-6">

									<div class="form-group">
										<label for="" class=" control-label" style="font-size: 22px;">Select Module :</label>

									</div>
									<?php

									foreach ($info['module'] as $row) {
										?>
										<label class="container"><?php echo $row->name; ?>
											<input type="checkbox" name="module[]" value="<?php echo $row->mid; ?>" class="cls_module"    >
											<span class="checkmark"></span>
										</label>

										<?php
									}
									?>

								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>User</label>
										<span id="user_name"></span>
										<input type="hidden" name="user" value="<?php echo $parentHodList[0]->sno; ?>" id="user">
									</div>

									<div class="form-group">

										<label class=" control-label"></label>

										<button class="btn btn-primary" name="btn_edit_user" id="btn_edit_user" type="button" style="margin-right:10px;float: right;">Edit Now</button>



									</div>


								</div>

							</form>
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

				</div>
			</div>
		</div>
	</div>

    


</div>

<script type="text/javascript">

	$("#btn_add_user").click(function(){

role_data = $('#form_user_role').serialize();

//console.log(role_data);
 

	$.ajax({
		type:'post',
		url:'<?php echo base_url(); ?>user/add_user_role',
		data:role_data,
		dataType:'json',
		success:function(htm){
			
			//console.log(htm.success);


			        if (htm.success == true) {

			        	//alert('success');

                        $.alert({
							    animationBounce: 1.5,
							    title: 'Successfully Saved',
							    content: 'Role was saved successfully..',
							     type: 'green'
							});
                 } 
                 else {


                     $.each(htm.messages, function(key, value) {
                         //element = $('#'+key);
                         element = $('[name=' + key + ']');
                    
                         if (key == 'check_module') {
                         		    var dialog = bootbox.dialog({
                         message: '<p class="text-danger">At least one module is required.</p>',
		                         closeButton: true
		                     });
                         }
                         
                         if(key == 'record')
                         {
                         	 $.alert({
				              animationBounce: 1.5,
				                title: 'Error',
				                content: 'Sorry , Role Already Existed ',
				                type: 'red'
				            });
                         }

                         element.closest('div.form-group')
                             .removeClass('has-error')
                             .addClass(value.length > 0 ? 'has-error' : 'has-success')
                             .find('.text-danger').remove();
                         element.after(value);

                     });
                 }
		}
	});
});


  $('#btn_add_user').click(function(){
         
         arr = [];
        $('.cls_module:checkbox:checked').each(function () {
          var arr = (this.checked ? $(this).val() : "");

});
        console.log(arr);
       
  });

	$(document).on('click','.cls_bk_edit',function(){

		sno = $(this).attr('data-sno');
		mdata = 'sno='+escape(sno);
		// console.log(mdata)

		$.ajax({
			type:'post',
			url:'<?php echo base_url(); ?>user/get_client_by_bk_booking',
			data:mdata,
			dataType:'json',

			success:function(htm){
				console.log(htm);

				$('#user_name').text('siddhu');




			}

		});
	});

	$('.cls_bk_delete').click(function(){

		sno =   $(this).attr('data-sno');
		console.log(sno)

		$.confirm({
			title: 'Confirm Alert!',
			content: 'Are you sure you want to delete this Role..',
			type: 'orange',
			buttons: {
				confirm: function () {
					$.ajax({
						type:'post',
						url:'<?php echo base_url(); ?>user/del_role',
						data:'sno='+escape(sno),
						cache:false,
						success:function(htm){

							//   alert('Deleted='+htm);

							$.alert({
								animationBounce: 1.5,
								title: 'Successfully Deleted',
								content: 'Role is deleted successfully..',
								type: 'green'
							});

							location.reload();

						}

					});
				},
				cancel: function () {
					$.alert('Your Role is safe now ');
				}
			}
		});

	});
</script>

<?php include('footer.php'); ?>
