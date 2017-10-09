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
            <div class="row">
                <div align="center">
                    <h1>Terima Kasih Telah Mendaftar !</h1>
                    <h3>Silakan login akun anda di device android anda !</h3>
                    <a href="daftar.php">
                        <button type="button" class="btn btn-primary btn-lg">
                            <i class="zmdi zmdi-arrow-back"></i> Kembali Daftar
                        </button>
                    </a>    
                    <button type="button" class="btn btn-primary btn-lg">
                        <i class="zmdi zmdi-download"></i> Download Device Android
                    </button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <?php include('script/footer_script.php') ?>
</html>
