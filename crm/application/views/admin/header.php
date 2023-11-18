<?php

$user = $_SESSION['username'];
$CI =& get_instance();
$CI->load->model('my_model', '', TRUE);

//$whEre = array( 'username'   => $user);

$parentHodList = $CI->my_model->get_table_by_column('admin_login','username',$user);

    
   $branch = $parentHodList[0]->branch;

if ($branch != 0) {
  $get_branch = $CI->my_model->get_table_by_column('branch','bid',$branch);
} 



?>
<!DOCTYPE html><html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <TITLE>Detailing Street </TITLE>

<meta name='keywords' content='Onyxaa' />

<meta name='description' content='Onyxaa' />

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

  <!-- REQUIRED JS SCRIPTS --><!-- jQuery 2.2.3 -->

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

 
  <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script><!-- Bootstrap 3.3.6 -->

  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script><!-- AdminLTE App -->

  <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/lib/ckeditor/ckeditor.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>



  <link href="<?php echo base_url(); ?>assets/datetimepicker/jquery.datetimepicker.css" type="text/css" rel="stylesheet" media="screen"/>

  <script type="text/javascript"  src="<?php echo base_url(); ?>assets/datetimepicker/jquery.datetimepicker.js" ></script>

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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

 

<script type="text/javascript">

	var base_url='<?php echo base_url(); ?>';

</script>

<style type="text/css">

.new_b_list p{ border-bottom: 1px solid #f4f4f4; margin: 2px 0; padding: 2px 5px;}

.slimScrollDiv {height:auto !important;}

.skin-blue .main-header .logo {

    background-color: #333;

}

.skin-blue .main-header .logo:hover {

    background-color: #333;

}

.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
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

.sidebar-toggle:hover{
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
.content-wrapper, .right-side {
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

<style >
  .jconfirm.jconfirm-my-theme .jconfirm-bg{
}
.jconfirm.jconfirm-my-theme .jconfirm-box{
}
.jconfirm.jconfirm-my-theme .jconfirm-box.loading{
}
.jconfirm.jconfirm-my-theme .jconfirm-box.loading:before{
}
.jconfirm.jconfirm-my-theme .jconfirm-box.loading:after{
}
.jconfirm.jconfirm-my-theme .jconfirm-box .jconfirm-closeIcon{
}
.jconfirm.jconfirm-my-theme .jconfirm-box .jconfirm-title-c{
}
.jconfirm.jconfirm-my-theme .jconfirm-box .jconfirm-content-pane{
}
.jconfirm.jconfirm-my-theme .jconfirm-box .jconfirm-content{
}
.jconfirm.jconfirm-my-theme .jconfirm-box .jconfirm-buttons{
}
.jconfirm.jconfirm-my-theme .jconfirm-box .jconfirm-buttons button{
}
</style>
</head>



<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">



  <!-- Main Header -->

  <header class="main-header">



    <!-- Logo -->

    <a href="<?php echo base_url(); ?>user/dashboard" class="logo">

      <!-- mini logo for sidebar mini 50x50 pixels -->

      <span class="logo-mini"><img src="<?php echo base_url(); ?>assets/img/DS-NEW.png" style="margin-left: -10px;width: 68px;" class=""  border="0" width="" alt="DS" ></span>

      <!-- logo for regular state and mobile devices -->

      

      <!-- <span class="logo-lg"><b></b></span> -->

      <span class="logo-lg"><img src="<?php echo base_url(); ?>assets/img/logo-trans.png" class="" style="margin-left: -10px;width: 100px;" border="0" width="" alt="Detailing Street"></span>

    </a>



    <!-- Header Navbar -->

    <nav class="navbar navbar-static-top" role="navigation">

      <!-- Sidebar toggle button-->

      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">

        <span class="sr-only">Toggle navigation</span>

      </a>

      <!-- Navbar Right Menu -->

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">          

		             <!-- Notifications Menu -->

          <li class="dropdown messages-menu">

              
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <i class="fa fa-map-marker fx3" style="margin:0;"></i>
              <span class="hidden-xs" style="font-size: 15px;"><strong>


                <?php

                if ($branch == 0) {
                      //echo "Delhi";
                } 
                else
                {
                     echo $get_branch[0]->name.', '.$get_branch[0]->city; 
                }
                ?></strong></span>

              

            </a>

            <ul class="dropdown-menu">

              <li class="header" style="background-color: #c52d2d;width: 124%;">
              		<a href="javascript:void(0);" style="color: #fff; ">

                       <?php  if (isset($get_branch[0])) {
                          echo $get_branch[0]->address;
                       } ?>

                    </a></li>

              <li>

                            </li>

                             

            </ul>

          </li>  

          

          

          <li class="dropdown user user-menu">

            <!-- Menu Toggle Button -->

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <!-- The user image in the navbar-->

              <img src="<?php echo base_url(); ?>assets/img/user.png" class="user-image" alt="User Image">

              <!-- hidden-xs hides the username on small devices so only the image appears. -->

              <span class="hidden-xs"><?php echo $parentHodList[0]->name; ?></span>

            </a>

            <ul class="dropdown-menu">

              <!-- The user image in the menu -->

              <li class="user-header">

                <img src="<?php echo base_url(); ?>assets/img/user.png" class="img-circle" alt="User Image">

                <p><strong><?php

                if ($parentHodList[0]->branch == 0) {
                  echo "Admin";
                }
                else
                {
if (isset($get_branch[0])) {
                  if ($get_branch[0]->name == '') {
                    echo 'Delhi';
                }
                else{
                  echo $get_branch[0]->name;
                } 

              }
                }
                 


                 ?>  </strong> </p>
                <p><?php 

                if (isset($get_branch[0])) {
                echo $get_branch[0]->city; 
              }
                ?></p>

                

              </li> 

              <!-- Menu Footer-->

              <li class="user-footer">

                <!-- <div class="pull-left">

                  <a href="#" class="btn btn-default btn-flat">Profile</a>

                </div> -->

                <div class="pull-right">

                  <a href="<?php echo base_url(); ?>crm/logout" class="btn btn-default btn-flat">Sign out</a>

                </div>

              </li>

            </ul>

          </li>

                  </ul>

      </div>

    </nav>

  </header>
