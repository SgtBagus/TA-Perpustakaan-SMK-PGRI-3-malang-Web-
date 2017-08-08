<?php $page="PEGAWAI" ?>
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
            <h3 class="m-t-0 m-b-5">PEGAWAI</h3>
          </div>
          <div class="panel-body">
            <div align="right">
              <a href="tambah_pegawai.php">
                <button type="button" class="btn btn-primary">
                  <i class="zmdi zmdi-account-add"></i> Tambah Data Pegawai
                </button>
              </a>
            </div>
            <br>
            <div class="table-responsive">
<?php
  $query_pegawai = "SELECT id_user,no_induk,nama,jabatan, tgl_entri,
                  varifikasi FROM user";
  $result_pegawai = mysqli_query($con, $query_pegawai);

?>
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
                    <th>Jabatan</th>
                    <th>Tanggal Terdaftar</th>
                    <th>Varifikasi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
<?php
  $no_pegawai = 1;
  while($data_pegawai = mysqli_fetch_assoc($result_pegawai)){
                  echo '<tr>
                    <td>'.$no_pegawai.'</td>
                    <td>'.$data_pegawai['no_induk'].'</td>
                    <td>'.$data_pegawai['nama'].'</td>
                    <td>'.$data_pegawai['jabatan'].'</td>
                    <td>'.tanggal_indo(''.$data_pegawai['tgl_entri'].'').'</td>
                    <td>'.$data_pegawai['varifikasi'].'</td>
                    <td>';
  if($id_login == $data_pegawai['id_user']){
                      echo '<a href="Profil.php">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-account"></i> Profil
                        </button>
                      </a>';
  }
  else{
                      echo '<a href="detail_pegawai.php">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-eye"></i> Detail
                        </button>
                      </a>
                      <a href="system/proses_hapus_pegawai.php">
                        <button type="button" class="btn btn-danger">
                          <i class="zmdi zmdi-delete"></i> Hapus
                        </button>
                      </a>';
  }
                    echo '</td>
                  </tr>';
                  $no_pegawai++;
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
