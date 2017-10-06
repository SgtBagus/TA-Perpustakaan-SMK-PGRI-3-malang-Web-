<?php $page="PENGEMBALIAN" ?>
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
            <h3 class="m-t-0 m-b-5">PENGEMBALIAN</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">       
<?php
  $query = "SELECT a.id_peminjaman, b.username, b.id_siswa_pegawai, a.tgl_peminjaman, 
            a.tgl_pengembalian, a.tgl_kembali, a.total_terlambat, a.denda FROM peminjaman 
            AS a INNER JOIN user AS b WHERE a.id_user = b.id_user AND a.tgl_kembali NOT LIKE '0000-00-00'";
  $result = mysqli_query($con, $query);
?>   
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th colspan="3">Peminjam</th>
                    <th>Tanggal Pinjaman</th>
                    <th></th>
                    <th>Tanggal Pengembalian</th>
                    <th></th>
                    <th>Tanggal Kembali</th>
                    <th>Banyak Hari Terlambat</th>
                    <th>Denda</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
<?php
$no = 1;
while($data = mysqli_fetch_assoc($result)){
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
                  <td>'.tanggal_indo(''.$data['tgl_peminjaman'].'').'</td>
                  <td><b>s/d</b></td>
                  <td>'.tanggal_indo(''.$data['tgl_pengembalian'].'').'</td>
                  <td><b>-</b></td>
                  <td>'.tanggal_indo(''.$data['tgl_kembali'].'').'</td>
                  <td>
                    <div align="center">
                      <b>'.$data['total_terlambat'].'</b>
                    </div>
                  </td>
                  <td>
                    <div align="center">
                      <b>'.$data['denda'].'</b>
                    </div>
                  </td> 
                  <td>
                    <a href="detail_peminjaman.php?id_peminjaman='.$data['id_peminjaman'].'">
                      <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail Peminjaman">
                        <i class="zmdi zmdi-eye"></i>
                      </button>
                    </a>
                    <button onclick="sanksi('.$data['id_peminjaman'].')" type="button" class="btn btn-warning" name="input" data-toggle="tooltip" data-placement="top" title="" data-original-title="Masukan data Sanksi">
                      <i class="zmdi zmdi-edit"></i>
                    </button>
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
  <script>

      function sanksi(id) {
        swal({
          title: 'Konfirmasi?',
          text : 'Anda yakin menjadikanya data sanksi ini ?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya!'
          }).then(function () {
              document.location="system/sanksi.php?id="+id;
        })
      }
  </script>
</html>
