

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

      <h1>User List
        <small> <a data-toggle="modal" href="#myModal" class="btn btn-primary">Add a new</a> </small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="http://crm.detailingstreet.com/">User</a></li>
        <li class="active">User Listing</li>
      </ol>       

    </section>
  <section class="content">

    <div class="row">

      <div class="col-xs-12 col-md-12">

        <div class="box box-primary">

                       <div class="box-body">

                      <?php

 

                      foreach ($info['admin'] as $row) {
                        # code...
                    ?>

         <div class="well profile col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                             
                                <h5 style="text-align:center;"><strong id="user-name"><?php echo $row->name;?></strong></h5>
                                <p style="text-align:center;font-size: smaller;" id="user-frid"><?php echo $row->username; ?> </p>
                                <p style="text-align:center;font-size: smaller;overflow-wrap: break-word;" id="user-email"><?php echo $row->phone; ?></p>
                                <p style="text-align:center;font-size: smaller;"><strong>Status: </strong><span class="tags" id="user-status"><?php  if ($row->user_status=='0') {
                                  echo '<span style="color:red;"> Inactive</span>';
                                }else{ echo 'Active'; } ?></span></p>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divider text-center"></div>
                                    <div class="col-lg-6 left" style="text-align:center;overflow-wrap: break-word;">
                                        <a href="javascript:void(0);" class="cls_del_branch"  id="<?php echo $row->sno; ?>" ><small class="label label-danger">Delete</small></a>
                                    </div>
                                    <div class=" col-lg-6 left" style="text-align:center;overflow-wrap: break-word;">
                                       <a data-toggle="modal" href="#EditmyModal" class="cls_edit_branch"  id="<?php echo $row->sno; ?>" ><small class="label label-warning">Edit</small></a>
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
                        <h4 class="modal-title" style="text-align:center">Add User</h4>
                    </div>
                    <div class="modal-body">
                        <section class="invoice">

      <div class="row">
        
        
         <form id="form_user">
                    <div class="col-md-6">  
                    <div class="form-group">
                                  <label>Select Branch</label>
                                
                                  <select class="form-control" id="branch" name="branch">
                                   <option value="">Select</option>
                                    <?php 
                                   
                                    
                                        foreach ($info['branch'] as $row ) {
                                          ?> 
                                          <option value="<?php echo $row->bid; ?>"><?php echo $row->name; ?></option>
                                          <?php
                                        }

                                    ?>
                                   
                                  </select>
                     </div>

                     <div class="form-group">
                        <label for="" class=" control-label">Name :</label>
                        <div class="">
                         <input type="text" name="name" id="name" class="form-control" placeholder="Enter User Name">
                        </div>                        
                     </div>

                     <div class="form-group">
                        <label for="" class=" control-label">Username :</label>
                        <div class="">
                         <input type="text" name="email" id="email" class="form-control" placeholder="Enter Username">
                        </div>                        
                     </div>
                           <div class="form-group">
                        <label for="" class=" control-label">CGST %:</label>
                        <div class="">
                         <input type="number" name="cgst" id="cgst" class="form-control" placeholder="Enter CGST %">
                        </div>                        
                     </div>
                       <div class="form-group">
                        <label for="" class=" control-label">SGST %:</label>
                        <div class="">
                         <input type="number" name="sgst" id="sgst" class="form-control" placeholder="Enter SGST %">
                        </div>                        
                     </div>
                        <div class="form-group">
                        <label for="" class=" control-label">IGST %:</label>
                        <div class="">
                         <input type="number" name="igst" id="igst" class="form-control" placeholder="Enter IGST %">
                        </div>                        
                     </div>

  </div>
  <div class="col-md-6">
                   
                         <div class="form-group">
                        <label for="" class=" control-label">Phone :</label>
                        <div class="">
                         <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number">
                        </div>                        
                     </div>

                      <div class="form-group">
                           <label>User Type</label>
                          <select class="form-control" id="user_type" name="user_type">
                            <option value="1">Admin</option>
                          </select>
                         </div>

                        <div class="form-group">
                  <label>User Status</label>
                  <select class="form-control" id="status" name="status">
                    <option value="1">Active</option>
                    <option value="0">Unactive</option>
                  </select>
                </div>

          

                     <div class="form-group">
                        <label for="" class=" control-label">Company GST :</label>
                        <div class="">
                         <input type="text" name="gst_number" id="gst_number" class="form-control" placeholder="Enter GST Number">
                        </div>                        
                     </div>
                        <div class="form-group">
                        <label for="" class=" control-label">Password : </label>
                        <div class="">
                         <input type="text" name="password" id="password" class="form-control" placeholder="Enter Password">
                         <a href="javascript:void(0);" class="btn_generate">Click for generate</a>
                        </div>                        
                     </div>
               
                        <div class="form-group">

                     <label class=" control-label"></label>

                     <button class="btn btn-primary" id="btn_add_user" type="button" style="margin-right:10px;float: right;">Create Now</button>

                    

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










<div class="modal fade" id="EditmyModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                        <h4 class="modal-title" style="text-align:center">Update User</h4>
                    </div>
                    <div class="modal-body">
                        <section class="invoice">
                          
      <div class="row">
        
        
         <form id="edit_form_user">
           <input type="hidden" name="uid" id="uid" class="form-control"  >
                    <div class="col-md-6">  
                    <div class="form-group">
                                  <label>Select Branch</label>
                                  <select class="form-control" id="edit_branch" name="edit_branch">
                                   <option value="">Select</option>
                                    <?php 
                                        foreach ($info['branch'] as $row ) {
                                          ?> 
                                          <option value="<?php echo $row->bid; ?>"><?php echo $row->name; ?></option>
                                          <?php
                                        }

                                    ?>
                                   
                                  </select>
                     </div>

                     <div class="form-group">
                        <label for="" class=" control-label">Name :</label>
                        <div class="">
                         <input type="text" name="edit_name" id="edit_name" class="form-control" placeholder="Enter User Name">
                        </div>                        
                     </div>

                     <div class="form-group">
                        <label for="" class=" control-label">Username :</label>
                        <div class="">
                         <input type="text" name="edit_email" id="edit_email" class="form-control" placeholder="Enter Username">
                        </div>                        
                     </div>

                      <div class="form-group">
                        <label for="" class=" control-label">CGST %:</label>
                        <div class="">
                         <input type="number" name="edit_cgst" id="edit_cgst" class="form-control" placeholder="Enter CGST %">
                        </div>                        
                     </div>
                       <div class="form-group">
                        <label for="" class=" control-label">SGST %:</label>
                        <div class="">
                         <input type="number" name="edit_sgst" id="edit_sgst" class="form-control" placeholder="Enter SGST %">
                        </div>                        
                     </div>
                        <div class="form-group">
                        <label for="" class=" control-label">IGST %:</label>
                        <div class="">
                         <input type="number" name="edit_igst" id="edit_igst" class="form-control" placeholder="Enter IGST %">
                        </div>                        
                     </div>

  </div>
  <div class="col-md-6">
                   
                         <div class="form-group">
                        <label for="" class=" control-label">Phone :</label>
                        <div class="">
                         <input type="text" name="edit_phone" id="edit_phone" class="form-control" placeholder="Enter Phone Number">
                        </div>                        
                     </div>

                      <div class="form-group">
                           <label>User Type</label>
                          <select class="form-control" id="edit_user_type" name="edit_user_type">
                            <option value="1">Admin</option>
                          </select>
                         </div>

                        <div class="form-group">
                  <label>User Status</label>
                  <select class="form-control" id="edit_status" name="edit_status">
                    <option value="1">Active</option>
                    <option value="0">Unactive</option>
                  </select>
                </div>

                 <div class="form-group">
                        <label for="" class=" control-label">Company GST :</label>
                        <div class="">
                         <input type="text" name="edit_gst_number" id="edit_gst_number" class="form-control" placeholder="Enter GST Number">
                        </div>                        
                     </div>

                <div class="form-group">
                        <label for="" class=" control-label">Password : </label>
                        <div class="">
                         <input type="text" name="edit_password" id="edit_password" class="form-control" placeholder="Enter Password">
                         <a href="javascript:void(0);" class="btn_generate">Click for generate</a>
                        </div>                        
                     </div>
                        <div class="form-group">

                     <label class=" control-label"></label>

                     <button class="btn btn-primary" id="btn_edit_user" type="button" style="margin-right:10px;float: right;">Create Now</button>
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











<script> 


    $('#btn_edit_user').click(function(){

        from_edit = $('#edit_form_user').serialize();
        
            $.ajax({
                 type:'post',
                 url:'<?php echo base_url(); ?>user/update_user',
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
                 url:'<?php echo base_url(); ?>user/get_user_by_id',
                 data:emdata,
                 dataType:'json',
                 success:function(htm){

                  console.log(htm);

                      $('#uid').val(htm[0].sno);
                      $('#edit_name').val(htm[0].name);
                      $('#edit_email').val(htm[0].username);
                      $('#edit_phone').val(htm[0].phone);
                      $('#edit_status').val(htm[0].user_status);

                      $('#edit_cgst').val(htm[0].cgst);
                      $('#edit_gst_number').val(htm[0].company_gst_no);
                      $('#edit_sgst').val(htm[0].sgst);

                      $('#edit_igst').val(htm[0].igst);


                       
                       $('#edit_status option[value="'+htm[0].user_status+'"]').attr('selected', 'selected');
                      $('#edit_branch option[value="'+htm[0].branch+'"]').attr('selected', 'selected');
                 } 
            });
   });

function randomPassword(length) {
    var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    return pass;
}

  $('.btn_generate').click(function(){
    
      $('#password').val(randomPassword(6));

  });

   $('#btn_add_user').click(function(){

    query_date = $('#form_user').serialize();

    console.log(query_date);

    $.ajax({
        type:'post',
        data:query_date,
        url:'<?php echo base_url(); ?>user/add_user',
        dataType:'json',
        success:function(htm){
          console.log(htm);

          if(htm.success == true) {
            $('#name').val('');
            $('#phone').val('');
            $('#password').val('');
            $('#email').val('');
             
            $('#txt_msg').text('Date saved !');
            
          //  alert('Date saved !');
              $.alert({
              animationBounce: 1.5,
    title: 'Success',
    content: 'Record saved successfully..',
    type: 'green'
});

              $( ".close" ).trigger( "click" );

              location.reload();

          }
          else if(htm.messages == 'duplicate')
          {
                      $.alert({
              animationBounce: 1.5,
                title: 'Error',
                content: 'User already exists',
                type: 'red'
            });
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
                 url:'<?php echo base_url(); ?>user/del_user',
                 data:'sno='+escape(sno),
                 cache:false,
                 success:function(htm){

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