<?php $page="PEMINJAMAN"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('script/head_script.php'); 
        if (isset($_GET['no_peminjaman'])) { 
            $no_peminjaman = ($_GET["no_peminjaman"]);
            $query = "SELECT a.*, b.* FROM 
                            peminjaman AS a INNER JOIN user AS b
                            WHERE a.id_user = b.id_user AND a.no_peminjaman = '$no_peminjaman'"; 
            $result = mysqli_query($con, $query);
                if(!$result){
                die ("Query Error: ".mysqli_errno($con).
                    " - ".mysqli_error($con));
                }

            $data      = mysqli_fetch_assoc($result);
            $tanggal_peminjaman = $data["tanggal_peminjaman"];
            $tanggal_pengembalian = $data["tanggal_pengembalian"];
            $id_profil         = $data["id_user"];
            $no_induk          = $data["no_induk"];
            $nama_profil       = $data["nama"];
            $username_profil   = $data["username"];
            $foto_profil       = $data["foto_user"];
            $jabatan_profil    = $data["jabatan"];
            $status_pemesanan  = $data["status_pinjaman"];
            
            $date1 = new DateTime($tanggal_peminjaman);
            $date2 = new DateTime($tanggal_pengembalian);
            $diff = $date2->diff($date1)->format("%a");
        } 
    ?>
  <body class="layout layout-header-fixed layout-left-sidebar-fixed">
    <?php include('menu/header.php') ?>
    <div class="site-main">
      <?php include('menu/sidebar.php') ?>
      <div class="site-content">
        <div class="profile">
          <div class="row gutter-sm">
            <div class="col-md-4 col-sm-5">
              <div class="p-about m-b-20">
                <div class="pa-padding">
                  <div class="pa-avatar">
                    <img src="img/avatars/<?php echo $foto_profil ?>" alt="Foto Profil" width="100" height="100">
                  </div>
                  <div class="pa-name">
                  <?php
                    echo '<a href="detail_user.php?no_induk='.$no_induk.'">'
                      .$username_profil.
                    '</a>';
                  ?>
                    <div class="pa-text"><?php echo $nama_profil ?> · <?php echo $jabatan_profil ?></div>  
                    <br>
                    <div class="pa-name">Tanggal Perjanjian</div>  
                    <div class="pa-text"><?php echo tanggal_indo(''.$tanggal_peminjaman.'') ?> - <?php echo tanggal_indo(''.$tanggal_pengembalian.'') ?></div>                   </div>
                </div>
              </div>
              <?php 
              if($status_pemesanan == "Menunggu"){
                echo '<div class="p-info m-b-20">
                  <h4 class="m-y-0">Varifikasi</h4>
                  <hr>
                  <div align="center">
                    <a href="#">
                      <button type="button" class="btn btn-primary">
                        <i class="zmdi zmdi-edit"></i> Disetujui
                      </button>
                    </a>
                    <a href="#">
                      <button type="button" class="btn btn-danger">
                        <i class="zmdi zmdi-close"></i> Ditolak 
                      </button>
                    </a>
                  </div> 
                </div>';
              }else {
                echo '<div class="p-info m-b-20">
                  <h4 class="m-y-0">Sisa Hari</h4>
                  <hr>
                  <div align="center">
                    <div class="clearfix m-b-5">
                      <small class="pull-left">'.tanggal_indo(''.$tanggal_peminjaman.'').'</small>
                      <small class="pull-right">'.tanggal_indo(''.$tanggal_pengembalian.'').'</small>
                    </div>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" role="progressbar" 
                      aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                      </div>
                    </div>
                    <h2>'.$diff.' - Hari Lagi</H2>
                    <a href="#">
                      <button type="button" class="btn btn-primary">
                        <i class="zmdi zmdi-check"></i> Kembali
                      </button>
                    </a>
                    <a href="#">
                      <button type="button" class="btn btn-danger">
                        <i class="zmdi zmdi-close"></i> Tarik Kembali 
                      </button>
                    </a>
                  </div> 
                </div>';
              }
              ?>
            </div>
            <div class="col-md-8 col-sm-7">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12">
                      <ul class="nav nav-tabs nav-tabs-custom nav-justified m-b-15">
                        <li class="active">
                          <a href="#" role="tab" data-toggle="tab" >
                            <i class="zmdi zmdi-book"></i> Buku Yang Dipesan</a>
                        </li>
                      </ul>
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade  active in">
                          <div class="table-responsive">
                          <?php
            $query_buku_pemesanan = "SELECT a.no_peminjaman, b.id_detail_buku, c.kode_buku,  
                                    c.status_buku, d.judul_singkat
                                    FROM peminjaman AS a INNER JOIN detail_peminjaman AS b 
                                    INNER JOIN detail_buku AS c INNER JOIN buku AS d
                                    WHERE a.id_peminjaman = b.id_peminjaman AND b.id_detail_buku = c.id_detail_buku AND
                                    c.id_buku = d.id_buku AND a.no_peminjaman = '$no_peminjaman'";
            $result_buku_pemesanan = mysqli_query($con, $query_buku_pemesanan);
                          ?>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Buku</th>
                                        <th>Kode Buku</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                    <?php
                    $no_buku_pemesanan = 1;
                    while($data_buku_pemesanan = mysqli_fetch_assoc($result_buku_pemesanan)){
                                    echo '<tr>
                                        <td>'.$no_buku_pemesanan.'</td>
                                        <td>'.$data_buku_pemesanan['judul_singkat'].'</td>
                                        <td>'.$data_buku_pemesanan['kode_buku'].'</td>
                                        <td>'.$data_buku_pemesanan['status_buku'].'</td>
                                        <td>
                                          <a href="detail_buku.php?no_register='.$data_buku_pemesanan['id_detail_buku'].'">
                                            <i class="zmdi zmdi-eye"></i>
                                          </a>
                                        </td>
                                    </tr>';
                                    $no_buku_pemesanan++;
                                    }
                    ?>
                              </tbody>
                            </table>
                          </div>
                          <div align="right">
                            <a href="peminjaman.php">
                              <button type="button" class="btn btn-primary">
                                <i class="zmdi zmdi-arrow-left"></i> Kembali
                              </button>
                            </a>
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
      </div>
      <?php include('menu/footer.php') ?>
    </div>
  </body>
      <?php include('script/footer_script.php') ?>
</html>
