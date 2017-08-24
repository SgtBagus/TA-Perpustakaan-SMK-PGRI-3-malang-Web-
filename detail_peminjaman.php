<?php $page="PEMINJAMAN"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('script/head_script.php'); 
        if (isset($_GET['no_peminjaman'])) { 
            $no_peminjaman = ($_GET["no_peminjaman"]);
            $query = "SELECT a.id_user, a.tanggal_peminjaman, a.tanggal_pengembalian, 
                            b.no_induk, b.id_user, b.nama, b.jabatan, b.foto_user, b.username FROM 
                            peminjaman AS a INNER JOIN user AS b
                            WHERE a.id_user = b.id_user AND a.id_peminjaman = '$no_peminjaman'"; 
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
              <div class="p-info m-b-20">
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
              </div>
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
            $query_buku_pemesanan = "SELECT a.*, b.*, c.* FROM detail_peminjaman AS a INNER JOIN 
                                    detail_buku AS b INNER JOIN buku AS c
                                     WHERE a.id_detail_buku = b.id_detail_buku AND b.id_buku = c.id_buku";
            $result_buku_pemesanan = mysqli_query($con, $query_buku_pemesanan);
                          ?>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Buku</th>
                                        <th>Cetakan</th>
                                        <th>Edisi</th>
                                        <th>ISBN</th>
                                        <th>Status</th>
                                        <th>Kondisi</th>
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
                                        <td>'.$data_buku_pemesanan['cetakan'].'</td>
                                        <td>'.$data_buku_pemesanan['edisi'].'</td>
                                        <td>'.$data_buku_pemesanan['ISBN'].'</td>
                                        <td>'.$data_buku_pemesanan['status_buku'].'</td>
                                        <td> -comming soon- </td>
                                        <td>
                                          <a href="detail_buku.php?no_register='.$data_buku_pemesanan['no_register'].'">
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
