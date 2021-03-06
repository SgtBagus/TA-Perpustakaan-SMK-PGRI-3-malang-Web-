<?php $page="PEGAWAI" ?>
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
                <div class="wi-title m-b-30">DATA PEGAWAI</div>
                <div class="wi-text"><h4>KATALOG PERPUSTAKAAN SMK PGRI 3 SKARIGA</h4></div>
                <div class="wi-stat">
                  <span class="m-r-10">
                    <i class="zmdi zmdi-account"></i>
                    <?php
                      $banyakpegawai= "SELECT NIP FROM pegawai";
                      $prosespegawai= mysqli_query($con, $banyakpegawai);
                    ?>
                  </span>
                  Total Pegawai : <b><?php echo mysqli_num_rows($prosespegawai) ?>  </b>
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
                                <input id="noNIS" onkeyup="noInduk()" placeholder="NIP" class="form-control input-pill" type="text">
                              </div>
                              <div class="col-sm-7">
                                <input id="namaSiswa" onkeyup="nama()" placeholder="Nama Pegawai" class="form-control input-pill" type="text">
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="col-sm-4" align="center">
                          <a href="tambah_pegawai.php">
                            <button type="button" class="btn btn-primary">
                              <i class="zmdi zmdi-account-add"></i> Tambah Data Pegawai
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
  $query_pegawai = "SELECT NIP, foto_pegawai, nama_pegawai, jabatan_pegawai, tgl_entri_pegawai
                    FROM pegawai";
  $result_pegawai = mysqli_query($con, $query_pegawai);
?>
              <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th></th>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
                    <th>Jabatan</th>
                    <th>Tanggal Terdaftar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
<?php
  if($result_pegawai->num_rows == 0){
    echo '<tr>
        <td colspan="11">
            <div align="center">
                Tidak ada Data
            </div>
        </td>
    </tr>';

  }
  else{
  $no_pegawai = 1;
  while($data_pegawai = mysqli_fetch_assoc($result_pegawai)){
    $data_id = (int) substr($data_pegawai['NIP'], 0, 5);
                  echo '<tr>
                    <td>'.$no_pegawai.'</td>
                    <td><img class="img-circle" src="img/avatars/'.$data_pegawai['foto_pegawai'].'" alt="" width="50" height="50"></td>
                    <td>'.$data_pegawai['NIP'].'</td>
                    <td>'.$data_pegawai['nama_pegawai'].'</td>
                    <td>'.$data_pegawai['jabatan_pegawai'].'</td>
                    <td>'.tanggal_indo(''.$data_pegawai['tgl_entri_pegawai'].'').'</td>
                    <td align="center">';
  if($no_induk_login == $data_pegawai['NIP']){
                      echo '<a href="Profil.php">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-account"></i> Profil
                        </button>
                      </a>';
  }
  else{
                      echo '<a href="detail_pegawai.php?no_induk='.$data_pegawai['NIP'].'">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-eye"></i> Detail
                        </button>
                      </a>
                      <button onclick="hapus('.$data_id.')" type="button" class="btn btn-danger">
                        <i class="zmdi zmdi-delete"></i> Hapus
                      </button>';
  }
                    echo '</td>
                  </tr>';
                  $no_pegawai++;
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
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya!, Hapus Data'
      }).then(function () {
          document.location="system/hapus_pegawai.php?NIP="+id;
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
                text: "Pegawai Telah Dihapus.",
                type: "success",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "tambah"){
              echo 'swal({
                title: "Tertambah!",
                text: "Pegawai Telah Ditambah.",
                type: "success",
                showConfirmButton: true,
              })';
          }
      }
  ?>
  </script>
</html>
