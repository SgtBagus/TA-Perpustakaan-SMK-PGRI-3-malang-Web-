<?php $page="PENGGUNA"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('script/head_script.php'); 
        if (isset($_GET['no_induk'])) { 
            $no_induk = ($_GET["no_induk"]);
            $query_user = "SELECT * FROM user WHERE no_induk = '$no_induk'";
            $result_user = mysqli_query($con, $query_user);
                if(!$result_user){
                die ("Query Error: ".mysqli_errno($con).
                    " - ".mysqli_error($con));
                }

            $data_user       = mysqli_fetch_assoc($result_user);
            $id_user         = $data_user["id_user"];
            $nama_user       = $data_user["nama"];
            $foto_user       = $data_user["foto_user"];
            $jabatan_user    = $data_user["jabatan"];
            $kelas_user      = $data_user["kelas"];
            $no_hp_user      = $data_user["no_hp"];
            $alamat_user     = $data_user["alamat"];
            $tgl_entri_user  = $data_user["tgl_entri"];
            $varifikasi_user = $data_user["varifikasi"];
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
                    <img src="img/avatars/<?php echo $foto_user ?>" alt="Foto Profil" width="100" height="100">
                  </div>
                  <button type="button" class="btn btn-warning">
                    <i class="zmdi zmdi-alert-triangle"></i> Angkat Admin
                  </button>
                  <div class="pa-name">
                  <?php
                  if($varifikasi_user == "Belum"){
                    echo ' - Belum Tervarifikasi - ';
                  }
                  else{
                    echo 'Tervarifikasi';
                  }
                  ?>
                    <div class="pa-text"><?php echo $nama_user ?> · <?php echo $jabatan_user ?></div>                  </div>
                </div>
              </div>
              <div class="p-info m-b-20">
                <h4 class="m-y-0">Info</h4>
                <hr>
  
                <?php
                if ($jabatan_user == "Siswa"){
                echo '<div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-account-box"></i>
                  </div>
                  <div class="pii-value">'.$kelas_user.'</div>
                </div>';
                }else{

                }
                ?>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-phone"></i>
                  </div>
                  <div class="pii-value"><?php echo $no_hp_user?></div>
                </div>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-email"></i>
                  </div>
                  <div class="pii-value">
                    <?php
                    if($varifikasi_user == "Belum"){
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
                  <div class="pii-value"><?php echo $alamat_user ?></div>
                </div>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-accounts-add"></i>
                  </div>
                  <div class="pii-value"><?php echo tanggal_indo(''.$tgl_entri_user.'')?></div>
                </div>
                <div class="row">
                  <button type="button" class="btn btn-warning">
                    <i class="zmdi zmdi-alert-triangle"></i> Reset Varifikasi
                  </button>
                </div>
                <br>
                <div align="right">
                  <?php
                  if($jabatan_user == "Siswa"){
                    echo'<a href="siswa.php">';
                  }else{
                    echo'<a href="pegawai.php">';
                  }
                  ?>
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
                            if($varifikasi_user == "Belum"){
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
