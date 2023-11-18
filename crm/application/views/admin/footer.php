<script type="text/javascript">

   $(document).ready(function(){

     $('#fromDate, #toDate').datepicker({ dateFormat:'dd-mm-yy'});  

      $("#getDetail").validate({

       rules: {

         fromDate: {  

           required:true       

         },

         toDate:{

           required:true

         }

       },     

       errorPlacement: function(error, element) { 

          //error.insertAfter(element);

          return true;

       },

       submitHandler: function(form){

         form.submit();

       }

     }); 

   });

</script>

<!-- /.content-wrapper -->

  <!-- Main Footer -->

  <footer class="main-footer">

    <!-- To the right -->

    <div class="pull-right hidden-xs">

      <!--Anything you want-->

    </div>

    <!-- Default to the left -->

    <strong>Copyright &copy; 2020 Detailing Street.</strong> All rights reserved.

  </footer>



  <!-- Control Sidebar -->

  <aside class="control-sidebar control-sidebar-dark">

    <!-- Create the tabs -->

    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>

    </ul>

    <!-- Tab panes -->

      </aside>

  <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed

       immediately after the control sidebar -->

  <div class="control-sidebar-bg"></div>

</div>

<!-- ./wrapper -->



<!-- Optionally, you can add Slimscroll and FastClick plugins.

     Both of these plugins are recommended to enhance the

     user experience. Slimscroll is required when using the

     fixed layout. -->

     

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/html_entity.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/multiselect.js"></script> 

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/util-functions.js"></script> 

<script type="text/javascript">

$(document).ready(function(){

	$("li.active").parent("ul").parent("li").addClass("active");

	

	// ADD ROW

	var mainc = 1;

	$(".addmore").click(function(){

		//var imgc = ;

		var imgc = 1;

		var tcount = mainc + imgc;

		var imgcount = "pdf_file[]";

		$(this).parents('div:first').append('<div style="padding-top:10px;"  class="radd"><input type="file" name="pdf_file[]" id="pdf_file" size="20"   />&nbsp;&nbsp;&nbsp;&nbsp;<span class="help-inline"><a href="#addmore" class="rmrow">Remove</a></span><input name="pdf_file_name[]" id="pdf_file_name1" value="" type="hidden"></div>');

		removerow();

		mainc++;

		return false;

	});

	

	// REMOVE ROW

	removerow();

	function removerow(){

		$(".rmrow").on("click", function(e){

			e.preventDefault();

			$(this).parents('div:first').remove();

			/*$(this).parents('span').prev().prev().remove();

			$(this).parents('span').prev().remove();

			$(this).parents('span').remove();*/

		});

	}

	

	// Get Warranty Valid Upto & Next Inspection Period.

/*	function GetValidityInspect(bookingid){

		var url = "<?php echo base_url(); ?>admin/warranty_inspection_data";

		var myData = {"booking_id":bookingid};

		$.post(url, myData, function(data){

			var obj = $.parseJSON(data);

			$("input#wrnty_valid").val(obj.wrnty_valid);

			$("input#from_period").val(obj.from_period);

			$("input#to_period").val(obj.to_period);

			//alert(obj.wrnty_valid.length);

			

			if( $("select#booking_id").val() > 0 ){

				$("select#booking_id").next(".error").hide();

			}

			

			if( obj.wrnty_valid.length > 0 ){

				$("input#wrnty_valid").next(".error").hide();

				$("input#wrnty_valid").removeClass('error');

			}

			

			if( obj.from_period.length > 0 ){

				$("input#from_period").next(".error").hide();

				$("input#from_period").removeClass('error');

			}

			

			if( obj.to_period.length > 0 ){

				$("input#to_period").next(".error").hide();

				$("input#to_period").removeClass('error');

			}

			

		});

	}

	var bookid = $("select#booking_id option:selected").val();

	GetValidityInspect(bookid);

	$("select#booking_id").change(function(){

		var bookingid = $(this).val();

		GetValidityInspect(bookingid);

	});*/

	//------------------------------------------------

	

	//--------------------- Invoice ---------------------------

	//--------------------- Invoice ---------------------------

	$('select#booking_id').select2().on("change", function (e) {     

	  	var booking_id = this.value;

     	if(booking_id == "") {

			$('#car_make, #car_model,  #car_colour, #regyear, #car_type, #car_detail').val('');		

		}

		else {		

			var ajxUrl = "<?php echo base_url(); ?>admin/ajax/car-details";

			$.post(ajxUrl, {booking_id:booking_id}, function(data) 

			{		

				if(data.result == 'success'){ 		

					$('#car_make').val(data.rec[0].car_make);

					$('#car_model').val(data.rec[0].car_model);

					$('#car_colour').val(data.rec[0].car_colour);

					$('#regyear').val(data.rec[0].reg_year);

					$('#car_type').val(data.rec[0].car_type);	

					$('#car_detail').val(data.rec[0].car_detail);		

				} else { 

					$('#car_model, #regyear, #car_type, #car_make, #car_colour, #car_detail').val('');

				}					

			}, "json");	

		}    

	});

	

	$('#invoice_date').datepicker({ dateFormat:'dd-mm-yy'/*, minDate: "dateToday"*/ });

	$('#from_period, #to_period').datepicker({ dateFormat:'dd-mm-yy',});

	

	$("span#select2-booking_id-container").click(function(){

		$("input.select2-search__field").attr("placeholder", "Type to Search...");

	});	

	$("select#Car_brand_list").select2();

  $("span#select2-Car_brand_list-container").click(function(){

    $("input.select2-search__field").attr("placeholder", "Type To Search ...");

  }); 

  $("select#brand_model_list").select2();

  $("span#select2-brand_model_list-container").click(function(){

    $("input.select2-search__field").attr("placeholder", "Type To Search ...");

  });

  //$(".select2-selection__rendered").removeAttr('title');   

	$(".select2-selection__rendered").removeAttr('title');

});

</script>

<!-- Modal content-->

  <div class="modal fade myImage" id="myImage" role="dialog" >

    <div class="modal-dialog" style="width:790px;" >

      <div class="modal-content">

        <div class="modal-body">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <div class="btn_v"><img src="" class="imagepreview" border="0" width="700px" height="700px" ></div>

      </div>

    </div>

  </div>

</div>

<!--End Modal content-->

<script type="text/javascript">

  $(document).ready(function(){

    //Invoice Image pop Up       

    $(".pop").click(function(e){

      e.preventDefault();   

       $('.imagepreview').attr('src', $(this).attr("href"));

     

      $('#myImage').modal('show');  

    });  

  });

</script> 

</body>

</html>