<?php  

require '../functions.php';

if( isset($_POST["register"]) ) {

  if( registrasi($_POST) > 0 ) {
    echo "<script>
            alert('user baru berhasil ditambahkan');
            document.location.href = 'login.php';
          </script>";
  } else {
    echo mysqli_error($conn);
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrator | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  

  <div class="card">
    <div class="card-body register-card-body">
      <div class="login-logo"><img width="185px" src="../images/icons/logodimas.png"></div>
      <p class="login-box-msg">Register a new membership</p>

      <form action="" method="post" id="registrasi">
        <div class="input-group mb-3 form-group">
          <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" id="nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-pen"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 form-group">
          <input type="email" class="form-control" placeholder="Email" name="email" id="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 form-group">
          <input type="text" class="form-control" placeholder="Username" name="username" id="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 form-group">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 form-group">
          <input type="password" class="form-control" placeholder="Retype password" name="password2" id="password2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary form-group">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required="">
              <label for="agreeTerms">
               I agree to the
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="register" class="btn btn-primary btn-block"><i class="fa fa-plus"></i>  Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>      

      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
$(function () {
  $.validator.setDefaults({
    
  });
  $('#registrasi').validate({
    rules: {
      nama: {
        required: true,                
      },
      username: {
        required: true,
        minlength: 5        
      },
      email: {
        required: true,
        email: true,        
      },
      password: {
        required: true,
        minlength: 5
      },
      password2: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },      
    },
    messages: {
      nama: {
        required: "Buat nama anda terlebih dahulu"               
      },
      username: {
        required: "Buat username terlebih dahulu"               
      },
      email: {
        required: "Masukkan email anda terlebih dahulu",
        email: "Tolong masukkan email yang benar"        
      },
      password: {
        required: "Buat password terlebih dahulu",
        minlength: "Password anda kurang dari 5 karakter"
      },
      password2: {
        required: "Tolong Masukkan pasword konfirmasi!",
        minlength: "Password anda kurang dari 5 karakter"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
