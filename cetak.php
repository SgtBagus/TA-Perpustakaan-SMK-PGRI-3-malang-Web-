<?php $page="CETAK"; ?>
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
            <div class="widget-infoblock wi-small m-b-30" style="background-image: url(img/photos/2.jpg)">
              <div class="wi-bg">
              </div>
              <div class="wi-content-bottom p-a-30">
                <div class="wi-title m-b-30">CETAK LAPORAN</div>
                <div class="wi-text"><h4>KATALOG PERPUSTAKAAN SMK PGRI 3 SKARIGA</h4></div>
                <div class="wi-text">Cetak Laporan Perekapan data dalam format <i>- <b> Print Screen </b> -</i> dan save file dengan format <i>- <b> PDF </b> -</i></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-4">
                <div class="widget-infoblock wi-small m-b-30" style="background-image: url(img/photos/3.jpg)">
                  <div class="wi-bg"></div>
                  <div class="wi-content-bottom p-a-30">
                    <div class="wi-title">Cetak Buku</div>
                    <div class="wi-stat">
                      <span class="m-r-10">
                        <i class="zmdi zmdi-book"></i>
                        <?php
                          $banyakbuku= "SELECT id_buku FROM buku";
                          $prosesbanyakbuku= mysqli_query($con, $banyakbuku);
                        ?>
                      </span> - <?php echo mysqli_num_rows($prosesbanyakbuku) ?> - </div>
                      <br>
                    <div class="wi-text">
                      <div class="row">
                        <div class="col-sm-6">
                          <a href="buku.php" style="color:white;text-decoration:none">
                            <i class="zmdi zmdi-search"></i> Lihat Buku
                          </a>  
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary m-w-120" data-toggle="modal" data-target="#printbuku">
                              <i class="zmdi zmdi-print"></i> Cetak Buku
                            </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="widget-infoblock wi-small m-b-30" style="background-image: url(img/photos/4.jpg)">
                  <div class="wi-bg">
                  </div>
                  <div class="wi-content-bottom p-a-30">
                    <div class="wi-title">
                        Cetak Transaksi
                    </div>
                    <div class="wi-stat">
                      <span class="m-r-10">
                        <i class="zmdi zmdi-assignment"></i>
                        <?php
                          $banyaktransaksi= "SELECT id_user FROM peminjaman";
                          $prosestransaksi= mysqli_query($con, $banyaktransaksi);
                        ?>
                      </span> - <?php echo mysqli_num_rows($prosestransaksi) ?> - 
                    </div>
                    <br>
                    <div class="wi-text">
                      <div class="row">
                        <div class="col-sm-6">
                          <a href="peminjaman.php" style="color:white;text-decoration:none">
                            <i class="zmdi zmdi-search"></i> Lihat Transaksi
                          </a>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary m-w-120" data-toggle="modal" data-target="#transaksi">
                              <i class="zmdi zmdi-print"></i> Cetak Transaksi
                            </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="widget-infoblock wi-small m-b-30" style="background-image: url(img/photos/5.jpg)">
                  <div class="wi-bg"></div>
                  <div class="wi-content-bottom p-a-30">
                    <div class="wi-title">Cetak Sanksi</div>
                    <div class="wi-stat">
                      <span class="m-r-10">
                        <i class="zmdi zmdi-info"></i>
                        <?php
                          $banyaksanksi= "SELECT id_sanksi FROM sanksi";
                          $prosessanksi= mysqli_query($con, $banyaksanksi);
                        ?>
                      </span> - <?php echo mysqli_num_rows($prosessanksi) ?> - </div>
                      <br>
                      <div class="wi-text">
                        <div class="row">
                          <div class="col-sm-6">
                            <a href="Sanksis.php" style="color:white;text-decoration:none">
                              <i class="zmdi zmdi-search"></i> Lihat Sanksi
                            </a>
                          </div>
                          <div class="col-sm-6">
                              <button type="button" class="btn btn-primary m-w-120" data-toggle="modal" data-target="#sanksi">
                                <i class="zmdi zmdi-print"></i> Cetak Sanksi
                              </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="printbuku" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                  </span>
                </button>
                <h4 class="modal-title">Menu Cetak Buku</h4>
              </div>
              <div class="modal-body">    
                <form id="inputmasks" class="form-horizontal" action="?"> 
                  <label class="col-sm-12">
                      <div align="center">
                          <h3>FILTER BUKU</h3>
                      </div>
                  </label>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Pemasukan Tanggal</label>
                    <div class="col-sm-3">
                        <input id="awal" class="form-control awal" type="text" name="awal">
                    </div>
                    <label class="col-sm-2 control-label" for="form-control-5">Sampai</label>
                    <div class="col-sm-3">
                        <input id="akhir" class="form-control akhir" type="text" name="akhir">
                    </div>
                  </div>   
                  <div class="modal-footer text-center">
                    <div type="submit" onclick="report_semua_buku()" name="input" rel="tooltip" class="btn btn-primary btn-fill">
                      <i class="zmdi zmdi-print"></i> Cetak Buku
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-12">
                        <div align="center">
                            <h3>FILTER PERBUKU</h3>
                        </div>
                    </label>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Judul Buku</label>
                    <div class="col-sm-6">
                    
    <?php
        $query_judul = "SELECT * FROM buku ORDER BY judul_buku ASC";     
        $result_judul = mysqli_query($con, $query_judul);
        if(!$result_judul){
            die ("Query Error: ".mysqli_errno($con).
            " - ".mysqli_error($con));
        }
    ?>
                      <select name="judul" class="form-control judul" required>                                                     
    <?php
        while($data_judul = mysqli_fetch_assoc($result_judul))
        {
            echo '<option value="'.$data_judul[id_buku].'" title="Judul Lengkap : '.$data_judul[judul_buku].'">'.$data_judul[judul_singkat].'</option>';
        }
    ?>
                      </select>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Status Buku</label>
                    <div class="col-sm-6">
                      <select name="status_buku" class="form-control status_buku" required>  
                        <option value="Semua">Semua</option>
                        <option value="Siap Terpinjam">Siap Terpinjam</option>
                        <option value="Dipesan">Dipesan</option>
                        <option value="Dipinjam">Dipinjam</option>
                        <option value="Lainya">Lainya</option>
                      </select>
                    </div>
                  </div> 
                  <div class="modal-footer text-center">
                    <div type="submit" onclick="report_buku()" name="input" rel="tooltip" class="btn btn-primary btn-fill">
                      <i class="zmdi zmdi-print"></i> Cetak Buku
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
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
              <hr>
              <div class="modal-body">    
                <form id="inputmasks" class="form-horizontal" action="?">   
                  <div class="form-group">
                    <label class="col-sm-12">
                        <div align="center">
                            <h3>PER-USER</h3>
                        </div>
                    </label>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-2">
                      Username
                    </label>
                    <div class="col-sm-10">
                      <input id="username" onkeyup="user()" placeholder="Username" class="form-control input-pill" type="text">
                    </div>
                  </div>
                  <div class="table-responsive">           
