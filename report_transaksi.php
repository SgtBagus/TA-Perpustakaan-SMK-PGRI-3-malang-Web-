<?php $page="LAPORAN DATA TRANSAKSI"; ?>
<!DOCTYPE html>
<html lang="en">
  <?php include('script/head_script.php') ?>
  <body class="layout layout-header-fixed">
    <div class="panel panel-default panel-table">
         <?php include('menu/header_report.php');
         if (isset($_GET['awal']) && isset($_GET['akhir'])) {
            $awal       = date('Y-m-d', strtotime(($_GET['awal'])));
            $akhir      = date('Y-m-d', strtotime(($_GET['akhir'])));
            
         
            $query_transaksi = "SELECT a.*, b.* 
            FROM peminjaman AS a INNER JOIN user AS b WHERE a.id_user = b.id_user
            AND (a.tgl_peminjaman BETWEEN '$awal' AND '$akhir')" ;
            $result_transaksi = mysqli_query($con, $query_transaksi);

            $banyak_transaksi = $result_transaksi->num_rows;
        }
        ?>
        <div class="panel-body">
          <div align="center">
            <h3>Laporan Semua Buku</h3>
          </div>
          <h4>
          <table width="50%">
            <tr>
                <td width="50%">
                    Pencetak
                </td>
                <td>
                    :
                </td>
                <td>
                    <?php echo $username_login ?>
                </td>
            </tr>
            <tr>
                <td width="50%">
                    Tanggal Pencetakan 
                </td>
                <td>
                    :
                </td>
                <td>
                    <?php echo tanggal_indo(date('Y-m-d'))?>
                </td>
            </tr>
            <tr>
                <td width="50%">
                    Banyak Transaksi
                </td>
                <td>
                    :
                </td>
                <td>
                    <?php echo $banyak_transaksi ?>
                </td>
            </tr>
        </table>
        <div align="center">
            Transaksi Tersebut Terdiri Dari
        </div>
        </h4>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th colspan="3">Peminjam</th>
                    <th>Jumlah Buku</th>
                    <th>Tanggal Pinjaman</th>
                    <th></th>
                    <th>Tanggal Pengmbalian</th>
                    <th>Sisa Hari</th>
                    <th>Status</th>
                </tr>
            </thead>
              <tbody>
              <?php
  $no = 1;
  while($data = mysqli_fetch_assoc($result_transaksi)){
    $date2 = new DateTime(''.$data['tgl_pengembalian'].'');
    $tanggal = date('Y-m-d');
    $date3 = new DateTime($tanggal); 
                  echo '
                  <tr>
                    <td>'.$no.'</td>
                    <td>';
      $query_siswa = "SELECT NIS FROM SISWA WHERE NIS = '$data[id_siswa_pegawai]'";
      $result_siswa = mysqli_query($con, $query_siswa);
                    if($result_siswa->num_rows == 1){
                      $query_foto_siswa = "SELECT foto_siswa FROM siswa WHERE NIS = '$data[id_siswa_pegawai]'";
                      $result_foto_siswa = mysqli_query($con, $query_foto_siswa);
                      $data_foto_siswa = mysqli_fetch_assoc($result_foto_siswa);
                          echo '<img class="img-circle" src="img/avatars/'.$data_foto_siswa['foto_siswa'].'" alt="" width="50" height="50">';
                    }else{  
                      $query_foto_pegawai = "SELECT foto_pegawai FROM pegawai WHERE NIP = '$data[id_siswa_pegawai]'";
                      $result_foto_pegawai = mysqli_query($con, $query_foto_pegawai);
                      $data_foto_pegawai = mysqli_fetch_assoc($result_foto_pegawai);
                          echo '<img class="img-circle" src="img/avatars/'.$data_foto_pegawai['foto_pegawai'].'" alt="" width="50" height="50">';
                    }
                    echo '</td>
                    <td>'.$data['username'].'</td>
                    <td>';
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
                    <td>'.tanggal_indo(''.$data['tgl_peminjaman'].'').'</td>
                    <td><b>s/d</b></td>
                    <td>'.tanggal_indo(''.$data['tgl_pengembalian'].'').'</td>
                    <td>
                    <div align="center">';
                    $diff = $date3->diff($date2)->format("%a");
                    if($data['status_pinjaman'] == "Menunggu"){
                      if($date3 > $date2){
                        echo '<span class="label label-danger label-pill m-w-60">Kadarluasa</span>';
                      }else{
                        echo '<span class="label label-warning label-pill m-w-60">Belum Tersedia</span>';
                      }
                    } 
                    else if ($data['status_pinjaman'] == "Ditolak"){
                      echo '<span class="label label-danger label-pill m-w-60">Di Tolak</span>';
                    }
                    else if ($data['status_pinjaman'] == "Kembali"){
                      echo '<span class="label label-primary label-pill m-w-60">Kembali</span>';
                    }
                    else{ 
                      if($date3 > $date2){
                        echo '<span class="label label-danger label-pill m-w-60">Terlambat</span>';
                      }
                      else if ($date3 == $date2){
                        echo '<span class="label label-warning label-pill m-w-60">Hari Ini</span>';
                      }
                      else{
                        echo '<b>'.$diff.'</b> - Hari Lagi';
                      }
                    }
                        echo'<div>
                      </td>
                      <td>
                        <div align="center">';
                      if ($data['status_pinjaman'] == "Ditolak"){
                          echo '<span class="label label-outline-danger">'.$data['status_pinjaman'].'</span>';
                      }else if ($data['status_pinjaman'] == "Menunggu"){
                        echo '<span class="label label-outline-warning">'.$data['status_pinjaman'].'</span>';
                      }else{
                          echo '<span class="label label-outline-info">'.$data['status_pinjaman'].'</span>';
                      }
                      echo '</div>
                      </td>
                  </tr>';
                  $no++;
  }
  ?>
              </tbody>
              <tfoot>
                <tf>
                    <td colspan="10">
                        <?php include('menu/footer_report.php') ?>
                    </td>
                </tf>
              </tfoot>
            </table>
        </div>  
    </body>  
  <?php include('script/footer_script.php') ?>
</html>
