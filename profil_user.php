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
                                    <img src="img/avatars/<?php echo $foto ?>" alt="Foto Profil" width="120" height="120">
                                </div>
                            </div>
                            <div class="wi-text"><h4><?php echo $username ?></h4></div>
                            <div class="wi-text"><?php echo $nama ?> · <?php echo $jabatan ?></div>                  
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
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
                                    <div class="pii-value"><?php echo $email ?></div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
      <?php include('script/footer_script.php') ?>
</html>
