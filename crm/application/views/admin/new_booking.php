<?php 
 include('header.php'); 


?>

<?php include('menu.php'); 


?>

<div class="content-wrapper" style="min-height: 637px;">

   <section class="content-header">
      <h1> Service Booking </h1>

      <ol class="breadcrumb">
        <li><a href="#">Service Booking </a></li>
		<li class="active">New</li>
      </ol>  

   </section>

   <!-- Main content -->

   <section class="content" id="step-1">

      <div class="box box-primary">         

         <div class="box-body">



           <div class="form-group">   

                  <div class="col-sm-4"></div>               

                   <div class="field-wrap" id="radio_client">

                      <label class="radio-inline">

                        <input type="radio" name="client_booking" id="client_booking1" value="N" checked="checked">New Client &nbsp;&nbsp;&nbsp; 

                      </label>

                      <label class="radio-inline">

                        <input type="radio" name="client_booking" value="E" id="client_booking2">Existing Client 

                      </label>

                    </div>

                </div> 

                <form name="existing" class="form-horizontal" id="existing" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate" style="display: none;">

                	<input type="hidden" name="txt_branch" value="<?php echo $branch; ?>">

                 <div id="existing_div" >

                  <div class="form-group">

                    <label for="membership_id" class="col-sm-4 control-label">Membership ID: <font class="req">*</font></label>

                    <div class="col-sm-8">

                      <input type="text" class="form-control" id="membership_id1" name="membership_id1" placeholder="Client Membership ID" required=""> 

                    </div>

                  </div>  

<center><button class="btn btn-primary btn-next" type="button" id="btn_searchmem" style="margin-left:10px;">Next &gt;&gt;</button> </center>

                  

                </div>

                   </form>

            <form   class="form-horizontal" id="bookingFrm" name="bookingFrm" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">

              <div class="box-body">

              <div class="col-xs-12 col-md-8">

               

            

                <div id="new_client">                  

                  <div class="form-group">

                    <label for="name" class="col-sm-4 control-label">Client Name: <font class="req">*</font></label>

                    <div class="col-sm-8">

                      <input type="text" class="form-control" id="name" name="name" placeholder="Full name">

                    </div>

                  </div>  

                  <div class="form-group">

                    <label for="email" class="col-sm-4 control-label">Client Email: <!--<font class="req">*</font>--></label>

                    <div class="col-sm-8">

                      <input class="form-control" type="email" id="email" name="email" placeholder="Email address">

                       <span id="url_msg" class=""></span>

                    </div>

                  </div>  

       

                  <div class="form-group">

                    <label for="mobile" class="col-sm-4 control-label">Mobile no.: <font class="req">*</font></label>

                    <div class="col-sm-8">

                      <input class="form-control" type="number" id="mobile" name="mobile"  max="10" min="10" placeholder="Mobile no.">

                    </div>

                  </div> 

                  <div class="form-group">

                    <label for="mobile" class="col-sm-4 control-label">Confirm Mobile no.: <font class="req">*</font></label>

                    <div class="col-sm-8">

                      <input type="text" class="form-control" id="cnf_mobile" name="cnf_mobile" placeholder="Confirm Mobile no.">

                    </div>

                  </div>

              

                  <div class="form-group">

                    <label for="zipcode" class="col-sm-4 control-label">State:</label>

                    <div class="col-sm-8">

                      <select class="form-control valid" name="state_id" id="state_id"><option value="">-Select-</option><option value="1">Andaman And Nicobar Islands</option><option value="2">Andhra Pradesh</option><option value="3">Arunachal Pradesh</option><option value="4">Assam</option><option value="5">Bihar</option><option value="6">Chattisgarh</option><option value="7">Chandigarh</option><option value="8">Daman And Diu</option><option value="9">Delhi</option><option value="10">Dadra And Nagar Haveli</option><option value="11">Goa</option><option value="12">Gujarat</option><option value="13">Himachal Pradesh</option><option value="14">Haryana</option><option value="15">Jammu And Kashmir</option><option value="16">Jharkhand</option><option value="17">Kerala</option><option value="18">Karnataka</option><option value="19">Lakshadweep</option><option value="20">Meghalaya</option><option value="21">Maharashtra</option><option value="22">Manipur</option><option value="23">Madhya Pradesh</option><option value="24">Mizoram</option><option value="25">Nagaland</option><option value="26">Orissa</option><option value="27">Punjab</option><option value="28">Pondicherry</option><option value="29">Rajasthan</option><option value="30">Sikkim</option><option value="31">Tamil Nadu</option><option value="32">Telangana</option><option value="33">Tripura</option><option value="34">Uttarakhand</option><option value="35">Uttar Pradesh</option><option value="36">West Bengal</option></select></div></div> 
