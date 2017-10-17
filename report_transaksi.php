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
            $status = ($_GET['status']);

            if($status == "Menunggu"){
                   $query_transaksi = "SELECT a.*, b.* 
                   FROM peminjaman AS a INNER JOIN user AS b WHERE a.id_user = b.id_user
                   AND (a.tgl_peminjaman BETWEEN '$awal' AND '$akhir') AND status_pinjaman = 'Menunggu'" ;
            }
            else if ($status == "Diterima"){
                $query_transaksi = "SELECT a.*, b.* 
                FROM peminjaman AS a INNER JOIN user AS b WHERE a.id_user = b.id_user
                AND (a.tgl_peminjaman BETWEEN '$awal' AND '$akhir') AND status_pinjaman = 'Diterima'" ;
            }else if ($status == "Ditolak"){
                $query_transaksi = "SELECT a.*, b.* 
                FROM peminjaman AS a INNER JOIN user AS b WHERE a.id_user = b.id_user
                AND (a.tgl_peminjaman BETWEEN '$awal' AND '$akhir') AND status_pinjaman = 'Ditolak'" ;
            }else if ($status == "Kembali"){
                $query_transaksi = "SELECT a.*, b.* 
                FROM peminjaman AS a INNER JOIN user AS b WHERE a.id_user = b.id_user
                AND (a.tgl_peminjaman BETWEEN '$awal' AND '$akhir') AND status_pinjaman = 'Kembali'" ;
            }else if  ($status == "Semua"){
                $query_transaksi = "SELECT a.*, b.* 
                FROM peminjaman AS a INNER JOIN user AS b WHERE a.id_user = b.id_user
                AND (a.tgl_peminjaman BETWEEN '$awal' AND '$akhir')" ;
            }
            
            $result_transaksi = mysqli_query($con, $query_transaksi);

            $banyak_transaksi = $result_transaksi->num_rows;
        }
        ?>
        <div class="panel-body">
          <div align="center">
            <h3>Laporan Data Transaksi</h3>
          </div>
          <h4>
          <table width="50%">
            <tr>
                <td width="30%">
                    Tanggal
                </td>
                <td>
                    :
                </td>
                <td>
                    <?php echo tanggal_indo(date($awal)) ?> - <?php echo tanggal_indo(date($akhir)) ?>
                </td>
            </tr>
            <tr>
                <td width="30%">
                    Status Peminjaman 
                </td>
                <td>
                    :
                </td>
                <td>
                    <?php echo $status ?>
                </td>
            </tr>
            <tr>
                <td width="30%">
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
                    <th colspan="2">Peminjam</th>
                    <th>Jml Buku</th>
                    <th>Tgl Pinjaman</th>
                    <th></th>
                    <th>Tgl Pengmbalian</th>
                    <th>Sisa Hari</th>
                    <th>Status</th>
                </tr>
            </thead>
              <tbody>
              <?php
  $no = 1;
    if($result_transaksi->num_rows == 0){
        echo '<tr>
            <td colspan="9">
                <div align="center">
                    Tidak ada Data
                </div>
            </td>
        </tr>';
    }
else{
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
                        echo 'Kadarluasa';
                      }else{
                        echo 'Belum Tersedia';
                      }
                    } 
                    else if ($data['status_pinjaman'] == "Ditolak"){
                      echo 'Di Tolak';
                    }
                    else if ($data['status_pinjaman'] == "Kembali"){
                      echo 'Kembali';
                    }
                    else{ 
                      if($date3 > $date2){
                        echo 'Terlambat';
                      }
                      else if ($date3 == $date2){
                        echo 'Hari Ini';
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
                          echo $data['status_pinjaman'];
                      }else if ($data['status_pinjaman'] == "Menunggu"){
                        echo $data['status_pinjaman'];
                      }else{
                          echo $data['status_pinjaman'];
                      }
                      echo '</div>
                      </td>
                  </tr>';
                  $no++;
  }
}
  ?>
                <tr>
                    <td colspan="7">
                    </td>
                    <td colspan="2">
                        <?php include('menu/petanda_tangan_report.php') ?>
                    </td>
                </tr>
              </tbody>
              <tfoot>
                <tf>
                    <td colspan="9">
                        <?php include('menu/footer_report.php') ?>
                    </td>
                </tf>
              </tfoot>
            </table>
        </div>  
    </body>  
  <?php include('script/footer_script.php') ?>
</html>
