<?php $page="PEGAWAI"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('script/head_script.php'); 
        if (isset($_GET['no_induk'])) { 
            $no = ($_GET["no_induk"]);
            $query = "SELECT a.*, b.* FROM pegawai AS a INNER JOIN user AS b 
                      WHERE a.NIP = '$no' AND a.NIP = b.id_siswa_pegawai";
            $result = mysqli_query($con, $query);
                if(!$result){
                die ("Query Error: ".mysqli_errno($con).
                    " - ".mysqli_error($con));
                }

            $data        = mysqli_fetch_assoc($result);
            $id          = $data["NIP"];
            $nama        = $data["nama_pegawai"];
            $foto        = $data["foto_pegawai"]; 
            $jabatan_pegawai     = $data["jabatan_pegawai"];
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
                    <div class="pa-text"><?php echo $nama ?> · <?php echo $jabatan_pegawai ?></div>                  </div>
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
                                    <a href="#riwayat" role="tab" data-toggle="tab">
                                        <i class="zmdi zmdi-time"></i> Riwayat
                                    </a>
                                </li>
                                <li>
                                    <a href="#sanksi" role="tab" data-toggle="tab">
                                        <i class="zmdi zmdi-info"></i> Sanksi
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="riwayat">
                                    <div class="table-responsive">
                                        <?php
                                            $query_riwayat = "SELECT * FROM riwayat_kegiatan WHERE id_user = '$id' ";
                                            $result_riwayat = mysqli_query($con, $query_riwayat);
                                        ?>
                                        <table class="table" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th width ="350">Kegiatan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        <?php
                                            $no_riwyat = 1;
                                            if($result_riwayat->num_rows == 0){
                                                echo '<tr>
                                                    <td colspan="3">
                                                        <div align="center">';
                                                        if($verifikasi == "Belum"){
                                                            echo '<p> - Belum Terverifikasi - </p>';
                                                        }
                                                        else{
                                                            echo '<p> - Tidak ada Data - </p>';
                                                        }
                                                        echo '</div>
                                                    </td>
                                                </tr>';
                                            }
                                            else{
                                                while($data_riwayat = mysqli_fetch_assoc($result_riwayat)){
                                                    echo '<tr>
                                                        <td>'.$no_riwyat.'</td>
                                                        <td>'.tanggal_indo(''.$data_riwayat['tgl_riwayat_kegiatan'].'').'</td>
                                                        <td>'.$data_riwayat['riwayat_kegiatan'].'</td>
                                                    </tr>';
                                                $no_riwyat++;
                                                }
                                            }
                                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="sanksi">
                                    <div class="table-responsive">
                                        <?php
                                            $query_sanksi = "SELECT * FROM sanksi WHERE id_user = '$id'"; 
                                            $result_sanksi = mysqli_query($con, $query_sanksi);
                                        ?>
                                        <table class="table" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Sanksi</th>
                                                    <th width ="350">Catatan</th>
                                                    <th>Status Sanksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        <?php
                                            $no_sanksi = 1;
                                            if($result_sanksi->num_rows == 0){
                                                echo '<tr>
                                                    <td colspan="4">
                                                        <div align="center">';
                                                            if($verifikasi == "Belum"){
                                                                echo '<p> - Belum Terverifikasi - </p>';
                                                            }
                                                            else{
                                                                echo '<p> - Tidak ada Data - </p>';
                                                            }
                                                        echo '</div>
                                                    </td>
                                                </tr>';
                                            }
                                            else{
                                                while($data_sanksi = mysqli_fetch_assoc($result_sanksi)){
                                                    echo '<tr>
                                                        <td>'.$no_sanksi.'</td>
                                                        <td>'.$data_sanksi['sanksi'].'</td>
                                                        <td>'.$data_sanksi['catatan'].'</td>
                                                        <td>'.$data_sanksi['status_sanksi'].'</td>
                                                    </tr>';
                                                $no_riwyat++;
                                                }
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
              <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                          <h4 class="m-y-0">Edit Pegawai</h4>
                          <hr>
                          <form id="inputmasks" class="form-horizontal"  method="post" action="system/proses_ubah_pegawai.php" enctype="multipart/form-data">
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="form-control-5">Nama</label>
                              <div class="col-sm-9">
                                <input type="hidden" name="id_login" value="<?php echo $id_login ?>">
                                <input type="hidden" name="NIP" value="<?php echo $id ?>">
                                <input class="form-control" type="text" name="nama" placeholder="Nama" value="<?php echo $nama ?>">
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
  if($jabatan == $jabatan_pegawai) {
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
                                <label class="col-sm-3 control-label" for="form-control-1">No Hp</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="no_hp" value="<?php echo $no_hp ?>" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea id="form-control-8" class="form-control" rows="3" name="alamat" ><?php echo $alamat ?></textarea>
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
                                  <i class="zmdi zmdi-edit"></i> Edit Pegawai
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
          else if($aksi == "password"){
              echo 'swal({
                title: "Kesalahan!",
                text: "Mohon maaf password tidak sesuai.",
                type: "error",
                showConfirmButton: true,
              })';
          }
      }
  ?>
  </script>
</html>
