<?php $page="PROFIL"; ?>
<!DOCTYPE html>
<html lang="en">
  <?php include('script/head_script.php') ?>
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
                    <img src="img/avatars/<?php echo $foto_login ?>" alt="Foto Profil" width="100" height="100">
                  </div>
                  <div class="pa-name"><?php echo $username_login ?>
                    <?php
                    if($role_login == "Admin"){
                      echo '<i class="zmdi zmdi-check-circle text-success m-l-5"></i>';
                    }
                    ?>
                    <div class="pa-text"><?php echo $nama_login ?> · <?php echo $jabatan_login ?></div>
                  </div>
                </div>
              </div>
              <div class="p-info m-b-20">
                <h4 class="m-y-0">Info</h4>
                <hr>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-phone"></i>
                  </div>
                  <div class="pii-value"><?php echo $no_hp_login?></div>
                </div>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-email"></i>
                  </div>
                  <div class="pii-value"><?php echo $email_login ?></div>
                </div>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-home"></i>
                  </div>
                  <div class="pii-value"><?php echo $alamat_login ?></div>
                </div>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-accounts-add"></i>
                  </div>
                  <div class="pii-value"><?php echo tanggal_indo(''.$entri_login.'')?></div>
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
                          <a href="#biodata" role="tab" data-toggle="tab">
                            <i class="zmdi zmdi-account"></i> Biodata</a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="zmdi zmdi-account"></i> Akun
                            <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                            <li><a href="#username"  role="tab" data-toggle="tab" >Username</a></li>
                            <li><a href="#email"  role="tab" data-toggle="tab" >Email</a></li>
                            <li><a href="#password"  role="tab" data-toggle="tab" >Password</a></li>
                          </ul>
                        </li>
                      </ul>
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="biodata">
                          <form id="inputmasks" class="form-horizontal"  method="post" action="system/proses_ubah_biodata.php" enctype="multipart/form-data">
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">Foto Profil</label>
                              <div class="col-sm-9">
                                <img id="preview_gambar" src="img/avatars/<?php echo $foto_login ?>" alt="Foto Profil" width="100" height="100">
                                <input id="preview" style="visibility:hidden;" type="file" accept="image/png, image/jpeg, image/jpg" name="foto" onchange="readURL(this);" onclick="myFunction()" />
                                <label for="preview" class="btn btn-primary btn-fill"><i class="zmdi zmdi-edit"> </i> Ubah Foto Profil</label> 
                              </div>
                            </div>
                            <!-- <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">Username</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="text" name="username" placeholder="Username" value="<?php echo $username_login ?>">
                              </div>
                            </div> -->
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">Nama</label>
                              <div class="col-sm-9">
                                <input type="hidden" name="id" value="<?php echo $id_login ?>">
                                <input type="hidden" name="NIP" value="<?php echo $no_induk_login ?>">
                                <input class="form-control" type="text" name="nama" placeholder="Nama" value="<?php echo $nama_login ?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-21">Jabatan</label>
                              <div class="col-sm-9">
                                <select name="jabatan" class="form-control">
                                <?php                        
$semua_jabatan = array("Guru Pengajar", "Kesiswaan", "Pustakawan", "Karyawan", 
                     "Administrasi", "Siswa");

foreach ($semua_jabatan as $jabatan) 
{
  if($jabatan == $jabatan_login) {
    echo "<option value=".$jabatan." SELECTED>$jabatan</option>";
  } 
  else{
    echo "<option value=".$jabatan.">$jabatan</option>";
  }
}
                                ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">No Hp</label>
                              <div class="col-md-9">
                                <input id="form-control-3" class="form-control" type="text" 
                                data-inputmask="'alias': '+089999999999'" placeholder="No Hp" name="no_hp" value="<?php echo $no_hp_login?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-8">Alamat</label>
                              <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"><?php echo $alamat_login ?></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">Password Anda</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="password" name="konfirmasi" placeholder="Password Anda">
                              </div>
                            </div>
                            <div align="right">
                                <button type="submit" name="input" rel="tooltip" class="btn btn-primary btn-fill">
                                  <i class="zmdi zmdi-edit"></i> Ubah Biodata
                                </button>
                            </div>
                          </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="username">
                          <form class="form-horizontal" id="inputmasks"  method="post" action="system/proses_ubah_username.php">
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">Username</label>
                              <div class="col-sm-9">
                                <input type="hidden" name="id" value="<?php echo $id_login ?>">
                                <input class="form-control" type="text" name="username" placeholder="username" value="<?php echo $username_login ?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">Password Anda</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="password" name="konfirmasi" placeholder="Konfirmasi Anda" required>
                              </div>
                            </div>
                            <div align="right">
                                <button type="submit" name="input" rel="tooltip" class="btn btn-primary btn-fill">
                                  <i class="zmdi zmdi-edit"></i> Ubah Username
                                </button>
                            </div>
                          </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="email">
                          <form class="form-horizontal" id="inputmasks"  method="post" action="system/proses_ubah_email.php">
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">Email</label>
                              <div class="col-sm-9">
                                <input type="hidden" name="id" value="<?php echo $id_login ?>">
                                <input class="form-control" type="email" name="email" placeholder="email" value="<?php echo $email_login ?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">Password Anda</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="password" name="konfirmasi" placeholder="Konfirmasi Anda" required>
                              </div>
                            </div>
                            <div align="right">
                                <button type="submit" name="input" rel="tooltip" class="btn btn-primary btn-fill">
                                  <i class="zmdi zmdi-edit"></i> Ubah Email
                                </button>
                            </div>
                          </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="password">
                          <form class="form-horizontal" method="post" action="system/proses_ubah_password.php">
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">Password Baru</label>
                              <div class="col-sm-9">
                                <input type="hidden" name="id" value="<?php echo $id_login ?>">
                                <input class="form-control" type="password" name="password_baru" placeholder="Password Baru">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">Konfirmasi Password</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="password" name="konfirmasi_password_baru" placeholder="Konfimasi Password">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">Password Anda</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="password" name="password_lama" placeholder="Password Anda">
                              </div>
                            </div>
                            <div align="right">
                                <button type="submit" name="input" rel="tooltip" class="btn btn-primary btn-fill">
                                  <i class="zmdi zmdi-edit"></i> Ubah Password
                                </button>
                            </div>
                          </form>
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
  <script type="text/javascript">
  <?php
      if (isset($_GET['aksi'])) {
          $aksi = ($_GET["aksi"]);
          if($aksi == "terubah"){
              echo 'swal({
                title: "Terubah!",
                text: "Profil Telah Diubah.",
                type: "success",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "error"){
              echo 'swal({
                title: "Kesalahan!",
                text: "Mohon maaf terjadi Kesalahan.",
                type: "error",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "size"){
              echo 'swal({
                title: "Kesalahan!",
                text: "Mohon maaf ukruan file terlalu besar.",
                type: "error",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "format"){
              echo 'swal({
                title: "Kesalahan!",
                text: "Mohon maaf file tidak sesuai.",
                type: "error",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "password"){
              echo 'swal({
                title: "Kesalahan!",
                text: "Mohon maaf password tidak sesuai.",
                type: "error",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "konfirmasi"){
              echo 'swal({
                title: "Kesalahan!",
                text: "Mohon maaf konfirmasi password tidak sama.",
                type: "error",
                showConfirmButton: true,
              })';
          }
      }
  ?>
  </script>
</html>
