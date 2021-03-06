<?php $page="SISWA" ?>
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
                <div class="wi-title m-b-30">DATA SISWA</div>
                <div class="wi-text"><h4>KATALOG PERPUSTAKAAN SMK PGRI 3 SKARIGA</h4></div>
                <div class="wi-stat">
                  <span class="m-r-10">
                    <i class="zmdi zmdi-account"></i>
                    <?php
                      $banyaksiswa= "SELECT NIS FROM siswa";
                      $prosessiswa= mysqli_query($con, $banyaksiswa);
                    ?>
                  </span>
                  Total Siswa : <b><?php echo mysqli_num_rows($prosessiswa) ?>  </b>
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
                              <div class="col-sm-3">
                                <input id="noNIS" onkeyup="noInduk()" placeholder="NIS" class="form-control input-pill" type="text">
                              </div>
                              <div class="col-sm-7">
                                <input id="namaSiswa" onkeyup="nama()" placeholder="Nama Siswa" class="form-control input-pill" type="text">
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="col-sm-4" align="center">
                          <a href="tambah_siswa.php">
                            <button type="button" class="btn btn-primary">
                              <i class="zmdi zmdi-account-add"></i> Tambah Data Siswa
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
          <div class="table-responsive">
<?php
  $query_user = "SELECT NIS, foto_siswa, nama_siswa, kelas, tgl_entri_siswa FROM siswa";
  $result_user = mysqli_query($con, $query_user);
?>
              <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th></th>
                    <th>NIS</th>
                    <th>Nama Pegawai</th>
                    <th>Kelas</th>
                    <th>Tanggal Terdaftar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
<?php
  if($result_user->num_rows == 0){
    echo '<tr>
        <td colspan="11">
            <div align="center">
                Tidak ada Data
            </div>
        </td>
    </tr>';

  }
  else{
    $no_user = 1;
    while($data_user = mysqli_fetch_assoc($result_user)){
      $data_NIS = (int) substr($data_user['NIS'], 0, 5);
                  echo '<tr>
                      <td>'.$no_user.'</td>
                      <td><img class="img-circle" src="img/avatars/'.$data_user['foto_siswa'].'" alt="" width="50" height="50"></td>
                      <td>'.$data_user['NIS'].'</td>
                      <td>'.$data_user['nama_siswa'].'</td>
                      <td>'.$data_user['kelas'].'</td>
                      <td>'.tanggal_indo(''.$data_user['tgl_entri_siswa'].'').'</td>
                      <td align="center">
                        <a href="detail_siswa.php?no_induk='.$data_user['NIS'].'">
                          <button type="button" class="btn btn-primary">
                            <i class="zmdi zmdi-eye"></i> Detail
                          </button>
                        </a>
                        <button onclick="hapus('.$data_NIS.')" type="button" class="btn btn-danger">
                          <i class="zmdi zmdi-delete"></i> Hapus
                        </button>
                      </td>
                    </tr>';
                    $no_user++;
                  }
                }
  ?>
                </tbody>
              </table> 
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
      confirmButtonText: 'Iya!, Hapus Data'
      }).then(function () {
          document.location="system/hapus_siswa.php?NIS="+id;
    })
  }
  function noInduk() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("noNIS");
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
    function nama() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("namaSiswa");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
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
                text: "Siswa Telah Dihapus.",
                type: "success",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "tambah"){
              echo 'swal({
                title: "Tertambah!",
                text: "Siswa Telah Ditambah.",
                type: "success",
                showConfirmButton: true,
              })';
          }
      }
  ?>
  </script>
</html>
