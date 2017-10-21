<?php $page="USER" ?>
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
                <div class="wi-title m-b-30">DATA USER</div>
                <div class="wi-text"><h4>KATALOG PERPUSTAKAAN SMK PGRI 3 SKARIGA</h4></div>
                <div class="wi-stat">
                  <span class="m-r-10">
                    <i class="zmdi zmdi-account"></i>
                    <?php
                      $banyakuser= "SELECT id_user FROM user";
                      $prosesuser= mysqli_query($con, $banyakuser);
                    ?>
                  </span>
                  Total User : <b><?php echo mysqli_num_rows($prosesuser) ?>  </b>
                </div>
                <div class="wi-text">
                  <div class="row">
                    <div class="col-sm-12">
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
                  <th></th>
                  <th>Nama</th>
                  <th></th>
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
    $query_siswa = "SELECT NIS FROM siswa WHERE NIS = '$data[id_siswa_pegawai]'";
    $result_siswa = mysqli_query($con, $query_siswa);  
                echo '<tr>
                  <td>'.$no.'</td>
                  <td>';
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
                  
                  <td>';
                  if($result_siswa->num_rows == 1){                                      
                    $query_nama_siswa = "SELECT NIS, nama_siswa FROM siswa WHERE NIS = '$data[id_siswa_pegawai]'";
                    $result_nama_siswa = mysqli_query($con, $query_nama_siswa);
                    $data_nama_siswa = mysqli_fetch_assoc($result_nama_siswa);
                      echo $data_nama_siswa['nama_siswa'];
                      echo '<td>
                      <a href="detail_siswa.php?no_induk='.$data_nama_siswa['NIS'].'">
                        <i class="zmdi zmdi-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="Profil Siswa"></i>
                      </a>
                      </td>';
                  }else{
                    $query_nama_pegawai = "SELECT NIP, nama_pegawai FROM pegawai WHERE NIP = '$data[id_siswa_pegawai]'";
                    $result_nama_pegawai = mysqli_query($con, $query_nama_pegawai);
                    $data_nama_pegawai = mysqli_fetch_assoc($result_nama_pegawai);
                        echo $data_nama_pegawai['nama_pegawai'];
                        if($data['id_siswa_pegawai'] == $no_induk_login){
                          echo '<td>
                          <a href="profil.php">
                            <i class="zmdi zmdi-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="Profil"></i>
                          </a>
                          </td>';
                        }else{
                        echo '<td>
                        <a href="detail_pegawai.php?no_induk='.$data_nama_pegawai['NIP'].'">
                          <i class="zmdi zmdi-eye"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Profil Pegawai"></i>
                        </a>
                        </td>';
                        }
                  }
                echo '</td>
                  <td>'.$data['username'].'</td>
                  <td>'.$data['email'].'</td>
                  <td>
                    <div align="center">';
                        if($result_siswa->num_rows == 1){
                            echo '<span class="badge badge-success">Siswa</span>';
                        }else{
                            echo '<span class="badge badge-primary">Pegawai</span>';
                        }
                    echo'</div>
                    </td>
                  <td>
                    <div align="center">';
                    if($data['role'] == "Admin"){
                      echo '<span class="label label-outline-info">Admin</span>';
                    }else{
                      echo '<span class="label label-outline-success">User</span>';
                    }
                    echo '</div>
                  </td>
                  <td>
                    <div align="center">';
                    $query_siswa = "SELECT NIS FROM SISWA WHERE NIS = '$data[id_siswa_pegawai]'";
                    $result_siswa = mysqli_query($con, $query_siswa);
                        if($result_siswa->num_rows == 1){
                          echo '<span class="badge badge-danger">Bukan Pegawai</span>';
                        }else{
                            if($data['id_siswa_pegawai'] == $no_induk_login){
                                echo '<button onclick="role('.$data['id_siswa_pegawai'].')" type="button" class="btn btn-warning" disabled>
                                  <i class="zmdi zmdi-long-arrow-down"></i> Deactive
                                </button>';
                            }
                            else{
                              if($data['role'] == "Admin"){
                                echo '<button onclick="deactive('.$data['id_user'].')" type="button" class="btn btn-warning">
                                  <i class="zmdi zmdi-long-arrow-down"></i> Deactive
                                </button>';
                              }
                              else{
                                echo '<button onclick="active('.$data['id_user'].')" type="button" class="btn btn-warning">
                                  <i class="zmdi zmdi-long-arrow-up"></i> Active
                                </button>';
                              }
                            }
                        } 
                    echo '</div>
                    </td>
                  <td>
                    <div align="center">';
                  if($data['verifikasi'] == "Sudah"){
                      echo '<i class="zmdi zmdi-check-circle zmdi-hc-fw" style="color:#1d87e4"></i>';
                  }else{
                      echo '<i class="zmdi zmdi-close-circle zmdi-hc-fw" style="color:#faa800"></i>';
                  }
                    echo '</div>
                  </td>
                  <td>';
                  if($data['id_siswa_pegawai'] == $no_induk_login){
                    echo '<button onclick="reset('.$data['id_user'].')" type="button" class="btn btn-warning" disabled>
                      <i class="zmdi zmdi-alert-triangle"></i>
                    </button>';
                  }else{
                    echo '<button onclick="reset('.$data['id_user'].')" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Reset Akun User">
                      <i class="zmdi zmdi-alert-triangle"></i>
                    </button>';
                  }
                  echo '</td>
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
  
    function reset(id) {
      swal({
        title: 'Konfirmasi?',
        text : 'Anda yain mereset user tersebut menjadi Default ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya!'
        }).then(function () {
            document.location="system/proses_reset_user.php?id="+id;
      })
    }

    function active(id) {
      swal({
        title: 'Konfirmasi?',
        text : 'Anda yain merubah role user tersebut menjadi Admin ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya!'
        }).then(function () {
            document.location="system/proses_active_role.php?id="+id;
      })
    }
    
    function deactive(id) {
      swal({
        title: 'Konfirmasi?',
        text : 'Anda yain merubah role user tersebut menjadi User ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya!'
        }).then(function () {
            document.location="system/proses_deactive_role.php?id="+id;
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
