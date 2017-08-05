<?php $page="SISWA" ?>
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
            <h3 class="m-t-0 m-b-5">Tabel Data Siswa SMK PGRI 3</h3>
          </div>
          <div class="panel-body">
            <div align="right">
              <a href="tambah_siswa.php">
                <button type="button" class="btn btn-primary">
                  <i class="zmdi zmdi-account-add"></i> Tambah Data Siswa
                </button>
              </a>
            </div>
            <br>
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="dataTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Perwalian</th>
                    <th>Varifikasi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>17154/1595.063</td>
                    <td>Bagus Andika</td>
                    <td>12</td>
                    <td>RPL</td>
                    <td>Dwi Ayu Noventi Kartika Sari, S. Pd</td>
                    <td>Belum Tervarifikasi</td>
                    <td>
                      <a href="detail_siswa.php">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-eye"></i> Detail
                        </button>
                      </a>
                      <a href="proses/hapus_siswa.php">
                        <button type="button" class="btn btn-danger">
                          <i class="zmdi zmdi-delete"></i> Hapus
                        </button>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>17154/1595.067</td>
                    <td>Santoso Ahmat</td>
                    <td>10</td>
                    <td>RPL</td>
                    <td>Siska Farizah Mauludiah, S. Kom</td>
                    <td>Tervarifikasi</td>
                    <td>
                      <a href="detail_siswa.php">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-eye"></i> Detail
                        </button>
                      </a>
                      <a href="proses/hapus_siswa.php">
                        <button type="button" class="btn btn-danger">
                          <i class="zmdi zmdi-delete"></i> Hapus
                        </button>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>17184/1525.057</td>
                    <td>Koirul Mamat</td>
                    <td>10</td>
                    <td>TKJ</td>
                    <td>Dwi Ayu Noventi Kartika Sari, S. Pd</td>
                    <td>Belum Tervarifikasi</td>
                    <td>
                      <a href="detail_siswa.php">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-eye"></i> Detail
                        </button>
                      </a>
                      <a href="proses/hapus_siswa.php">
                        <button type="button" class="btn btn-danger">
                          <i class="zmdi zmdi-delete"></i> Hapus
                        </button>
                      </a>
                    </td>
                  </tr>
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
  <script src="asstes/js/tables-datatables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#dataTable').DataTable({
      "language": {
        "lengthMenu"  : "Tampilkan _MENU_ Siswa Perhalaman",
        "zeroRecords" : "Data Siswa Tidak Ditemukan",
        "info"        : "Data Siswa Sebanyak _TOTAL_ Dengan Halaman _START_ sampai _END_",
        "infoEmpty"   : "Data Siswa Tidak Ada",
        "infoFiltered": "(Pencarian dari _MAX_ Total Data)",
        "search"      : "Pencarian : ",
        "paginate"    : {
                        "next"      : "Selanjutnya",
                        "previous"  : "Sebelumnya"
        }
      }
    });
  });
  </script>
</html>
