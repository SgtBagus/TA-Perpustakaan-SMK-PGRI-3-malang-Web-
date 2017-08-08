<?php $page="JENIS BUKU" ?>
<!DOCTYPE html>
<html lang="en">
  <?php include('script/head_script.php') ?>
  <body class="layout layout-header-fixed layout-left-sidebar-fixed">
    <?php include('menu/header.php');

    if (isset($_GET['no_dewery'])) {
        $no_dewery = ($_GET["no_dewery"]);
        $query = "SELECT * FROM jenis_buku WHERE no_dewery ='$no_dewery'";
        $result = mysqli_query($con, $query);

        if(!$result){
        die ("Query Error: ".mysqli_errno($con).
            " - ".mysqli_error($con));
        }

        $data = mysqli_fetch_assoc($result);
        $id_jenis_buku = $data["id_jenis_buku"];
        $no_dewery = $data["no_dewery"];
        $subyek = $data["subyek"];
        $deskripsi = $data["deskripsi_jenis_buku"];
    }
    ?>

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
                <form class="form-horizontal" method="post" action="system/proses_ubah_jenis_buku.php">
                  <div class="form-group">
                    <input hidden="true" name="id" value="<?php echo $id_jenis_buku ?>">
                    <label class="col-sm-3 control-label" for="form-control-5">Subyek</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" name="subyek" placeholder="Subyek" value="<?php echo $subyek ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Deskripsi</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" rows="3" name="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi ?></textarea>
                    </div>
                  </div>
                  <div align="right">
                      <a href="jenis_buku.php">
                          <button type="button" rel="tooltip" class="btn btn-info btn-fill">
                                      <i class="zmdi zmdi-arrow-left"></i> Kembali
                          </button>
                      </a>
                      <button type="submit" name="input" rel="tooltip" class="btn btn-primary btn-fill">
                              <i class="zmdi zmdi-edit"></i> Ubah Data
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
