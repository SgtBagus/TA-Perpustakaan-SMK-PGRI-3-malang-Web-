<?php $page="BUKU"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('script/head_script.php');
        if (isset($_GET['ISBN'])) {
            $ISBN= ($_GET["ISBN"]);
            $query_buku = "SELECT a.*, b.*
                           FROM buku AS a INNER JOIN
                           jenis_buku AS b WHERE a.id_jenis_buku = b.id_jenis_buku
                           AND a.ISBN = '$ISBN'";
            $result_buku = mysqli_query($con, $query_buku);
                if(!$result_buku){
                die ("Query Error: ".mysqli_errno($con).
                    " - ".mysqli_error($con));
                }

            $data_buku          = mysqli_fetch_assoc($result_buku);
            $id_buku            = $data_buku['id_buku'];
            $judul_buku         = $data_buku['judul_buku']; 
            $judul_singkat      = $data_buku['judul_singkat'];
            $gambar_buku        = $data_buku['gambar_buku'];
            $jenis_buku         = $data_buku['subyek'];
            $jenis_media        = $data_buku['jenis_media'];
            $kota_terbit        = $data_buku['kota_terbit'];
            $penerbit           = $data_buku['penerbit'];
            $tahun_terbit       = $data_buku['tahun_terbit'];
            $biografi           = $data_buku['biografi'];
            $jilid              = $data_buku['jilid'];
            $ISBN               = $data_buku['ISBN'];
            $cetakan            = $data_buku['cetakan'];
            $edisi              = $data_buku['edisi'];
            $tanggal_entri      = $data_buku['tgl_entri_buku'];
        }
    ?>