<div class="form-group">

                    <label for="address1" class="col-sm-4 control-label">Address 1: <font class="req">*</font></label>

                    <div class="col-sm-8">

                      <input type="text" class="form-control" id="address1" name="address1" placeholder="Address 1">

                    </div>

                  </div>   

                  <div class="form-group">

                    <label for="address2" class="col-sm-4 control-label">Address 2:</label>

                    <div class="col-sm-8">

                      <input type="text" class="form-control" id="address2" name="address2" placeholder="Address 2">

                    </div>

                  </div> 

                  <div class="form-group">

                    <label for="city" class="col-sm-4 control-label">City: <font class="req">*</font></label>

                    <div class="col-sm-8">

                      <input type="text" class="form-control" id="city" name="city" placeholder="City">

                    </div>

                  </div> 

                  <div class="form-group">

                    <label for="zip_code" class="col-sm-4 control-label">Zip Code: <font class="req">*</font></label>

                    <div class="col-sm-8">

                      <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Zip Code">

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

                    	echo '<div class="form-group"><label for="zip_code" class="col-sm-4 control-label">Branch: <font class="req">*</font></label><div class="col-sm-8">';
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

               </div>

              <div class="box-footer col-md-12">

                <div class="col-xs-12  col-md-8">

                <label class="col-sm-3 control-label"></label>

                <button class="btn" type="reset" onclick="javascript: history.go(-1);">Cancel</button>

                <button class="btn btn-primary btn-next" type="button" id="btnSubmit" style="margin-left:10px;">Next &gt;&gt;</button>

                </div>

             </div>

         </form>    </div>

             

    </section>





    <section class="content" id="step-2" style="display: none;">

      <div class="box box-primary row">  

      <br>       

         <div class="">           

            <form   class="form-horizontal col-md-6" id="bookingFrm2" name="bookingFrm2" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">

              <div class="box-body">

                <div class="col-xs-12 col-md-12">

                <div class="form-group">

                  <label for="membership_id" class="col-sm-4 control-label">Membership ID: <font class="req">*</font></label>

                  <div class="col-sm-8">

                    <input type="text" class="form-control valid" id="membership_id" name="membership_id" readonly="" value="ONX001878">

                  </div>

                </div>

                 <div class="form-group">

                  <label for="car_number" class="col-sm-4 control-label">Car / Bike Name: <font class="req">*</font></label>

                  <div class="col-sm-8">

                                          <input type="text" class="form-control" id="car_name" name="car_name" placeholder="Car / Bike Name">

                                        

                  </div>

                </div>

                <div class="form-group">

                  <label for="car_number" class="col-sm-4 control-label">Car / Bike Number: <font class="req">*</font></label>

                  <div class="col-sm-8">

                                          <input type="text" class="form-control" id="car_no" name="car_no" placeholder="Car / Bike Number">

                                        

                  </div>

                </div>

          

                 <div class="form-group">

                  <label for="car_colour" class="col-sm-4 control-label">Car / Bike colour: </label>

                  <div class="col-sm-8">                    

                   <input type="text" class="form-control" id="car_colour" name="car_colour" placeholder="Car / Bike colour">

                  </div>

                </div>

                              

                                       

                <div class="form-group">

                  <label for="car_detail" class="col-sm-4 control-label">Car / Bike Remarks: </label>

                  <div class="col-sm-8">                    

                    <textarea class="form-control" rows="3" placeholder="Car / Bike Remarks" id="car_detail" name="car_detail"></textarea>

                  </div>

                </div>    



                <div class="form-group">

                  <label for="membership_id" class="col-sm-6 control-label">Your Booking id will be: <font class="req">*</font></label>

                  <div class="col-sm-6" style="padding: 5px;">

                    <span id="txt_bookingid" style="color: red"></span>

                  </div>

                </div>

              



              </div>

              </div>

     

        </form>   </div>





        <div class="box-body  ">           

            <form   class="form-horizontal col-md-6" id="bookingFrm3" name="bookingFrm3"   method="post" accept-charset="utf-8" novalidate="novalidate">
