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
						<section class="invoice" >
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
												<td><select class="form-control valid" name="pd_tx_type"
															id="pd_tx_type">
														<option <?php if($cmd[0]->vehicle_type=='Hatchback')echo 'selected' ?> value="Hatchback">Hatchback</option>
														<option <?php if($cmd[0]->vehicle_type=='Sedan')echo 'selected' ?> value="Sedan">Sedan</option>
														<option <?php if($cmd[0]->vehicle_type=='Mini SUV')echo 'selected' ?> value="Mini SUV">Mini SUV</option>
														<option <?php if($cmd[0]->vehicle_type=='Luxury Compact')echo 'selected' ?> value="Luxury Compact">Luxury Compact</option>
														<option <?php if($cmd[0]->vehicle_type=='SUV/Luxury Sedan')echo 'selected' ?> value="SUV/Luxury Sedan">SUV/Luxury Sedan</option>
														<option <?php if($cmd[0]->vehicle_type=='Luxury SUV')echo 'selected' ?> value="Luxury SUV">Luxury SUV</option>
														<option <?php if($cmd[0]->vehicle_type=='Exotic Car')echo 'selected' ?> value="Exotic Car">Exotic Car</option>
														<option <?php if($cmd[0]->vehicle_type=='Bike')echo 'selected' ?> value="Bike">Bike</option>
														<option <?php if($cmd[0]->vehicle_type=='Scooter')echo 'selected' ?> value="Scooter">Scooter</option>
														<option <?php if($cmd[0]->vehicle_type=='Super Bike')echo 'selected' ?> value="Super Bike">Super Bike</option>
													</select></td>
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


														$get_bid = $CI->my_model->get_data('branch');

														echo '<select class="form-control valid" name="bid" id="bid">';
														for ($i = 0; $i < count($get_bid); $i++) {

															?>

															<option <?php if($cmd[0]->bid==$get_bid[$i]->bid)echo 'selected' ?>
																	value="<?php echo $get_bid[$i]->bid; ?>">
																<?php echo $get_bid[$i]->name; ?></option>
															<?php
														}
														echo '</select>';
													?>
														 <input type="hidden" name="pd_tx_studio"  id="pd_tx_studio" style="border: #fff;"
																value="<?php echo $cmd[0]->coating_studio; ?>">




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

											<tr class="cls_tr_dy" id="<?php echo $cm; ?>" data-id="trform-1">
												<td><?php echo $i + 1; ?></td>
												<input type='hidden' id="invoice_isno<?php echo $cm; ?>" value="<?php echo $cmd[$i]->isno; ?>" />
												<td><input type="text" class="form-control cls_repl"
														   name="txt_booking_item<?php echo $cm; ?>"
														   id="txt_booking_item<?php echo $cm; ?>"
														   placeholder="Item & Description" style="width: 250px;"
														   value="<?php echo $cmd[$i]->item_name; ?>"></td>
												<td><input id="txt_booking_qty<?php echo $cm; ?>" type="text"
														   style="padding: 4px;width: 37px;text-align: center;"
														   class="form-control cls_booking_qty"
														   name="txt_booking_qty<?php echo $cm; ?>"
														   value="<?php echo $cmd[$i]->item_qty; ?>" placeholder="Qty">
												</td>
												<td><input id="txt_booking_rate<?php echo $cm; ?>" type="text"
														   class="form-control cls_booking_rate"
														   value="<?php echo $cmd[$i]->iteam_net_price; ?>"
														   name="txt_booking_rate<?php echo $cm; ?>"
														    placeholder="Rate"></td>
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
												<td><input id="txt_booking_amount<?php echo $cm; ?>" type="text"
														   class="form-control cls_total cls_booking_amount"
														   value="<?php echo $cmd[$i]->iteam_price; ?>"
														   name="txt_booking_amount<?php echo $cm; ?>"
														    style="padding: 4px;"
														   placeholder="Amount"></td>
												<td style="cursor:pointer;"> </td>
											</tr>
											<?php
										}

										?>

										</tbody>
									</table>
								</div>
								<!-- /.col -->
							</div>

							<div class="row">
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
									<p class="lead lol">Total Amount</p>


									<div class="table-responsive">
										<table class="table">
											<tbody>
											<tr>
												<th style="width:50%">Subtotal:</th>
												<td><i class="fa fa-rupee"></i> <span
															style="font-size: 20px;"><input type="text" name=""
																							id="pd_tx_amount" style="border: #fff;width: 50%;"
																							value=""></span></td>
											</tr>
											<tr style="display: none;">
												<th>GST - ( <span> <input type="text"
																		  style="width: 26px;border: #fff;" name="" value="" />
                                                        </span> % )</th>
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
																			value="<?php echo $cmd[0]->cgst; ?>" />
                                                                        </span> %) </td>
														</tr>
														<tr>
															<td style="width: 81px;">SGST - ( <span> <input
																			type="text"
																			style="width: 26px;border: #fff;"
																			id="txt_sgst_om" name="txt_sgst_om"
																			value="<?php echo $cmd[0]->sgst; ?>" />
                                                                        </span> %) </td>

														</tr>
														<tr>
															<td style="width: 81px;">IGST - ( <span> <input
																			type="text"
																			style="width: 26px;border: #fff;"
																			id="txt_igst_om" name="txt_igst_om"
																			value="<?php echo $cmd[0]->igst; ?>" />
                                                                        </span> %) </td>

														</tr>
														</tbody>
													</table>
												</th>
												<td>
													<table style="height: 61px;" width="81">
														<tbody>
														<tr>
															<td style="width: 71px;"> <span> <input type="text" readonly
																									style="width: 50px;border: #fff;"
																									id="txt_cgst_cm" name="txt_cgst_cm"
																									value="" /> </span></td>
														</tr>
														<tr>
															<td style="width: 71px;"> <span> <input type="text" readonly
																									style="width: 50px;border: #fff;"
																									id="txt_sgst_cm" name="txt_sgst_cm"
																									value="" /> </span> </td>
														</tr>
														<tr>
															<td style="width: 71px;"> <span> <input type="text" readonly
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
																							style="border: #fff;width: 50%;" value="<?php echo $cmd[0]->grand_total; ?>"></span></td>
											</tr>
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

		function_sum();

		subt = $('#pd_tx_amount').val();
		cgstom =$('#txt_cgst_om').val();
		out_sgst = (parseInt(subt) * parseInt(cgstom)) / 100;
		if (out_sgst === 'NaN') {
			out_sgst = '';
		}
		$('#txt_cgst_cm').val(out_sgst);

		sgstom =$('#txt_sgst_om').val();
		out_sgst = (parseInt(subt) * parseInt(sgstom)) / 100;
		if (out_sgst === 'NaN') {
			out_sgst = '';
		}
		$('#txt_sgst_cm').val(out_sgst);

		igstom =$('#txt_igst_om').val();
		out_sgst = (parseInt(subt) * parseInt(igstom)) / 100;
		if (out_sgst === 'NaN') {
			out_sgst = '';
		}
		$('#txt_igst_cm').val(out_sgst);



		$('#bid').change(function() {
			var thisvalue = $(this).find("option:selected").text();
			var e = document.getElementById("bid");
			var text=e.options[e.selectedIndex].text;
			$('#pd_tx_studio').val(text);

		});

		function function_sum() {

			var sum = 0;
			var inputs = $(".cls_booking_amount");
			console.log(inputs);
			for (var i = 0; i < inputs.length; i++) {
				sum += Number($(inputs[i]).val());

			}
			$('#pd_tx_amount').val(sum);
			console.log('sum=' + sum);
		}

		$(document).on('click', '.lol', function() {

			function_sum();

		});


		$(document).on('click', '.cls_remove', function() {


			$(this).parent('tr').remove();

			function_sum();
		});


		$(document).on('change', '.cls_booking_rate', function() {
			$(this).val();
			$(this).attr('id');
			get_htm = $(this).parent('td').prev('td').html();
			get_qty = get_htm.substring(11, 27);
			qty_now = $('#' + get_qty).val();
			rate_now = $(this).val();
			get_htm_amo = $(this).parent('td').next('td').next('td').next('td').html();
			get_amont = get_htm_amo.substring(11, 30);

			// console.log(get_amont);
			// console.log(parseInt(qty_now)*parseInt(rate_now));
			// console.log(qty_now);
			// console.log($(this).parent('td').prev('td').html());
			// console.log($(this).parent('td').next('td').next('td').next('td').html());
			// console.log($(this).attr('id')+':'+$(this).val());

			$('#' + get_amont).val(parseInt(qty_now) * parseInt(rate_now));

			function_sum();

		});

		$(document).on('change', '.cls_booking_qty', function() {

			$(this).val();
			//  console.log($(this).val());
			get_htm_rate = $(this).parent('td').next('td').html();
			console.log(get_htm_rate);
			get_amont = get_htm_rate.substring(11, 28);
			qty_now12 = $('#' + get_amont).val();

			get_htm_tot = $(this).parent('td').next('td').next('td').next('td').next('td').html();

			get_amont_id = get_htm_tot.substring(11, 30);

			$('#' + get_amont_id).val(parseInt(qty_now12) * parseInt($(this).val()));

			//console.log(get_amont_id);
			//console.log(parseInt(qty_now12)*parseInt($(this).val()));
			//console.log(get_htm_rate);
			function_sum();

		});

		$(document).on('change', '.cls_booking_tax', function() {
			nnow = $(this).val();
			// console.log($(this).val());
			get_htm_rate_a = $(this).parent('td').prev('td').html();
			get_amont1 = get_htm_rate_a.substring(11, 28);
			// console.log(get_amont1);


			qty_now13 = $('#' + get_amont1).val();
			// console.log('qty='+qty_now13);

			nnow_q = parseInt(qty_now13) + ((parseInt(qty_now13) * parseInt(nnow)) / 100)

			// console.log('nnow'+nnow_q);


			get_htm_total_a = $(this).parent('td').next('td').next('td').html();

			get_amont13 = get_htm_total_a.substring(11, 30);

			// console.log(get_amont);
			qty_now13 = $('#' + get_amont13).val(nnow_q);
			/* qty_now12 = $('#'+get_amont).val();
			 get_htm_tot = $(this).parent('td').next('td').next('td').next('td').next('td').html();

			 get_amont_id = get_htm_tot.substring(11,30);

			 $('#'+get_amont_id).val(parseInt(qty_now12)*parseInt($(this).val()));*/

			//console.log(get_amont_id);
			//console.log(parseInt(qty_now12)*parseInt($(this).val()));
			//console.log(get_htm_rate);

			function_sum();

		});




		$('#btn_invoice').click(function() {


			txt_bookingid = $('#txt_bookingid').val();
			//    $(".cls_tr_dy").attr('data-id');
			var total_tr = $(".cls_tr_dy").length;
			var lastid_1 = $(".cls_tr_dy:last").attr("id");
			var nxtnum = Number(lastid_1) + 1;
			rat = 1;
			// var aa = [];
			for (var i = rat; i < nxtnum; i++) {
				var asd = $('txt_booking_item' + rat).val();
			}

			var invoice_isno = [];
			var txt_booking_item = [];
			var txt_booking_qty = [];
			var txt_booking_rate = [];
			var txt_booking_tax = [];
			var txt_warranty_year = [];
			var txt_booking_amount = [];
			var num = 0;
			$('.cls_tr_dy').each(function(index, item) {
				var val = $(item).val();
				var id = $(item).attr('id');
				invoice_isno[num] = $('#invoice_isno' + id).val();
				txt_booking_item[num] = $('#txt_booking_item' + id).val();
				txt_booking_qty[num] = $('#txt_booking_qty' + id).val();
				txt_booking_rate[num] = $('#txt_booking_rate' + id).val();
				txt_booking_tax[num] = $('#txt_booking_tax' + id).val();
				txt_warranty_year[num] = $('#txt_warranty_year' + id).val();
				txt_booking_amount[num] = $('#txt_booking_amount' + id).val();

				num++;
			});


			owner = $('#form_owner_info').serialize();
			car = $('#form_car_info').serialize();


			invoice_data = 'r=invoice' + '&invoice_isno=' + escape(invoice_isno) +
					'&txt_booking_item=' + escape(txt_booking_item) +
					'&txt_booking_qty=' + escape(txt_booking_qty) + '&txt_booking_rate=' + escape(
							txt_booking_rate) + '&txt_booking_tax=' + escape(txt_booking_tax) +
					'&txt_warranty_year=' + escape(txt_warranty_year) + '&txt_booking_amount=' + escape(
							txt_booking_amount) + '&pd_tx_amount=' + escape(pd_tx_amount) + '&' + owner + '&' + car
					+'&txt_cgst_cm='+$('#txt_cgst_om').val()+'&txt_sgst_cm='+$('#txt_sgst_om').val()
					+'&txt_igst_cm='+$('#txt_igst_om').val()+'&txt_gd_total='+$('#txt_gd_total').val()

			;
			// console.log(invoice_data);

			$.ajax({
				type: 'post',
				url: '<?php echo base_url(); ?>user/update_invoice',
				data: invoice_data,
				dataType: 'json',
				success: function(htm) {
					// console.log(htm);
					if (htm.success == true) {


						//  alert('Date saved !');

						$.alert({
							animationBounce: 1.5,
							title: 'Success',
							content: 'Invoice Updatesd successfully..',
							type: 'green'
						});
						location.reload();

					}
					else {
						if (htm.messages == "1") {
							$.alert({
								animationBounce: 1.5,
								title: 'Error',
								content: 'No Invoice Found: ' +
										txt_bookingid,
								type: 'red'
							});

						} else {
							$.each(htm.messages, function (key, value) {
								element = $('#' + key);
								element.css('border', '1px solid red');
								element.parent('span').append(value);


								/* element.closest('div.form-group')
								 .removeClass('has-error')

								 .addClass(value.length > 0 ? 'has-error':'has-success')

								 .find('.text-danger').remove();

								 element.after(value); */

							});
						}
					}




				},
				error: function(data){
					alert("fail");
					console.log(data.responseText);
				}

			});





		});

		$('#list1').DataTable();
		$('#btn_add_item').click(function() {

			var total_element = $(".cls_tr_dy").length;
			var lastid = $(".cls_tr_dy:last").attr("id");
			var nextindex = total_element + 1;

			$('#tbl_body').append('<tr class="cls_tr_dy" id="' + nextindex + '" data-id="trform-' +
					nextindex + '" ><td>' + nextindex +
					'</td><td><input type="text" class="form-control" name="txt_booking_item' + nextindex +
					'" id="txt_booking_item' + nextindex +
					'" placeholder="Item & Description" style="width:250px"></td><td><input id="txt_booking_qty' +
					nextindex +
					'" type="text" style="padding: 4px;width: 37px;text-align: center;" class="form-control cls_repl cls_booking_qty" name="txt_booking_qty' +
					nextindex + '"  placeholder="Qty"></td><td><input id="txt_booking_rate' + nextindex +
					'" type="text" class="form-control cls_booking_rate" name="txt_booking_rate' +
					nextindex +
					'"  placeholder="Rate"></td><td><input type="text" class="form-control cls_booking_tax" name="txt_booking_tax' +
					nextindex +
					'" style="padding: 4px;width: 37px;text-align: center;" id="txt_booking_tax' +
					nextindex +
					'" placeholder="%"></td><td><input type="text" style="padding: 4px;width: 37px;text-align: center;" class="form-control" name="txt_warranty_year' +
					nextindex + '" id="txt_warranty_year' + nextindex +
					'" placeholder="0"></td><td><input id="txt_booking_amount' + nextindex +
					'" type="text" class="form-control cls_booking_amount" style="padding: 4px;" name="txt_booking_amount' +
					nextindex +
					'"  placeholder="Amount"></td><td style="cursor:pointer;"class="cls_remove" >X</td></tr>'
			);
		});
	});




	$('#cls_remove').hover();




	$('#txt_cgst_om').keyup(function() {
		subt = $('#pd_tx_amount').val();
		cgstom = $(this).val();
		out_sgst = (parseInt(subt) * parseInt(cgstom)) / 100;

		if (out_sgst === 'NaN') {
			out_sgst = '';
		}

		$('#txt_cgst_cm').val(out_sgst);
		b = $('#txt_sgst_cm').val();
		c = $('#txt_igst_cm').val();

		out_sgst_tt = (parseInt(out_sgst) + parseInt(b) + parseInt(c) + parseInt($('#pd_tx_amount').val()));
		$('#txt_gd_total').val(out_sgst_tt);

	});

	$('#txt_sgst_om').keyup(function() {
		subt1 = $('#pd_tx_amount').val();
		cgstom1 = $(this).val();
		out_sgst1 = (parseInt(subt1) * parseInt(cgstom1)) / 100;
		if (out_sgst1 === 'NaN') {
			out_sgst1 = '';
		}
		$('#txt_sgst_cm').val(out_sgst1);
		b1 = $('#txt_cgst_cm').val();
		c1 = $('#txt_igst_cm').val();

		out_sgst_tt1 = (parseInt(out_sgst1) + parseInt(b1) + parseInt(c1) + parseInt($('#pd_tx_amount').val()));
		$('#txt_gd_total').val(out_sgst_tt1);
	});
	$('#txt_igst_om').keyup(function() {
		subt2 = $('#pd_tx_amount').val();
		cgstom2 = $(this).val();
		out_sgst2 = (parseInt(subt2) * parseInt(cgstom2)) / 100;
		if (out_sgst2 === 'NaN') {
			out_sgst2 = '';
		}
		$('#txt_igst_cm').val(out_sgst2);

		b2 = $('#txt_cgst_cm').val();
		c2 = $('#txt_sgst_cm').val();

		out_sgst_tt2 = (parseInt(out_sgst2) + parseInt(b2) + parseInt(c2) + parseInt($('#pd_tx_amount').val()));
		$('#txt_gd_total').val(out_sgst_tt2);
	});
</script>
<?php include 'footer.php';?>
