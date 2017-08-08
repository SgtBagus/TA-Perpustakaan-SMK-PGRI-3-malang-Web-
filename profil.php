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
                    <img src="img/avatars/<?php echo $foto_user ?>" alt="Foto Profil" width="100" height="100">
                  </div>
                  <div class="pa-name"><?php echo $username ?>
                    <?php
                    if($role == "Admin"){
                      echo '<i class="zmdi zmdi-check-circle text-success m-l-5"></i>';
                    }
                    ?>
                    <div class="pa-text"><?php echo $nama ?> · <?php echo $jabatan ?></div>
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
                  <div class="pii-value">+<?php echo $no_hp?></div>
                </div>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-email"></i>
                  </div>
                  <div class="pii-value"><?php echo $email ?></div>
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
                  <div class="pii-value"><?php echo tanggal_indo(''.$entri.'')?></div>
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
                        <li>
                          <a href="#biodata" role="tab" data-toggle="tab">
                            <i class="zmdi zmdi-account"></i> Biodata</a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="zmdi zmdi-account"></i> Akun
                            <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                            <li><a href="#email"  role="tab" data-toggle="tab" >Email</a></li>
                            <li><a href="#password"  role="tab" data-toggle="tab" >Password</a></li>
                          </ul>
                        </li>
                      </ul>
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade  active in" id="kegiatan">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia non massa a euismod. Nam bibendum mauris mollis, ultricies orci vitae, tristique est. Mauris pellentesque justo ut est fringilla imperdiet.</p>
                          <p>Cras varius vehicula lorem sollicitudin ullamcorper. Sed nec purus eget velit elementum posuere. Aliquam et orci tincidunt, vulputate tortor quis, iaculis sapien. Praesent semper dui at porta consequat. In quis turpis mollis, rutrum erat tincidunt, tincidunt ipsum. Suspendisse feugiat bibendum faucibus.</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="biodata">
                          <form class="form-horizontal" method="post" action="system/proses_ubah_biodata.php">
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">Foto Profil</label>
                              <div class="col-sm-9">
                                <img id="preview_gambar" src="img/avatars/<?php echo $foto_user ?>" alt="Foto Profil" width="100" height="100">
                                <input id="preview" style="visibility:hidden;" type="file" accept="image/png, image/jpeg, image/jpg" name="foto" onchange="readURL(this);" onclick="myFunction()"/>
                                <label for="preview" class="btn btn-primary btn-fill"><i class="zmdi zmdi-edit"> </i> Ubah Foto Profil</label>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">Nama</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="text" name="subyek" placeholder="name" value="<?php echo $nama ?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-21">Jabatan</label>
                              <div class="col-sm-9">
                                <select name="jabatan" class="form-control">
                                <?php
                                  if($jabatan == "Guru Pengajar"){
                                    echo '<option value="Guru Pengajar" selected="selected">Guru Pengajar</option>
                                    <option value="Kesiswaan">Kesiswaan</option>
                                    <option value="Pustakawan">Pustakawan</option>
                                    <option value="Karyawan">Karyawan</option>
                                    <option value="Administrasi">Administrasi</option>
                                    <option value="Siswa">Siswa</option>';
                                  }else if ($jabatan == "Kesiswaan"){
                                    echo '<option value="Guru Pengajar">Guru Pengajar</option>
                                    <option value="Kesiswaan"  selected="selected">Kesiswaan</option>
                                    <option value="Pustakawan">Pustakawan</option>
                                    <option value="Karyawan">Karyawan</option>
                                    <option value="Administrasi">Administrasi</option>
                                    <option value="Siswa">Siswa</option>';
                                  }else if ($jabatan == "Pustakawan"){
                                    echo '<option value="Guru Pengajar">Guru Pengajar</option>
                                    <option value="Kesiswaan">Kesiswaan</option>
                                    <option value="Pustakawan" selected="selected">Pustakawan</option>
                                    <option value="Karyawan">Karyawan</option>
                                    <option value="Administrasi">Administrasi</option>
                                    <option value="Siswa">Siswa</option>';
                                  }else if ($jabatan == "Karyawan"){
                                    echo '<option value="Guru Pengajar">Guru Pengajar</option>
                                    <option value="Kesiswaan">Kesiswaan</option>
                                    <option value="Pustakawan">Pustakawan</option>
                                    <option value="Karyawan" selected="selected">Karyawan</option>
                                    <option value="Administrasi">Administrasi</option>
                                    <option value="Siswa">Siswa</option>';
                                  }else if ($jabatan == "Administrasi"){
                                    echo '<option value="Guru Pengajar">Guru Pengajar</option>
                                    <option value="Kesiswaan">Kesiswaan</option>
                                    <option value="Pustakawan">Pustakawan</option>
                                    <option value="Karyawan">Karyawan</option>
                                    <option value="Administrasi" selected="selected">Administrasi</option>
                                    <option value="Siswa">Siswa</option>';
                                  }else {
                                    echo '<option value="Guru Pengajar">Guru Pengajar</option>
                                    <option value="Kesiswaan">Kesiswaan</option>
                                    <option value="Pustakawan">Pustakawan</option>
                                    <option value="Karyawan">Karyawan</option>
                                    <option value="Administrasi">Administrasi</option>
                                    <option value="Siswa" selected="selected">Siswa</option>';
                                  }
                                ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">No Hp</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="text" name="no_hp" placeholder="no_hp" value="<?php echo $no_hp ?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-8">Alamat</label>
                              <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"><?php echo $alamat ?></textarea>
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
                        <div role="tabpanel" class="tab-pane fade" id="email">
                          <form class="form-horizontal" method="post" action="system/proses_ubah_email.php">
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">Email</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="text" name="email" placeholder="email" value="<?php echo $email ?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">Password Anda</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="password" name="konfirmasi" placeholder="Konfirmasi Anda">
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
                                <input class="form-control" type="text" name="password_baru" placeholder="Password Baru">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">Konfirmasi Password</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="text" name="konfirmasi_password_baru" placeholder="Konfimasi Password">
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
</html>
