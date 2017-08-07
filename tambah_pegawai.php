<?php $page="PEGAWAI" ?>
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
            <h3 class="m-y-0">Tambah Pegawai</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-8">
                <form class="form-horizontal" method="post" action="system/proses_tambah_pegawai.php">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">NIP</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="number" name="nip" placeholder="NIP">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Nama Pegawai</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" name="nama_pegawai" placeholder="Subyek">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-21">Jabatan</label>
                    <div class="col-sm-9">
                      <select name="jabatan" class="form-control">
                        <option value="" selected="selected">- Jabatan -</option>
                        <option value="Guru Pengajar">Guru Pengajar</option>
                        <option value="Kesiswaan">Kesiswaan</option>
                        <option value="Pustakawan">Pustakawan</option>
                        <option value="Karyawan">Karyawan</option>
                        <option value="Administrasi">Administrasi</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-21">Perwalian Kelas</label>
                    <div class="col-sm-3">
                      <select name="kelas" class="form-control">
                        <option value="" selected="selected">- Kelas -</option>
                        <option value="X">X - Sepuluh</option>
                        <option value="XI">XI - Sebelas</option>
                        <option value="XII">XII - Dua Belas</option>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <select name="jurusan" class="form-control">
                        <option value="" selected="selected">- Jurusan -</option>
                        <option value="RPL">TI - Rekayasa Perangkat Lunak</option>
                        <option value="TKJ">TI - Teknik Komputer Jaringan</option>
                        <option value="MM">TI - Multimedia</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row gutter-xs">
                    <label class="col-md-3 control-label" for="form-control-3">Phone</label>
                    <div class="col-md-6">
                      <input id="form-control-3" class="form-control" type="text" data-inputmask="'alias': '(999) 999-9999'">
                      <p class="text-muted help-block">(___) ___-____</p>
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
