

<?php include('header.php'); ?>

<?php include('menu.php'); ?>



<div class="content-wrapper" style="min-height: 673px;">

	<!-- Content Header (Page header) -->

	<section class="content-header">

		<h1>

			Maintainance History

		</h1>

		<ol class="breadcrumb">

			<li>

				<a href="">

					Maintanamce

				</a>

			</li>

			<li class="active">

				History

			</li>

		</ol>

	</section>

	<!-- Main content -->

	<section class="content">

		<div class="row">

			<div class="col-xs-12 col-md-12">

				<div class="box box-primary">

					<div class="box-header with-border">


					</div>


						<div class="box-body">

							<div class="col-xs-12 col-md-6">

								<div class="form-group">

									<label for="category" class="col-sm-3 control-label">Booking Id :</label>

									<div class="col-sm-9">

										<input type="text" name="bid" id="bid" class="form-control" placeholder="Enter Booking Id">

									</div>

								</div>
							</div>




				<div class="col-xs-12 col-md-6">

					<label class="col-sm-4 control-label"></label>

					<button class="btn btn-primary" id="btn_query" type="button" style="margin-right:10px;">Submit</button>



				</div>

							<div class="col-xs-12 col-md-12" id="data" style="display: none">
								<h2>No Appointments Available</h2>
							</div>

							<div class="col-sm-12" style="
    margin-top: 35px;
" >

								<table id="list1" class="table table-bordered table-striped"
									   role="grid" aria-describedby="list1_info" style="display: none;
                                           background-color: #8f808073;">

									<thead>
									<tr role="row">


										<th class="yellow header headerSortDown">Booking Id</th>
										<th class="yellow header headerSortDown">Date</th>
										<th class="yellow header headerSortDown">Time</th>
										<th class="yellow header headerSortDown">Comment</th>

									</tr>

									</thead>

									<tbody>


									</tbody>

								</table>

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

<script type="text/javascript">
	$('#btn_query').click(function(){


		var bid=$('#bid').val();
		var query='?bid='+bid;
		// console.log(bid);
		$.ajax({

			type:'get',

			url:'<?php echo base_url(); ?>user/get_appointment_history'+query,
			success:function(htm){
				$obj= JSON.parse(htm);
				// console.log($obj[0].id);

				var data='';
				var i=0;
				for(i;i<$obj.length;i++){
					$('#data').hide();
					$('#list1').show();
					data+='<tr><td>'+$obj[i].booking_id+'</td><td>'+$obj[i].date+'</td><td>'+$obj[i].time+'</td><td>'+$obj[i].comment+'</td></tr>'

				}
				if(i==0){
					$('#list1').hide();
					$('#data').show();
				}
				$("#list1 tbody").html(data);
				console.log(htm);

			}

		});

	});


</script>

<?php include('footer.php'); ?>
