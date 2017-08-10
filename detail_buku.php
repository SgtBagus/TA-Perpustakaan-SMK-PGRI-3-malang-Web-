<?php $page="BUKU"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('script/head_script.php'); 
        if (isset($_GET['id_buku'])) { 
            $id_buku = ($_GET["id_buku"]);
            $query_buku = "SELECT a.*, b.* 
                           FROM buku AS a INNER JOIN
                           jenis_buku AS b WHERE a.id_jenis_buku = b.id_jenis_buku 
                           AND a.id_buku = '$id_buku'";
            $result_buku = mysqli_query($con, $query_buku);
                if(!$result_buku){
                die ("Query Error: ".mysqli_errno($con).
                    " - ".mysqli_error($con));
                }

            $data_buku          = mysqli_fetch_assoc($result_buku);
            $judul_buku         = $data_buku['judul_buku'];
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
                                    <img src="img/book/<?php echo $gambar_buku?>" alt="Foto Profil" width="200" height="300">
                                </div>
                                <div class="pa-name"><?php echo $judul_buku?>
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
                                </div>
                            </div>
                        </div>
                        <div class="p-info m-b-20">
                        <h4 class="m-y-0">Total Buku</h4>
                            <hr>
                            <div class="table-responsive">
                            <?php
                                $query_detail = "SELECT * FROM detail_buku WHERE id_buku LIKE '$id_buku' ";
                                $result_detail = mysqli_query($con, $query_detail);
                            ?>
                                <table class="table">
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
                    $no_detail = 1;
                    while($data_detail = mysqli_fetch_assoc($result_detail)){
                                    echo '<tr>
                                        <td>'.$no_detail.'</td>
                                        <td>'.$data_detail['cetakan'].'</td>
                                        <td>'.$data_detail['edisi'].'</td>
                                        <td>'.$data_detail['ISBN'].'</td>
                                        <td>'.tanggal_indo(''.$data_detail['tgl_entri_buku'].'').'</td>
                                        <td>'.$data_detail['status_buku'].'</td>
                                        <td align="center">
                                            <a href="detail_user.php?no_induk='.$data_detail['cetakan'].'">
                                                <button type="button" class="btn btn-primary">
                                                <i class="zmdi zmdi-eye"></i> Detail
                                                </button>
                                            </a>
                                            <button onclick="hapus('.$data_detail['id_detail_buku'].')" type="button" class="btn btn-danger">
                                                <i class="zmdi zmdi-delete"></i> Hapus
                                            </button>
                                        </td>
                                    </tr>';
                                    $no_detail++;
                                    }
                    ?>
                                    </tbody>
                                </table>
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
</html>
