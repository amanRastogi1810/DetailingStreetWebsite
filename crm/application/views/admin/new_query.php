

<?php include('header.php'); ?>

<?php include('menu.php'); ?>



<div class="content-wrapper" style="min-height: 673px;">

   <!-- Content Header (Page header) -->

   <section class="content-header">

      <h1>

         Query        

      </h1>

      <ol class="breadcrumb">

         <li>

            <a href="">

            Query List

            </a>           

         </li>

         <li class="active">

            New

         </li>

      </ol>

   </section>

   <!-- Main content -->

   <section class="content">

      <div class="row">

         <div class="col-xs-12 col-md-12">

            <div class="box box-primary">

               <div class="box-header with-border">

                  <h3 class="box-title"> Create Query : <span id="txt_msg" style="color: green;"></span></h3>

               </div>

              <form class="form-horizontal" id="queryFrm" name="queryFrm" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">

               <div class="box-body">

                  <div class="col-xs-12 col-md-8">

                     <div class="form-group">

                        <label for="category" class="col-sm-3 control-label">Client Name:</label>

                        <div class="col-sm-9">

                           <input type="text" name="name" id="name" class="form-control" placeholder="Enter Client Name">

                        </div>

                     </div>

                     <div class="form-group">

                        <label for="log_id" class="col-sm-3 control-label">Email Address:</label>

                        <div class="col-sm-9">

                          <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email Address">

                        </div>                        

                     </div>

                     <div class="form-group">

                        <label for="log_id" class="col-sm-3 control-label">Mobile No.:</label>

                        <div class="col-sm-9">

                          <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile No.">

                        </div>                        

                     </div>

                     <div class="form-group">

                        <label for="log_id" class="col-sm-3 control-label">Car Name:</label>

                        <div class="col-sm-9">

                          <input type="text" name="car_name" id="car_name" class="form-control" placeholder="Enter Car Name.">

                        </div>                        

                     </div>



                       <div class="form-group">

                        <label for="log_id" class="col-sm-3 control-label">Comment :</label>

                        <div class="col-sm-9">

                          <textarea class="form-control" rows="3" placeholder="Comment" id="comment" name="comment"></textarea>

                        </div>                        

                     </div>



                        <div class="form-group">

                        <label for="log_id" class="col-sm-3 control-label">Follow-Up Date :</label>

                        <div class="col-sm-9">

                          <input type="datetime" name="followup" id="followup" class="form-control" placeholder="Enter Follow Up Date">

                        </div>                        

                     </div>

                    
                    
                    <?php 
                    if (isset($get_branch[0])) {
                       ?>
                       <input type="hidden" value="<?php echo $get_branch[0]->bid; ?>" name="bid" id="bid">               
                       <?php
                    }
                    else
                    {
                      $get_bid = $CI->my_model->get_data('branch');

                      echo '<div class="form-group"><label for="zip_code" class="col-sm-3 control-label">Branch: <font class="req">*</font></label><div class="col-sm-9">';
                      echo '<select class="form-control valid" name="bid" id="bid">';
                      for ($i=0; $i < count($get_bid); $i++) { 
                       
                        ?>

                        <option value="<?php echo $get_bid[$i]->bid; ?>"><?php echo $get_bid[$i]->name; ?></option>
                        <?php
                      }
                      echo '</select>';
                      echo '</div>';
                    }

                    ?>
                      

                    

                  </div>  





                                         

                  </div>

               </div>

               <div class="box-footer col-md-12">

                  <div class="col-xs-12  col-md-8">

                     <label class="col-sm-4 control-label"></label>

                     <button class="btn btn-primary" id="btn_query" type="button" style="margin-right:10px;">Submit</button>

                     <button class="btn" type="reset" onclick="javascript: history.go(-1);">Cancel</button>

                  </div>

               </div>

               </form>            </div>

            <!-- /.box -->

         </div>

         <!-- /.col -->

      </div>

      <!-- /.row -->  

   </section>

   <!-- /.content -->

</div>



<script type="text/javascript">



    $('#btn_query').click(function(){



    query_date = $('#queryFrm').serialize();

    $.ajax({

        type:'post',

        data:query_date,

        url:'<?php echo base_url(); ?>user/add_query',

        dataType:'json',

        success:function(htm){

          console.log(htm);
          if(htm.success == true) {

            $('#name').val('');
            $('#email').val('');
            $('#car_name').val('');
            $('#mobile').val('');

            $('#comment').val('');
            $('#followup').val('');
            $('#txt_msg').text('Date saved !');
            
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





 

    $(document).ready(function(){
      
    $('#followup').datetimepicker();
     

    });

 

  

</script>

<?php include('footer.php'); ?>
