<?php $page="SANKSI" ?>
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
            <div class="widget-infoblock wi-small m-b-30" style="background-image: url(img/photos/5.jpg)">
              <div class="wi-bg">
              </div>
              <div class="wi-content-bottom p-a-30">
                <div class="wi-title m-b-30">DATA SANKSI</div>
                <div class="wi-text"><h4>KATALOG PERPUSTAKAAN SMK PGRI 3 SKARIGA</h4></div>
                <div class="wi-stat">
                  <span class="m-r-10">
                    <i class="zmdi zmdi-info"></i>
                    <?php
                      $banyaksanksi= "SELECT id_sanksi FROM sanksi";
                      $prosessanksi= mysqli_query($con, $banyaksanksi);
                    ?>
                  </span> 
                  Total Buku : <b><?php echo mysqli_num_rows($prosessanksi) ?>  </b>
                </div>
                <div class="wi-text">
                  <div class="row">
                    <div class="col-sm-8">
                      <form class="form-horizontal">
                        <div class="form-group">
                          <label class="col-sm-2 control-label" for="form-control-2">
                            Pencarian
                          </label>
                          <div class="col-sm-10">
                            <input id="judulBuku" onkeyup="buku()" placeholder="Username" class="form-control input-pill" type="text">
                          </div>
                        </div>
                      </form>
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
  $query = "SELECT a.id_peminjaman, b.username, b.id_siswa_pegawai, c.id_sanksi, c.sanksi, 
            c.catatan_sanksi, c.status_sanksi FROM peminjaman 
            AS a INNER JOIN user AS b INNER JOIN sanksi AS c WHERE a.id_user = b.id_user AND c.id_user = a.id_user";
  $result = mysqli_query($con, $query);
?>
              <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th colspan="3" width="100px">Username</th>
                    <th>Sanksi</th>
                    <th width="300px">Catatan</th>
                    <th colspan="2">Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
  if($result->num_rows == 0){
    echo '<tr>
        <td colspan="9">
            <div align="center">
                Tidak ada Data
            </div>
        </td>
    </tr>';

  }
  else{
    $no = 1;
    while($data = mysqli_fetch_assoc($result)){
                    echo '
                    <tr>
                        <td>'.$no.'</td>
                        <td>';
        $query_siswa = "SELECT NIS FROM SISWA WHERE NIS = '$data[id_siswa_pegawai]'";
        $result_siswa = mysqli_query($con, $query_siswa);
                        if($result_siswa->num_rows == 1){
                        $query_foto_siswa = "SELECT foto_siswa FROM siswa WHERE NIS = '$data[id_siswa_pegawai]'";
                        $result_foto_siswa = mysqli_query($con, $query_foto_siswa);
                        $data_foto_siswa = mysqli_fetch_assoc($result_foto_siswa);
                            echo '<img class="img-circle" src="img/avatars/'.$data_foto_siswa['foto_siswa'].'" alt="" width="50" height="50">';
                        }else{  
                        $query_foto_pegawai = "SELECT foto_pegawai FROM pegawai WHERE NIP = '$data[id_siswa_pegawai]'";
                        $result_foto_pegawai = mysqli_query($con, $query_foto_pegawai);
                        $data_foto_pegawai = mysqli_fetch_assoc($result_foto_pegawai);
                            echo '<img class="img-circle" src="img/avatars/'.$data_foto_pegawai['foto_pegawai'].'" alt="" width="50" height="50">';
                        }
                        echo '</td>
                        <td>'.$data['username'].'</td>
                        <td>';
                            if($result_siswa->num_rows == 1){
                                    echo '
                            <a href="detail_siswa.php?no_induk='.$data['id_siswa_pegawai'].'">
                                <i class="zmdi zmdi-eye"></i>
                            </a>';
                                }else{
                                    echo '
                            <a href="detail_pegawai.php?no_induk='.$data['id_siswa_pegawai'].'">
                                <i class="zmdi zmdi-eye"></i>
                            </a>';
                        }
                        echo'</td>
                        <td>'.$data['sanksi'].'</td>
                        <td>'.$data['catatan_sanksi'].'</td>';
                            if($data['status_sanksi'] == "Belum Lunas"){
                                echo '<div align="center">
                                    <td><span class="label label-warning label-pill m-w-60">Belum Lunas</span></td>
                                    <td>
                                        <button onclick="terima('.$data['id_sanksi'].')" type="button" class="btn btn-primary">
                                            <i class="zmdi zmdi-check"></i>
                                        </button>
                                    </td>
                                </div>';
                            } 
                            else if ($data['status_sanksi'] == "Lunas"){
                                echo '<div align="center">
                                    <td colspan="2">
                                        <span class="label label-primary label-pill m-w-60">Terlunasi</span>
                                    </td>
                                </div>';
                            }
                        echo '<td align="right">
                            <a href="detail_peminjaman.php?id_peminjaman='.$data['id_peminjaman'].'">
                                <button type="button" class="btn btn-primary">
                                    <i class="zmdi zmdi-eye"></i>
                                </button>
                            </a>
                            <a href="ubah_sanksi.php?id_peminjaman='.$data['id_peminjaman'].'">
                                <button type="button" class="btn btn-primary">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                            </a>
                            <a href="report_sanksi.php?id_sanksi='.$data['id_peminjaman'].'" target="_blank">
                              <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cetak Sanksi">
                                <i class="zmdi zmdi-print"></i>
                              </button>
                            </a> 
                        </td>
                        <div>
                    </tr>';
                    $no++;
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
  
  <script>

      function terima(id) {
        swal({
          title: 'Konfirmasi?',
          text : 'Anda yakin menerima pelunasan sanksi ini ?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya!'
          }).then(function () {
              document.location="system/terima_sanksi.php?id="+id;
        })
      }

      function hapus(id) {
        swal({
          title: 'Konfirmasi?',
          text : 'Anda yakin menghapus sanksi ini ?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya!'
          }).then(function () {
              document.location="system/hapus_sanksi.php?id="+id;
        })
      }

      function report_sanksi(){
        $v = "new_sanksi";
        $a = $("body").attr('class');
        new_tap('idn',$v,$a);
        function new_tap($type,$value,$attr) {
            window.open("report_sanksi.php"+"?"+"id_sanksi"+"="+$('.sanksi').val(),"_blank");
        }
    } 
    
      <?php
      if (isset($_GET['aksi'])) {
          $aksi = ($_GET["aksi"]);
          if($aksi == "hapus"){
              echo 'swal({
                title: "Terhapus!",
                text: "sanksi telah dihapus.",
                type: "success",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "tambah"){
              echo 'swal({
                title: "Tertambah!",
                text: "Sanksi telah ditambah.",
                type: "success",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "ubah"){
              echo 'swal({
                title: "Terubah!",
                text: "sanksi telah diubah.",
                type: "success",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "lunas"){
              echo 'swal({
                title: "Terlunasi!",
                text: "sanksi telah dilunasi.",
                type: "success",
                showConfirmButton: true,
              })';
          }
      }
  ?>

function buku() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("judulBuku");
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
    
      </script>
</html>
