<?php $page="SISWA" ?>
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
            <h3 class="m-y-0">Tambah Siswa</h3>
          </div>
          <div class="panel-body"> 
            <div class="row">
              <div class="col-md-8">
                <form id="inputmasks" class="form-horizontal" method="post" action="system/proses_tambah_siswa.php">    
                  <div class="form-group">
                    <label class="col-md-3 control-label" for="form-control-3">NIS</label>
                    <div class="col-md-9">
                      <input id="form-control-3" class="form-control" type="text" 
                      data-inputmask="'alias': '99999/9999.999'" placeholder="NIS" name="nis" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Nama Siswa</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" name="nama" placeholder="Nama Siswa" required>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-21">Kelas</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" name="kelas" placeholder="Kelas" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">No Hp</label>
                    <div class="col-md-9">
                      <input id="form-control-3" class="form-control" type="text" 
                      data-inputmask="'alias': '+089999999999'" placeholder="No Hp" name="no_hp">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8" required>Alamat</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"></textarea>
                    </div>
                  </div>
                  <div align="right">
                      <a href="siswa.php">
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
                text: "Pengguna Sudah Terdaftar",
                type: "error",
                showConfirmButton: true,
              })';
          }
      }
  ?>
  </script>
</html>
