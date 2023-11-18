

<?php include('header.php'); ?>

<?php include('menu.php'); ?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

   <!-- Content Header (Page header) -->

   <section class="content-header">

      <!-- <h1>Dashboard<small>Optional description</small></h1> -->

         </section>

   <style type="text/css">

      .small-box.bg-aqua .icon {

      font-size: 85px;

      }

      .small-box.bg-aqua .icon:hover {

      font-size: 90px;

      }

   </style>

   <!-- Main content -->

   <section class="content">

      <h1 style="text-align: center;">Welcome to Detailing Street Dashboard</h1>

      <!-- Your Page Content Here -->

            <!-- Small boxes (Stat box) -->

      <div class="row" style="margin-top:50px;">
          <div class="row form-group">

         <a href="<?php echo base_url(); ?>user/new_booking"">

            <div class="col-lg-3 col-xs-6 col-lg-offset-1">

               <!-- small box -->

               <div class="small-box bg-aqua">

                  <div class="inner">

                     <h4>New Booking</h4>

                  </div>

                  <div class="icon">

                     <i class="ion ion-bag"></i>

                  </div>

                  <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>

               </div>

            </div>

         </a>

         <!-- ./col -->
         

         <a href="<?php echo base_url(); ?>user/pricing">

            <div class="col-lg-3 col-xs-6">
               <div class="small-box bg-green">
                  <div class="inner">
                     <h4>View Pricing</h4>
                  </div>
                  <div class="icon">
                     <i class="ion ion-stats-bars"></i>
                  </div>
                  <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
               </div>
            </div>
         </a>
         
         <a href="<?php echo base_url(); ?>user/query_list">
            <div class="col-lg-3 col-xs-6">
               <!-- small box -->
               <div class="small-box bg-yellow">
                  <div class="inner">
                     <h4>View Query</h4>
                  </div>
                  <div class="icon">
                     <i class="ion ion-person"></i>
                  </div>
                  <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>

               </div>
               </div>

            </div>

         </a>
         <div class="row" style="margin-top:50px;">

         <a href="<?php echo base_url(); ?>user/new_query"">

            <div class="col-lg-3 col-xs-6 col-lg-offset-1">

               <!-- small box -->

               <div class="small-box bg-red">

                  <div class="inner">

                     <h4>New Query</h4>

                  </div>

                  <div class="icon">

                     <i class="ion ion-person-add"></i>

                  </div>

                  <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>

               </div>

            </div>

         </a>

         <!-- ./col -->

      </div>

      <div class="row" style="margin-top:50px;display: none;" >

         <a href="javascript:void(0);">

            <div class="col-lg-3 col-xs-6 col-lg-offset-1">

               <!-- small box -->

               <div class="small-box bg-red">

                  <div class="inner">

                     <h4>Total Sales<br> ( Current Month Only  )</h4>

                     <span>Sales :  <b>Rs. 370300 /-</b> </span>

                  </div>

                  <div class="icon">

                     <i class="ion ion-pie-graph"></i>

                  </div>

                  <div class="small-box-footer">

                     <form method="get" name="getDetail" id="getDetail">

                        <input type="text" value="" class="form-control" id="fromDate" name="fromDate" placeholder="From Date" style="width: 35%;float: left;margin-right: 5px;margin-left: 5px;">

                        <input type="text" value="" class="form-control" id="toDate" name="toDate" placeholder="To Date" style="width: 35%;float: left;"><input value="Go" class="btn btn-primary" type="submit">

                     </form>

                  </div>

               </div>

            </div>

         </a>

         <!-- ./col -->

         <a href="#">

            <div class="col-lg-3 col-xs-6">

               <!-- small box -->

               <div class="small-box bg-light-blue">

                  <div class="inner">

                     <h4>Total Tax <br> ( Current Month Only  )</h4>
                     <span> Tax : <b>Rs. 0/-</b></span>
                  </div>
                  <div class="icon">
                     <i class="ion ion-pie-graph"></i>
                  </div>
                  <div class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></div>
               </div>
            </div>
         </a>

         <a href="<?php echo base_url(); ?>user/new_query">

            <div class="col-lg-3 col-xs-6">

               <!-- small box -->

               <div class="small-box bg-purple" style="height: 132px;">

                  <div class="inner">

                     <h4>Add Query</h4>

                  </div>

                  <div class="icon">

                     <i class="ion ion-ios-people-outline"></i>

                  </div>

                  <div class="small-box-footer" style="margin-top: 20%;">More info <i class="fa fa-arrow-circle-right"></i></div>

               </div>

            </div>

         </a>

         <!-- ./col -->

      </div>
	  </div>

         </section>

   <!-- /.content -->

</div>

<?php include('footer.php'); ?>
