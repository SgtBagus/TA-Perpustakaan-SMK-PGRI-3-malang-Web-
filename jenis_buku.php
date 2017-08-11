<?php $page="JENIS BUKU" ?>
<!DOCTYPE html>
<html lang="en">
  <?php include('script/head_script.php') ?>
  <body class="layout layout-header-fixed layout-left-sidebar-fixed">
    <?php include('menu/header.php') ?>
    <div class="site-main">
      <?php include('menu/sidebar.php') ?>
      <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <h3 class="m-t-0 m-b-5">Jenis Buku</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-6">
                <form class="form-horizontal" method="get" action="?">
                  <div class="form-group">
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="text" name="cari" class="form-control" placeholder="Pencarian....">
                        <span class="input-group-btn">
              <?php
                if (isset($_GET['cari'])) {
                  echo '<a href="jenis_buku.php">
                    <button class="btn btn-default" type="button">
                      Reset
                    </button>
                  </a>';
                }else{
                  echo '<button class="btn btn-default" type="submit">
                    <i class="zmdi zmdi-search"></i>
                  </button>';
                }
              ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-sm-6">
                <div align="right">
                  <a href="tambah_jenis_buku.php">
                    <button type="button" class="btn btn-primary">
                      <i class="zmdi zmdi-plus-circle"></i> Tambah Jenis Buku
                    </button>
                  </a>
                </div>
              </div>
            </div>
            <br>
            <div class="table-responsive">
<?php
  if (isset($_GET['cari'])) {
    $cari = ($_GET["cari"]);
    $query_jenis_buku = "SELECT * FROM jenis_buku WHERE no_dewery like '%$cari%' OR subyek like '%$cari%'" ;
  }
  else{
    $query_jenis_buku = "SELECT * FROM jenis_buku"; 
  }

  $result_jenis_buku = mysqli_query($con, $query_jenis_buku);
?>
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th> 
                    <th>Dewery</th>
                    <th>Subyek</th>
                    <th>Dekripsi</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
<?php
  $no_jenis_buku = 1;
  while($data_jenis_buku = mysqli_fetch_assoc($result_jenis_buku)){
                  echo '<tr>
                    <td>'.$no_jenis_buku.'</td>
                    <td>'.$data_jenis_buku['no_dewery'].'</td>
                    <td>'.$data_jenis_buku['subyek'].'</td>
                    <td>
                      '.$data_jenis_buku['deskripsi_jenis_buku'].'
                    </td>
                    <td align="right">
                      <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Aksi
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li><a href="ubah_jenis_buku.php?no_dewery='.$data_jenis_buku['no_dewery'].'">Edit</a></li>
                          <li><a href="#" onclick="hapus('.$data_jenis_buku['id_jenis_buku'].')">Hapus</a></li>
                        </ul>
                      </div>
                    </td>
                  </tr>';
                  $no_jenis_buku++;
  }
?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php include('menu/footer.php') ?>
    </div>
  </body>
  <?php include('script/footer_script.php') ?>
  <script type="text/javascript">
  function hapus(id) {
    swal({
      title: 'Apakah anda yakin?',
      text: "Data buku yang memiliki jenis buku yang sama akan Terhapus",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
      }).then(function () {
          document.location="system/hapus_jenis_buku.php?id="+id;
    })
  }
  <?php
      if (isset($_GET['aksi'])) {
          $aksi = ($_GET["aksi"]);
          if($aksi == "hapus"){
              echo 'swal({
                title: "Terhapus!",
                text: "Jenis buku telah dihapus.",
                type: "success",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "tambah"){
              echo 'swal({
                title: "Tertambah!",
                text: "Jenis buku telah ditambah.",
                type: "success",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "ubah"){
              echo 'swal({
                title: "Terubah!",
                text: "Jenis buku telah diubah.",
                type: "success",
                showConfirmButton: true,
              })';
          }
      }
  ?>
  </script>
</html>
