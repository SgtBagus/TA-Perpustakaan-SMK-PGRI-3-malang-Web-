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
                      <a href="user.php" style="color:white;text-decoration:none">
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
                      <a href="buku.php" style="color:white;text-decoration:none">
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
                      <a href="peminjaman.php" style="color:white;text-decoration:none">
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
                        <?php
                          $banyaksanksi= "SELECT id_sanksi FROM sanksi";
                          $prosesbanyaksanksi= mysqli_query($con, $banyaksanksi);
                        ?>
                      </span> - <?php echo mysqli_num_rows($prosesbanyaksanksi) ?> - </div>
                      <br>
                    <div class="wi-text">
                      <a href="sanksi.php" style="color:white;text-decoration:none">
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
            <h3 class="panel-title">Data Sebagian Buku Baru</h3>
            <div class="panel-subtitle">
              <a href="sanksi.php" style="color:black;text-decoration:none">
                <i class="zmdi zmdi-search"></i> Klik disini untuk melihat data buku lainya
              </a>
            </div>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-12">
<?php
  $buku = "SELECT * FROM buku ORDER BY id_buku DESC LIMIT 6";
  $resultbuku = mysqli_query($con, $buku);
                echo '<table class="table">
                  <thead>
                    <tr>';
                    
  while($data_buku = mysqli_fetch_assoc($resultbuku)){
                      echo'<td>
                        <div align="center">
                          <a href="detail_buku.php?ISBN='.$data_buku['ISBN'].'" style="color:black;text-decoration:none">
                            <img class="img-rounded" src="img/book/'.$data_buku['gambar_buku'].'" alt="" width="120" height="200">
                            <br><b>'.$data_buku['judul_singkat'].'</b><br>';
                            $query_banyak = "SELECT id_detail_buku
                                             FROM detail_buku WHERE id_buku LIKE '$data_buku[id_buku]'";
                            $result_banyak = mysqli_query($con, $query_banyak);
                            $banyakdata_banyak = $result_banyak->num_rows;

                            echo 'Total Buku : <b>'.$banyakdata_banyak.'</b>
                          </a>
                        </div>
                      </td>';                   
  }
                    echo '</tr>
                  </thead>
                </table>';
?>
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
