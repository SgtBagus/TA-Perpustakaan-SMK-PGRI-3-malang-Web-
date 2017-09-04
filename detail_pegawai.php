<?php $page="PEGAWAI"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('script/head_script.php'); 
        if (isset($_GET['no_induk'])) { 
            $no = ($_GET["no_induk"]);
            $query = "SELECT a.*, b.* FROM pegawai AS a INNER JOIN user AS b 
                      WHERE a.NIP = '$no' AND a.NIP = b.NIP_NIS";
            $result = mysqli_query($con, $query);
                if(!$result){
                die ("Query Error: ".mysqli_errno($con).
                    " - ".mysqli_error($con));
                }

            $data        = mysqli_fetch_assoc($result);
            $id          = $data["id_pegawai"];
            $nama        = $data["nama_pegawai"];
            $foto        = $data["foto_pegawai"];
            $jabatan     = $data["jabatan_pegawai"];
            $email       = $data["email"];
            $username    = $data["username"];
            $no_hp       = $data["no_hp_pegawai"];
            $alamat      = $data["alamat_pegawai"];
            $tgl_entri   = $data["tgl_entri_pegawai"];
            $verifikasi  = $data["verifikasi"];
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
                    <img src="img/avatars/<?php echo $foto ?>" alt="Foto Profil" width="100" height="100">
                  </div>
                  <div class="pa-name">
                  <?php
                  if($verifikasi == "Belum"){
                    echo ' - Belum Terverifikasi - ';
                  }
                  else{
                    echo $username;
                  }
                  ?>
                    <div class="pa-text"><?php echo $nama ?> · <?php echo $jabatan ?></div>                  </div>
                </div>
              </div>
              <div class="p-info m-b-20">
                <h4 class="m-y-0">Info</h4>
                <hr>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-phone"></i>
                  </div>
                  <div class="pii-value"><?php echo $no_hp?></div>
                </div>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-email"></i>
                  </div>
                  <div class="pii-value">
                    <?php
                    if($verifikasi == "Belum"){
                        echo ' - Belum Terverifikasi - ';
                    }
                    else{
                        echo '<div class="pii-value">'.$email.'</div>';
                    }
                    ?>
                  </div>
                </div>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-home"></i>
                  </div>
                  <div class="pii-value"><?php echo $alamat ?></div>
                </div>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-accounts-add"></i>
                  </div>
                  <div class="pii-value"><?php echo tanggal_indo(''.$tgl_entri.'')?></div>
                </div>
                <div class="row">
                  <button type="button" class="btn btn-warning">
                    <i class="zmdi zmdi-alert-triangle"></i> Reset Verifikasi
                  </button>
                </div>
                <br>
                <div align="right">
                  <a href="pegawai.php">
                    <button type="button" class="btn btn-primary">
                      <i class="zmdi zmdi-arrow-left"></i> Kembali
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
                          <a href="#kegiatan" role="tab" data-toggle="tab" >
                            <i class="zmdi zmdi-time-restore-setting"></i> Kegiatan</a>
                        </li>
                      </ul>
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade  active in" id="kegiatan">
                            <?php
                            if($verifikasi == "Belum"){
                                echo '<p> - Belum Terverifikasi - </p>';
                            }
                            else{
                                echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia non massa a euismod. Nam bibendum mauris mollis, ultricies orci vitae, tristique est. Mauris pellentesque justo ut est fringilla imperdiet.</p>
                                <p>Cras varius vehicula lorem sollicitudin ullamcorper. Sed nec purus eget velit elementum posuere. Aliquam et orci tincidunt, vulputate tortor quis, iaculis sapien. Praesent semper dui at porta consequat. In quis turpis mollis, rutrum erat tincidunt, tincidunt ipsum. Suspendisse feugiat bibendum faucibus.</p>';                            }
                        ?>
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
