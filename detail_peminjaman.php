<?php $page="PEMINJAMAN"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('script/head_script.php'); 
        if (isset($_GET['no_peminjaman'])) { 
            $no_peminjaman = ($_GET["no_peminjaman"]);
            $query = "SELECT a.id_user, b.id_user, b.nama, b.jabatan, b.foto_user, c.id_user, c.username_user FROM 
                             peminjaman AS a INNER JOIN user AS b  INNER JOIN verifikasi AS c
                             WHERE a.id_user = b.id_user AND a.id_user = c.id_user AND a.id_peminjaman = '$no_peminjaman'";
                             
            $result = mysqli_query($con, $query);
                if(!$result){
                die ("Query Error: ".mysqli_errno($con).
                    " - ".mysqli_error($con));
                }

            $data      = mysqli_fetch_assoc($result);
            $id_profil         = $data["id_user"];
            $nama_profil       = $data["nama"];
            $username_profil   = $data["username_user"];
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
                    echo $username_profil;
                  ?>
                    <div class="pa-text"><?php echo $nama_profil ?> · <?php echo $jabatan_profil ?></div>                  </div>
                </div>
              </div>
              <div class="p-info m-b-20">
                <h4 class="m-y-0">Aksi</h4>
                <hr>
                
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
                            <i class="zmdi zmdi-book"></i> Buku Terpesan</a>
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
                                    </tr>';
                                    $no_buku_pemesanan++;
                                    }
                    ?>
                                    </tbody>
                                </table>
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
