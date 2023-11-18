<?php

//$this->

$id = $_GET['id'];

$invoice_no = base64_decode($id);

$this->load->model('my_model');
$cmd = $this->my_model->get_table_by_column('invoice', 'invoice_number', $invoice_no);

/*print_r($cmd);
$cmd= count($cmd);
die(); */
/*$inv = $cmd+1;
$inv = "DSIN00$inv";
 */
include 'header.php';
?>

<?php include 'menu.php';?>

<style type="text/css">
	.table-striped tr td {
		border: solid 1px black;
	}

	.table-striped tr th {
		border: solid 1px black;

		background-color: #c52d2dcc;
		color: #fff;
	}
</style>

<div class="content-wrapper" style="min-height: 542px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1 class="col-md-6">

			Update Invoice :

		</h1>
		<br>


	</section>

	<!-- Main content -->



	<section class="content">

		<div class="row">

			<div class="col-xs-12">

				<div class="box box-primary">

					<!-- /.box-header -->

					<div class="box-body">





						<hr>
						<section class="invoice" style="display: block;">
							<!-- title row -->
							<div class="row">
								<div class="col-xs-12" style="padding-bottom: 31px;">
									<?php

									if (isset($get_branch[0])) {
										?>


										<h2 class="page-header">
											<img src="http://crm.detailingstreet.com/assets/img/logo-trans.png"
												 style="width: 200px;">
											<small class="pull-right"
												   style="text-align: right;line-height: 16px;margin-top: 0px;"><strong><?php
													echo $get_branch[0]->name;
													?></strong> <br>
												<?php echo $get_branch[0]->address; ?>
												Phone : <?php echo $get_branch[0]->mobile; ?> <br>
												Email : <?php echo $get_branch[0]->email; ?><br>

											</small>

										</h2>


										<?php
									} else {
										?>

										<h2 class="page-header">
											<img src="http://crm.detailingstreet.com/assets/img/logo-trans.png"
												 style="width: 200px;">
											<small class="pull-right"
												   style="text-align: right;line-height: 16px;margin-top: 0px;"><strong>Detailing
													Street</strong> <br>

												C-58, Mansarover Garden <br>
												Near Axis Bank, Delhi-110015 <br>

												Phone : 7838-509-509 <br>
												Email : care@detailingstreet.com <br>

											</small>

										</h2>
									<?php }

									?>


								</div>
							</div>
							<div class="row invoice-info">
								<form id="form_owner_info">
									<div class="col-sm-4 invoice-col">
										To
										<address>
											<strong id="pd_name"><input type="text" name="pd_tx_name" id="pd_tx_name"
																		style="border: #fff;"
																		value="<?php echo $cmd[0]->bill_name; ?>"></strong><br>
											<p id="pd_address">
												<input type="text" name="pd_tx_addrs1" id="pd_tx_addrs1"
													   style="border: #fff;"
													   value="<?php echo $cmd[0]->bill_address; ?>"><br>

												<br>
											</p>
											Phone:<span id="pd_phone"> <input type="text" name="pd_tx_phone"
																			  id="pd_tx_phone" style="border: #fff;"
																			  value="<?php echo $cmd[0]->bill_phone; ?>"> </span><br>
											Email: <span id="pd_email"><input type="text" name="pd_tx_email"
																			  id="pd_tx_email" style="border: #fff;width: 237px;"
																			  value="<?php echo $cmd[0]->bill_email; ?>"></span>
										</address>
									</div>
									<!-- /.col -->
									<div class="col-sm-4 invoice-col">

									</div>
									<!-- /.col -->
									<div class="col-sm-4 invoice-col">
										<b>Invoice : <input type="text" name="pd_invoice" id="pd_invoice"
															style="border: #fff;width: 90px;"
															value="<?php echo $invoice_no; ?>"></b><br>
										<br>
										<b>CUSTOMER ID:</b> <input type="text" name="pd_cid" id="pd_cid"
																   style="border: #fff;width: 90px;"
																   value="<?php echo $cmd[0]->customer_id; ?>"> <br>
										<b>BOOKING ID:</b><input type="text" name="pd_bid" id="pd_bid"
																 style="border: #fff;width: 90px;"
																 value="<?php echo $cmd[0]->booking_id; ?>"> <br>
										<?php
										if ($cmd[0]->gst_number != '') {
											?>
											<b>GST Number:</b><input type="text" name="pd_gst" id="pd_gst"
																	 style="border: #fff;width: 90px;"
																	 value="<?php echo $cmd[0]->gst_number; ?>"> <br>
											<?php
										}
										?>
										<b>Payment Date:</b><input type="text" name="pd_pay_date" id="pd_pay_date"
																   style="border: #fff;width: 90px;"
																   value="<?php echo $cmd[0]->paydate; ?>"><br>

									</div>
									<!-- /.col -->
								</form>
							</div>
							<!-- /.row -->

							<div class="row">
								<div class="col-xs-12 table-responsive">
									<form id="form_car_info">
										<table class="table table-striped" id="tbl_invoice">
											<thead>
											<tr>
												<th>Booking Date</th>
												<th>Vehicle Type</th>
												<th>Car/Bike Type</th>
												<th>Registration No.</th>


											</tr>
											</thead>
											<tbody>


											<tr>
												<td><input type="text" name="pd_tx_date" id="pd_tx_date"
														   style="border: #fff;"
														   value="<?php echo $cmd[0]->created_date; ?>"></td>
												<td><input type="text" name="pd_tx_vehicle" id="pd_tx_vehicle"
														   style="border: #fff;"
														   value="<?php echo $cmd[0]->vehicle; ?>"></td>
												<td><input type="text" name="pd_tx_type" id="pd_tx_type"
														   style="border: #fff;"
														   value="<?php echo $cmd[0]->vehicle_type; ?>"></td>
												<td><input type="text" name="pd_tx_rno" id="pd_tx_rno"
														   style="border: #fff;"
														   value="<?php echo $cmd[0]->vehicle_regno; ?>"></td>
											</tr>
											</tbody>
										</table>

										<table class="table table-striped">
											<thead>
											<tr>
												<th>Vehicle Model</th>
												<th>Payment Mode</th>
												<th>Vehicle Color</th>
												<th>Coating Studio</th>
												<!--  <th>Valid </th>
		   <th>Payment Mode</th> -->
											</tr>
											</thead>
											<tbody>
											<tr>
												<td><input type="text" name="pd_tx_model" id="pd_tx_model"
														   style="border: #fff;"
														   value="<?php echo $cmd[0]->vehicle_model; ?>"></td>
												<td><select class="form-control valid" name="pd_tx_paymenttype"
															id="pd_tx_paymenttype">
														<option <?php if($cmd[0]->pay_mode=='CASH')echo 'selected' ?> value="CASH">CASH</option>
														<option <?php if($cmd[0]->pay_mode=='ONLINE')echo 'selected' ?>  value="ONLINE">ONLINE</option>
													</select></td>
												<td><input type="text" name="pd_tx_vcolor" id="pd_tx_vcolor"
														   style="border: #fff;"
														   value="<?php echo $cmd[0]->vehicle_color; ?>"></td>
												<td>

													<?php

													if (isset($get_branch[0])) {
														?>
														<input type="hidden" value="<?php echo $get_branch[0]->bid; ?>"
															   name="bid" id="bid"> <input type="text" name="pd_tx_studio"
																						   id="pd_tx_studio" style="border: #fff;"
																						   value="<?php echo $get_branch[0]->name; ?>">
														<?php
													} else {

														$get_bid = $CI->my_model->get_data('branch');

														echo '<select class="form-control valid" name="bid" id="bid">';
														for ($i = 0; $i < count($get_bid); $i++) {

															?>

															<option value="<?php echo $get_bid[$i]->bid; ?>">
																<?php echo $get_bid[$i]->name; ?></option>
															<?php
														}
														echo '</select>';
														echo '<input type="hidden" name="pd_tx_studio"  id="pd_tx_studio" style="border: #fff;"  value="">';
													}
													?>


												</td>
												<!-- <td>BMW 320D</td>
		  <td>Payment Mode</td> -->
											</tr>
											</tbody>
										</table>
									</form>
								</div>
								<!-- /.col -->
							</div>
							<!-- Table row -->
							<div class="row">
								<div class="col-xs-12 table-responsive">
									<table class="table table-striped">
										<thead>
										<tr>

											<th>#</th>
											<th>Item & Description</th>
											<th>Qty</th>
											<th>Rate</th>
											<th>Tax %</th>
											<th>Warranty</th>
											<th>Amount</th>
											<th></th>
										</tr>
										</thead>
										<tbody id="tbl_body">


										<?php

										/*      echo count($cmd);
										echo "<pre>";
										print_r($cmd);
										echo "<pre>";
										 */
										for ($i = 0; $i < count($cmd); $i++) {
											// echo $cmd[$i]->isno;
											$cm = $i + 1;
											?>
											<tr class="cls_tr_dy" id="1" data-id="trform-1">
												<td><?php echo $i + 1; ?></td>
												<td><input type="text" class="form-control cls_repl"
														   name="txt_booking_item<?php echo $cm; ?>"
														   id="txt_booking_item<?php echo $cm; ?>"
														   placeholder="Item & Description" style="width: 250px;"
														   value="<?php echo $cmd[$i]->item_name; ?>"></td>
												<td><input type="text"
														   style="padding: 4px;width: 37px;text-align: center;"
														   class="form-control cls_booking_qty"
														   name="txt_booking_qty<?php echo $cm; ?>"
														   id="txt_booking_qty<?php echo $cm; ?>"
														   value="<?php echo $cmd[$i]->item_qty; ?>" placeholder="Qty">
												</td>
												<td><input type="text" class="form-control cls_booking_rate"
														   value="<?php echo $cmd[$i]->iteam_net_price; ?>"
														   name="txt_booking_rate<?php echo $cm; ?>"
														   id="txt_booking_rate<?php echo $cm; ?>" placeholder="Rate"></td>
												<td><input type="text"
														   style="padding: 4px;width: 37px;text-align: center;"
														   class="form-control cls_tax cls_booking_tax"
														   name="txt_booking_tax<?php echo $cm; ?>"
														   id="txt_booking_tax<?php echo $cm; ?>"
														   value="<?php echo $cmd[$i]->iteam_discount; ?>" placeholder="%">
												</td>
												<td><input type="text"
														   style="padding: 4px;width: 37px;text-align: center;"
														   class="form-control" name="txt_warranty_year<?php echo $cm; ?>"
														   id="txt_warranty_year<?php echo $cm; ?>"
														   value="<?php echo $cmd[$i]->item_warranty; ?>" placeholder="0">
												</td>
												<td><input type="text" class="form-control cls_total cls_booking_amount"
														   value="<?php echo $cmd[$i]->iteam_price; ?>"
														   name="txt_booking_amount<?php echo $cm; ?>"
														   id="txt_booking_amount<?php echo $cm; ?>" style="padding: 4px;"
														   placeholder="Amount"></td>
												<td style="cursor:pointer;"> </td>
											</tr>
											<?php
										}

										?>

										</tbody>

									</table>
									<a href="javascript:void(0);" id="btn_add_item">Add</a>

								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->

							<div class="row">
								<!-- accepted payments column -->
								<div class="col-xs-6">
									<p class="lead">Notice : </p>


									<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
										All rates are inclusive of taxes.
										T&C Apply*
										Thank You for visiting our coating studio.
									</p>


								</div>
								<!-- /.col -->
								<div class="col-xs-6">
									<p class="lead">Total Amount</p>

									<div class="col-xs-12">

										<div class="table-responsive">
											<table class="table">
												<tbody>
												<tr>
													<th style="width:50%">Subtotal:</th>
													<td><i class="fa fa-rupee"></i> <span
															style="font-size: 20px;"><input type="text"
																							name="pd_tx_amount" id="pd_tx_amount"
																							style="border: #fff;width: 50%;" value=""></span>
													</td>

												</tr>
												<tr style="display: none;">
													<th>GST - ( <span> <input type="text"
																			  style="width: 26px;border: #fff;" name=""
																			  value="" /> </span> % )</th>
													<td> </td>
												</tr>
												<tr>
													<th>
														<table style="height: 44px;" width="100">
															<tbody>
															<tr>
																<td style="width: 81px;">CGST - ( <span> <input
																			type="text"
																			style="width: 26px;border: #fff;"
																			id="txt_cgst_om" name="txt_cgst_om"
																			value="<?php echo $cmd[0]->cgst; ?>" /> </span> %) </td>
															</tr>
															<tr>
																<td style="width: 81px;">SGST - ( <span> <input
																			type="text"
																			style="width: 26px;border: #fff;"
																			id="txt_sgst_om" name="txt_sgst_om"
																			value="<?php echo $cmd[0]->sgst; ?>" /> </span> %) </td>

															</tr>
															<tr>
																<td style="width: 81px;">IGST - ( <span> <input
																			type="text"
																			style="width: 26px;border: #fff;"
																			id="txt_igst_om" name="txt_igst_om"
																			value="<?php echo $cmd[0]->igst; ?>" /> </span> %) </td>

															</tr>
															</tbody>
														</table>
													</th>
													<td>
														<table style="height: 61px;" width="81">
															<tbody>
															<tr>
																<td style="width: 71px;"> <span> <input
																			type="text"
																			style="width: 50px;border: #fff;"
																			id="txt_cgst_cm" name="txt_cgst_cm"
																			value="" /> </span></td>
															</tr>
															<tr>
																<td style="width: 71px;"> <span> <input
																			type="text"
																			style="width: 50px;border: #fff;"
																			id="txt_sgst_cm" name="txt_sgst_cm"
																			value="" /> </span> </td>
															</tr>
															<tr>
																<td style="width: 71px;"> <span> <input
																			type="text"
																			style="width: 50px;border: #fff;"
																			id="txt_igst_cm" name="txt_igst_cm"
																			value="" /> </span> </td>
															</tr>
															</tbody>
														</table>
													</td>
												</tr>

												<tr>
													<th style="font-size: 20px;" id="hello">Grand Total:</th>
													<td><i class="fa fa-rupee"></i> <span
															style="font-size: 20px;"><input type="text"
																							name="txt_gd_total" id="txt_gd_total"
																							style="border: #fff;width: 50%;" value=""></span>
													</td>
												</tr>
												</tbody>
											</table>
										</div>

										<div class="table-responsive">
											<table class="table">
												<tbody>
												<!-- <tr>
			<th style="width:50%">Subtotal:</th>
			<td>$250.30</td>
		  </tr>
		  <tr>
			<th>Tax (9.3%)</th>
			<td>$10.34</td>
		  </tr>
		  <tr>
			<th>Shipping:</th>
			<td>$5.80</td>
		  </tr> -->

												</tbody>
											</table>
										</div>
									</div>
									<!-- /.col -->
								</div>
								<!-- /.row -->

								<!-- this row will not appear when printing -->
								<div class="row no-print">
									<div class="col-xs-12">
										<!-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
		  -->
										<button type="button" class="btn btn-primary pull-right" id="btn_invoice"
												style="margin-right: 5px;">
											<i class="fa fa-edit"></i> Edit
										</button>
									</div>
								</div>
						</section>

					</div>

					<!-- /.box-body -->

				</div>
			</div>
		</div>

		<!-- /.row -->

	</section>



	<!-- /.content -->

