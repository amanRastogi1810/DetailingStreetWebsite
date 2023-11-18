<?php include('header.php'); ?>

<?php include('menu.php'); ?>


<style type="text/css">
  @import url(http://fonts.googleapis.com/css?family=Lato:400,700);
  .well
  {
    margin: 5px;
  }
.profile
{
    font-family: 'Lato', 'sans-serif';
    }
.profile 
{
/*    height: 321px;
    width: 265px;*/
margin-top: 2px;
padding:1px;
    display: inline-block;
    }
.divider 
{
    border-top:1px solid rgba(0,0,0,0.1);
    }
.emphasis 
{
    border-top: 1px solid transparent;
    }

.emphasis h2
{
    margin-bottom:0;
    }
span.tags 
{
    background: #1abc9c;
    border-radius: 2px;
    color: #f5f5f5;
    font-weight: bold;
    padding: 2px 4px;
    }
.profile strong,span,div{
    text-transform: initial;

}


</style>


<div class="content-wrapper" style="min-height: 673px;">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>Branch List
        <small> <a data-toggle="modal" href="#myModal" class="btn btn-primary">Add a new</a> </small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="http://crm.detailingstreet.com/">Branch</a></li>
        <li class="active">Branch Listing</li>
      </ol>       

    </section>
  <section class="content">

    <div class="row">

      <div class="col-xs-12 col-md-12">

        <div class="box box-primary">

                     <div class="box-body">

                      <?php

 

                      foreach ($info['branch'] as $row) {
                        # code...
                    ?>

         <div class="well profile col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                             
                                <h5 style="text-align:center;"><strong id="user-name"><?php echo $row->name;?></strong></h5>
                                <p style="text-align:center;font-size: smaller;" id="user-frid"><?php echo $row->city.', '.$row->state;?> </p>
                                <p style="text-align:center;font-size: smaller;overflow-wrap: break-word;" id="user-email"><?php echo $row->mobile; ?></p>
                                <p style="text-align:center;font-size: smaller;"><strong>Status: </strong><span class="tags" id="user-status"><?php  if ($row->status=='0') {
                                  echo '<span style="color:red;"> Inactive</span>';
                                }else{ echo 'Active'; } ?></span></p>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divider text-center"></div>
                                    <div class="col-lg-6 left" style="text-align:center;overflow-wrap: break-word;">
                                        <a href="javascript:void(0);" class="cls_del_branch"  id="<?php echo $row->bid; ?>" ><small class="label label-danger">Delete</small></a>
                                    </div>
                                    <div class=" col-lg-6 left" style="text-align:center;overflow-wrap: break-word;">
                                       <a data-toggle="modal" href="#EditmyModal" class="cls_edit_branch"  id="<?php echo $row->bid; ?>" ><small class="label label-warning">Edit</small></a>
                                    </div>
                              </div>
                            </div>
                            <?php
  }

                      ?>

          </div>

       </div>

        <!-- /.box --> 

      </div>

      <!-- /.col --> 

    </div>

    <!-- /.row --> 

  </section>

  <!-- /.content --> 

</div>

<div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                        <h4 class="modal-title" style="text-align:center">Add Branch</h4>
                    </div>
                    <div class="modal-body">
                        <section class="invoice">
      <!-- title row -->
      <div class="row">
        
        
         <form id="form_branch">
                    <div class="col-md-6">  
                    

                     <div class="form-group">
                        <label for="" class=" control-label">Name :</label>
                        <div class="">
                         <input type="text" name="name" id="name" class="form-control" placeholder="Enter Branch Name">
                        </div>                        
                     </div>

                     <div class="form-group">
                        <label for="" class=" control-label">Email :</label>
                        <div class="">
                         <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email Address">
                        </div>                        
                     </div>

                     <div class="form-group">
                        <label for="" class=" control-label">Contact :</label>
                        <div class="">
                         <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Contact ">
                        </div>                        
                     </div>

                     <div class="form-group">
                        <label for="" class=" control-label">Pincode :</label>
                        <div class="">
                         <input type="text" name="pincode" id="pincode" class="form-control" placeholder="Enter Pincode Address">
                        </div>                        
                     </div>

                   </div>
                    <div class="col-md-6">
                         <div class="form-group">
                        <label for="" class=" control-label">City :</label>
                        <div class="">
                         <input type="text" name="city" id="city" class="form-control" placeholder="Enter City">
                        </div>                        
                     </div>
                             <div class="form-group">
                        <label for="" class=" control-label">State :</label>
                        <div class="">
                         <input type="text" name="state" id="state" class="form-control" placeholder="Enter State">
                        </div>                        
                     </div>

                        <div class="form-group">
                        <label for="" class=" control-label">Address :</label>
                        <div class="">
                          <textarea name="address" id="address" class="form-control" placeholder="Enter Address">
                            
                          </textarea>
                         
                        </div>                        
                     </div>

                       <div class="form-group">
                  <label>Branch Status</label>
                  <select class="form-control" id="status" name="status">
                    <option value="1">Active</option>
                    <option value="0">Unactive</option>
                  </select>
                </div>
  </div>
   <div class="form-group">

                     <label class=" control-label"></label>

                     <button class="btn btn-primary" id="btn_add_branch" type="button" style="margin-right:10px;float: right;">Create Now</button>

                    

                  </div>
                  
  
                   </form>
        <!-- /.col -->
      </div>
      <!-- info row -->

                    
      <div class="row" id="jdata">
        
      </div> 
      <div class="row no-print">
        
      </div>
    </section>
                        
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>

<!-- <div class="well profile col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <figure>
                                     <img src="http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png" alt="" class="img-circle" style="width:75px;" id="user-img">
                                </figure>
                                <h5 style="text-align:center;"><strong id="user-name">Arun Kumar Perumal</strong></h5>
                                <p style="text-align:center;font-size: smaller;" id="user-frid">FBT000000213 </p>
                                <p style="text-align:center;font-size: smaller;overflow-wrap: break-word;" id="user-email">arunkumarperumal8791@gmail.com </p>
                                <p style="text-align:center;font-size: smaller;"><strong>A/C status: </strong><span class="tags" id="user-status">Active</span></p>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divider text-center"></div>
                                <p style="text-align:center;font-size: smaller;"><strong>Job role</strong></p>
                                <p style="text-align:center;font-size: smaller;" id="user-role">Software Engineer</p>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divider text-center"></div>
                                    <div class="col-lg-6 left" style="text-align:center;overflow-wrap: break-word;">
                                        <h4><p style="text-align: center;"><strong id="user-globe-rank">245 </strong></p></h4>           
                                        <p><small class="label label-success">Global Ranking</small></p>
                                       
                                    </div>
                                    <div class=" col-lg-6 left" style="text-align:center;overflow-wrap: break-word;">
                                        <h4><p style="text-align: center;"><strong id="user-college-rank">245 </strong></p></h4>                   
                                        <p> <small class="label label-warning">College Ranking</small></p>
                                       
                                    </div>
                              </div>
                            </div> -->

<!-- edit popup box  -->

<div class="modal fade" id="EditmyModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                        <h4 class="modal-title" style="text-align:center">Update Branch Information</h4>
                    </div>
                    <div class="modal-body">
                        <section class="invoice">
      <!-- title row -->
      <div class="row">
        
        
         <form id="form_branch_edit">
                    <div class="col-md-6">  
                    
                        <input type="hidden" name="bid" id="bid" class="form-control" >
                     <div class="form-group">
                        <label for="" class=" control-label">Name :</label>
                        <div class="">
                         <input type="text" name="edit_name" id="edit_name" class="form-control" placeholder="Enter Branch Name">
                        </div>                        
                     </div>

                     <div class="form-group">
                        <label for="" class=" control-label">Email :</label>
                        <div class="">
                         <input type="text" name="edit_email" id="edit_email" class="form-control" placeholder="Enter Email Address">
                        </div>                        
                     </div>

                     <div class="form-group">
                        <label for="" class=" control-label">Contact :</label>
                        <div class="">
                         <input type="text" name="edit_mobile" id="edit_mobile" class="form-control" placeholder="Enter Contact ">
                        </div>                        
                     </div>

                     <div class="form-group">
                        <label for="" class=" control-label">Pincode :</label>
                        <div class="">
                         <input type="text" name="edit_pincode" id="edit_pincode" class="form-control" placeholder="Enter Pincode Address">
                        </div>                        
                     </div>

                   </div>
                    <div class="col-md-6">
                         <div class="form-group">
                        <label for="" class=" control-label">City :</label>
                        <div class="">
                         <input type="text" name="edit_city" id="edit_city" class="form-control" placeholder="Enter City">
                        </div>                        
                     </div>
                             <div class="form-group">
                        <label for="" class=" control-label">State :</label>
                        <div class="">
                         <input type="text" name="edit_state" id="edit_state" class="form-control" placeholder="Enter State">
                        </div>                        
                     </div>

                        <div class="form-group">
                        <label for="" class=" control-label">Address :</label>
                        <div class="">
                    <textarea name="edit_address" id="edit_address" class="form-control" placeholder="Enter Address">
                    </textarea>
                         
                        </div>                        
                     </div>

                       <div class="form-group">
                  <label>Branch Status</label>
                  <select class="form-control" id="edit_status" name="edit_status">
                    <option value="1">Active</option>
                    <option value="0">Unactive</option>
                  </select>
                </div>
  </div>
   <div class="form-group">

                     <label class=" control-label"></label>

                     <button class="btn btn-primary" id="btn_edit_branch" type="button" style="margin-right:10px;float: right;">Update Now</button>

                    

                  </div>
                  
  
                   </form>
        <!-- /.col -->
      </div>
      <!-- info row -->

                    
      <div class="row" id="jdata">
        
      </div> 
      <div class="row no-print">
        
      </div>
    </section>
                        
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>


<script>

       

        $('#btn_edit_branch').click(function(){

        from_edit = $('#form_branch_edit').serialize();
        
            $.ajax({
                 type:'post',
                 url:'<?php echo base_url(); ?>user/update_branch',
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

                  location.reload();
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


     $(document).on('click','.cls_edit_branch',function(){

           bid = $(this).attr('id');
           // esno = $(this).attr('data-sno');
           emdata = 'bid='+escape(bid);
                      
            $.ajax({
                 type:'post',
                 url:'<?php echo base_url(); ?>user/get_branch_by_id',
                 data:emdata,
                 dataType:'json',
                 success:function(htm){

                  console.log(htm[0].status);

                      $('#bid').val(htm[0].bid);
                      $('#edit_name').val(htm[0].name);

                      $('#edit_email').val(htm[0].email);
                      $('#edit_address').val(htm[0].address);
                      $('#edit_city').val(htm[0].city);

                      $('#edit_state').val(htm[0].state); 
                      $('#edit_mobile').val(htm[0].mobile);
                      $('#edit_pincode').val(htm[0].pincode);
                      $('#edit_status').val(htm[0].status);

                      if (htm[0].status == '1') {
                          $('#edit_status option[value="1"]').attr('selected', 'selected');
                      }
                      else
                      {
                      
                          $('#edit_status option[value="0"]').attr('selected', 'selected');
                      }
                 } 
            });
   });




   $('#btn_add_branch').click(function(){

    query_date = $('#form_branch').serialize();
    $.ajax({
        type:'post',
        data:query_date,
        url:'<?php echo base_url(); ?>user/add_branch',
        dataType:'json',
        success:function(htm){
          console.log(htm);

          if(htm.success == true) {
            $('#name').val('');
            $('#email').val('');
            $('#mobile').val('');
            $('#pincode').val('');

            $('#city').val('');
            $('#state').val('');
             $('#address').val('');
            $('#txt_msg').text('Date saved !');
            
          //  alert('Date saved !');
              $.alert({
              animationBounce: 1.5,
    title: 'Success',
    content: 'Record saved successfully..',
    type: 'green'
});

              $( ".close" ).trigger( "click" );

          }
          else
          { 
                  $.each(htm.messages,function(key,value) {
                   /*  element = $('#'+key);
                     element.closest('div.form-group')
                     .removeClass('has-error')
                     .addClass(value.length > 0 ? 'has-error':'has-success')
                     .find('.text-danger').remove();
                     element.after(value);*/
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

   $('.cls_del_branch').click(function(){

sno =   $(this).attr('id');

$.confirm({
    title: 'Confirm Alert!',
    content: 'Are you sure you want to delete this record..',
     type: 'orange',
    buttons: {
        confirm: function () {
              $.ajax({
                 type:'post',
                 url:'<?php echo base_url(); ?>user/del_branch',
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