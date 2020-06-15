<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a class="login-title" href="#"><b>PKL Komsi</b><br>Dosen Login System</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form z>
        <div class="input-group mb-3">
          <input type="etext" id="etUsername" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="etPassword" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <a href="/login.dashboard" id="btn-login" class="btn btn-primary btn-block btn-flat">Sign In</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
 <!-- script javascript untuk fungsi login -->
<script type="text/javascript">
// $(document).on('click','#btn-login',function(event){
//   event.preventDefault();
//   $.ajax({
//   url:'http://127.0.0.1:8000/api/login',
//   type:'POST',
//   data: {
//     username :document.getElementById("etUsername").value,
//     password :document.getElementById("etPassword").value  

//    },
// });
// // .done(function(result){ //jika username&password sesuai database maka data diambil dan di masuk ke dashboard
// //   console.log(result);
// //   if(result.api_token!=null){
// //     // redirect => dashboard
// //     window.location.href='http://127.0.0.1:8000/dashboard?api_token='+result.api_token;
// //   }
// // });

// });
$(document).on('click','#btn-login',function(e){
$.ajax({
  url:'http://127.0.0.1:8000/api/login',
  type:'POST',
  data: {
    username :document.getElementById("etUsername").value,
    password :document.getElementById("etPassword").value  

   },
  });
});


</script>
</body>
</html>