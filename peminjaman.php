<?php $page="PEMINJAMAN" ?>
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
            <h3 class="m-t-0 m-b-5">PEMINJAMAN</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">          
<?php
  $query = "SELECT a.id_peminjaman, b.username, b.id_siswa_pegawai, a.tanggal_peminjaman, 
            a.tanggal_pengembalian, a.status_pinjaman FROM peminjaman 
            AS a INNER JOIN user AS b WHERE a.id_user = b.id_user";
  $result = mysqli_query($con, $query);
?>
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th colspan="2">Peminjam</th>
                    <th>Banyak Buku</th>
                    <th>Tanggal Pinjaman</th>
                    <th>Tanggal Pengmbalian</th>
                    <th>Sisa Hari</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
  $no = 1;
  while($data = mysqli_fetch_assoc($result)){
                  $date1 = new DateTime(''.$data['tanggal_pengembalian'].'');
                  $date2 = new DateTime(''.$data['tanggal_peminjaman'].'');
                  $diff = $date2->diff($date1)->format("%a");
                  echo '
                  <tr>
                    <td>'.$no.'</td>
                    <td>'.$data['username'].'</td>
                    <td>';
                      $query_siswa = "SELECT NIS FROM SISWA WHERE NIS = '$data[id_siswa_pegawai]'";
                      $result_siswa = mysqli_query($con, $query_siswa);
                          if($result_siswa->num_rows == 1){
                              echo '
                      <a href="detail_siswa.php?no_induk='.$data['id_siswa_pegawai'].'">
                        <i class="zmdi zmdi-eye"></i>
                      </a>';
                          }else{
                              echo '
                      <a href="detail_pegawai.php?no_induk='.$data['id_siswa_pegawai'].'">
                        <i class="zmdi zmdi-eye"></i>
                      </a>';
                          }
                    echo'</td>
                    <td>
                      <div align="center"><b>'; 

        $query_banyak = "SELECT id_detail_peminjaman
                         FROM detail_peminjaman WHERE id_peminjaman LIKE '$data[id_peminjaman]'";
        $result_banyak = mysqli_query($con, $query_banyak);
        $banyakdata_banyak = $result_banyak->num_rows;
                  echo $banyakdata_banyak ;
                      echo '</b></div>
                    </td>
                    <td>'.tanggal_indo(''.$data['tanggal_peminjaman'].'').'</td>
                    <td>'.tanggal_indo(''.$data['tanggal_pengembalian'].'').'</td>
                    <td> 
                      <div align="center">';
                    if ($data['status_pinjaman'] == "Menunggu"){
                      echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                    }else if($data['status_pinjaman'] == "Ditolak"){
                      echo '<span class="badge badge-danger">Ditolak</span>';
                    }
                    else{
                      echo '<b>'.$diff.'</b> - Hari Lagi';
                    }
                      echo '</div>
                    </td>
                    <td>
                      <div align="center">';
                    if ($data['status_pinjaman'] == "Ditolak"){
                        echo '<span class="label label-outline-warning">'.$data['status_pinjaman'].'</span>';
                    }else{
                        echo '<span class="label label-outline-info">'.$data['status_pinjaman'].'</span>';
                    }
                      echo '</div>
                    </td>
                    <td>
                      <a href="detail_peminjaman.php?id_peminjaman='.$data['id_peminjaman'].'">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-eye"></i> Detail
                        </button>
                      </a>
                    </td>
                  </tr>';
                  $no++;
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
