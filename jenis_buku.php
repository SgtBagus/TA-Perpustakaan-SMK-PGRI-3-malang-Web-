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
              <a href="tambah_jenis_buku.php">
                <button type="button" class="btn btn-primary">
                  <i class="zmdi zmdi-plus-circle"></i> Tambah Data Jenis Buku
                </button>
              </a>
            </div>
            <br>
            <div class="table-responsive">
<?php
  $query_jenis_buku = "SELECT * FROM jenis_buku" ;
  $result_jenis_buku = mysqli_query($con, $query_jenis_buku);
?>
              <table class="table table-striped table-bordered dataTable" id="dataTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Dewery</th>
                    <th>Subyek</th>
                    <th width="500px">Dekripsi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
<?php
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
                          <i class="zmdi zmdi-edit"></i> Edit
                        </button>
                      </a>
                      <a href="system/hapus_jenis_buku.php?id='.$data_jenis_buku['id_jenis_buku'].'"
                      onclick="return confirm(\'Anda Yakin Ingin Menghapus Data ?\')">
                        <button type="button" class="btn btn-danger">
                          <i class="zmdi zmdi-delete"></i> Hapus
                        </button>
                      </a>
                    </td>
                  </tr>';
                  $no_jenis_buku++;
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
  <script src="asstes/js/tables-datatables.min.js"></script>
  <script type="text/javascript" charset="utf-8">
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
