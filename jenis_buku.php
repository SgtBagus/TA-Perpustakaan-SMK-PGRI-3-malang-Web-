<?php $page="JENIS BUKU" ?>
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
            <h3 class="m-t-0 m-b-5">Tabel Data Jenis Buku</h3>
          </div>
          <div class="panel-body">
            <div align="right">
              <a href="tambah_siswa.php">
                <button type="button" class="btn btn-primary">
                  <i class="zmdi zmdi-plus-circle"></i> Tambah Data Jenis Buku
                </button>
              </a>
            </div>
            <br>
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="dataTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Dewery</th>
                    <th>Subyek</th>
                    <th>Dekripsi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>000</td>
                    <td>Komputer</td>
                    <td>
                      Buku dengan Jenis Komputer ini diperlukan pengguna bidang TI
                    </td>
                    <td align="right">
                      <a href="edit_jenis_buku.php">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-edit"></i> Edit
                        </button>
                      </a>
                      <a href="proses/hapus_jenis_buku.php">
                        <button type="button" class="btn btn-danger">
                          <i class="zmdi zmdi-delete"></i> Hapus
                        </button>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>100</td>
                    <td>Pisologi</td>
                    <td>-</td>
                    <td align="right">
                      <a href="edit_jenis_buku.php">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-edit"></i> Edit
                        </button>
                      </a>
                      <a href="proses/hapus_jenis_buku.php">
                        <button type="button" class="btn btn-danger">
                          <i class="zmdi zmdi-delete"></i> Hapus
                        </button>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>400</td>
                    <td>Bahasa</td>
                    <td>Buku ini sangat diperlukan untuk mengenal beberapa bahasa yg ada didunia</td>
                    <td align="right">
                      <a href="edit_jenis_buku.php">
                        <button type="button" class="btn btn-primary">
                          <i class="zmdi zmdi-edit"></i> Edit
                        </button>
                      </a>
                      <a href="proses/hapus_jenis_buku.php">
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
        "lengthMenu"  : "Tampilkan _MENU_ Data Jenis Buku Perhalaman",
        "zeroRecords" : "Data Jenis Buku Tidak Ditemukan",
        "info"        : "Data Jenis Buku Sebanyak _TOTAL_ Dengan Halaman <b>_START_</b> sampai <b>_END_</b>",
        "infoEmpty"   : "Data Jenis Buku Tidak Ada",
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
