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
            <h3 class="m-t-0 m-b-5">Tabel Data Jenis Buku</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-12">
                <div align="right">
                  <a href="tambah_jenis_buku.php">
                    <button type="button" class="btn btn-primary">
                      <i class="zmdi zmdi-plus-circle"></i> Tambah Data Jenis Buku
                    </button>
                  </a>
                </div>
              </div>
            </div>
            <br>
            <div class="table-responsive">
<?php
  $query_jenis_buku = "SELECT * FROM jenis_buku" ;
  $result_jenis_buku = mysqli_query($con, $query_jenis_buku);
?>
              <table class="table table-striped table-bordered dataTable" id="dataTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Dewery</th>
                    <th>Subyek</th>
                    <th width="500px">Dekripsi</th>
                    <th>Aksi</th>
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
                      <a href="ubah_jenis_buku.php?no_dewery='.$data_jenis_buku['no_dewery'].'">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-edit"></i> Edit
                        </button>
                      </a>
                        <button onclick="hapus('.$data_jenis_buku['id_jenis_buku'].')" type="button" class="btn btn-danger">
                          <i class="zmdi zmdi-delete"></i> Hapus
                        </button>
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
