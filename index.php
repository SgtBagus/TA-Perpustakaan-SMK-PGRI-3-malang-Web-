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
          <div class="panel-body"  style="background-color: #f5f5f5">
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
                  <a href="peminjaman.php" style="text-decoration:none">
                    <i class="zmdi zmdi-search"></i> Lihat Semua Data Peminjaman Disini
                  </a>
                </div>
              </div>
              <div class="table-responsive">
<?php
  $query_peminjaman = "SELECT a.id_peminjaman, b.username, b.id_siswa_pegawai, a.status_pinjaman FROM peminjaman 
                       AS a INNER JOIN user AS b WHERE a.id_user = b.id_user LIMIT 5";
  $result_peminjaman = mysqli_query($con, $query_peminjaman);
?>
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th colspan="2">Peminjam</th>
                      <th>Status</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tbody>
  <?php
  $no_peminjaman = 1;
  while($data_peminjaman = mysqli_fetch_assoc($result_peminjaman)){
                    echo '<tr>
                      <td>'.$no_peminjaman.'</td>
                      <td>';

      $query_siswa = "SELECT NIS FROM SISWA WHERE NIS = '$data_peminjaman[id_siswa_pegawai]'";
      $result_siswa = mysqli_query($con, $query_siswa);
                    if($result_siswa->num_rows == 1){
                      $query_foto_siswa = "SELECT foto_siswa FROM siswa WHERE NIS = '$data_peminjaman[id_siswa_pegawai]'";
                      $result_foto_siswa = mysqli_query($con, $query_foto_siswa);
                      $data_foto_siswa = mysqli_fetch_assoc($result_foto_siswa);
                          echo '<img class="img-circle" src="img/avatars/'.$data_foto_siswa['foto_siswa'].'" alt="" width="50" height="50">';
                    }else{  
                      $query_foto_pegawai = "SELECT foto_pegawai FROM pegawai WHERE NIP = '$data_peminjaman[id_siswa_pegawai]'";
                      $result_foto_pegawai = mysqli_query($con, $query_foto_pegawai);
                      $data_foto_pegawai = mysqli_fetch_assoc($result_foto_pegawai);
                          echo '<img class="img-circle" src="img/avatars/'.$data_foto_pegawai['foto_pegawai'].'" alt="" width="50" height="50">';
                    }
                    
                      echo'</td>
                      <td>tes</td>
                      <td>tes</td>
                      <td>tes</td>
                    </tr>';
                    $no_peminjaman++ ;
  }
  ?>
                  </tbody>
                </table>
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
