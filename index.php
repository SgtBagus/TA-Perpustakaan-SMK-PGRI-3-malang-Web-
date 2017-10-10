<?php $page="DASHBOARD"; ?>
<!DOCTYPE html>
<html lang="en">
  <?php include('script/head_script.php') ?>
  <body class="layout layout-header-fixed layout-left-sidebar-fixed">
    <?php include('menu/header.php') ?>
    <div class="site-main">
      <?php include('menu/sidebar.php') ?>
      <div class="site-content">
        <div class="row">
          <div class="col-sm-6">
            <div class="widget-infoblock wi-large m-b-30" style="background-image: url(img/photos/1.jpg)">
              <div class="wi-bg">
              </div>
              <div class="wi-content-bottom p-a-30">
                <div class="wi-title m-b-30">KATALOG PERPUSTAKAAN</div>
                <div class="wi-text"><h4>SMK PGRI 3 - SKARIGA</h4></div>
                <div class="wi-text">Solusi analisis katalog yang hebat untuk perpustakaan dengan mudah. Dapatkan hasil data yang lebih spesifikasi.</div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-6">
                <div class="widget-infoblock wi-small m-b-30" style="background-image: url(img/photos/2.jpg)">
                  <div class="wi-bg"></div>
                  <div class="wi-content-bottom p-a-30">
                    <div class="wi-title">Total User</div>
                    <div class="wi-stat">
                      <span class="m-r-10">
                        <i class="zmdi zmdi-account"></i>
                        <?php
                          $banyakuser= "SELECT id_user FROM user";
                          $prosesbanyakuser= mysqli_query($con, $banyakuser);
                        ?>
                      </span> - <?php echo mysqli_num_rows($prosesbanyakuser) ?> - </div>
                    <br>
                    <div class="wi-text">
                      <a href="user.php" style="color:white">
                        <i class="zmdi zmdi-search"></i> Lihat Data User Disini
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="widget-infoblock wi-small m-b-30" style="background-image: url(img/photos/3.jpg)">
                  <div class="wi-bg"></div>
                  <div class="wi-content-bottom p-a-30">
                    <div class="wi-title">Total Buku</div>
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
                      <a href="buku.php" style="color:white">
                        <i class="zmdi zmdi-search"></i> Lihat Data Buku Disini
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="widget-infoblock wi-small m-b-30" style="background-image: url(img/photos/4.jpg)">
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
                      <a href="peminjaman.php" style="color:white">
                        <i class="zmdi zmdi-search"></i> Lihat Peminjaman Disini
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="widget-infoblock wi-small m-b-30" style="background-image: url(img/photos/5.jpg)">
                  <div class="wi-bg"></div>
                  <div class="wi-content-bottom p-a-30">
                    <div class="wi-title">Total Data Sanksi</div>
                    <div class="wi-stat">
                      <span class="m-r-10">
                        <i class="zmdi zmdi-info"></i>
                      </span> - SOON - </div>
                      <br>
                    <div class="wi-text">
                      <a href="sanksi.php" style="color:white">
                        <i class="zmdi zmdi-search"></i> Lihat Data Sanksi Disini
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <h3 class="panel-title">Conversions map</h3>
            <div class="panel-subtitle">1 Feb 2017 - 17 Jul 2017</div>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-8">

                  ISI NYA LIST DARI BUKU BUKU NYA SEBAGIAN 
                  
              </div>
              <div class="col-sm-4">
                <div class="switches-stacked m-b-30">
                  <h3 class="panel-title">Status Buku</h3>
                </div>
                <p>Siap Terpinjam
                  <span class="pull-right text-muted">80%</span>
                </p>
                <div class="progress progress-xs m-b-20">
                  <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                    <span class="sr-only">80% Complete (success)</span>
                  </div>
                </div>
                <p>Dipesan
                  <span class="pull-right text-muted">57%</span>
                </p>
                <div class="progress progress-xs m-b-20">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                    <span class="sr-only">57% Complete (success)</span>
                  </div>
                </div>
                <p>Dipinjam
                  <span class="pull-right text-muted">60%</span>
                </p>
                <div class="progress progress-xs m-b-20">
                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                    <span class="sr-only">60% Complete (success)</span>
                  </div>
                </div>
                <p>Lainya
                  <span class="pull-right text-muted">23%</span>
                </p>
                <div class="progress progress-xs m-b-20">
                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%">
                    <span class="sr-only">23% Complete (success)</span>
                  </div>
                </div>
                <a href="buku.php">
                  <button type="button" class="btn btn-primary btn-block">
                    <i class="zmdi zmdi-search"></i> Lihat Data Buku
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <h3 class="panel-title">Peminjaman</h3>
                <div class="panel-subtitle">
                  <a href="peminjaman.php">
                    <i class="zmdi zmdi-search"></i> Lihat Semua Data Peminjaman Disini
                  </a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Sanksi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>tes</td>
                      <td>tes</td>
                      <td>tes</td>
                      <td>tes</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="panel-footer">
                <div align="right">
                  <h3 class="panel-title">Menampilkan sebagian data tersebut</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
          <div class="panel panel-default panel-table">
            <div class="panel-heading">
              <h3 class="panel-title">Peminjaman</h3>
              <div class="panel-subtitle">
                <a href="peminjaman.php">
                  <i class="zmdi zmdi-search"></i> Lihat Semua Data Peminjaman Disini
                </a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Sanksi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>tes</td>
                    <td>tes</td>
                    <td>tes</td>
                    <td>tes</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="panel-footer">
              <div align="right">
                <h3 class="panel-title">Menampilkan sebagian data tersebut</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-default panel-table">
            <div class="panel-heading">
            <h3 class="panel-title">Peminjaman</h3>
              <div class="panel-subtitle">
                <a href="peminjaman.php">
                  <i class="zmdi zmdi-search"></i> Lihat Semua Data Peminjaman Disini
                </a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Sanksi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>tes</td>
                    <td>tes</td>
                    <td>tes</td>
                    <td>tes</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="panel-footer">
              <div align="right">
                <h3 class="panel-title">Menampilkan sebagian data tersebut</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include('menu/footer.php') ?>
    </div>
  </body>
      <?php include('script/footer_script.php') ?>
</html>
