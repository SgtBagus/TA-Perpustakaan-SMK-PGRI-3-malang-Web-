<?php $page="PEMINJAMAN" ?>
<!DOCTYPE html>
<html lang="en">
  <?php include('script/head_script.php') ?>
  <body class="layout layout-header-fixed layout-left-sidebar-fixed">
    <?php include('menu/header.php') ?>
    <div class="site-main">
      <?php include('menu/sidebar.php') ?>
      <div class="site-content">
        <div class="row">
          <div class="col-sm-12">
            <div class="widget-infoblock wi-small m-b-30" style="background-image: url(img/photos/4.jpg)">
              <div class="wi-bg">
              </div>
              <div class="wi-content-bottom p-a-30">
                <div class="wi-title m-b-30">DATA PEMINJAMAN</div>
                <div class="wi-text"><h4>KATALOG PERPUSTAKAAN SMK PGRI 3 SKARIGA</h4></div>
                <div class="wi-stat">
                  <span class="m-r-10">
                    <i class="zmdi zmdi-assignment"></i>
                      <?php
                        $banyaktransaksi= "SELECT id_user FROM peminjaman";
                        $prosestransaksi= mysqli_query($con, $banyaktransaksi);
                      ?>
                  </span>
                  Total Data : <b><?php echo mysqli_num_rows($prosestransaksi) ?>  </b>
                </div>
                <div class="wi-text">
                  <div class="row">
                    <div class="col-sm-10">
                      <form class="form-horizontal" method="GET" action="?" >
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="form-control-2">
                            Filter Peminjaman
                          </label>
                          <div class="col-sm-3">
                          <?php
                          if (isset($_GET['awal'])) {
                            $awal= ($_GET["awal"]);
                            echo '<input id="peminjaman_awal" name="awal" placeholder="Tanggal Awal" class="form-control input-pill" type="text" value="'.$awal.'">';
                          }else{
                            echo '<input id="peminjaman_awal" name="awal" placeholder="Tanggal Awal" class="form-control input-pill" type="text">';
                          }
                          ?>
                          </div>
                          <div class="col-sm-1"> 
                            sampai
                          </div>
                          <div class="col-sm-3">
                          <?php
                          if (isset($_GET['akhir'])) {
                            $akhir= ($_GET["akhir"]);
                            echo'<input id="peminjaman_akhir" name="akhir" placeholder="Tanggal Akhir" class="form-control input-pill" type="text" value="'.$akhir.'">';
                          }else{
                            echo '<input id="peminjaman_akhir" name="akhir" placeholder="Tanggal Akhir" class="form-control input-pill" type="text">';
                          }
                          ?>
                          </div>
                          <div class="col-sm-2">
                          <?php
                          if (isset($_GET['akhir']) || isset($_GET['akhir']) ) {
                            echo '<a href="peminjaman.php">
                              <button type="button" class="btn btn-primary m-w-120" data-toggle="modal">
                                <i class="zmdi zmdi-refresh-sync"></i> Reset
                              </button>
                              </a>';
                          }else{
                            echo '<button type="submit" class="btn btn-primary m-w-120" data-toggle="modal">
                              <i class="zmdi zmdi-search"></i> Cari
                            </button>';
                          }
                          ?>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="col-sm-2" align="right">
                      <button type="button" class="btn btn-primary m-w-120" data-toggle="modal" data-target="#transaksi">
                        <i class="zmdi zmdi-print"></i> Cetak Transaksi
                      </button>
                    </div>  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default panel-table">
          <div class="panel-body">
            <div class="table-responsive">           