<body class="layout layout-header-fixed layout-left-sidebar-fixed">
    <?php include('menu/header.php') ?>
    <div class="site-main">
        <?php include('menu/sidebar.php') ?>
        <div class="site-content">
            <div class="profile">
                <div class="row gutter-sm">
                    <div class="col-md-12 col-sm-12">
                        <div class="p-about m-b-20">
                            <div class="pa-padding">
                                <div class="row">
                                    <img src="img/book/<?php echo $gambar_buku?>" alt="Foto Profil" width="200" height="300">
                                </div>
                                <div class="pa-name"><?php echo $judul_buku?> <br>
                                    <small>( <?php echo $judul_singkat ?> )</small>
                                    <div class="pa-text">
                                        <?php echo $jenis_buku ?> · <?php echo $jenis_media ?>
                                    </div>
                                </div>
                                <div class="p-info">
                                    <div class="pi-item">
                                        <div class="pii-icon">
                                            <i class="zmdi zmdi-city"></i>
                                            Kota Terbit
                                        </div>
                                        <div class="pii-value"><?php echo $kota_terbit?></div>
                                    </div>
                                    <div class="pi-item">
                                        <div class="pii-icon">
                                            <i class="zmdi zmdi-account-box"></i>
                                            Penerbit
                                        </div>
                                        <div class="pii-value"><?php echo $penerbit ?></div>
                                    </div>
                                    <div class="pi-item">
                                        <div class="pii-icon">
                                            <i class="zmdi zmdi-calendar"></i>
                                            Tahun Terbit
                                        </div>
                                        <div class="pii-value"><?php echo tanggal_indo(''.$tahun_terbit.'')?></div>
                                    </div>
                                    <div class="pi-item">
                                        <div class="pii-icon">
                                            <i class="zmdi zmdi-info"></i>
                                            Biografi
                                        </div>
                                        <div class="pii-value"><?php echo $biografi ?></div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered m-b-0">
                                            <thead>
                                                <tr>
                                                    <th>Jilid</th>
                                                    <th>Cetakan</th>
                                                    <th>Edisi</th>
                                                    <th>ISBN</th>
                                                    <th>Tanggal entri</th>
                                                    <th>Total Buku</th>
                                                </tr>
                                            </thead>
                                        <?php
        $query_banyak = "SELECT id_detail_buku FROM detail_buku WHERE id_buku LIKE '$id_buku'";
        $result_banyak = mysqli_query($con, $query_banyak);
        $banyakdata_banyak = $result_banyak->num_rows;
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $jilid ?></td>
                                                    <td><?php echo $cetakan ?></th>
                                                    <td><?php echo $edisi ?></td>
                                                    <td><?php echo $ISBN ?></td>
                                                    <td><?php echo tanggal_indo(''.$tanggal_entri.'') ?></td>
                                                    <td><b><?php echo $banyakdata_banyak ?></b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <div align="right">
                                        <a href="ubah_buku.php?ISBN=<?php echo $ISBN ?>">
                                            <button type="button" class="btn btn-primary">
                                            <i class="zmdi zmdi-edit"></i> Ubah Buku
                                            </button>
                                        </a>
                                        <button onclick="hapus(<?php echo $id_buku?>)" type="button" class="btn btn-danger">
                                            <i class="zmdi zmdi-delete"></i> Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-info m-b-20">
                            <h4 class="m-y-0">Status Buku</h4>
                            <hr>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                    <ul class="nav nav-tabs nav-tabs-custom nav-justified m-b-15">
                                        <li class="active">
                                        <a href="#siapterpinjam" role="tab" data-toggle="tab" >
                                            <i class="zmdi zmdi-assignment-o"></i> Siap Terpinjam</a>
                                        </li>
                                        <li>
                                        <a href="#dipesan" role="tab" data-toggle="tab">
                                            <i class="zmdi zmdi-assignment-alert"></i> Dipesan</a>
                                        </li>
                                        <li>
                                        <a href="#dipinjam" role="tab" data-toggle="tab">
                                            <i class="zmdi zmdi-assignment-check"></i> Dipinjam</a>
                                        </li>
                                        <li>
                                        <a href="#lainya" role="tab" data-toggle="tab">
                                            <i class="zmdi zmdi-assignment"></i> Lainya</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade  active in" id="siapterpinjam">
                                            <div class="table-responsive">
                                            <?php
                                                $query_siap_terpinjam = "SELECT * FROM detail_buku WHERE id_buku 
                                                                         LIKE '$id_buku' AND status_buku = 'Siap Terpinjam'";
                                                $result_siap_terpinjam = mysqli_query($con, $query_siap_terpinjam);
                                            ?>
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode</th>
                                                        <th>Status Buku</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                    <?php
                                    $no_siap_terpinjam = 1;
                                    while($data_siap_terpinjam = mysqli_fetch_assoc($result_siap_terpinjam)){
                                                    echo '<tr>
                                                        <td>'.$no_siap_terpinjam.'</td>
                                                        <td>'.$data_siap_terpinjam['kode_buku'].'</td>
                                                        <td>'.$data_siap_terpinjam['status_buku'].'</td>
                                                        <td align="center">
                                                            <button onclick="hapus_data('.$data_siap_terpinjam['id_detail_buku'].')" type="button" class="btn btn-danger">
                                                                <i class="zmdi zmdi-delete"></i> Hapus
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    ';
                                                    $no_siap_terpinjam++;
                                                    }
                                                    echo '</tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="4">
                                                                <div align="right">
                                                                    Total Buku : '.$result_siap_terpinjam->num_rows.' <small> " Siap Terpinjam " </small>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </tfoot>';
                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="dipesan">
                                            <div class="table-responsive">
                                            <?php
                                                $query_dipesan = "SELECT * FROM detail_buku WHERE id_buku 
                                                                         LIKE '$id_buku' AND status_buku = 'Dipesan'";
                                                $result_dipesan = mysqli_query($con, $query_dipesan);
                                            ?>
                                                <table class="table" id="myTable">
                                                    <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode</th>
                                                        <th>Status Buku</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                    <?php
                                    $no_dipesan = 1;
                                    while($data_dipesan = mysqli_fetch_assoc($result_dipesan)){
                                                    echo '<tr>
                                                        <td>'.$no_dipesan.'</td>
                                                        <td>'.$data_dipesan['kode_buku'].'</td>
                                                        <td>'.$data_dipesan['status_buku'].'</td>
                                                        <td align="center">
                                                            <button onclick="hapus_data('.$data_dipesan['id_detail_buku'].')" type="button" class="btn btn-danger">
                                                                <i class="zmdi zmdi-delete"></i> Hapus
                                                            </button>
                                                        </td>
                                                    </tr>';
                                                    $no_dipesan++;
                                                    }
                                                    echo '</tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="4">
                                                                <div align="right">
                                                                    Total Buku : '.$result_dipesan->num_rows.' <small> " Dipesan " </small>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </tfoot>';
                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="dipinjam">
                                            <div class="table-responsive">
                                            <?php
                                                $query_dipinjam = "SELECT * FROM detail_buku WHERE id_buku 
                                                                         LIKE '$id_buku' AND status_buku = 'Dipinjam'";
                                                $result_dipinjam = mysqli_query($con, $query_dipinjam);
                                            ?>
                                                <table class="table" id="myTable">
                                                    <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode</th>
                                                        <th>Status Buku</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                    <?php
                                    $no_dipinjam = 1;
                                    while($data_dipinjam = mysqli_fetch_assoc($result_dipinjam)){
                                                    echo '<tr>
                                                        <td>'.$no_dipinjam.'</td>
                                                        <td>'.$data_dipinjam['kode_buku'].'</td>
                                                        <td>'.$data_dipinjam['status_buku'].'</td>
                                                        <td align="center">
                                                            <button onclick="hapus_data('.$data_dipinjam['id_detail_buku'].')" type="button" class="btn btn-danger">
                                                                <i class="zmdi zmdi-delete"></i> Hapus
                                                            </button>
                                                        </td>
                                                    </tr>';
                                                    $no_dipinjam++;
                                                    }
                                                    echo '</tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="4">
                                                                <div align="right">
                                                                    Total Buku : '.$result_dipinjam->num_rows.' <small> " Dipinjam " </small>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </tfoot>';
                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="lainya">
                                            <div class="table-responsive">
                                            <?php
                                                $query_lainya = "SELECT * FROM detail_buku WHERE id_buku LIKE '$id_buku' 
                                                                 AND status_buku NOT LIKE 'Siap Terpinjam' AND status_buku NOT LIKE 'Dipesan'
                                                                 AND status_buku NOT LIKE 'Dipinjam'";
                                                $result_lainya = mysqli_query($con, $query_lainya);
                                            ?>
                                                <table class="table" id="myTable">
                                                    <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode</th>
                                                        <th>Sumber</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                    <?php
                                    $no_lainya = 1;
                                    while($data_lainya = mysqli_fetch_assoc($result_lainya)){
                                                    echo '<tr>
                                                        <td>'.$no_lainya.'</td>
                                                        <td>'.$data_lainya['kode_buku'].'</td>
                                                        <td>'.$data_lainya['status_buku'].'</td>
                                                        <td align="center">
                                                            <button onclick="hapus_data('.$data_lainya['id_detail_buku'].')" type="button" class="btn btn-danger">
                                                                <i class="zmdi zmdi-delete"></i> Hapus
                                                            </button>
                                                        </td>
                                                    </tr>';
                                                    $no_lainya++;
                                                    }
                                                    echo '</tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="4">
                                                                <div align="right">
                                                                    Total Buku : '.$result_lainya->num_rows.' <small> " Lainya " </small>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </tfoot>';
                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div align="right">
                                        <a href="buku.php">
                                            <button type="button" rel="tooltip" class="btn btn-info btn-fill">
                                                <i class="zmdi zmdi-arrow-left"></i> Kembali
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
        function hapus_data(id_data) {
            swal({
                title: 'Apakah anda yakin?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya!, Hapus Data Buku'
                }).then(function () {
                    document.location="system/hapus_data_buku.php?id="+id_data;
            })
        }
  <?php
      if (isset($_GET['aksi'])) {
          $aksi = ($_GET["aksi"]);
          if($aksi == "tambah"){
              echo 'swal({
                title: "Tertambah!",
                text: "Data Buku telah ditambah.",
                type: "success",
                showConfirmButton: true,
              })';
          }
          else if($aksi == "ubah"){
              echo 'swal({
                title: "Terubah!",
                text: "Buku telah diubah.",
                type: "success",
                showConfirmButton: true,
              })';
          }
      }
  ?>
  </script>
</html>
