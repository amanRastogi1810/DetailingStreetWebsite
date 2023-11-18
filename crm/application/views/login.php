<!DOCTYPE html>

<html>



<!-- Mirrored from crm.onyxaa.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Apr 2018 16:24:35 GMT -->

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Customer | Log in</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.6 --> 

  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/AdminLTE.min.css">

  <!-- iCheck -->

  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/iCheck/square/blue.css">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

  <!--[if lt IE 9]>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->

</head>

<body class="hold-transition login-page" style="background: #ea5e5e;">

<div class="login-box">

  <div class="login-logo">

    <a href="http://detailingstreet.com"><img src="<?php echo base_url(); ?>assets/img/logo-trans.png" style="margin-left: -10px;width: 216px;" class=""  border="0" width="" alt="DS" ></a>

  </div>

  <!-- /.login-logo -->

  <div class="login-box-body">

    <p class="login-box-msg">Sign in to start your session</p>

     	 <form  class="form-signin" id="form-signin"  accept-charset="utf-8">

      <div class="form-group has-feedback">       

       <input type="text" name="membership_id" id="membership_id" value=""  type="text" class="form-control" placeholder="Membership ID" />

        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">       

      <input type="password" name="password" id="password" value=""  type="password" class="form-control" placeholder="Password" />

        <span class="glyphicon glyphicon-lock form-control-feedback">

         

        </span>

        <div class="extra_msg"></div>

      </div>

      <div class="row">

        <div class="col-xs-8">

          <div class="checkbox icheck">

                    </div>

        </div>

        <!-- /.col -->

        <div class="col-xs-4">

          <input type="button" id="btn_login" style="background-color: #000;" name="submit" value="Sign In"  class="btn btn-primary btn-block btn-flat" />

        </div>

        <!-- /.col -->

      </div>

     </form>

    

    <!-- <a href="http://localhost/mayank/crm/forget">I forgot my password</a><br> -->

    

  </div>

  <!-- /.login-box-body -->

</div>

<!-- /.login-box -->



<!-- jQuery 2.2.3 -->

<script src="<?php echo base_url(); ?>/assets/plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- Bootstrap 3.3.6 -->

<script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>

<!-- iCheck -->

<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>

<script>

  $(function () {

    $('input').iCheck({

      checkboxClass: 'icheckbox_square-blue',

      radioClass: 'iradio_square-blue',

      increaseArea: '20%' // optional

    });

  });





  $('#btn_login').click(function(e){



      e.preventDefault();

      logindata = $('#form-signin').serialize();
 
      $.ajax({
        type:'post',
        data:logindata,
        dataType:'json',
        url:'<?php echo base_url(); ?>crm/login_validation',

        success:function(htm){



             

 

            console.log(htm);

            if(htm.success == true && htm.messages == '1' ) {

                window.location.replace("<?php base_url(). 'user/'?>");



                $('.form-group').removeClass('has-error').removeClass('has-success');

            }

            else if(htm.success == true && htm.messages == '0' )

            {

              $('.extra_msg').html('<p class="text-danger">Invalid Username and Password!</p>');



              $('.extra_msg').delay(500).show(10,function(){

               



                $(this).delay(3000).hide(10,function(){

                     $(this).remove();

                });

              });

            }

            else

            {



              $.each(htm.messages,function(key,value){



                  var element = $('#'+key);

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

</script>

</body>



<!-- Mirrored from crm.onyxaa.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Apr 2018 16:24:37 GMT -->

</html>

