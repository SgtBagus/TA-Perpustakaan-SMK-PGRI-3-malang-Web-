<?php $page="RIWAYAT" ?>
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
            <h3 class="m-t-0 m-b-5">RIWAYAT</h3>
          </div>
          <div class="panel-body">
<?php
  $query = "SELECT * FROM riwayat_kegiatan WHERE id_user = '$id_login' ORDER BY id_riwayat_Kegiatan DESC ";
  $result = mysqli_query($con, $query);
  while($data = mysqli_fetch_assoc($result)){
      echo '<div class="col-sm-6 col-md-12">';
      if($data['status_riwayat'] == 'primary'){
          echo'<div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Kegiatan Utama</h3>
          </div>
          <div class="panel-body">
            <h4><p>'.$data['riwayat_kegiatan'].'</p></h4>
            <div align="right">
                <b>'.tanggal_indo(''.$data['tgl_riwayat_kegiatan'].'').'</b>
            </div>
          </div>
        </div>';
      }
    else if ($data['status_riwayat'] == 'warning'){
        echo'<div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Kegiatan Hati-hati</h3>
        </div>
        <div class="panel-body">
            <h4><p>'.$data['riwayat_kegiatan'].'</p></h4>
            <div align="right">
                <b>'.tanggal_indo(''.$data['tgl_riwayat_kegiatan'].'').'</b>
            </div>
        </div>
      </div>';
    }
    else if ($data['status_riwayat'] == 'danger'){
        echo '<div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">Kegiatan Berbahaya</h3>
        </div>
        <div class="panel-body">
            <h4><p>'.$data['riwayat_kegiatan'].'</p></h4>
            <div align="right">
                <b>'.tanggal_indo(''.$data['tgl_riwayat_kegiatan'].'').'</b>
            </div>
        </div>
      </div>';
    }
    echo'</div>';
    }
  ?>
          </div>
      </div>
    </div>
    <?php include('menu/footer.php') ?>
  </div>
  </body>
      <?php include('script/footer_script.php') ?>
</html>
