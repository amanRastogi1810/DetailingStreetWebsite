<?php

//$this->
/*print_r($info['invoice']);
 */

$isno = $info['invoice'][0]->isno;
$booking_id = $info['invoice'][0]->booking_id;
$customer_id = $info['invoice'][0]->customer_id;
$invoice_number = $info['invoice'][0]->invoice_number;
$paydate = $info['invoice'][0]->paydate;
$item_name = $info['invoice'][0]->item_name;
$item_qty = $info['invoice'][0]->item_qty;

$iteam_net_price = $info['invoice'][0]->iteam_net_price;
$iteam_discount = $info['invoice'][0]->iteam_discount;
$iteam_price = $info['invoice'][0]->iteam_price;
$item_warranty = $info['invoice'][0]->item_warranty;
$vehicle = $info['invoice'][0]->vehicle;

$vehicle_type = $info['invoice'][0]->vehicle_type;
$vehicle_regno = $info['invoice'][0]->vehicle_regno;
$vehicle_model = $info['invoice'][0]->vehicle_model;
$vehicle_color = $info['invoice'][0]->vehicle_color;
$coating_studio = $info['invoice'][0]->coating_studio;

$bill_name = $info['invoice'][0]->bill_name;
$bill_address = $info['invoice'][0]->bill_address;
$bill_email = $info['invoice'][0]->bill_email;
$bill_phone = $info['invoice'][0]->bill_phone;
$created_date = $info['invoice'][0]->created_date;

$this->load->model('my_model');

$cmd = $this->my_model->sum_total_amount($invoice_number);
$grand_total = $cmd[0]->iteam_price;

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <TITLE>Detailing Street </TITLE>

    <meta name='keywords' content='Detailing Street' />

    <meta name='description' content='Detailing Street' />

    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.6 -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/DS-NEW.png" sizes="40x40" type="image/png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/crm-style.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter

        page. However, you can choose any other skin. Make sure you

        apply the skin class to the body tag so the changes take effect.

  -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/skin-blue.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">

    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 2.2.3 -->

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">


    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script><!-- Bootstrap 3.3.6 -->

    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script><!-- AdminLTE App -->

    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/lib/ckeditor/ckeditor.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>



    <link href="<?php echo base_url(); ?>assets/datetimepicker/jquery.datetimepicker.css" type="text/css"
        rel="stylesheet" media="screen" />

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/datetimepicker/jquery.datetimepicker.js">
    </script>

    <script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->



    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->

    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />



    <!-- Bootstrap Date-Picker Plugin -->

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />



    <script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
    </script>

    <style type="text/css">
    .new_b_list p {
        border-bottom: 1px solid #f4f4f4;
        margin: 2px 0;
        padding: 2px 5px;
    }

    .slimScrollDiv {
        height: auto !important;
    }

    .skin-blue .main-header .logo {

        background-color: #333;

    }

    .skin-blue .main-header .logo:hover {

        background-color: #333;

    }

    .skin-blue .wrapper,
    .skin-blue .main-sidebar,
    .skin-blue .left-side {
        background-color: #c52d2d !important;
    }

    .skin-blue .sidebar-menu>li>a {
        border-left: 3px solid transparent;
    }

    .skin-blue .main-header .navbar {
        background-color: #c52d2d !important;
    }

    .skin-blue .sidebar a {
        color: #fff !important;
        font-weight: 600;
    }

    .skin-blue .main-header li.user-header {
        background-color: #c52d2d !important;
    }

    .sidebar-toggle:hover {
        background-color: #333 !important;
    }

    .box.box-primary {
        border-top-color: #333;
    }

    .btn-primary {
        background-color: #000 !important;
        border-color: #000 !important;
    }

    .btn-primary:hover {
        background-color: #c52d2d !important;
        border-color: #c52d2d !important;
    }

    .content-wrapper,
    .right-side {
        min-height: 100%;
        background-color: #ffffff !important;
        z-index: 800;
    }

    /*.box {
    position: relative;
    border-radius: 3px;
    background: #000000b8 !important;
    }*/
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

    <style>
    .jconfirm.jconfirm-my-theme .jconfirm-bg {}

    .jconfirm.jconfirm-my-theme .jconfirm-box {}

    .jconfirm.jconfirm-my-theme .jconfirm-box.loading {}

    .jconfirm.jconfirm-my-theme .jconfirm-box.loading:before {}

    .jconfirm.jconfirm-my-theme .jconfirm-box.loading:after {}

    .jconfirm.jconfirm-my-theme .jconfirm-box .jconfirm-closeIcon {}

    .jconfirm.jconfirm-my-theme .jconfirm-box .jconfirm-title-c {}

    .jconfirm.jconfirm-my-theme .jconfirm-box .jconfirm-content-pane {}

    .jconfirm.jconfirm-my-theme .jconfirm-box .jconfirm-content {}

    .jconfirm.jconfirm-my-theme .jconfirm-box .jconfirm-buttons {}

    .jconfirm.jconfirm-my-theme .jconfirm-box .jconfirm-buttons button {}
    </style>
