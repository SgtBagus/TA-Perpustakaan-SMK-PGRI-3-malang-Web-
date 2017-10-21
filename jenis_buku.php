<?php $page="JENIS BUKU" ?>
<!DOCTYPE html>
<html lang="en">
  <?php include('script/head_script.php') ?>
  <body class="layout layout-header-fixed layout-left-sidebar-fixed">
    <?php include('menu/header.php') ?>
    <div class="site-main">
      <?php include('menu/sidebar.php') ?>
      <div class="site-content">
        <div class="row">
          <div class="col-sm-12">
            <div class="widget-infoblock wi-small m-b-30" style="background-image: url(img/photos/2.jpg)">
              <div class="wi-bg">
              </div>
              <div class="wi-content-bottom p-a-30">
                <div class="wi-title m-b-30">DATA JENIS BUKU</div>
                <div class="wi-text"><h4>KATALOG PERPUSTAKAAN SMK PGRI 3 SKARIGA</h4></div>
                <div class="wi-stat">
                  <span class="m-r-10">
                    <i class="zmdi zmdi-account"></i>
                    <?php
                      $banyakjb= "SELECT id_jenis_buku FROM jenis_buku";
                      $prosesjb= mysqli_query($con, $banyakjb);
                    ?>
                  </span>
                  Total Jenis Buku : <b><?php echo mysqli_num_rows($prosesjb) ?>  </b>
                </div>
                <div class="wi-text">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-sm-8">
                          <form class="form-horizontal">
                            <div class="form-group">
                              <label class="col-sm-2 control-label" for="form-control-2">
                                Pencarian
                              </label>
                              <div class="col-sm-10">
                                <input id="namaSubyek" onkeyup="subyek()" placeholder="Subyek" class="form-control input-pill" type="text">
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="col-sm-4" align="center">
                          <a href="tambah_jenis_buku.php">
                            <button type="button" class="btn btn-primary">
                              <i class="zmdi zmdi-plus-circle"></i> Tambah Jenis Buku
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
        <div class="panel panel-default panel-table">
          <div class="panel-body">
            <div class="table-responsive">
<?php
    $query_jenis_buku = "SELECT * FROM jenis_buku"; 
  $result_jenis_buku = mysqli_query($con, $query_jenis_buku);
?>
              <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th>No</th> 
                    <th>Dewery</th>
                    <th>Subyek</th>
                    <th width="40%">Dekripsi</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
<?php

            if($result_jenis_buku->num_rows == 0){
              echo '<tr>
                <td colspan="5" align="center">Tidak Ada Data</td>
              </tr>';
            }
            else{
  $no_jenis_buku = 1;
  while($data_jenis_buku = mysqli_fetch_assoc($result_jenis_buku)){
                  echo '<tr>
                    <td>'.$no_jenis_buku.'</td>
                    <td>'.$data_jenis_buku['no_dewery'].'</td>
                    <td>'.$data_jenis_buku['subyek'].'</td>
                    <td>
                      '.$data_jenis_buku['deskripsi_jenis_buku'].'
                    </td>
                    <td align="right">
                      <a href="ubah_jenis_buku.php?no_dewery='.$data_jenis_buku['no_dewery'].'">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-edit"></i> Ubah
                        </button>
                      </a>
                      <button onclick="hapus('.$data_jenis_buku['id_jenis_buku'].')" type="button" class="btn btn-danger">
                        <i class="zmdi zmdi-delete"></i> Hapus
                      </button>   
                    </td>
                  </tr>';
                  $no_jenis_buku++;
  }
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
      text: "Data buku yang memiliki jenis buku yang sama akan Terhapus",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
      }).then(function () {
          document.location="system/hapus_jenis_buku.php?id="+id;
    })
  }
  function subyek() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("namaSubyek");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
  <?php
      if (isset($_GET['aksi'])) {
          $aksi = ($_GET["aksi"]);
          if($aksi == "hapus"){
              echo 'swal({
                title: "Terhapus!",
                text: "Jenis buku telah dihapus.",
                type: "success",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "tambah"){
              echo 'swal({
                title: "Tertambah!",
                text: "Jenis buku telah ditambah.",
                type: "success",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "ubah"){
              echo 'swal({
                title: "Terubah!",
                text: "Jenis buku telah diubah.",
                type: "success",
                showConfirmButton: true,
              })';
          }
      }
  ?>
  </script>
</html>
