<?php $page="PEGAWAI"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('script/head_script.php'); 
        if (isset($_GET['NIP'])) { 
            $NIP = ($_GET["NIP"]);
            $query_pegawai = "SELECT * FROM user WHERE no_induk = '$NIP'";
            $result_pegawai = mysqli_query($con, $query_pegawai);
                if(!$result_pegawai){
                die ("Query Error: ".mysqli_errno($con).
                    " - ".mysqli_error($con));
                }

            $data_pegawai       = mysqli_fetch_assoc($result_pegawai);
            $id_pegawai         = $data_pegawai["id_user"];
            $nama_pegawai       = $data_pegawai["nama"];
            $foto_pegawai       = $data_pegawai["foto_user"];
            $jabatan_pegawai    = $data_pegawai["jabatan"];
            $no_hp_pegawai      = $data_pegawai["no_hp"];
            $alamat_pegawai     = $data_pegawai["alamat"];
            $tgl_entri_pegawai  = $data_pegawai["tgl_entri"];
            $varifikasi_pegawai = $data_pegawai["varifikasi"];
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
                    <img src="img/avatars/<?php echo $foto_pegawai ?>" alt="Foto Profil" width="100" height="100">
                  </div>
                  <div class="pa-name">
                  <?php
                  if($varifikasi_pegawai == "Belum"){
                    echo ' - Belum Tervarifikasi - ';
                  }
                  else{
                    echo 'Tervarifikasi';
                  }
                  ?>
                    <div class="pa-text"><?php echo $nama_pegawai ?> · <?php echo $jabatan_pegawai ?></div>                  </div>
                </div>
              </div>
              <div class="p-info m-b-20">
                <h4 class="m-y-0">Info</h4>
                <hr>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-phone"></i>
                  </div>
                  <div class="pii-value">+<?php echo $no_hp_pegawai?></div>
                </div>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-email"></i>
                  </div>
                  <div class="pii-value">
                    <?php
                    if($varifikasi_pegawai == "Belum"){
                        echo ' - Belum Tervarifikasi - ';
                    }
                    else{
                        echo 'Tervarifikasi';
                    }
                    ?>
                  </div>
                </div>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-home"></i>
                  </div>
                  <div class="pii-value"><?php echo $alamat_pegawai ?></div>
                </div>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-accounts-add"></i>
                  </div>
                  <div class="pii-value"><?php echo tanggal_indo(''.$tgl_entri_pegawai.'')?></div>
                </div>
                 <div class="row">
                    <div class="col-md-6" align="center">
                    <a href="pegawai.php">
                        <button type="button" rel="tooltip" class="btn btn-info btn-fill">
                            <i class="zmdi zmdi-arrow-left"></i> Kembali
                        </button>
                    </a>
                    </div>
                    <div class="col-md-6" align="center">        
                        <a href="reset_varifikasi.php">
                            <button type="button" class="btn btn-warning">
                            <i class="zmdi zmdi-alert-triangle"></i> Reset Varifikasi
                            </button>
                        </a>
                    </div>
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
                            if($varifikasi_pegawai == "Belum"){
                                echo '<p> - Belum Tervarifikasi - </p>';
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