</div>





<script type="text/javascript">
	$(document).ready(function() {




		$('#list1').DataTable();



		$('#bid').change(function() {

			var thisvalue = $(this).find("option:selected").text();
			$('#pd_tx_studio').val(thisvalue);

		});

	});


	$(document).on('click', '.cls_bk_details', function() {

		cid = $(this).attr('id');
		sno = $(this).attr('data-sno');
		mdata = 'cid=' + escape(cid) + '&sno=' + escape(sno);

		$.ajax({
			type: 'post',
			url: '<?php echo base_url(); ?>user/get_client_by_bk',
			data: mdata,
			dataType: 'json',

			success: function(htm) {
				console.log(htm);

				$('#cid').text(htm[0].customer_id);
				$('#cname').text(htm[0].name);
				$('#cphone').text(htm[0].number);
				$('#cemail').text(htm[0].email);

				$('#bid').text(htm[0].booking_id);

				$('.car_name').text(htm[0].vehicle_name);
				$('.car_number').text(htm[0].vehicle);
				$('.car_color').text(htm[0].vehicle_color);

				$('.car_remark').text(htm[0].remark_vehicle);
				$('.pik_location').text(htm[0].pickup);
				$('.remark').text(htm[0].remark_package);

				/*$('.cls_advance').text(htm[0].advance);*/


				$('.clsprice').text(htm[0].price);
				$('.cls_received').text(htm[0].advance);
				$('.cls_package').text(htm[0].package);
				$('.date_pre').text(htm[0].date);



				$('.cls_address').text(htm[0].address);
				$('.cls_city').text(htm[0].city);
				$('.cls_pin').text(htm[0].pincode);



			}

		});
	});

	// cls_bk_edit

	$(document).on('click', '.cls_bk_edit', function() {

		ecid = $(this).attr('id');
		esno = $(this).attr('data-sno');
		emdata = 'cid=' + escape(ecid) + '&sno=' + escape(esno);

		$.ajax({
			type: 'post',
			url: '<?php echo base_url(); ?>user/get_client_by_bk',
			data: emdata,
			dataType: 'json',
			success: function(htm) {


				$('#ecid').val(htm[0].customer_id);
				$('#ecname').val(htm[0].name);
				$('#ecnumber').val(htm[0].number);
				$('#ecemail').val(htm[0].email);
				$('#ecaddress').val(htm[0].address);
				$('#ecity').val(htm[0].city);

				$('#ebookid').val(htm[0].booking_id);
				$('#ecarname').val(htm[0].vehicle_name);
				$('#ecarnumber').val(htm[0].vehicle);
				$('#ecarcolor').val(htm[0].vehicle_color);

				//   $('.car_remark').text(htm[0].remark_vehicle);
				/*$('.cls_advance').text(htm[0].advance);*/

				$('#epiklocation').val(htm[0].pickup);
				$('eremark').val(htm[0].remark_package);
				$('#eprice').val(htm[0].price);
				$('#eadvprice').val(htm[0].advance);
				$('#epackage').val(htm[0].package);
				$('#epredate').val(htm[0].date);

				//$('epr').text(htm[0].date);
				//  $('#pincode').text(htm[0].pincode);
			}

		});

	});

	$('#edit_btn').click(function() {

		from_edit = $('#edit_form').serialize();



		$.ajax({
			type: 'post',
			url: '<?php echo base_url(); ?>user/update_client',
			data: from_edit,
			dataType: 'json',
			success: function(htm) {
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
				} else

				{



					$.each(htm.messages, function(key, value) {

						element = $('#' + key);

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

	$('.cls_bk_delete').click(function() {

		sno = $(this).attr('data-sno');

		$.confirm({
			title: 'Confirm Alert!',
			content: 'Are you sure you want to delete this record..',
			type: 'orange',
			buttons: {
				confirm: function() {
					$.ajax({
						type: 'post',
						url: '<?php echo base_url(); ?>user/del_fullowup_booking',
						data: 'sno=' + escape(sno),
						cache: false,
						success: function(htm) {

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
				cancel: function() {
					$.alert('Your Record is safe now ');
				}
			}
		});








	});
</script>
<?php include 'footer.php';?>
