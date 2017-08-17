<!DOCTYPE html>
<?php $page = "404" ?>
<html lang="en">
  <?php include('script/head_script.php') ?>
  <body class="error-body">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="error">
            <div class="e-icon text-warning">
              <i class="zmdi zmdi-alert-circle-o"></i>
            </div>
            <h1>404</h1>
            <h2>Halaman Tidak Di Temukan</h2>
            <div class="e-text">Maaf, Sepertinya halaman yang akan anda akses tidak ada.</div>
            <button type="button"  onclick="window.history.go(-1); return false;" class="btn btn-warning btn-lg">Kembali</button>
          </div>
        </div>
      </div>
    </div>
  <?php include('script/footer_script.php') ?>
  </body>
</html>
