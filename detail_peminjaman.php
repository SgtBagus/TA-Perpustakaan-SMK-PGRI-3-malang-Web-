<?php $page="PEMINJAMAN"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('script/head_script.php'); 
        if (isset($_GET['id_peminjaman'])) { 
            $tanggal = date('Y-m-d');
            $id_peminjaman = ($_GET["id_peminjaman"]);
            $query = "SELECT a.*, b.* FROM 
                            peminjaman AS a INNER JOIN user AS b
                            WHERE a.id_user = b.id_user AND a.id_peminjaman = '$id_peminjaman'"; 
            $result = mysqli_query($con, $query);
                if(!$result){
                die ("Query Error: ".mysqli_errno($con).
                    " - ".mysqli_error($con));
                }

            $data      = mysqli_fetch_assoc($result);
            $tanggal_peminjaman   = $data["tgl_peminjaman"];
            $tanggal_pengembalian = $data["tgl_pengembalian"];
            $username_profil      = $data["username"];
            $status_pemesanan     = $data["status_pinjaman"];
            
            $date1 = new DateTime($tanggal_peminjaman);
            $date2 = new DateTime($tanggal_pengembalian);

            $date3 = new DateTime($tanggal); 
            $totalhari_100persen = $date2->diff($date1)->format("%a");
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
                  <div class="pa-name">
                  <?php
                    echo $username_profil.'<br>';
                    $query_siswa = "SELECT NIS FROM SISWA WHERE NIS = '$data[id_siswa_pegawai]'";
                    $result_siswa = mysqli_query($con, $query_siswa);
                        if($result_siswa->num_rows == 1){
                          $query_foto_siswa = "SELECT foto_siswa FROM siswa WHERE NIS = '$data[id_siswa_pegawai]'";
                          $result_foto_siswa = mysqli_query($con, $query_foto_siswa);
                          $data_foto_siswa = mysqli_fetch_assoc($result_foto_siswa);
                          echo '<div class="pa-avatar">
                            <img src="img/avatars/'.$data_foto_siswa['foto_siswa'].'" alt="Foto Profil" width="100" height="100">
                          </div>
                          <a href="detail_siswa.php?no_induk='.$data['id_siswa_pegawai'].'">
                              <button type="button" class="btn btn-primary">
                                <i class="zmdi zmdi-account"></i> Profil Peminjam
                              </button>
                            </a>';
                          }else{
                            $query_foto_pegawai = "SELECT foto_pegawai FROM pegawai WHERE NIP = '$data[id_siswa_pegawai]'";
                            $result_foto_pegawai = mysqli_query($con, $query_foto_pegawai);
                            $data_foto_pegawai = mysqli_fetch_assoc($result_foto_pegawai);
                            echo '<div class="pa-avatar">
                              <img src="img/avatars/'.$data_foto_pegawai['foto_pegawai'].'" alt="Foto Profil" width="100" height="100">
                            </div>
                            <a href="detail_pegawai.php?no_induk='.$data['id_siswa_pegawai'].'">
                              <button type="button" class="btn btn-primary">
                                <i class="zmdi zmdi-account"></i> Profil Peminjam
                              </button>
                            </a>';
                          }
                  ?>
                    <br>
                    <div class="pa-name">Tanggal Peminjaman</div>  
                    <div class="pa-text"><?php echo tanggal_indo(''.$tanggal_peminjaman.'') ?> - <?php echo tanggal_indo(''.$tanggal_pengembalian.'') ?></div>                   </div>
                </div>
              </div>
              <?php 
              if($status_pemesanan == "Menunggu"){
                echo '<div class="p-info m-b-20">
                  <h4 class="m-y-0">Varifikasi</h4>
                  <hr>';
                  if($date3 > $date2){
                    echo '
                    <div align="center">
                      <h4>Permintaan ini Sudah Kadarluasa</H4>
                      <button onclick="hapus('.$data['id_peminjaman'].')" type="button" class="btn btn-danger" name="input">
                        <i class="zmdi zmdi-delete"></i> Hapus
                      </button>
                    </div> ';
                  }
                  else{
                    echo'<div align="center">
                      <button onclick="terima('.$data['id_peminjaman'].')" type="button" class="btn btn-primary" name="input">
                        <i class="zmdi zmdi-edit"></i> Disetujui
                      </button>
                      <button onclick="tolak('.$data['id_peminjaman'].')" type="button" class="btn btn-danger" name="input">
                        <i class="zmdi zmdi-close"></i> Ditolak 
                      </button>
                    </div>';
                  }
                echo '</div>';
              }else if ($status_pemesanan == "Diterima") {
                echo '<div class="p-info m-b-20">
                  <h4 class="m-y-0">Sisa Hari</h4>
                  <hr>
                  <div align="center">
                    <div class="clearfix m-b-5">
                      <small class="pull-left">'.tanggal_indo(''.$tanggal_peminjaman.'').'</small>
                      <small class="pull-right">'.tanggal_indo(''.$tanggal_pengembalian.'').'</small>
                    </div>';
                    echo'<div class="progress progress-xs">';
                    $diff = $date2->diff($date3)->format("%a");
                    $persen = $diff/$totalhari_100persen;
                    $kali100 = $persen * 100;
                    $proses = 100 - $kali100;
                    if($date3 > $date2){
                      echo '<div class="progress-bar progress-bar-danger" role="progressbar" 
                      aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                      </div>
                    </div>
                    <span class="label label-outline-danger m-w-60"><h4>PENGEMBALIAN TERLAMBAT</h4></span><br><br>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Total hari Terlambat</th>
                              <th>Denda Terlambat</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <div align="center">
                                  <h5>'.$data['total_terlambat'].'</h5>
                                </div>
                              </td>
                              <td>
                                <div align="center">
                                  <h5>Rp. <b>'.$data['denda'].'</b>,00,-</h5>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <button onclick="kembali('.$data['id_peminjaman'].')"  type="button" class="btn btn-primary" name="input" data-toggle="tooltip" data-placement="top" title="" data-original-title="Terima Pengembalian">
                          <i class="zmdi zmdi-check"></i> Terima Pengembalian
                      </button>
                      <button onclick="sanksi('.$data['id_peminjaman'].')" type="button" class="btn btn-warning" name="input">
                        <i class="zmdi zmdi-edit"></i> Sanksi
                      </button>';
                    }
                    else if ($date3 == $date2){
                      echo '<div class="progress-bar progress-bar-danger" role="progressbar" 
                      aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                      </div>
                    </div>
                    <span class="label label-outline-warning m-w-60"><h4>PENGEMBALIAN HARI INI</h4></span><br><br>
                    <button onclick="kembali('.$data['id_peminjaman'].')"  type="button" class="btn btn-primary" name="input" data-toggle="tooltip" data-placement="top" title="" data-original-title="Terima Pengembalian">
                        <i class="zmdi zmdi-check"></i> Terima Pengembalian
                    </button>
                    <button onclick="sanksi('.$data['id_peminjaman'].')" type="button" class="btn btn-warning" name="input">
                      <i class="zmdi zmdi-edit"></i> Sanksi
                    </button>';
                    }
                    else{
                      echo '<div class="progress-bar progress-bar-danger" role="progressbar" 
                      aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:'.$proses.'%">
                      </div>
                    </div>
                    <span class="label label-outline-primary m-w-60"><h4><b>'.$diff.'</b> - HARI LAGI</h4></span><br><br>
                    <button onclick="kembali('.$data['id_peminjaman'].')"  type="button" class="btn btn-primary" name="input" data-toggle="tooltip" data-placement="top" title="" data-original-title="Terima Pengembalian">
                      <i class="zmdi zmdi-check"></i> Terima Pengembalian
                    </button>
                    <button onclick="sanksi('.$data['id_peminjaman'].')" type="button" class="btn btn-warning" name="input">
                      <i class="zmdi zmdi-edit"></i> Sanksi
                    </button>';
                    }
                  echo '</div> 
                </div>';
              }
              else if ($status_pemesanan == "Ditolak"){
                echo '<div class="p-info m-b-20">
                  <h4 class="m-y-0">Aksi</h4>
                  <hr>
                  <div align="center">
                    <h4>Peminjaman ini Ditolak</H4>
                    <button onclick="hapus('.$data['id_peminjaman'].')" type="button" class="btn btn-danger" name="input">
                      <i class="zmdi zmdi-delete"></i> Hapus
                    </button>
                  </div> 
                </div>'; 
              }
              else if ($status_pemesanan == "Kembali"){
                echo '<div class="p-info m-b-20">
                  <h4 class="m-y-0">Sisa Hari</h4>
                  <hr>
                  <div align="center">
                    <div class="clearfix m-b-5">
                      <small class="pull-left">'.tanggal_indo(''.$tanggal_peminjaman.'').'</small>
                      <small class="pull-right">'.tanggal_indo(''.$tanggal_pengembalian.'').'</small>
                    </div>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" role="progressbar" 
                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                      </div>
                    </div>
                    <span class="label label-outline-primary m-w-60"><h4>PEMINJAMAN KEMBALI</h4></span><br><br>';

                    if($data['denda'] == "0"){
                    }else{
                      echo '<div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Total hari Terlambat</th>
                            <th>Denda Terlambat</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div align="center">
                                <h5>'.$data['total_terlambat'].'</h5>
                              </div>
                            </td>
                            <td>
                              <div align="center">
                                <h5>Rp. <b>'.$data['denda'].'</b>,00,-</h5>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>';
                    }
                    echo '
                    <div align="center">
                      <a href="pengembalian.php">
                        <button type="button" class="btn btn-primary" name="input">
                          <i class="zmdi zmdi-assignment-returned"></i> Check Pengembalian 
                        </button>
                      </a>
                    </div>
                    <br>
                    <div align="center">
                      <button onclick="sanksi('.$data['id_peminjaman'].')" type="button" class="btn btn-warning" name="input" data-toggle="tooltip" data-placement="top" title="" data-original-title="Masukan data Sanksi">
                        <i class="zmdi zmdi-edit"></i> Sanksi
                      </button>
                      <button onclick="hapus('.$data['id_peminjaman'].')" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Permintaan" class="btn btn-danger" name="input">
                        <i class="zmdi zmdi-delete"></i> Hapus
                      </button> 
                    </div>
                  </div>
                </div>';
              }
              ?>
            </div>
            <div class="col-md-8 col-sm-7">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12">
                      <ul class="nav nav-tabs nav-tabs-custom nav-justified m-b-15">
                        <li class="active">
                          <a href="#" role="tab" data-toggle="tab" >
                            <i class="zmdi zmdi-book"></i> Buku Yang Dipesan</a>
                        </li>
                      </ul>
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade  active in">
                          <div class="table-responsive">
                          <?php
            $query_buku_pemesanan = "SELECT a.id_peminjaman, b.id_detail_buku, c.kode_buku, d.gambar_buku,
                                    c.status_buku, d.judul_singkat, d.ISBN
                                    FROM peminjaman AS a INNER JOIN detail_peminjaman AS b 
                                    INNER JOIN detail_buku AS c INNER JOIN buku AS d
                                    WHERE a.id_peminjaman = b.id_peminjaman AND b.id_detail_buku = c.id_detail_buku AND
                                    c.id_buku = d.id_buku AND a.id_peminjaman = '$id_peminjaman'";
            $result_buku_pemesanan = mysqli_query($con, $query_buku_pemesanan);
                          ?>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th></th>
                                        <th>Buku</th>
                                        <th>Kode Buku</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                    <?php 
                    $no_buku_pemesanan = 1;
                    while($data_buku_pemesanan = mysqli_fetch_assoc($result_buku_pemesanan)){
                                    echo '<tr>
                                        <td>'.$no_buku_pemesanan.'</td>
                                        <td><img class="img-rounded" src="img/book/'.$data_buku_pemesanan['gambar_buku'].'" alt="" width="40" height="60"></td>
                                        <td>'.$data_buku_pemesanan['judul_singkat'].'</td>
                                        <td>'.$data_buku_pemesanan['kode_buku'].'</td>
                                        <td>'.$data_buku_pemesanan['status_buku'].'</td>
                                        <td>
                                          <a href="detail_buku.php?ISBN='.$data_buku_pemesanan['ISBN'].'">
                                            <i class="zmdi zmdi-eye"></i>
                                          </a>
                                        </td>
                                    </tr>';
                                    $no_buku_pemesanan++;
                                    }
                    ?>
                              </tbody>
                            </table>
                          </div>
                          <div align="right">
                            <a href="peminjaman.php">
                              <button type="button" class="btn btn-primary">
                                <i class="zmdi zmdi-arrow-left"></i> Data Peminjaman
                              </button>
                            </a>
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
      <?php include('menu/footer.php') ?>
    </div>
  </body>
      <?php include('script/footer_script.php') ?>
      
      <script> 
        function terima(id) {
          swal({
            title: 'Konfirmasi?',
            text : 'Anda yakin menerima peminjaman ini ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya!'
            }).then(function () {
                document.location="system/peminjaman_terima.php?id="+id;
          })
        }

        function tolak(id) {
          swal({
            title: 'Konfirmasi?',
            text : 'Anda yakin menolak peminjaman ini ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya!'
            }).then(function () {
                document.location="system/peminjaman_tolak.php?id="+id;
          })
        }

        function sanksi(id) {
          swal({
            title: 'Konfirmasi?',
            text : 'Anda yakin menjadikanya data sanksi ini ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya!'
            }).then(function () {
                document.location="system/sanksi.php?id="+id;
          })
        }

        function kembali(id) {
          swal({
            title: 'Konfirmasi?',
            text : 'Anda yakin menerika pengembalian ini ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya!'
            }).then(function () {
                document.location="system/pengembalian.php?id="+id;
          })
        }

        function hapus(id) {
          swal({
            title: 'Konfirmasi?',
            text : 'Anda yakin menolak peminjaman ini ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya!'
            }).then(function () {
                document.location="system/peminjaman_hapus.php?id="+id;
          })
        }
        
  <?php
      if (isset($_GET['aksi'])) {
          $aksi = ($_GET["aksi"]);
          if($aksi == "diterima"){
              echo 'swal({
                title: "Diterima!",
                text: "Peminjaman ini diterima",
                type: "success",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "ditolak"){
              echo 'swal({
                title: "Ditolak",
                text: "Peminjaman ini Ditolak",
                type: "success",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "kembali"){
              echo 'swal({
                title: "Kembali",
                text: "Peminjaman ini Telah Kembali",
                type: "success",
                showConfirmButton: true,
              })';
          }
      }
  ?>
  
      </script>
</html>
