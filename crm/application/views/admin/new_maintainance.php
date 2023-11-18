

<?php include('header.php'); ?>

<?php include('menu.php'); ?>



<div class="content-wrapper" style="min-height: 673px;">

	<!-- Content Header (Page header) -->

	<section class="content-header">

		<h1>

			Maintainance Booking

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

						<h3 class="box-title"> Create Appointment : <span id="txt_msg" style="color: green;"></span></h3>

					</div>

					<form class="form-horizontal" id="maintainanceFrm" name="maintainanceFrm" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">

						<div class="box-body">

							<div class="col-xs-12 col-md-6">

								<div class="form-group">

									<label for="category" class="col-sm-3 control-label">Date:</label>

									<div class="col-sm-9">

										<input type="dates" name="date" id="date" class="form-control" placeholder="Select Date">

									</div>

								</div>
							</div>







								<?php
								if (isset($get_branch[0])) {
									?>
									<input type="hidden" value="<?php echo $get_branch[0]->bid; ?>" name="branch" id="branch">
									<?php
								}
								else
								{
									$get_bid = $CI->my_model->get_data('branch');

									echo '<div class="col-xs-12 col-md-6 form-group"><label for="zip_code" class="col-sm-3 control-label">Branch: <font class="req">*</font></label><div class="col-sm-9">';
									echo '<select class="form-control valid" name="branch" id="branch">';
									for ($i=0; $i < count($get_bid); $i++) {

										?>

										<option value="<?php echo $get_bid[$i]->name; ?>"><?php echo $get_bid[$i]->name; ?></option>
										<?php
									}
									echo '</select>';
									echo '</div></div>';
								}

								?>

							<div class="col-sm-12" >

								<table id="list1" class="table table-bordered table-striped"
									   role="grid" aria-describedby="list1_info" style="display: none;
                                           background-color: #8f808073;">

									<thead>
									<tr role="row">


										<th class="yellow header headerSortDown">Date</th>
										<th class="yellow header headerSortDown">Booking Id</th>
										<th class="yellow header headerSortDown">Time</th>
										<th class="yellow header headerSortDown">Comment</th>

										<th class="red header">Actions</th>
									</tr>

									</thead>

									<tbody>


									</tbody>

								</table>

							</div>



							<div class="col-xs-12 col-md-6">

								<div class="form-group">

									<label for="log_id" class="col-sm-3 control-label">Booking Id : </label>

									<div class="col-sm-9">

										<input type="text" name="bid" id="bid" class="form-control" placeholder="Enter Booking Id">

									</div>

								</div>
							</div>

							<div class="col-xs-12 col-md-6">

								<div class="form-group">

									<label for="log_id" class="col-sm-3 control-label">Time </label>

									<div class="col-sm-9">

										<input type="time" name="time" id="time" class="form-control" placeholder="Time">

									</div>

								</div>
							</div>

							<div class="col-xs-12 col-md-12" style="
    margin-left: 52px;
    width: 96%;
">

								<div class="form-group">

									<label for="log_id" class="col-sm-1 control-label">Comment : </label>

									<div class="col-sm-11">

										<textarea  name="comment" id="comment" class="form-control" placeholder="Enter Comment"></textarea>

									</div>

								</div>
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



	$('#date , #branch ').change(function(){



		var branch=$('#branch').val();
		var date=$('#date').val();
		var query='?date='+date+'&branch='+branch;
		// console.log(query);

		$.ajax({

			type:'get',
            url:'<?php echo base_url(); ?>user/get_appointments'+query,


			success:function(htm){

				console.log(htm);
				$obj= JSON.parse(htm);
				// console.log($obj[0].id);

				var data='';
				var i=0;
				for(i;i<$obj.length;i++){
					$('#list1').show();
					data+='<tr><td>'+$obj[i].date+'</td><td>'+$obj[i].booking_id+'</td><td>'+$obj[i].time+'</td><td>'+$obj[i].comment+'</td><td><a href="javascript:void(0)" name="del" data-sno='+$obj[i].id+' id="'+$obj[i].id+'" class="cls_bk_delete" title="Delete"  ><i class="fa fa-remove"></i></a></td></tr>'

				}
				if(i==0){
					$('#list1').hide();
				}
				$("#list1 tbody").html(data);

			}

		});

	});

	$('#btn_query').click(function(){



		query_date = $('#maintainanceFrm').serialize();
console.log(query_date);

		$.ajax({

			type:'post',

			data:query_date,

			url:'<?php echo base_url(); ?>user/add_appointment',

			dataType:'json',

			success:function(htm){

				console.log(htm);
				if(htm.success == true) {


					$.alert({
						animationBounce: 1.5,
						title: 'Success',
						content: 'Appointment booked successfully..',
						type: 'green'
					});
					location.reload();

				}

				else if(htm.messages == '1'){
					$.alert({
						animationBounce: 1.5,
						title: 'Failure',
						content: 'Please Enter Valid Booking Id...',
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

	$(document).on('click','.cls_bk_delete',function(){


		sno =   $(this).attr('data-sno');

		$.confirm({
			title: 'Confirm Alert!',
			content: 'Are you sure you want to remove this Appointment..',
			type: 'orange',
			buttons: {
				confirm: function () {
					$.ajax({
						type:'post',
						url:'<?php echo base_url(); ?>user/del_appointment',
						data:'sno='+escape(sno),
						cache:false,
						success:function(htm){

							//   alert('Deleted='+htm);

							$.alert({
								animationBounce: 1.5,
								title: 'Successfully Deleted',
								content: 'Appointment Removed successfully..',
								type: 'green'
							});

							location.reload();

						}

					});
				},
				cancel: function () {
					$.alert('Your Appointment is safe now ');
				}
			}
		});

	});







	$(document).ready(function(){

		$('#date').datepicker({ format: 'yyyy-mm-dd',  startDate: new Date(),});
		// $('#time').timepicker();


	});





</script>

<?php include('footer.php'); ?>
