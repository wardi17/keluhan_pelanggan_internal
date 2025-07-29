
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Keluhan | Pelanggan </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url; ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url; ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<style>
 .card,div{
   border-radius:20px !important;
	 
 }
 
 .nextlogin, button{
	  border-radius:20px !important;
 }
</style>

</head>
<body class="hold-transition login-page">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="card">
		<div class="text-center mt-3" style="color:#2B3499;">
		 <h3><b><i>Keluhan&nbsp;Pelanggan</i></b></h3>
	  </div>
    <div class="card-body login-card-body">
			<div class="login-logo">
				<b>Sign in
			  </div>
      <p class="login-box-msg">using your Email account</p>

      <form action="<?= base_url; ?>/login/prosesLogin" method="post">
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="ketikkan email.." name="username">
        </div>
     
        <div class=" mb-3">
			<span toggle="#password" style="float: right;" class="fa fa-fw fa-eye field-icon toggle-password fa-4"></span>
          <input id="password" type="password" class="form-control" placeholder="ketikkan password.." name="password">
         
        </div>
		 <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block nextlogin">Next</button>
          </div>
          <!-- /.col -->
		  <div class="col-md-6 d-flex justify-content-center mt-3">
          <!-- Simple link -->
          <a href="<?=base_url;?>/login/risetpassword">Forgot password?</a>
        </div>
       <div class="col-12 mt-3 mb-3">
			<a  href="<?=base_url;?>/registasicustomer">
            <button type="button" class="btn btn-outline-primary btn-block nextlogin">Register</button></a>
          </div>
		
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
  <div class="row">
        <div class="col-sm-12">
          <?php
           // Flasher::Message();
          ?>
        </div>
      </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url; ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url; ?>/dist/js/adminlte.min.js"></script>

</body>
</html>
<script>
        
        $(document).on("click",".toggle-password",function () {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
		
		
		$(document).on("click","#resetpassword",function() {
			$("#ResetPasswordModal").modal("show");
			$(".login-box").hide();
		});
		
    </script>