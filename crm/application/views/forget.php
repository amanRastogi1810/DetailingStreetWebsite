
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Forgot Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="http://localhost/mayank/assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/mayank/assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="http://localhost/mayank/assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="http://localhost/mayank/assets/dist/css/crm-style.css">
  <link rel="stylesheet" href="http://localhost/mayank/assets/css/style.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#">Detailing Street</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <h3 class="login-box-msg">Forgot Password</h3>
     	       <form class="form-signin" method="post" role="form" name="frmforgotPwd" id="frmforgotPwd" action="">
      <div class="form-group has-feedback">       
       <input type="text" name="membership_id" value=""  type="text" class="form-control" placeholder="Membership ID" />
        <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
                    </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" name="submit" value="Submit"  class="btn btn-primary btn-block btn-flat" />
        </div>
        <!-- /.col -->
      </div>
     </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.js" ></script> -->
<!-- jQuery 2.2.3 -->


<script src="http://localhost/mayank/assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="http://localhost/mayank/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="http://localhost/mayank/assets/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="http://localhost/mayank/assets/js/jquery.validate.min.js"></script>

<script type="text/javascript">
     $(document).ready(function() { 
        $("#frmforgotPwd").validate({
            rules: {membership_id: { required:true}},
            messages: {
              membership_id:{required:"Please enter your Membership Id."}         
            },          
            submitHandler: function(form) { //alert(data);
              //$(form).parent().addClass('busywait').append("<div class='processing'>&nbsp;</div>");   
              var userType = "forgot-password"; 
			  if( userType == 'admin' ){
			  	 userType = 'workshop/';
			  }else{
			  	userType = 'client/';
			  }
			  var params = $(form).serialize();  
              var base_url = 'http://localhost/mayank/'; 
              var url = base_url+userType+"forgot-detail";
             	//alert(url);       
              $.post(url, params, function(data) {
			  	//var obj = $.parseJSON(data);
				//alert(data); 
				//alert(data.msg); 
				if(!$(form).parent().find(".msgblock").length) { $(form).parent().prepend("<div class=\"msgblock col-md-12\">&nbsp;</div>"); }  
                $(form).parent().find('.processing').remove();    
                if((data.frm_check=='error')) {          
                  var msg = (typeof data.errors != 'undefined')?data.errors:data.msg; 
                  $(form).parent().find(".msgblock").html("<div class='alert alert-error'>" +msg+ "</div>");                         
                } else { 
                  $(form).parent().find(".msgblock").html("<div class='alert alert-success'><strong>" + data.msg + "<strong></div>");  
                  $("input[name='membership_id']").val('');                  
                } 
				  
              },"json");     
              return false;    
            }
          });
      });
</script>
</body>
</html>
