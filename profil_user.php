<?php $page="PROFIL_USER"; ?>
<!DOCTYPE html> 
<html lang="en">
    <?php include('script/head_script.php'); 
        if (isset($_GET['no_induk'])) { 
            $no = ($_GET["no_induk"]);
            $query_siswa = "SELECT NIS FROM SISWA WHERE NIS = '$no'";
            $result_siswa = mysqli_query($con, $query_siswa);
                          if($result_siswa->num_rows == 1){
                            $query = "SELECT a.*, b.* FROM siswa AS a INNER JOIN user AS b 
                            WHERE a.NIS = '$no' AND a.NIS = b.id_siswa_pegawai";
                                $result = mysqli_query($con, $query);
                                    if(!$result){
                                    die ("Query Error: ".mysqli_errno($con).
                                        " - ".mysqli_error($con));
                                    }
                                    $data        = mysqli_fetch_assoc($result);
                                        $id_user     = $data["id_user"];
                                        $id          = $data["NIS"];
                                        $nama        = $data["nama_siswa"];
                                        $foto        = $data["foto_siswa"];
                                        $jabatan     = $data["kelas"];
                                        $email       = $data["email"];
                                        $username    = $data["username"];
                                        $kelas       = $data["kelas"];
                                        $no_hp       = $data["no_hp_siswa"];
                                        $alamat      = $data["alamat_siswa"];
                                        $tgl_entri   = $data["tgl_entri_siswa"];
                          }else{  
                            $query = "SELECT a.*, b.* FROM pegawai AS a INNER JOIN user AS b 
                            WHERE a.NIP = '$no' AND a.NIP = b.id_siswa_pegawai";
                                $result = mysqli_query($con, $query);
                                    if(!$result){
                                    die ("Query Error: ".mysqli_errno($con).
                                        " - ".mysqli_error($con));
                                    }

                                    $data        = mysqli_fetch_assoc($result);
                                        $id_user     = $data["id_user"];
                                        $id          = $data["NIP"];
                                        $nama        = $data["nama_pegawai"];
                                        $foto        = $data["foto_pegawai"];
                                        $jabatan     = $data["jabatan_pegawai"];
                                        $email       = $data["email"];
                                        $username    = $data["username"];
                                        $no_hp       = $data["no_hp_pegawai"];
                                        $alamat      = $data["alamat_pegawai"];
                                        $tgl_entri   = $data["tgl_entri_pegawai"];
                          }
        } 
        
        function tanggal_indo($tanggal){
            $bulan = array (1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
            );
            $split = explode('-', $tanggal);
            return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
        }

    ?>
    <body>
        <div class="profile">
            <div class="col-md-12">
                <div class="p-about m-b-0">
                    <div class="widget-infoblock wi-small m-b-30" style="background-image: url(img/photos/<?php echo(rand(2,5)); ?>.jpg)">
                        <div class="wi-bg">
                        </div>
                        <div class="wi-content-bottom p-a-30">
                            <div class="wi-text">
                                <div class="pa-avatar">
                                    <img id="preview_gambar"  src="img/avatars/<?php echo $foto ?>" alt="Foto Profil" width="100" height="100">
                                </div>
                            </div>
                            <div class="wi-text"><h4><?php echo $username ?></h4></div>
                            <div class="wi-text"><?php echo $nama ?> · <?php echo $jabatan ?></div>                  
                            <div class="wi-text">
                                <i class="zmdi zmdi-email"></i> - <?php echo $email ?> - 
                                <button type="button" class="btn btn-primary m-w-120" data-toggle="modal" data-target="#kegiatan">
                                  <i class="zmdi zmdi-eye"></i> Lihat Kegiatan
                                </button>
                            </div>                  
                        </div>
                    </div>
                </div>
                <div id="kegiatan" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="zmdi zmdi-close"></i>
                                    </span>
                                </button>
                                <h4 class="modal-title">Menu Cetak Buku</h4>
                            </div>
                            <div class="modal-body">    
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
                                                                $query_riwayat = "SELECT * FROM riwayat_kegiatan WHERE id_user = '$id_user' ";
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
                                                                            <div align="center">
                                                                                Tidak ada Data
                                                                            </div>
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
                                                                $query_sanksi = "SELECT * FROM sanksi WHERE id_user = '$id_user' AND status_sanksi = 'Belum Lunas' "; 
                                                                $result_sanksi = mysqli_query($con, $query_sanksi);
                                                            ?>
                                                            <table class="table" id="myTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Sanksi</th>
                                                                        <th width ="350">Catatan</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                            <?php
                                                                $no_sanksi = 1;
                                                                if($result_sanksi->num_rows == 0){
                                                                    echo '<tr>
                                                                        <td colspan="3">
                                                                            <div align="center">
                                                                                Tidak ada Data
                                                                            </div>
                                                                        </td>
                                                                    </tr>';
                                                                }
                                                                else{
                                                                    while($data_sanksi = mysqli_fetch_assoc($result_sanksi)){
                                                                        echo '<tr>
                                                                            <td>'.$no_sanksi.'</td>
                                                                            <td>'.$data_sanksi['sanksi'].'</td>
                                                                            <td>'.$data_sanksi['catatan'].'</td>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-info m-b-20">
                        <h4 class="m-y-0">Ubah Profil</h4>
                        <hr>
                        <form id="inputmasks" class="form-horizontal"  method="post" action="system/proses_ubah_user.php" enctype="multipart/form-data">
                            <div class="form-group">
                              <input id="preview" style="visibility:hidden;" type="file" accept="image/png, image/jpeg, image/jpg" name="foto" onchange="readURL(this);" onclick="myFunction()" type="hidden"/>
                              <label class="col-sm-3 control-label" for="form-control-5">Foto Profil</label>
                              <div class="col-sm-9">
                                <label for="preview" class="btn btn-primary btn-fill"><i class="zmdi zmdi-edit"> </i> Ubah Foto Profil</label> 
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Username</label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="no_induk" value="<?php echo $id ?>" >
                                    <input id="form-control-1" class="form-control" type="text" name="username" value="<?php echo $username ?>" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Ubah Password</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="password" name="password" >
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
                                <div class="col-sm-12" align="center">
                                    <button type="submit" name="input" rel="tooltip" class="btn btn-primary btn-fill">
                                        <i class="zmdi zmdi-edit"></i> Ubah Profil
                                    </button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
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
      }
  ?>
  </script>
</html>
