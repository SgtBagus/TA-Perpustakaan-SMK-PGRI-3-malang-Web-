<?php $page="LAPORAN DATA BUKU"; ?>
<!DOCTYPE html>
<html lang="en">
  <?php include('script/head_script.php') ?>
  <body class="layout layout-header-fixed">
    <div class="panel panel-default panel-table">
         <?php include('menu/header_report.php') ?>
         <?php
         
  $query_buku = "SELECT a.*, b.* 
  FROM buku AS a INNER JOIN jenis_buku AS b WHERE a.id_jenis_buku = b.id_jenis_buku 
  GROUP BY a.judul_buku ORDER BY a.id_buku  DESC" ;
  $result_buku = mysqli_query($con, $query_buku);
  
  $banyak_buku = $result_buku->num_rows;
         ?>
        <div class="panel-body">
          <div align="center">
            <h3>Laporan Semua Buku</h3>
          </div>
          <h4>
          <table width="50%">
            <tr>
                <td width="50%">
                    Pencetak
                </td>
                <td>
                    :
                </td>
                <td>
                    <?php echo $username_login ?>
                </td>
            </tr>
            <tr>
                <td width="50%">
                    Tanggal Pencetakan 
                </td>
                <td>
                    :
                </td>
                <td>
                    <?php echo tanggal_indo(date('Y-m-d'))?>
                </td>
            </tr>
            <tr>
                <td width="50%">
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
            Buku Tersebut Terdiri Dari
        </div>
        </h4>
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th></th>
                  <th>Judul buku</th>
                  <th>Jenis Buku</th>
                  <th>Media</th>
                  <th>Bahasa</th>
                  <th>Total Buku</th>
                </tr>
              </thead>
              <tbody>
<?php
  $no_buku = 1; 
  while($data_buku = mysqli_fetch_assoc($result_buku)){
                echo '<tr>
                  <td>'.$no_buku.'</td>
                  <td><img class="img-rounded" src="img/book/'.$data_buku['gambar_buku'].'" alt="" width="40" height="60"></td>
                  <td>'.$data_buku['judul_buku'].'</td>
                  <td>'.$data_buku['subyek'].'</td>
                  <td>'.$data_buku['jenis_media'].'</td>
                  <td>'.$data_buku['bahasa'].'</td>
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
?>
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
    </body>  
  <?php include('script/footer_script.php') ?>
</html>
