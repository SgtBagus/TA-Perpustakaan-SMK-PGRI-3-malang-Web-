<?php $page="USER" ?>
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
            <h3 class="m-t-0 m-b-5">USER</h3>
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
                      <input id="judulBuku" onkeyup="buku()" placeholder="Username" class="form-control input-pill" type="text">
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <br>
          <div class="table-responsive">
<?php
  $query = "SELECT * FROM user" ;
  $result = mysqli_query($con, $query);
?>
            <table class="table" id="myTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Induk</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Jabatan</th>
                  <th>Role</th>
                  <th></th>
                  <th>Varifikasi</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
<?php
  $no = 1; 
  while($data = mysqli_fetch_assoc($result)){
                echo '<tr>
                  <td>'.$no.'</td>
                  <td>'.$data['NIP_NIS'].'</td>
                  <td>'.$data['username'].'</td>
                  <td>'.$data['email'].'</td>
                  <td>';
                    $query_siswa = "SELECT NIS FROM SISWA WHERE NIS = '$data[NIP_NIS]'";
                    $result_siswa = mysqli_query($con, $query_siswa);
                        if($result_siswa->num_rows == 1){
                            echo "Siswa";
                        }else{
                            echo "Pegawai";
                        }
                  echo'</td>
                  <td>'.$data['role'].'</td>
                  <td>';
                    $query_siswa = "SELECT NIS FROM SISWA WHERE NIS = '$data[NIP_NIS]'";
                    $result_siswa = mysqli_query($con, $query_siswa);
                        if($result_siswa->num_rows == 1){
                            echo "Bukan Pegawai";
                        }else{
                            if($data['NIP_NIS'] == $no_induk_login){
                                echo '<button onclick="role('.$data['NIP_NIS'].')" type="button" class="btn btn-warning" disabled>
                                <i class="zmdi zmdi-long-arrow-down"></i> Deactive
                                </button>';
                            }
                            else{
                                echo '<button onclick="role_aktife('.$data['NIP_NIS'].')" type="button" class="btn btn-warning">
                                <i class="zmdi zmdi-long-arrow-up"></i> Active
                                </button>';
                            }
                        }
                  echo '</td>
                  <td>
                    <a href="#">
                      <button type="button" class="btn btn-warning">
                        <i class="zmdi zmdi-alert-triangle"></i> Reset Akun User
                      </button>
                    </a>
                    <button onclick="hapus()" type="button" class="btn btn-danger">
                      <i class="zmdi zmdi-delete"></i> Hapus Akun 
                    </button>
                  </td>
                </tr>';
                $no++;
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
    
    function role_aktife(id) {
      swal({
        title: 'Konfirmasi?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya!'
        }).then(function () {
            document.location="system/proses_aktif_role.php?id="+id;
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