<?php 
  if (isset($_GET['akhir']) || isset($_GET['akhir']) ) {
    $awal       = date('Y-m-d', strtotime(($_GET['awal'])));
    $akhir      = date('Y-m-d', strtotime(($_GET['akhir'])));
    $query = "SELECT a.id_peminjaman, b.username, b.id_siswa_pegawai, a.tgl_peminjaman, 
              a.tgl_pengembalian, a.tgl_kembali, a.status_pinjaman FROM peminjaman 
              AS a INNER JOIN user AS b WHERE a.id_user = b.id_user AND (a.tgl_peminjaman BETWEEN '$awal' AND '$akhir')";
  }else{
    $query = "SELECT a.id_peminjaman, b.username, b.id_siswa_pegawai, a.tgl_peminjaman, 
              a.tgl_pengembalian, a.tgl_kembali, a.status_pinjaman FROM peminjaman 
              AS a INNER JOIN user AS b WHERE a.id_user = b.id_user";
  }
  $result = mysqli_query($con, $query);
?>
              <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th colspan="3">Peminjam</th>
                    <th>Tanggal Pinjaman</th>
                    <th></th>
                    <th>Tanggal Pengembalian</th>
                    <th>Cetak</th>
                  </tr>
                </thead>
                <tbody>
                <?php
  $no = 1;
  if($result->num_rows == 0){
      echo '<tr>
          <td colspan="8">
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
                        <button type="button" onclick="report_detail_transaksi('.$data['id_peminjaman'].')" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cetak Transaksi">
                          <i class="zmdi zmdi-print"></i>
                        </button>
                      </td>
                    </tr>';
                    $no++;
    }
  }
  ?>
                </tbody>
              </table>
              </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div id="sanksi" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                    <i class="zmdi zmdi-close"></i>
                  </span>
                </button>
                <h4 class="modal-title">Menu Cetak Sanksi</h4>
              </div>
              <div class="modal-body">    
                <form id="inputmasks" class="form-horizontal" action="?">   
                  <div class="form-group">
                    <label class="col-sm-12">
                        <div align="center">
                            <h3>SANKSI</h3>
                        </div>
                    </label>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Sanksi Oleh</label>
                    <div class="col-sm-8">
                    
    <?php
        $query = "SELECT a.id_peminjaman, a.id_sanksi, a.id_user, a.sanksi, b.username, b.id_siswa_pegawai FROM sanksi
                  AS a INNER JOIN user AS b WHERE a.id_user = b.id_user";
        $result = mysqli_query($con, $query);
        if(!$result){
            die ("Query Error: ".mysqli_errno($con).
            " - ".mysqli_error($con));
        }
    ?>
                      <select name="sanksi" class="form-control sanksi" required>                                                     
    <?php
        if($result->num_rows == 0 ){
            echo '<option> -Tidak Ada Data Sanksi- </option>';
        }
        else{
          while($data = mysqli_fetch_assoc($result))
          {
              echo '<option value="'.$data['id_peminjaman'].'" title="Sanksi : '.$data['sanksi'].'">'.$data['username'].' - ';
              
        $query_username = "SELECT NIS FROM SISWA WHERE NIS = '$data_peminjaman[id_siswa_pegawai]'";
        $result_username = mysqli_query($con, $query_username);
                      if($result_username->num_rows == 1){
                        $query_nama_siswa = "SELECT nama_siswa FROM siswa WHERE NIS = '$data[id_siswa_pegawai]'";
                        $result_nama_siswa = mysqli_query($con, $query_nama_siswa);
                        $data_nama_siswa = mysqli_fetch_assoc($result_nama_siswa);
                          echo $data_nama_siswa['nama_siswa'];
                      }else{  
                        $query_nama_pegawai = "SELECT nama_pegawai FROM pegawai WHERE NIP = '$data[id_siswa_pegawai]'";
                        $result_nama_pegawai = mysqli_query($con, $query_nama_pegawai);
                        $data_nama_pegawai = mysqli_fetch_assoc($result_nama_pegawai);
                          echo $data_nama_pegawai['nama_pegawai'];
                      }
              
              echo '</option>';
          }
        }
    ?>

                      </select>
                    </div>
                  </div> 
                  <div class="modal-footer text-center">
                    <div type="submit" onclick="report_sanksi()" name="input" rel="tooltip" class="btn btn-primary btn-fill">
                      <i class="zmdi zmdi-print"></i> Cetak Sanksi
                    </div>
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
  <script>
    
    function report_semua_buku(){
        $v = "new_all_book";
        $a = $("body").attr('class');
        new_tap('idn',$v,$a);
        function new_tap($type,$value,$attr) {
            window.open("report_buku.php"+"?"+"awal"+"="+$('.awal').val()+"&akhir="+$('.akhir').val(),"_blank");
        }
    } 

    function report_buku(){
        $v = "new_book_report";
        $a = $("body").attr('class');
        new_tap('idn',$v,$a);
        function new_tap($type,$value,$attr) {
            window.open("report_detail_buku.php"+"?"+"id_buku"+"="+$('.judul').val()+"&status_buku="+$('.status_buku').val(),"_blank");
        }
    } 
    
    function report_transaksi(){
        $v = "new_transaksi";
        $a = $("body").attr('class');
        new_tap('idn',$v,$a);
        function new_tap($type,$value,$attr) {
            window.open("report_transaksi.php"+"?"+"awal"+"="+$('.from').val()+"&akhir="+$('.to').val()+"&status="+$('.status_peminjaman').val(),"_blank");
        }
    } 

    
    function report_detail_transaksi(id){
      window.open("report_detail_transaksi.php?id_peminjaman="+id);
    } 

    function report_sanksi(){
        $v = "new_sanksi";
        $a = $("body").attr('class');
        new_tap('idn',$v,$a);
        function new_tap($type,$value,$attr) {
            window.open("report_sanksi.php"+"?"+"id_sanksi"+"="+$('.sanksi').val(),"_blank");
        }
    } 
    
    function user() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("username");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
  </script>
</html>
