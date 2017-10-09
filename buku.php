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
            <div class="row">
              <div class="col-sm-9">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-2">
                      Pencarian
                    </label>
                    <div class="col-sm-7">
                      <input id="judulBuku" onkeyup="buku()" placeholder="Judul Buku" class="form-control input-pill" type="text">
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-sm-3">
                <div align="right">
                  <a href="tambah_buku.php">
                    <button type="button" class="btn btn-primary">
                      <i class="zmdi zmdi-plus-circle"></i> Buku
                    </button>
                  </a>
                </div>
              </div>
            </div>
            <br>
          <div class="table-responsive">
<?php
  $query_buku = "SELECT a.*, b.* 
                  FROM buku AS a INNER JOIN jenis_buku AS b WHERE a.id_jenis_buku = b.id_jenis_buku 
                  GROUP BY a.judul_buku ORDER BY a.id_buku  DESC" ;
  $result_buku = mysqli_query($con, $query_buku);
?>
            <table class="table" id="myTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th></th>
                  <th>Judul buku</th>
                  <th>Jenis Buku</th>
                  <th>Media</th>
                  <th>Bahasa</th>
                  <th>Total Buku</th>
                  <th></th>
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
                  <td> 
                    <a href="detail_buku.php?ISBN='.$data_buku['ISBN'].'">
                      <button type="button" class="btn btn-primary">
                        <i class="zmdi zmdi-eye"></i> Detail
                      </button>
                    </a>
                    <a href="ubah_buku.php?ISBN='.$data_buku['ISBN'].'">
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
  <?php
      if (isset($_GET['aksi'])) {
          $aksi = ($_GET["aksi"]);
          if($aksi == "hapus"){
              echo 'swal({
                title: "Terhapus!",
                text: "Buku telah dihapus.",
                type: "success",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "tambah"){
              echo 'swal({
                title: "Tertambah!",
                text: "Buku telah ditambah.",
                type: "success",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "detail_hapus"){
              echo 'swal({
                title: "Terhapus!",
                text: "Data buku telah Dihapus.",
                type: "success",
                showConfirmButton: true,
              })';
          }
      }
  ?>
  </script>
</html>
