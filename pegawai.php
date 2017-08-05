<?php $page="PEGAWAI" ?>
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
            <h3 class="m-t-0 m-b-5">Tabel Data PEGAWAI SMK PGRI 3</h3>
          </div>
          <div class="panel-body">
            <div align="right">
              <a href="tambah_siswa.php">
                <button type="button" class="btn btn-primary">
                  <i class="zmdi zmdi-account-add"></i> Tambah Data Pegawai
                </button>
              </a>
            </div>
            <br>
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="dataTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
                    <th>Perwalian Kelas</th>
                    <th>Jabatan</th>
                    <th>Varifikasi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>17154/1595.063</td>
                    <td>Dwi Ayu Noventi Kartika Sari, S. Pd</td>
                    <td>X - RPL</td>
                    <td>Guru Pengajar</td>
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
                    <td>Siska Farizah Mauludiah, S. Kom</td>
                    <td>XII - RPL</td>
                    <td>Kepala Bengkel TIK</td>
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
                    <td>Admin</td>
                    <td>-</td>
                    <td>Pustakawan</td>
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
        "lengthMenu"  : "Tampilkan _MENU_ Pegawai Perhalaman",
        "zeroRecords" : "Data Pegawai Tidak Ditemukan",
        "info"        : "Data Pegawai Sebanyak _TOTAL_ Dengan Halaman <b>_START_</b> sampai <b>_END_</b>",
        "infoEmpty"   : "Data Pegawai Tidak Ada",
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
