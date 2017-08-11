<?php $page="PEMINJAMAN" ?>
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
            <h3 class="m-t-0 m-b-5">PEMINJAMAN</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">          
<?php
  $query = "SELECT a.*, b.*, c.* FROM peminjaman AS a INNER JOIN user  
                 AS b INNER JOIN verifikasi AS c WHERE a.id_user = b.id_user 
                 AND a.id_user = c.id_user" ;
  $result = mysqli_query($con, $query);
?>
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th colspan="2">Peminjam</th>
                    <th>Tanggal Pinjaman</th>
                    <th>Tanggal Pengmbalian</th>
                    <th>Sanksi</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
  $no = 1;
  while($data = mysqli_fetch_assoc($result)){
                  echo '
                  <tr>
                    <td>'.$no.'</td>
                    <td>'.$data['username_user'].'</td>
                    <td>
                      <a href="detail_user.php?no_induk='.$data['no_induk'].'">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-eye"></i> Profil Peminjamn
                        </button>
                      </a>
                    </td>
                    <td>'.tanggal_indo(''.$data['tanggal_peminjaman'].'').'</td>
                    <td>'.tanggal_indo(''.$data['tanggal_pengembalian'].'').'</td>
                    <td></td>
                    <td>
                      <a href="detail_peminjaman.php?no_peminjaman='.$data['id_peminjaman'].'">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-eye"></i> Detail Peminjaman
                        </button>
                      </a>
                    </td>
                  </tr>';
                  $no;
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
</html>
