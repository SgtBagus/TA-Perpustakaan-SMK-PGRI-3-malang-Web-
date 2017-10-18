<?php $page="LAPORAN DATA BUKU"; ?>
<!DOCTYPE html>
<html lang="en"> 
  <?php include('script/head_script.php') ?>
  <body class="layout layout-header-fixed"> 
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-default panel-table">
                <?php include('menu/header_report.php');
                    $awal       = date('Y-m-d', strtotime(($_GET['awal'])));
                    $akhir      = date('Y-m-d', strtotime(($_GET['akhir'])));

        $query_buku = "SELECT a.*, b.* 
        FROM buku AS a INNER JOIN jenis_buku AS b WHERE (a.tgl_entri_buku BETWEEN '$awal' AND '$akhir') AND a.id_jenis_buku = b.id_jenis_buku 
        GROUP BY a.judul_buku ORDER BY a.id_buku  DESC" ;
        $result_buku = mysqli_query($con, $query_buku);
        
        $banyak_buku = $result_buku->num_rows;
                ?> 
                <div class="panel-body">
                <div align="center">
                    <h3>Laporan Data Buku</h3>
                </div>
                <h4>
                <table width="100%">
                    <tr>
                        <td width="10%">
                            Tangga 
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <?php echo tanggal_indo(date($awal)) ?> s/d <?php echo tanggal_indo(date($akhir)) ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%">
                            Banyak Buku
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <?php echo $banyak_buku ?>
                        </td>
                    </tr>
                </table>
                <div align="center">
                    Data Buku Tersebut Terdiri Dari
                </div>
                </h4>
                    <table class="table">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th width="20%">Masuk Tanggal</th>
                            <th width="10%"></th>
                            <th width="30%">Judul buku</th>
                            <th>Jenis Buku</th>
                            <th>Media</th>
                            <th>Banyak Buku</th>
                            </tr>
                        </thead>
                        <tbody>
        <?php
        $no_buku = 1; 
        if($result_buku->num_rows == 0){
            echo '<tr>
                <td colspan="8">
                    <div align="center">
                        Tidak ada Data
                    </div>
                </td>
            </tr>';
        }
        else{
            while($data_buku = mysqli_fetch_assoc($result_buku)){
                        echo '<tr>
                            <td>'.$no_buku.'</td>
                            <td><b>'.tanggal_indo(''.$data_buku['tgl_entri_buku'].'').'</b></td>
                            <td><img class="img-rounded" src="img/book/'.$data_buku['gambar_buku'].'" alt="" width="40" height="60"></td>
                            <td>'.$data_buku['judul_buku'].'</td>
                            <td>'.$data_buku['subyek'].'</td>
                            <td>'.$data_buku['jenis_media'].'</td>
                            <td><b><div align="center">';
                $query_banyak = "SELECT id_detail_buku 
                                FROM detail_buku WHERE id_buku LIKE '$data_buku[id_buku]'";
                $result_banyak = mysqli_query($con, $query_banyak);
                $banyakdata_banyak = $result_banyak->num_rows;
                                echo $banyakdata_banyak.'
                                </div></b>
                            </td>
                        </tr>';
                        $no_buku++;
                    }
        }
        ?>
                        <tfoot>
                            <tf>
                                <td colspan="7">
                                
                                </td>
                            </tf>
                        </tfoot>  
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
    </div>
    </body> 
  <?php include('script/footer_script.php') ?>
</html>
