<?php $page="BUKU"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('script/head_script.php');
        if (isset($_GET['no_register'])) {
            $no_register= ($_GET["no_register"]);
            $query_buku = "SELECT a.*, b.*
                           FROM buku AS a INNER JOIN
                           jenis_buku AS b WHERE a.id_jenis_buku = b.id_jenis_buku
                           AND a.no_register = '$no_register'";
            $result_buku = mysqli_query($con, $query_buku);
                if(!$result_buku){
                die ("Query Error: ".mysqli_errno($con).
                    " - ".mysqli_error($con));
                }

            $data_buku          = mysqli_fetch_assoc($result_buku);
            $id_buku            = $data_buku['id_buku'];
            $no_register        = $data_buku['no_register'];
            $judul_buku         = $data_buku['judul_buku'];
            $judul_singkat      = $data_buku['judul_singkat'];
            $gambar_buku        = $data_buku['gambar_buku'];
            $jenis_buku         = $data_buku['subyek'];
            $jenis_media        = $data_buku['jenis_media'];
            $kota_terbit        = $data_buku['kota_terbit'];
            $penerbit           = $data_buku['penerbit'];
            $tahun_terbit       = $data_buku['tahun_terbit'];
            $biografi           = $data_buku['biografi'];
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
                                    <div class="pa-name">
                                        <small> - <?php echo $no_register ?> - </small>
                                    </div>
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
                                            <i class="zmdi zmdi-file"></i>
                                            Biografi
                                        </div>
                                        <div class="pii-value"><?php echo $biografi ?></div>
                                    </div>
                                    <div align="right">
                                        <a href="ubah_buku.php?no_register=<?php echo $no_register ?>">
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
                                <div align="right">
                                    <a href="tambah_data_buku.php?no_register=<?php echo $no_register ?>">
                                    <button type="button" class="btn btn-primary">
                                        <i class="zmdi zmdi-plus"></i> Tambah Data Buku
                                    </button>
                                    </a>
                                </div>
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
                                                $query_siap_terpinjam = "SELECT * FROM detail_buku WHERE id_buku LIKE '$id_buku' AND status_buku = 'Siap Terpinjam'";
                                                $result_siap_terpinjam = mysqli_query($con, $query_siap_terpinjam);
                                            ?>
                                                <table class="table" id="myTable">
                                                    <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Cetakan</th>
                                                        <th>Edisi</th>
                                                        <th>ISBN</th>
                                                        <th>Tanggal Entri</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                    <?php
                                    $no_siap_terpinjam = 1;
                                    while($data_siap_terpinjam = mysqli_fetch_assoc($result_siap_terpinjam)){
                                                    echo '<tr>
                                                        <td>'.$no_siap_terpinjam.'</td>
                                                        <td>'.$data_siap_terpinjam['cetakan'].'</td>
                                                        <td>'.$data_siap_terpinjam['edisi'].'</td>
                                                        <td>'.$data_siap_terpinjam['ISBN'].'</td>
                                                        <td>'.tanggal_indo(''.$data_siap_terpinjam['tgl_entri_buku'].'').'</td>
                                                        <td>'.$data_siap_terpinjam['status_buku'].'</td>
                                                        <td align="center">
                                                            <button onclick="hapus_data('.$data_siap_terpinjam['id_detail_buku'].')" type="button" class="btn btn-danger">
                                                                <i class="zmdi zmdi-delete"></i> Hapus
                                                            </button>
                                                        </td>
                                                    </tr>';
                                                    $no_siap_terpinjam++;
                                                    }
                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="dipesan">
                                            <div class="table-responsive">
                                            <?php
                                                $query_dipesan = "SELECT * FROM detail_buku WHERE id_buku LIKE '$id_buku' AND status_buku = 'Dipesan'";
                                                $result_dipesan = mysqli_query($con, $query_dipesan);
                                            ?>
                                                <table class="table" id="myTable">
                                                    <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Cetakan</th>
                                                        <th>Edisi</th>
                                                        <th>ISBN</th>
                                                        <th>Tanggal Entri</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                    <?php
                                    $no_dipesan = 1;
                                    while($data_dipesan = mysqli_fetch_assoc($result_dipesan)){
                                                    echo '<tr>
                                                        <td>'.$no_dipesan.'</td>
                                                        <td>'.$data_dipesan['cetakan'].'</td>
                                                        <td>'.$data_dipesan['edisi'].'</td>
                                                        <td>'.$data_dipesan['ISBN'].'</td>
                                                        <td>'.tanggal_indo(''.$data_dipesan['tgl_entri_buku'].'').'</td>
                                                        <td>'.$data_dipesan['status_buku'].'</td>
                                                        <td align="center">
                                                            <button onclick="hapus_data('.$data_dipesan['id_detail_buku'].')" type="button" class="btn btn-danger">
                                                                <i class="zmdi zmdi-delete"></i> Hapus
                                                            </button>
                                                        </td>
                                                    </tr>';
                                                    $no_dipesan++;
                                                    }
                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="dipinjam">
                                            <div class="table-responsive">
                                            <?php
                                                $query_dipinjam = "SELECT * FROM detail_buku WHERE id_buku LIKE '$id_buku' AND status_buku = 'Dipinjam'";
                                                $result_dipinjam = mysqli_query($con, $query_dipinjam);
                                            ?>
                                                <table class="table" id="myTable">
                                                    <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Cetakan</th>
                                                        <th>Edisi</th>
                                                        <th>ISBN</th>
                                                        <th>Tanggal Entri</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                    <?php
                                    $no_dipinjam = 1;
                                    while($data_dipinjam = mysqli_fetch_assoc($result_dipinjam)){
                                                    echo '<tr>
                                                        <td>'.$no_dipinjam.'</td>
                                                        <td>'.$data_dipinjam['cetakan'].'</td>
                                                        <td>'.$data_dipinjam['edisi'].'</td>
                                                        <td>'.$data_dipinjam['ISBN'].'</td>
                                                        <td>'.tanggal_indo(''.$data_dipinjam['tgl_entri_buku'].'').'</td>
                                                        <td>'.$data_dipinjam['status_buku'].'</td>
                                                        <td align="center">
                                                            <button onclick="hapus_data('.$data_dipinjam['id_detail_buku'].')" type="button" class="btn btn-danger">
                                                                <i class="zmdi zmdi-delete"></i> Hapus
                                                            </button>
                                                        </td>
                                                    </tr>';
                                                    $no_dipinjam++;
                                                    }
                                    ?>
                                                    </tbody>
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
                                                        <th>Cetakan</th>
                                                        <th>Edisi</th>
                                                        <th>ISBN</th>
                                                        <th>Tanggal Entri</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                    <?php
                                    $no_lainya = 1;
                                    while($data_lainya = mysqli_fetch_assoc($result_lainya)){
                                                    echo '<tr>
                                                        <td>'.$no_lainya.'</td>
                                                        <td>'.$data_lainya['cetakan'].'</td>
                                                        <td>'.$data_lainya['edisi'].'</td>
                                                        <td>'.$data_lainya['ISBN'].'</td>
                                                        <td>'.tanggal_indo(''.$data_lainya['tgl_entri_buku'].'').'</td>
                                                        <td>'.$data_lainya['status_buku'].'</td>
                                                        <td align="center">
                                                            <button onclick="hapus_data('.$data_lainya['id_detail_buku'].')" type="button" class="btn btn-danger">
                                                                <i class="zmdi zmdi-delete"></i> Hapus
                                                            </button>
                                                        </td>
                                                    </tr>';
                                                    $no_lainya++;
                                                    }
                                    ?>
                                                    </tbody>
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
