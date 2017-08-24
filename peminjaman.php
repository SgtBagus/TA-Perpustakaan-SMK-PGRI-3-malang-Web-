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
  $query = "SELECT a.*, b.* FROM peminjaman AS a INNER JOIN user  
                 AS b WHERE a.id_user = b.id_user";
  $result = mysqli_query($con, $query);
?>
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Peminjaman</th>
                    <th colspan="2">Peminjam</th>
                    <th>Tanggal Pinjaman</th>
                    <th>Tanggal Pengmbalian</th>
                    <th>Sisa Hari</th>
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
                    <td> - comming soon - </td>
                    <td>'.$data['username'].'</td>
                    <td>
                      <a href="detail_user.php?no_induk='.$data['no_induk'].'">
                        <i class="zmdi zmdi-eye"></i>
                      </a>
                    </td>
                    <td>'.tanggal_indo(''.$data['tanggal_peminjaman'].'').'</td>
                    <td>'.tanggal_indo(''.$data['tanggal_pengembalian'].'').'</td>
                    <td> - comming soon - </td>
                    <td>
                      <a href="detail_peminjaman.php?no_peminjaman='.$data['id_peminjaman'].'">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-eye"></i> Detail
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
