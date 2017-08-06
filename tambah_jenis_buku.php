<?php $page="JENIS BUKU" ?>
<!DOCTYPE html>
<html lang="en">
  <?php include('script/head_script.php') ?>
  <body class="layout layout-header-fixed layout-left-sidebar-fixed">
    <?php include('menu/header.php') ?>
    <div class="site-main">
      <?php include('menu/sidebar.php') ?>
      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Tambah Jenis Buku</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-8">
                <form class="form-horizontal" method="post" action="system/proses_tambah_jenis_buku.php">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Nomor Dewery</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="number" name="no_dewery" placeholder="Nomer Dewery">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Subyek</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" name="subyek" placeholder="Subyek">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Deskripsi</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" rows="3" name="deskripsi" placeholder="Deskripsi"></textarea>
                    </div>
                  </div>
                  <div align="right">
                      <a href="jenis_buku.php">
                          <button type="button" rel="tooltip" class="btn btn-info btn-fill">
                                      <i class="zmdi zmdi-arrow-left"></i> Kembali
                          </button>
                      </a>
                      <button type="submit" name="input" rel="tooltip" class="btn btn-primary btn-fill">
                              <i class="zmdi zmdi-plus-circle"></i> Tambah
                      </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include('menu/footer.php') ?>
    </div>
  </body>
  <?php include('script/footer_script.php') ?>
  <script type="text/javascript">
  <?php
      if (isset($_GET['pesan'])) {
          $pesan = ($_GET["pesan"]);
          if($pesan == "error"){
              echo 'swal({
                title: "Kesalahan!",
                text: "Jenis buku telah ada.",
                type: "error",
                showConfirmButton: true,
              })';
          }
      }
  ?>
  </script>
</html>
