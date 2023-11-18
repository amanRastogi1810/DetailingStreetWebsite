<?php

$this->load->model('my_model');

$cmd = $this->my_model->get_data('invoice');
$cmd = count($cmd);
$inv = $cmd + 1;
$inv = "DSIN00$inv";
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

            Generate New Invoice :
        </h1>

        <form name="existing" class="form-horizontal col-md-6" id="existing" enctype="multipart/form-data" method="post"
            accept-charset="utf-8" novalidate="novalidate" style="">

            <div id="existing_div">

                <div class="form-group">
                    <label for="txt_bookingid" class="col-sm-4 control-label">Booking ID</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="txt_bookingid" id="txt_bookingid"
                            placeholder="Booking ID Like : DSBK0000">
                    </div>
                    <button class="btn btn-primary btn-next" type="button" id="btn_searchbooking"
                        style="margin-left:10px;">Next </button>
                </div>
            </div>

        </form>

    </section>

    <!-- Main content -->



    <section class="content">

        <div class="row">

            <div class="col-xs-12">

                <div class="box box-primary">

                    <!-- /.box-header -->

                    <div class="box-body">





                        <hr>
                        <section class="invoice" style="display: none;">
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
                                                    style="border: #fff;" value="Admin, Inc."></strong><br>
                                            <p id="pd_address">
                                                <input type="text" name="pd_tx_addrs1" id="pd_tx_addrs1"
                                                    style="border: #fff;" value="795 Folsom Ave, Suite 600"><br>
                                                <input type="text" name="pd_tx_addrs2" id="pd_tx_addrs2"
                                                    style="border: #fff;" value="San Francisco, CA 94107">
                                                <br>
                                            </p>
                                            Phone:<span id="pd_phone"> <input type="text" name="pd_tx_phone"
                                                    id="pd_tx_phone" style="border: #fff;" value="(804) 123-5432">
                                            </span><br>
                                            Email: <span id="pd_email"><input type="text" name="pd_tx_email"
                                                    id="pd_tx_email" style="border: #fff;width: 237px;"
                                                    value="info@almasaeedstudio.com"></span>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">

                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">


                                        <b>Invoice : <input type="text" name="pd_invoice" id="pd_invoice"
                                                style="border: #fff;width: 90px;" value="<?php echo $inv; ?>"></b><br>
                                        <br>
                                        <b>CUSTOMER ID:</b> <input type="text" name="pd_cid" id="pd_cid"
                                            style="border: #fff;width: 90px;" value="4F3S8J"> <br>
                                        <b>BOOKING ID:</b><input type="text" name="pd_bid" id="pd_bid"
                                            style="border: #fff;width: 90px;" value="4F3S8J"> <br>
                                        <b>Payment Date:</b><input type="text" name="pd_pay_date" id="pd_pay_date"
                                            style="border: #fff;width: 90px;" value="<?php echo date('d-m-Y'); ?>"><br>
                                        <b>GST :</b><input type="text" name="pd_company_gst" id="pd_company_gst"
                                            style="border: #fff;width: 120px;"
                                            value="<?php if ($parentHodList[0]->company_gst_no == '') {echo '--';} else {echo $parentHodList[0]->company_gst_no;}?>"><br>

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
                                                    <td><input type="text" name="pd_tx_date" id="pd_tx_date" maximum="2"
                                                            style="border: #fff;" value="<?php echo date('d-m-Y'); ?>">
                                                    </td>
                                                    <td><input type="text" name="pd_tx_vehicle" id="pd_tx_vehicle"
                                                            style="border: #fff;" value="Car"></td>
													<td>
														<select class="form-control valid"
																name="pd_tx_type"
																id="pd_tx_type">
															<option value="Hatchback">Hatchback</option>
															<option value="Sedan">Sedan</option>
															<option value="Mini SUV">Mini SUV</option>
															<option value="Luxury Compact">Luxury Compact</option>
															<option value="SUV/Luxury Sedan">SUV/Luxury Sedan</option>
															<option value="Luxury SUV">Luxury SUV</option>
															<option value="Exotic Car">Exotic Car</option>
															<option value="Bike">Bike</option>
															<option value="Scooter">Scooter</option>
															<option value="Super Bike">Super Bike</option>

														</select>

													</td>
                                                    <td><input type="text" name="pd_tx_rno" id="pd_tx_rno"
                                                            style="border: #fff;" value="CH0012121"></td>
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
                                                            style="border: #fff;" value="BMW 320D"></td>
                                                    <td>
                                                        <select class="form-control valid" name="pd_tx_paymenttype"
                                                            id="pd_tx_paymenttype">
                                                            <option value="CASH">CASH</option>
                                                            <option value="ONLINE">ONLINE</option>
                                                        </select>
                                                        <!-- 	<input type="text" name="pd_tx_paymenttype" id="pd_tx_paymenttype" style="border: #fff;"  value="Cash"> -->

                                                    </td>
                                                    <td><input type="text" name="pd_tx_vcolor" id="pd_tx_vcolor"
                                                            style="border: #fff;" value="BLUE"></td>
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
                                        <a href="javascript:void(0);" class="customer_gst"> Add Customer GST
                                            (Optional)</a>
                                        <br>
                                        <table class="table table-striped" style="display: none;" id="tbl_cust_gst">
                                            <thead>
                                                <tr>
                                                    <th>Customer GST (Optional)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" name="pd_tx_customer_gst"
                                                            id="pd_tx_customer_gst" style="border: #fff;" value=""
                                                            placeholder=""></td>
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
                                            <tr class="cls_tr_dy" id="1" data-id="trform-1">
                                                <td>1</td>
                                                <td><input type="text" class="form-control cls_repl"
                                                        name="txt_booking_item1" id="txt_booking_item1"
                                                        placeholder="Item & Description" style="width: 250px;"></td>
                                                <td><input id="txt_booking_qty1" type="text"
                                                        style="padding: 4px;width: 37px;text-align: center;"
                                                        class="form-control cls_booking_qty" name="txt_booking_qty1"
                                                        placeholder="Qty"></td>
                                                <td><input id="txt_booking_rate1" type="text"
                                                        class="form-control cls_rate cls_booking_rate"
                                                        name="txt_booking_rate1" placeholder="Rate"></td>
                                                <td><input type="text"
                                                        style="padding: 4px;width: 37px;text-align: center;"
                                                        class="form-control cls_tax cls_booking_tax"
                                                        name="txt_booking_tax1" id="txt_booking_tax1" placeholder="%">
                                                </td>
                                                <td><input type="text"
                                                        style="padding: 4px;width: 37px;text-align: center;"
                                                        class="form-control" name="txt_warranty_year1"
                                                        id="txt_warranty_year1" placeholder="0"></td>
                                                <td><input id="txt_booking_amount1" type="text"
                                                        class="form-control cls_total cls_booking_amount"
                                                        name="txt_booking_amount1" style="padding: 4px;"
                                                        placeholder="Amount"></td>
                                                <td style="cursor:pointer;"> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="javascript:void(0);" id="btn_add_item">Add</a>
                                </div>
                                <!-- /.col -->
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <!-- <p class="lead">Notice : </p> -->
                                    <p class="text-muted well well-sm no-shadow"
                                        style="margin-top: 10px;display: none;">
                                        <!--    All rates are inclusive of taxes.
