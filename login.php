<!DOCTYPE html>
<?php $page = "LOGIN" ?>
<html lang="en">
  <?php include('script/head_script.php') ?>
  <link rel="stylesheet" href="assets/css/login.css">
  <body class="authentication-body bg">
    <div class="container-fluid">
      <div class="authentication-header m-b-30">
        <div class="clearfix">
          <div class="pull-left">
            <br/>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
          <div class="authentication-content m-b-30 form-login">
            <div align="center">
              <img src="img/logo.png" alt="" height="125">
            </div>
            <h3 class="m-t-0 m-b-30 text-center">Katalog Perpustakaan</h3>
            <form action="system/proses_login.php?op=in" method="POST">
              <div class="form-group">
                <label for="form-control-1">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="form-control-2">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-info btn-block">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
  <?php include('script/footer_script.php') ?>
  <script type="text/javascript">
  <?php
      if (isset($_GET['alert'])) {
          $alert = ($_GET["alert"]);
          if($alert == "error"){
              echo 'swal({
                title: "Mohon Maaf!",
                text: "Email Atau Password Anda Salah",
                type: "error",
                showConfirmButton: true,
              })';
          }
          else if($alert == "login"){
              echo 'swal({
                title: "Mohon Maaf!",
                text: "Login Terlebih Dahulu",
                type: "error",
                showConfirmButton: true,
              })';
          }
      }
  ?>
  </script>
</html>
