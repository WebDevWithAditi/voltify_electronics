<?php
session_start();
include 'includes/config.php';

if(isset($_POST['signin']))
{
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if(empty($id) || empty($password)){
        echo "<script>alert('Please fill all fields');</script>";
    } else {

        $sq = "SELECT * FROM admin WHERE username='$id' AND password='$password'";
        $csq = mysqli_query($con, $sq);

        if(mysqli_num_rows($csq) > 0){
            $_SESSION['s145'] = $id;

            header("Location: category.php");
            exit();
        } else {
            echo "<script>alert('Invalid Username or Password');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Voltify Admin Login</title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

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
    <a href="#"><b>Voltify</b> Admin</a>
  </div>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="id" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">Remember Me</label>
            </div>
          </div>

          <div class="col-4">
            <button type="submit" name="signin" class="btn btn-primary btn-block">
              Sign In
            </button>
          </div>
        </div>

      </form>

    </div>
  </div>

</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>