T&C Apply*
Thank You for visiting our coating studio. -->
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
                                                                                value="<?php if ($parentHodList[0]->sgst == '') {echo '0';} else {echo $parentHodList[0]->cgst;}?>" />
                                                                        </span> %) </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 81px;">SGST - ( <span> <input
                                                                                type="text"
                                                                                style="width: 26px;border: #fff;"
                                                                                id="txt_sgst_om" name="txt_sgst_om"
                                                                                value="<?php if ($parentHodList[0]->sgst == '') {echo '0';} else {echo $parentHodList[0]->sgst;}?>" />
                                                                        </span> %) </td>

                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 81px;">IGST - ( <span> <input
                                                                                type="text"
                                                                                style="width: 26px;border: #fff;"
                                                                                id="txt_igst_om" name="txt_igst_om"
                                                                                value="<?php if ($parentHodList[0]->igst == '') {echo '0';} else {echo $parentHodList[0]->igst;}?>" />
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
                                                                style="border: #fff;width: 50%;" value=""></span></td>
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
                                        <i class="fa fa-download"></i> Save
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

    $('.customer_gst').click(function() {

        $('#tbl_cust_gst').toggle();
    });


    $('#bid').change(function() {
        var thisvalue = $(this).find("option:selected").text();
        $('#pd_tx_studio').val(thisvalue);
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


        invoice_data = 'r=invoice&' + 'txt_booking_item=' + escape(txt_booking_item) +
            '&txt_booking_qty=' + escape(txt_booking_qty) + '&txt_booking_rate=' + escape(
                txt_booking_rate) + '&txt_booking_tax=' + escape(txt_booking_tax) +
            '&txt_warranty_year=' + escape(txt_warranty_year) + '&txt_booking_amount=' + escape(
                txt_booking_amount) + '&pd_tx_amount=' + escape(pd_tx_amount) + '&' + owner + '&' + car
		        +'&txt_cgst_cm='+$('#txt_cgst_om').val()+'&txt_sgst_cm='+$('#txt_sgst_om').val()
				+'&txt_igst_cm='+$('#txt_igst_om').val()+'&txt_gd_total='+$('#txt_gd_total').val()
		                      ;

        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>user/add_invoice',
            data: invoice_data,
            dataType: 'json',
            success: function(htm) {
                // console.log(htm);
                if (htm.success == true) {


                    //  alert('Date saved !');

                    $.alert({
                        animationBounce: 1.5,
                        title: 'Success',
                        content: 'Record saved successfully..',
                        type: 'green'
                    });
                    location.reload();

                }
                else {
					if (htm.messages == "1") {
						$.alert({
							animationBounce: 1.5,
							title: 'Error',
							content: 'Invoice already created for Booking ID : ' +
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




            }

        });





    });

    $('#list1').DataTable();
    $('#btn_add_item').click(function() {

        var total_element = $(".cls_tr_dy").length;
        var lastid = $(".cls_tr_dy:last").attr("id");
        var nextindex = Number(lastid) + 1;

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



$(document).on('click', '#btn_searchbooking', function() {



    bid = $('#txt_bookingid').val();


    if (bid == '') {
        // alert('Please Enter Booking ID ..');

        $.alert({
            animationBounce: 1.5,
            title: 'Empty field Error',
            content: 'Please Enter Booking ID ..',
            type: 'red'
        });

    } else {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>/user/get_booking_byid',
            data: {
                "bid": bid
            },
            dataType: 'json',
            success: function(htm) {


                if (htm.error) {
                    $.alert({
                        animationBounce: 1.5,
                        title: 'Invalid Booking ID',
                        content: 'Please Enter Valid Booking ID ..',
                        type: 'red'
                    });
                } else {
                    $('#pd_tx_name').val(htm[0].name);
                    $('#pd_tx_addrs1').val(htm[0].address);
                    $('#pd_tx_addrs2').val(htm[0].city + ',' + htm[0].pincode);
                    $('#pd_tx_phone').val(htm[0].number);
                    $('#pd_tx_email').val(htm[0].email);
                    $('#pd_cid').val(htm[0].customer_id);

                    $('#pd_bid').val(htm[0].booking_id);

                    $('#pd_tx_date').val(htm[0].date);

                    $('#pd_tx_vehicle').val('Car');
                    $('#pd_tx_type').val(htm[0].package);

                    $('#pd_tx_rno').val(htm[0].vehicle);
                    $('#pd_tx_model').val(htm[0].vehicle_name);
                    $('#pd_tx_paymenttype').val('CASH');
                    $('#pd_tx_type').val('Hatchback');
                    $('#pd_tx_vcolor').val(htm[0].vehicle_color);
                    $('#pd_tx_studio').val('Delhi');

                    $('#pd_tx_amount').val(htm[0].price);

                    // package

                    $('#txt_booking_rate1').val(htm[0].price);
                    $('#txt_booking_amount1').val(htm[0].price);

                    $('#txt_booking_qty1').val('1');
                    $('#txt_booking_tax1').val('0');

                    $('#txt_warranty_year1').val('0');


                    $('#txt_booking_item1').val(htm[0].package + '(' + htm[0].remark_vehicle + ')');

                    $('.invoice').show('slow');


                }
            }

        });
    }



});


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
