<?php $page="BUKU" ?>
<!DOCTYPE html>
<html lang="en">
  <?php include('script/head_script.php') ?>
  <body class="layout layout-header-fixed layout-left-sidebar-fixed">
    <?php include('menu/header.php') ?>
    <div class="site-main">
      <?php include('menu/sidebar.php') ?>
      <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <h3 class="m-t-0 m-b-5">BUKU</h3>
          </div>
          <div class="panel-body">
          <div class="col-sm-6">
                <form class="form-horizontal" method="get" action="?">
                  <div class="form-group">
                    <div class="col-sm-8">
                      <div class="input-group">    
                <?php
                  if (isset($_GET['cari'])) {
                    $cari = ($_GET["cari"]);  
                    echo '<input type="text" name="cari" class="form-control" value="'.$cari.'" placeholder="Pencarian....">';
                  }else{
                    echo '<input type="text" name="cari" class="form-control" placeholder="Pencarian....">';
                  }
                ?>
                        <span class="input-group-btn">
                <?php
                  if (isset($_GET['cari'])) {
                    echo '<a href="buku.php">
                      <button class="btn btn-default" type="button">
                        Reset
                      </button>
                    </a>';
                  }else{
                    echo '<button class="btn btn-default" type="submit">
                      <i class="zmdi zmdi-search"></i>
                    </button>';
                  }
                ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-sm-6">  
                <div align="right">
                  <a href="tambah_buku.php">
                    <button type="button" class="btn btn-primary">
                      <i class="zmdi zmdi-account-add"></i> Tambah Buku
                    </button>
                  </a>
                </div>
              </div>
            </div>
            <br>
            <div class="table-responsive">
<?php

  if (isset($_GET['cari'])) {
    $cari = ($_GET["cari"]);  
  $query_buku = "SELECT a.id_buku, a.judul_buku, a.id_jenis_buku, b.subyek, a.jenis_media,
                  a.bahasa FROM buku AS a INNER JOIN jenis_buku AS b WHERE a.id_jenis_buku = b.id_jenis_buku
                  AND a.judul_buku LIKE '%$cari%'" ;
  }else{
  $query_buku = "SELECT a.id_buku, a.judul_buku, a.id_jenis_buku, b.subyek, a.jenis_media,
                  a.bahasa FROM buku AS a INNER JOIN jenis_buku AS b WHERE a.id_jenis_buku = b.id_jenis_buku" ;
  }
  $result_buku = mysqli_query($con, $query_buku);
?>
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul buku</th>
                    <th>Jenis Buku</th>
                    <th>Media</th>
                    <th>Bahasa</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
<?php
  $no_buku = 1; 
  while($data_buku = mysqli_fetch_assoc($result_buku)){
                  echo '<tr>
                    <td>'.$no_buku.'</td>
                    <td>'.$data_buku['judul_buku'].'</td>
                    <td>'.$data_buku['subyek'].'</td>
                    <td>'.$data_buku['jenis_media'].'</td>
                    <td>'.$data_buku['bahasa'].'</td>
                    <td align="right">
                      <a href="detail_buku.php?id_buku='.$data_buku['id_buku'].'">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-eye"></i> Detail
                        </button>
                      </a>
                      <a href="ubah_buku.php?id_buku='.$data_buku['id_buku'].'">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-edit"></i> Ubah
                        </button>
                      </a>
                      <button onclick="hapus('.$data_buku['id_buku'].')" type="button" class="btn btn-danger">
                        <i class="zmdi zmdi-delete"></i> Hapus
                      </button>
                    </td>
                  </tr>';
                  $no_buku++;
                }
?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php include('menu/footer.php') ?>
    </div>
  </body>
  <?php include('script/footer_script.php') ?>
  <script type="text/javascript">
    function hapus(id) {
      swal({
        title: 'Apakah anda yakin?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya!, Hapus Buku'
        }).then(function () {
            document.location="system/hapus_buku.php?id="+id;
      })
    }
  </script>
</html>
