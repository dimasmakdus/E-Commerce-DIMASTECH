<?php  
session_start();
require '../functions.php';

// cek cookie
if ( isset($_COOKIE["dims"]) && isset($_COOKIE["dimk"]) ) {
    $id = $_COOKIE["dims"];
    $key = $_COOKIE["dimk"];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = '$id' ");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ( $key === hash('sha256', $row["username"]) ) {
        $_SESSION["masuk"] = true;
    }
}


if( isset($_SESSION["masuk"]) ) {
    header("Location: index.php");
    exit;
}

if( isset($_POST["masuk"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' ");

    // cek username
    if( mysqli_num_rows($result) === 1 ) {

    // cek password
      $row = mysqli_fetch_assoc($result);
      if ( password_verify($password, $row["password"]) ) { 

        // set session nya
        $_SESSION["masuk"] = true;
        setcookie('dims', $row["id"]); 

       // cek remember me
       if( isset($_POST["remember"]) ) {
          // buat cookie
          setcookie('dims', $row["id"], time()+60);
          setcookie('dimk', hash('sha256', $row["username"], time()+60));    
        }

        header("Location: index.php");
        exit;
    }
  }
  
  $error = true;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrator | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="login.php">
    </a>

  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <div class="login-logo"><img width="185px" src="../images/icons/logodimas.png"></div>
      <p class="login-box-msg">Silahkan Masukan Username & Password</p>

      <form id="quickForm" action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" id="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <?php if( isset($error) ) : ?>
            <small class="badge badge-danger"><i class="icon fas fa-exclamation-triangle"></i>
            username / password salah!
            </small>
          <?php endif; ?>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="masuk" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

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
  $('#quickForm').validate({
    rules: {
      username: {
        required: true,        
      },
      password: {
        required: true,
        minlength: 5
      },      
    },
    messages: {
      username: {
        required: "Tolong masukkan username terlebih dahulu",        
      },
      password: {
        required: "Tolong masukkan password terlebih dahulu",
        minlength: "Password anda kurang dari 5 karakter"
      },
      
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.input-group').append(error);
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
