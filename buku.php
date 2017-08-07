<?php $page="BUKU" ?>
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
            <h3 class="m-t-0 m-b-5">BUKU</h3>
          </div>
          <div class="panel-body">
            <div align="right">
              <a href="tambah_siswa.php">
                <button type="button" class="btn btn-primary">
                  <i class="zmdi zmdi-account-add"></i> Tambah Data Buku
                </button>
              </a>
            </div>
            <br>
            <div class="table-responsive">
<?php
  $query_buku = "SELECT a.id_buku, a.judul_buku, a.id_jenis_buku, b.subyek, a.jenis_media,
                  a.bahasa FROM buku AS a INNER JOIN jenis_buku AS b WHERE a.id_jenis_buku = b.id_jenis_buku" ;

  $result_buku = mysqli_query($con, $query_buku);
?>
              <table class="table table-striped table-bordered dataTable" id="dataTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul buku</th>
                    <th>Jenis Buku</th>
                    <th>Media</th>
                    <th>Bahasa</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
<?php
  $no_buku = 1;
  while($data_buku = mysqli_fetch_assoc($result_buku)){
                  echo '<tr>
                    <td>'.$no_buku.'</td>
                    <td>'.$data_buku['judul_buku'].'</td>
                    <td>'.$data_buku['subyek'].'</td>
                    <td>'.$data_buku['jenis_media'].'</td>
                    <td>'.$data_buku['bahasa'].'</td>
                    <td align="right">
                      <a href="detail_buku.php">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-eye"></i> Detail
                        </button>
                      </a>
                      <a href="ubah_buku.php">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-edit"></i> Ubah
                        </button>
                      </a>
                      <a href="proses/hapus_siswa.php">
                        <button type="button" class="btn btn-danger">
                          <i class="zmdi zmdi-delete"></i> Hapus
                        </button>
                      </a>
                    </td>
                  </tr>';
                  $no_buku++;
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
</html>