<input type="hidden" name="bid_hid" value="<?php echo $branch; ?>">
              <div class="box-body">

                <div class="col-xs-12 col-md-12">

                                     <!--  <div class="form-group">

                   <label for="Package" class="col-sm-4 control-label">Booking Type: <font class="req">*</font></label>

                   <div class="col-sm-8">

                      <select name="booking_type" id="booking_type" class="form-control valid">

                          <option value="New">New Booking</option>

                          <option value="Complaint">Complaint Booking</option>

                                                </select>

                      <input type="text" class="form-control hidden" style="margin-top: 15px; display: none;" id="complain_no" name="complain_no" placeholder="Enter complain number" value="">

                   </div>

                </div> -->

                  <div class="form-group">

                   <label for="date_time" class="col-sm-4 control-label">Preferred Date &amp; Time: <font class="req">*</font></label>

                   <div class="col-sm-8">

                      <input type="text" class="form-control" id="date_time" name="date_time" placeholder="Date &amp; Time">

                   </div>

                </div>

                <div class="form-group">

                   <label for="picup_location" class="col-sm-4 control-label">Pickup Location:</label>

                   <div class="col-sm-8">

                      <input type="text" class="form-control" id="picup_location" name="picup_location" placeholder="Pickup Location">

                   </div>

                </div> 

                               

            

                <style type="text/css">

        

        </style>                               

               

                <div class="form-group">

                   <label for="address1" class="col-sm-4 control-label">Remarks:</label>

                   <div class="col-sm-8">

                      <textarea class="form-control" rows="3" placeholder="Service Remarks" id="description" name="description"></textarea>

                   </div>

                </div>

                <div class="form-group" id="bookingPrice" style="">

                   <label for="price" class="col-sm-4 control-label">Price: <!--<font class="req">*</font>--></label>

                   <div class="col-sm-8">

                      <input type="text" class="form-control" id="price" name="price" placeholder="Price">

                   </div>

                </div>

                <div class="form-group" id="bookingAdvance" style="">

                   <label for="advance_receive" class="col-sm-4 control-label">Advance Received:</label>

                   <div class="col-sm-8">

                      <input type="text" class="form-control" id="advance_receive" name="advance_receive" placeholder="Advance Received">

                   </div>

                </div>

                <!-- <div class="form-group">

                   <label for="warrenty" class="col-sm-4 control-label">Warrenty Valid Upto</label>

                   <div class="col-sm-8">

                      <input type="text" class="form-control" id="warrenty" name="warrenty" placeholder="Warrenty Valid Upto">

                   </div>

                </div> 

                <div class="form-group">

                   <label for="zipcode" class="col-sm-4 control-label">Service Status:</label>

                   <div class="col-sm-8">

                      <select id="status" name="status" class="form-control">

                         <option value="O">Open </option>

                         <option value="P">Pending</option>

                         <option value="C">Completed</option>

                      </select>

                   </div>

                </div>  

                -->

                   <div class="form-group">

                   <label for="zipcode" class="col-sm-4 control-label">Package :</label>

                   <div class="col-sm-8">

                      <select id="package" name="package" class="form-control">

                         <option value="Silver">Silver </option>

                         <option value="Gold">Gold</option>

                         <option value="Platinum">Platinum</option>
                         
                         <option value="Platinum Plus">Platinum Plus</option>

                      </select>

                   </div>

                </div> 

              </div>

              </div>

                  

              <div class="box-footer col-md-12">

                <div class="col-xs-12  col-md-8">

                <label class="col-sm-4 control-label"></label>

                 <!-- <button class="btn" type="button" id="brnback" style="margin-left:10px;">Back</button> -->

                <button class="btn btn-primary btn-next" type="button" id="btn_fullSubmit" style="margin-left:10px;">Submit</button>

                <!-- <button class="btn" type="reset" onclick="javascript: history.go(-1);">Cancel</button> -->

                </div>

             </div>

        </form>  </div>

        <!-- /.box -->      

    </div><!-- /.row -->  

    </section>

    

  </div>



  <script type="text/javascript">


   

      $('#radio_client input').click(function(){

      var GetValue=$('#radio_client').find(":checked").val();



      if(GetValue== "E") {

      $('#existing').show();

      $('#new_client').hide();

      $('#btnSubmit').hide();



    $('#btn_searchmem').click(function(){            
              data_search = $('#existing').serialize();

          


            $.ajax({
                type:'post',
                data:data_search,
                url:'<?php echo base_url(); ?>user/get_memberci',
                dataType:'json',
                success:function(htm){
                  console.log(htm);
                    if (htm.success == false){
                            // alert('record not found');
                       $.alert({
                               title: 'Sorry!',
                               content: 'Record not found!',
                               type: 'green'
                              });
                    }
                    else if(htm.success == true)
                    { 

                      $('#step-1').hide();
                      $('#step-2').show();
                      $('#membership_id').val(htm.message[0].customer_id); 
                      $('#txt_bookingid').text(htm.booking_id);
                    }

                }

            });

      });



      }else if (GetValue== "N"){

        $('#existing').hide();

        $('#new_client').show();



      } 

  });



        $('#btnSubmit').click(function(){

    	mydata = $('#bookingFrm').serialize();

      	$.ajax({

            type:'post',
            data:mydata,
            url:'<?php echo base_url(); ?>user/add_booking',
            dataType:'json',
            success:function(htm){
              if(htm.success == true){
                  console.log(htm.booking_id);

                  $('#step-1').hide();
                  $('#step-2').show();
                  $('#membership_id').val(htm.messages); 
                  $('#txt_bookingid').text(htm.booking_id); 

                 /* alert('Date saved !');*/
                  //booking_id                   

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

     //new_client 



     $('#brnback').click(function(){



             $('#step-2').hide();

             $('#step-1').show();

     });









$('#btn_fullSubmit').click(function(){



/*form1 = $('#bookingFrm').serialize();*/

form2 = $('#bookingFrm2').serialize();

form3 = $('#bookingFrm3').serialize();



all_data = form2+'&'+form3;

$.ajax({

  type:'post',

  url:'<?php echo base_url(); ?>user/add_booking_bind',

  data:all_data,

  dataType:'json',

  success:function(htm){

              console.log(htm.success);

             if(htm.success == true) {

                  console.log(htm.message);
                //  alert('Date saved !');

                             $.alert({
              animationBounce: 1.5,
    title: 'Success',
    content: 'Record saved successfully..',
    type: 'green'
});
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



 $(document).ready(function(){

 

 

      



/*      $("#date_time").datetimepicker({

    format: 'yyyy-mm-dd hh:ii',

     

});*/


 

    $('#date_time').datetimepicker();

    });



  //   $('#bookingFrm').serialize()

  </script>

<?php include('footer.php'); ?>