</head>



<body class="hold-transition skin-blue sidebar-mini">


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

    <div class="" style="min-height: 542px;">
        <!-- Content Header (Page header) -->


        <!-- Main content -->



        <section class="content">

            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-primary">

                        <!-- /.box-header -->

                        <div class="box-body">


                            <hr>
                            <section class="invoice">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-xs-12" style="padding-bottom: 31px;">
                                        <h2 class="page-header">
                                            <img src="http://crm.detailingstreet.com/assets/img/logo-trans.png"
                                                style="width: 200px;">
                                            <small class="pull-right"
                                                style="text-align: right;line-height: 16px;margin-top: 0px;"><strong>Radiant
                                                    Detailers</strong> <br>
                                                C-58, Mansarover Garden <br>
                                                Near Axis Bank, Delhi-110015 <br>
                                                Phone : 7838-509-509 <br>
                                                Email : care@detailingstreet.com <br>
                                            </small>
                                        </h2>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <form id="form_owner_info">
                                        <div class="col-sm-4 invoice-col">
                                            To
                                            <address>
                                                <strong id="pd_name"><input type="text" readonly="true"
                                                        name="pd_tx_name" id="pd_tx_name" style="border: #fff;"
                                                        value="<?php echo $item_name; ?>"></strong><br>
                                                <p id="pd_address">
                                                    <input type="text" readonly="true" name="pd_tx_addrs1"
                                                        id="pd_tx_addrs1" style="border: #fff;"
                                                        value="<?php echo $bill_address; ?>"><br>
                                                    <br>
                                                </p>
                                                Phone:<span id="pd_phone"> <input type="text" readonly="true"
                                                        name="pd_tx_phone" id="pd_tx_phone" style="border: #fff;"
                                                        value="<?php echo $bill_phone; ?>"> </span><br>
                                                Email: <span id="pd_email"><input type="text" readonly="true"
                                                        name="pd_tx_email" id="pd_tx_email"
                                                        style="border: #fff;width: 237px;"
                                                        value="<?php echo $bill_email; ?>"></span>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">

                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <b>Invoice : <input type="text" readonly="true" name="pd_invoice"
                                                    id="pd_invoice" style="border: #fff;width: 90px;"
                                                    value="<?php echo $item_name; ?>"></b><br>
                                            <br>
                                            <b>CUSTOMER ID:</b> <input type="text" readonly="true" name="pd_cid"
                                                id="pd_cid" style="border: #fff;width: 90px;"
                                                value="<?php echo $customer_id; ?>"> <br>
                                            <b>BOOKING ID:</b><input type="text" readonly="true" name="pd_bid"
                                                id="pd_bid" style="border: #fff;width: 90px;"
                                                value="<?php echo $booking_id; ?>"> <br>
                                            <b>Payment Date:</b><input type="text" readonly="true" name="pd_pay_date"
                                                id="pd_pay_date" style="border: #fff;width: 90px;"
                                                value="<?php echo $paydate; ?>"><br>
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 table-responsive">
                                        <form id="form_car_info">
                                            <table class="table table-striped" id="tbl_invoice">
                                                <thead>
                                                    <tr>
                                                        <th>Payment Date</th>
                                                        <th>Vehicle Type</th>
                                                        <th>Car/Bike Type</th>
                                                        <th>Registration No.</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" readonly="true" name="pd_tx_date"
                                                                id="pd_tx_date" style="border: #fff;" value="10-5-2018">
                                                        </td>
                                                        <td><input type="text" readonly="true" name="pd_tx_vehicle"
                                                                id="pd_tx_vehicle" style="border: #fff;" value="Car">
                                                        </td>
                                                        <td><input type="text" readonly="true" name="pd_tx_type"
                                                                id="pd_tx_type" style="border: #fff;" value="Luxury">
                                                        </td>
                                                        <td><input type="text" readonly="true" name="pd_tx_rno"
                                                                id="pd_tx_rno" style="border: #fff;" value="CH0012121">
                                                        </td>
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
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" readonly="true" name="pd_tx_model"
                                                                id="pd_tx_model" style="border: #fff;" value="BMW 320D">
                                                        </td>
                                                        <td><input type="text" readonly="true" name="pd_tx_paymenttype"
                                                                id="pd_tx_paymenttype" style="border: #fff;"
                                                                value="Cash"></td>
                                                        <td><input type="text" readonly="true" name="pd_tx_vcolor"
                                                                id="pd_tx_vcolor" style="border: #fff;" value="BLUE">
                                                        </td>
                                                        <td><input type="text" readonly="true" name="pd_tx_studio"
                                                                id="pd_tx_studio" style="border: #fff;" value="Delhi">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>

                                </div>
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
$count = 1;
foreach ($info['invoice'] as $data) {
    ?>
                                                <tr class="cls_tr_dy" id="1" data-id="trform-1">
                                                    <td><?php echo $count++; ?></td>

                                                    <td><input type="text" readonly="true" class="form-control cls_repl"
                                                            name="txt_booking_item1" id="txt_booking_item1"
                                                            value="<?php echo $data->item_name; ?>"
                                                            style="width: 250px;"></td>

                                                    <td><input type="text" readonly="true"
                                                            style="padding: 4px;width: 37px;text-align: center;"
                                                            class="form-control" name="txt_booking_qty1"
                                                            value="<?php echo $data->item_qty; ?>" id="txt_booking_qty1"
                                                            placeholder="Qty"></td>

                                                    <td><input type="text" readonly="true"
                                                            value="<?php echo $data->iteam_net_price; ?>"
                                                            class="form-control cls_rate" name="txt_booking_rate1"
                                                            id="txt_booking_rate1" placeholder="Rate"></td>

                                                    <td><input type="text" readonly="true"
                                                            value="<?php echo $data->iteam_discount; ?>"
                                                            style="padding: 4px;width: 37px;text-align: center;"
                                                            class="form-control cls_tax" name="txt_booking_tax1"
                                                            id="txt_booking_tax1" placeholder="%"></td>

                                                    <td><input type="text" readonly="true"
                                                            value="<?php echo $data->item_warranty; ?>"
                                                            style="padding: 4px;width: 37px;text-align: center;"
                                                            class="form-control" name="txt_warranty_year1"
                                                            id="txt_warranty_year1" placeholder="0"></td>

                                                    <td><input type="text" readonly="true"
                                                            value="<?php echo $data->iteam_price; ?>"
                                                            class="form-control cls_total" name="txt_booking_amount1"
                                                            id="txt_booking_amount1" style="padding: 4px;"
                                                            placeholder="Amount"></td>
                                                    <td style="cursor:pointer;"> </td>
                                                </tr>
                                                <?php }?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <p class="lead">Notice : </p>
                                        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                            All rates are inclusive of taxes.
                                            T&C Apply**
                                            Thank You for visiting our coating studio.
                                        </p>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="lead">Total Amount</p>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th style="font-size: 20px;">Grand Total:</th>
                                                        <td><i class="fa fa-rupee"></i> <span
                                                                style="font-size: 20px;"><input type="text"
                                                                    readonly="true" name="pd_tx_amount"
                                                                    id="pd_tx_amount" style="border: #fff;"
                                                                    value="<?php echo $grand_total; ?>"></span> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-print">
                                    <div class="col-xs-12">
                                        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i
                                                class="fa fa-print"></i> Print</a>
                                    </div>
                                </div>
                            </section>

                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
    <?php include 'footer.php';?>