<?php 
  if (isset($_GET['akhir']) || isset($_GET['akhir']) ) {
    $awal       = date('Y-m-d', strtotime(($_GET['awal'])));
    $akhir      = date('Y-m-d', strtotime(($_GET['akhir'])));
    $query = "SELECT a.id_peminjaman, b.username, b.id_siswa_pegawai, a.tgl_peminjaman, 
              a.tgl_pengembalian, a.tgl_kembali, a.status_pinjaman FROM peminjaman 
              AS a INNER JOIN user AS b WHERE a.id_user = b.id_user AND (a.tgl_peminjaman BETWEEN '$awal' AND '$akhir')
              ORDER BY a.id_peminjaman DESC";
  }else{
    $query = "SELECT a.id_peminjaman, b.username, b.id_siswa_pegawai, a.tgl_peminjaman, 
              a.tgl_pengembalian, a.tgl_kembali, a.status_pinjaman FROM peminjaman 
              AS a INNER JOIN user AS b WHERE a.id_user = b.id_user ORDER BY a.id_peminjaman DESC";
  }
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
                    <th>Sisa Hari</th>
                    <th>Status</th>
                    <th colspan="3">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
  $no = 1;
  if($result->num_rows == 0){
      echo '<tr>
          <td colspan="12">
              <div align="center">
                  Tidak ada Data
              </div>
          </td>
      </tr>';
  }
  else{
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
                        <td>
                          <div align="center">';
                        if ($data['status_pinjaman'] == "Ditolak"){
                          echo '<button onclick="hapus('.$data['id_peminjaman'].')" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Permintaan" class="btn btn-danger" name="input">
                            <i class="zmdi zmdi-delete"></i>
                          </button>';
                        }else if ($data['status_pinjaman'] == "Menunggu"){
                          if($date3 > $date2){
                            echo '<button onclick="hapus('.$data['id_peminjaman'].')" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Permintaan" class="btn btn-danger" name="input">
                              <i class="zmdi zmdi-delete"></i>
                            </button>';
                          }else{
                          echo '<button onclick="terima('.$data['id_peminjaman'].')" type="button" class="btn btn-primary" name="input" data-toggle="tooltip" data-placement="top" title="" data-original-title="Terima">
                            <i class="zmdi zmdi-check"></i>
                          </button>
                          <button onclick="tolak('.$data['id_peminjaman'].')" type="button" class="btn btn-danger" name="input" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tolak">
                            <i class="zmdi zmdi-close"></i>
                          </button>';
                          }
                          echo '<div class="btn-group" role="group">';
                        }else if ($data['status_pinjaman'] == "Diterima"){
                          echo '<button onclick="kembali('.$data['id_peminjaman'].')"  type="button" class="btn btn-primary" name="input" data-toggle="tooltip" data-placement="top" title="" data-original-title="Terima Pengembalian">
                            <i class="zmdi zmdi-check"></i>
                          </button>';
                          if( $date2 = $date3){
                            $query_sanksi = "SELECT id_peminjaman FROM sanksi WHERE id_peminjaman = '$data[id_peminjaman]'";
                            $result_sanksi = mysqli_query($con, $query_sanksi);
                                          if($result_sanksi->num_rows == 1){

                                          }else{  
                                            echo'
                                            <button onclick="sanksi('.$data['id_peminjaman'].')" type="button" class="btn btn-warning" name="input" data-toggle="tooltip" data-placement="top" title="" data-original-title="Masukan data Sanksi">
                                              <i class="zmdi zmdi-edit"></i>
                                            </button>';
                                          }
                          }else if ($date2 < $date3) {
                            $query_sanksi = "SELECT id_peminjaman FROM sanksi WHERE id_peminjaman = '$data[id_peminjaman]'";
                            $result_sanksi = mysqli_query($con, $query_sanksi);
                                          if($result_sanksi->num_rows == 1){

                                          }else{  
                                            echo'
                                            <button onclick="sanksi('.$data['id_peminjaman'].')" type="button" class="btn btn-warning" name="input" data-toggle="tooltip" data-placement="top" title="" data-original-title="Masukan data Sanksi">
                                              <i class="zmdi zmdi-edit"></i>
                                            </button>';
                                          }
                          }else{
                            
                          }
                        }else if ($data['status_pinjaman'] == "Kembali"){
                          $query_sanksi = "SELECT id_peminjaman FROM sanksi WHERE id_peminjaman = '$data[id_peminjaman]'";
                          $result_sanksi = mysqli_query($con, $query_sanksi);
                                        if($result_sanksi->num_rows == 1){

                                        }else{  
                                          echo'
                                          <button onclick="sanksi('.$data['id_peminjaman'].')" type="button" class="btn btn-warning" name="input" data-toggle="tooltip" data-placement="top" title="" data-original-title="Masukan data Sanksi">
                                            <i class="zmdi zmdi-edit"></i>
                                          </button>';
                                        }
                          echo '
                          <button onclick="hapus('.$data['id_peminjaman'].')" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Permintaan" class="btn btn-danger" name="input">
                            <i class="zmdi zmdi-delete"></i>
                          </button>';
                        }
                        echo '</div>
                      </td>
                      <td>
                        <a href="system/detail_refresh.php?id='.$data['id_peminjaman'].'">
                          <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail Peminjaman">
                            <i class="zmdi zmdi-eye"></i>
                          </button>
                        </a>
                      </td>
                      <td>
                        <a href="report_detail_transaksi.php?id_peminjaman='.$data['id_peminjaman'].'" target="_blank">
                          <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cetak Peminjaman">
                            <i class="zmdi zmdi-print"></i>
                          </button>
                        </a>
                      </td>
                    </tr>';
                    $no++;
    }
  }
  ?>
                </tbody>
              </table>
              <div id="transaksi" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-primary">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                          <i class="zmdi zmdi-close"></i>
                        </span>
                      </button>
                      <h4 class="modal-title">Menu Cetak Transaksi</h4>
                    </div>
                    <div class="modal-body">    
                      <form id="inputmasks" class="form-horizontal" action="?">   
                        <div class="form-group">
                          <label class="col-sm-12">
                              <div align="center">
                                  <h3>FILTER TRANSAKSI</h3>
                              </div>
                          </label>
                        </div> 
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="form-control-5">Jangka Tanggal</label>
                          <div class="col-sm-3">
                              <input id="from" class="form-control from" type="text" name="from">
                          </div>
                          <label class="col-sm-2 control-label" for="form-control-5">Sampai</label>
                          <div class="col-sm-3">
                              <input id="to" class="form-control to" type="text" name="to">
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="col-sm-3 control-label" for="form-control-5">Status</label>
                          <div class="col-sm-8">
                            <select name="status_peminjaman" class="form-control status_peminjaman" required>  
                              <option value="Semua">Semua</option>
                              <option value="Menunggu">Menunggu</option>
                              <option value="Diterima">Diterima</option>
                              <option value="Ditolak">Ditolak</option>
                              <option value="Kembali">Kembali</option>
                            </select>
                          </div>
                        </div> 
                        <div class="modal-footer text-center">
                          <div type="submit" onclick="report_transaksi()" name="input" rel="tooltip" class="btn btn-primary btn-fill">
                            <i class="zmdi zmdi-print"></i> Cetak Transaksi
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include('menu/footer.php') ?>
    </div>
  </body>
  <?php include('script/footer_script.php') ?>
  
  <script>

      function terima(id) {
        swal({
          title: 'Konfirmasi?',
          text : 'Anda yakin menerima peminjaman ini ?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya!'
          }).then(function () {
              document.location="system/peminjaman_terima.php?id="+id;
        })
      }

      function tolak(id) {
        swal({
          title: 'Konfirmasi?',
          text : 'Anda yakin menolak peminjaman ini ?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya!'
          }).then(function () {
              document.location="system/peminjaman_tolak.php?id="+id;
        })
      }

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
      
      function kembali(id) {
        swal({
          title: 'Konfirmasi?',
          text : 'Anda yakin menerika pengembalian ini ?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya!'
          }).then(function () {
              document.location="system/pengembalian.php?id="+id;
        })
      }

      function hapus(id) {
        swal({
          title: 'Konfirmasi?',
          text : 'Anda yakin menolak peminjaman ini ?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya!'
          }).then(function () {
              document.location="system/peminjaman_hapus.php?id="+id;
        })
      }


    function report_transaksi(){
      $v = "new_transaksi";
      $a = $("body").attr('class');
      new_tap('idn',$v,$a);
        function new_tap($type,$value,$attr) {
            window.open("report_transaksi.php"+"?"+"awal"+"="+$('.from').val()+"&akhir="+$('.to').val()+"&status="+$('.status_peminjaman').val(),"_blank");
        }
    } 

    
    function report_detail_transaksi(){
        $v = "new_detail_transaksi";
        $a = $("body").attr('class');
        new_tap('idn',$v,$a);
        function new_tap($type,$value,$attr) {
            window.open("report_detail_transaksi.php"+"?"+"id_peminjaman"+"="+$('.peminjaman').val(),"_blank");
        }
    } 

      </script>
</html>
