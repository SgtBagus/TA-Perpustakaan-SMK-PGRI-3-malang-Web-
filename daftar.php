<!DOCTYPE html>
<?php $page = "DAFTAR" ?>
<html lang="en">
  <?php include('script/head_script.php') ?>
  <link rel="stylesheet" href="assets/css/login.css">
  <body class="authentication-body bg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="authentication-content m-b-30 form-login">
            <div align="center">
              <img src="img/icon.png" alt="" height="125">
            </div>
            <h3 class="m-t-0 m-b-30 text-center">Katalog Perpustakaan</h3>
            <h4 class="m-t-0 m-b-30 text-center"> -- DAFTAR AKUN -- </h4>
            <form form id="inputmasks" method="post" action="system/proses_daftar.php" method="POST">
              <div class="form-group">
                <label for="form-control-1">No Induk</label>
                <input id="form-control-3" class="form-control" 
                type="text" data-inputmask="'alias': '99999/9999.999'" 
                placeholder="No Induk" name="noinduk" required>
              </div>
              <div class="form-group">
                <label for="form-control-1">Username</label>
                <input type="username" class="form-control" name="username" placeholder="Username" required>
              </div>
              <div class="form-group">
                <label for="form-control-1">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
              </div>
              <div class="form-group">
                <label for="form-control-2">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
              </div>
              <div class="form-group">
                <label for="form-control-1">Konfirmasi Password</label>
                <input type="password" class="form-control" name="konpass" placeholder="Konfirmasi Password" required>
              </div>
              <button type="submit" class="btn btn-info btn-block" name="input">Daftar</button>
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
          if($alert == "tidak_terdaftar"){
              echo 'swal({
                title: "Mohon Maaf!",
                text: "No Induk anda tidak terdaftar",
                type: "error",
                showConfirmButton: true,
              })';
          }
          else if($alert == "duplicate"){
              echo 'swal({
                title: "Mohon Maaf!",
                text: "Email atau Username anda telah terdaftar",
                type: "error",
                showConfirmButton: true,
              })';
          }
          else if($alert == "password"){
              echo 'swal({
                title: "Mohon Maaf!",
                text: "Password dan Konfirmasi Password anda tidak sama",
                type: "error",
                showConfirmButton: true,
              })';
          }
          else if($alert == "error"){
              echo 'swal({
                title: "Mohon Maaf!",
                text: "Terjadi Kesalahan",
                type: "error",
                showConfirmButton: true,
              })';
          }
      }
  ?>
  </script>
</html>
