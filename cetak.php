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
                <div class="wi-text"><h4>KATALOG PERPUSTAKAAN MK PGRI 3 SKARIGA</h4></div>
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
                        <div class="col-sm-6" align="middle">
                          <a href="buku.php" style="color:white;text-decoration:none">
                            <i class="zmdi zmdi-search"></i> Lihat Data Buku
                          </a>  
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary m-w-120" data-toggle="modal" data-target="#printbuku">
                              <i class="zmdi zmdi-print"></i> Cetak Data Buku
                            </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="widget-infoblock wi-small m-b-30" style="background-image: url(img/photos/4.jpg)">
                  <div class="wi-bg"></div>
                  <div class="wi-content-bottom p-a-30">
                    <div class="wi-title">Total Transaksi</div>
                    <div class="wi-stat">
                      <span class="m-r-10">
                        <i class="zmdi zmdi-assignment"></i>
                        <?php
                          $banyaktransaksi= "SELECT id_user FROM peminjaman";
                          $prosestransaksi= mysqli_query($con, $banyaktransaksi);
                        ?>
                      </span> - <?php echo mysqli_num_rows($prosestransaksi) ?> - </div>
                    <br>
                    <div class="wi-text">
                      <div class="row">
                        <div class="col-sm-6" align="middle">
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
                    <div class="wi-title">Total Peminjaman</div>
                    <div class="wi-stat">
                      <span class="m-r-10">
                        <i class="zmdi zmdi-assignment"></i>
                        <?php
                          $banyakpeminjaman= "SELECT id_peminjaman FROM peminjaman";
                          $prosesbanyakpeminjaman= mysqli_query($con, $banyakpeminjaman);
                        ?>
                      </span> - <?php echo mysqli_num_rows($prosesbanyakpeminjaman) ?> - </div>
                      <br>
                    <div class="wi-text">
                      <a href="peminjaman.php" style="color:white;text-decoration:none">
                        <i class="zmdi zmdi-search"></i> Lihat Peminjaman Disini
                      </a>
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
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Semua Buku</label>
                    <div type="button" name="input" rel="tooltip" class="btn btn-primary btn-fill" 
                    onclick="window.open('report_buku.php', '_blank');">
                        <i class="zmdi zmdi-print"></i> Cetak Semua Buku
                    </div>
                  </div>  
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-12">
                        <div align="center">
                            <h3>FILTER BUKU</h3>
                        </div>
                    </label>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Judul Buku</label>
                    <div class="col-sm-6">
                    
    <?php
        $query_judul = "SELECT * FROM buku";     
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
                    <label class="col-sm-1 control-label" for="form-control-5">Awal</label>
                    <div class="col-sm-3">
                        <input id="from" class="form-control awal" type="text" name="awal">
                    </div>
                    <label class="col-sm-2 control-label" for="form-control-5">Sampai</label>
                    <div class="col-sm-3">
                        <input id="to" class="form-control akhir" type="text" name="akhir">
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Status</label>
                    <div class="col-sm-9">
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
      <?php include('menu/footer.php') ?>
    </div>
  </body>
  <?php include('script/footer_script.php') ?>
  <script>
    function report_buku(){
        $v = "new_book_report";
        $a = $("body").attr('class');
        new_tap('idn',$v,$a);
        function new_tap($type,$value,$attr) {
            window.open("report_detail_buku.php"+"?"+"id_buku"+"="+$('.judul').val()+"&status_buku="+$('.status_buku').val(),"_blank");
        }
    } 
    
    function report_transaksi(){
        $v = "new_book_transaksi";
        $a = $("body").attr('class');
        new_tap('idn',$v,$a);
        function new_tap($type,$value,$attr) {
            window.open("report_transaksi.php"+"?"+"awal"+"="+$('.awal').val()+"&akhir="+$('.akhir').val()+"&status="+$('.status_peminjaman').val(),"_blank");
        }
    } 
  </script>
</html>
