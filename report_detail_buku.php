<?php $page="LAPORAN DATA BUKU"; ?>
<!DOCTYPE html>
<html lang="en">
  <?php include('script/head_script.php') ?>
  <body class="layout layout-header-fixed>
    <div class="panel panel-default panel-table">
         <?php include('menu/header_report.php');
         if (isset($_GET['id_buku'])) {
            $id_buku= ($_GET["id_buku"]);
            $query_buku = "SELECT a.*, b.*
                           FROM buku AS a INNER JOIN
                           jenis_buku AS b WHERE a.id_jenis_buku = b.id_jenis_buku
                           AND a.id_buku = '$id_buku'";

            $result_buku = mysqli_query($con, $query_buku);
                if(!$result_buku){
                die ("Query Error: ".mysqli_errno($con).
                    " - ".mysqli_error($con));
                }

            $data_buku          = mysqli_fetch_assoc($result_buku);
            $id_buku            = $data_buku['id_buku'];
            $judul_buku         = $data_buku['judul_buku'];
            $judul_singkat      = $data_buku['judul_singkat'];
            $gambar_buku        = $data_buku['gambar_buku'];
            $jenis_buku         = $data_buku['subyek'];
            $jenis_media        = $data_buku['jenis_media'];
            $kota_terbit        = $data_buku['kota_terbit'];
            $penerbit           = $data_buku['penerbit'];
            $tahun_terbit       = $data_buku['tahun_terbit'];
            $biografi           = $data_buku['biografi'];
            $jilid              = $data_buku['jilid'];
            $ISBN               = $data_buku['ISBN'];
            $cetakan            = $data_buku['cetakan'];
            $edisi              = $data_buku['edisi'];
            $tanggal_entri      = $data_buku['tgl_entri_buku'];
        }
        ?>
        <div class="panel-body">
          <div align="center">
            <h3>Laporan Buku - <?php echo $judul_buku ?></h3>
          </div>
          <h4>
        <table width="100%">
            <tr>
                <td width="80%">
                    <table width="100%">
                        <tr>
                            <td width="20%">
                                Kota Terbit
                            </td>
                            <td>
                                :
                            </td>
                            <td width="70%">
                                <?php echo $kota_terbit ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">
                                Penerbit
                            </td>
                            <td>
                                :
                            </td>
                            <td width="70%">
                                <?php echo $penerbit ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">
                                Tahun Terbit
                            </td>
                            <td>
                                :
                            </td>
                            <td width="70%">
                                <?php echo tanggal_indo($tahun_terbit) ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">
                                ISBN
                            </td>
                            <td>
                                :
                            </td>
                            <td width="70%">
                                <?php echo $ISBN ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">
                                Tanggal Entri
                            </td>
                            <td>
                                :
                            </td>
                            <td width="70%">
                                <?php echo tanggal_indo($tanggal_entri) ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">
                                Biografi
                            </td>
                            <td>
                                :
                            </td>
                            <td width="70%">
                                <?php echo $biografi ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="row">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Jilid</th>
                                                <th>Cetakan</th>
                                                <th>Edisi</th>
                                                <th>Total Buku</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
            $query_banyak = "SELECT id_detail_buku FROM detail_buku WHERE id_buku LIKE '$id_buku'";
            $result_banyak = mysqli_query($con, $query_banyak);
            $banyakdata_banyak = $result_banyak->num_rows;
                                            ?>
                                            <tr>
                                                <td><?php echo $jilid ?></td>
                                                <td><?php echo $cetakan ?></th>
                                                <td><?php echo $edisi ?></td>
                                                <td><b><?php echo $banyakdata_banyak ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="20%">
                    <div align="center">
                        <img src="img/book/<?php echo $gambar_buku?>" alt="Foto Profil" width="160" height="190" style="border:3px solid #ddd">
                        <br>
                        <?php echo $judul_singkat ?>
                        <br>
                        <small><?php echo $jenis_buku ?> · <?php echo $jenis_media ?></small>
                    </div>
                </td>
            </tr>
        </table>
        </h4>
        <?php
        if($_GET["status_buku"] == "Semua"){
        ?>
            <div align="center">
                <h4>Data Buku Tersebut</h4>
            </div>
            <table class="table">

            <?php
                $query_detail_buku = "SELECT * FROM detail_buku WHERE id_buku 
                                        LIKE '$id_buku'";
                $result_detail_buku = mysqli_query($con, $query_detail_buku);
            ?>  
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Status Buku</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                $no_detail_buku = 1;
                while($data_detail_buku = mysqli_fetch_assoc($result_detail_buku)){
                                echo '<tr>
                                    <td>'.$no_detail_buku.'</td>
                                    <td>'.$data_detail_buku['kode_buku'].'</td>
                                    <td>'.$data_detail_buku['status_buku'].'</td>
                                </tr>
                                ';
                                $no_detail_buku++;
                                }
            ?>
                </tbody>
            </table>
        <?php
        }else {
        ?>
            <div align="center">
                <h4>Data Buku Dengan Status <?php echo $_GET["status_buku"]?></h4>
            </div>
            <table class="table">

            <?php
                if($_GET['status_buku'] == "Lainya"){
                    $query_berstatus = "SELECT * FROM detail_buku WHERE id_buku 
                                            LIKE '$id_buku' AND status_buku NOT LIKE 'Siap Terpinjam' 
                                            AND status_buku NOT LIKE 'Dipesan' 
                                            AND status_buku NOT LIKE 'Dipinjam'";
                }else{
                    $query_berstatus = "SELECT * FROM detail_buku WHERE id_buku 
                                            LIKE '$id_buku' AND status_buku = '$_GET[status_buku]'";
                }
                $result_berstatus = mysqli_query($con, $query_berstatus);
            ?>  
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Status Buku</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                if($result_berstatus->num_rows == 0){
                    echo '<tr>
                        <td colspan="3">
                            <div align="center">
                                Tidak ada Data
                            </div>
                        </td>
                    </tr>';
                }
                else{
                    $no_berstatus = 1;
                    while($data_berstatus = mysqli_fetch_assoc($result_berstatus)){
                                    echo '<tr>
                                        <td>'.$no_berstatus.'</td>
                                        <td>'.$data_berstatus['kode_buku'].'</td>
                                        <td>'.$data_berstatus['status_buku'].'</td>
                                    </tr>
                                    ';
                                    $no_berstatus++;
                    }
                }
            ?>
                </tbody>
            </table>
        <?php
        }
        ?>
        <table class="table">
            <tbody>
                <tr>
                    <td width="70%">

                    </td>
                    <td>
                        <?php include('menu/petanda_tangan_report.php') ?>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tf>
                    <td colspan="2">
                        <?php include('menu/footer_report.php') ?>
                    </td>
                </tf>
            </tfoot>
        </table>
        </div>    
    </body>
  <?php include('script/footer_script.php') ?>
</html>
