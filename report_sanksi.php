<?php $page="LAPORAN DATA TRANSAKSI"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('script/head_script.php') ?>
    <body class="layout layout-header-fixed">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-default panel-table">
         <?php include('menu/header_report.php');
            if (isset($_GET['id_sanksi'])) { 
                $tanggal = date('Y-m-d');
                $id_peminjaman = ($_GET["id_sanksi"]);
                $query = "SELECT a.*, b.* FROM 
                                sanksi AS a INNER JOIN user AS b
                                WHERE a.id_user = b.id_user AND a.id_peminjaman = '$id_peminjaman'"; 
                $result = mysqli_query($con, $query);
                    if(!$result){
                    die ("Query Error: ".mysqli_errno($con).
                        " - ".mysqli_error($con));
                    }

                $data      = mysqli_fetch_assoc($result);
                $username_profil      = $data["username"];
                $status_pemesanan     = $data["status_sanksi"];
                $catatan_sanksi       = $data["catatan_sanksi"];
                $sanksi               = $data["sanksi"];
            }  
        ?>
        <h4>
            <table width="100%">
                <tr>
                    <td width="20%">
                        Peminjam
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <?php echo $username_profil ?> <small> 
                            <?php
                    $query_siswa = "SELECT NIS FROM SISWA WHERE NIS = '$data[id_siswa_pegawai]'";
                    $result_siswa = mysqli_query($con, $query_siswa);
                        if($result_siswa->num_rows == 1){
                          $query_foto_siswa = "SELECT * FROM siswa WHERE NIS = '$data[id_siswa_pegawai]'";
                          $result_foto_siswa = mysqli_query($con, $query_foto_siswa);
                          $data_foto_siswa = mysqli_fetch_assoc($result_foto_siswa);
                            echo $data_foto_siswa['nama_siswa'];
                          }else{
                            $query_foto_pegawai = "SELECT * FROM pegawai WHERE NIP = '$data[id_siswa_pegawai]'";
                            $result_foto_pegawai = mysqli_query($con, $query_foto_pegawai);
                            $data_foto_pegawai = mysqli_fetch_assoc($result_foto_pegawai);
                            echo $data_foto_pegawai['nama_pegawai'];
                          }
                            ?>
                        </small>
                    </td>
                </tr>
                <tr>
                    <td width="20%">
                        Sanksi
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                          <?php echo $sanksi ?>
                    </td>
                </tr>
                <tr>
                    <td width="20%">
                          Catatan
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                          <?php echo $catatan_sanksi ?>
                    </td>
                </tr>
                <tr>
                    <td width="20%">
                        Status Peminjaman
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <?php 
                            echo $status_pemesanan;
                        ?>
                    </td>
                </tr>
            </table>
            <div align="center">
                Data Buku Yang Di pinjam
            </div>
        </h4>
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
                                <thead style="background-color:rgb(238, 238, 238)">
                                <tr>
                                    <th>No</th>
                                    <th></th>
                                    <th>Buku</th>
                                    <th>Kode Buku</th>
                                    <th>Status</th>
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
                                </tr>';
                                $no_buku_pemesanan++;
                                }
                ?>
                          </tbody>
                        </table>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5">
                                </td>
                                <td colspan="2">
                                    <?php include('menu/petanda_tangan_report.php') ?>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tf>
                                <td colspan="7">
                                    <?php include('menu/footer_report.php') ?>
                                </td>
                            </tf>
                        </tfoot>  
                    </table>  
                </div>  
            </div>
        </div>
    </body>  
  <?php include('script/footer_script.php') ?>
</html>
