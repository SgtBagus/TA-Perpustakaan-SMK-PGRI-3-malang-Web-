<?php $page="BUKU"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('script/head_script.php'); 
        if (isset($_GET['no_register'])) { 
            $no_register= ($_GET["no_register"]);
            if($no_register == ""){
                header("location:404.php"); 
            }else{
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
            }
        }else{
            header("location:404.php"); 
        } 
    ?>
<body class="layout layout-header-fixed layout-left-sidebar-fixed">
    <?php include('menu/header.php') ?>
    <div class="site-main">
        <?php include('menu/sidebar.php') ?>
        <div class="site-content">
            <div class="profile">
                <div class="row gutter-sm">
                    <div class="col-md-4 col-sm-5">
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
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="m-y-0">Tambah Buku</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div align="center">
                                        <h4 class="m-y-0">Info</h4>
                                    </div>
                                    <table class="table">
                                        <thead align="center">
                                            <tr>
                                                <th>
                                                    <div align="center">
                                                        Kota Terbit
                                                    </div>        
                                                </th>
                                                <th>
                                                    <div align="center">
                                                        Penerbit
                                                    </div>
                                                </th>
                                                <th>
                                                    <div align="center">
                                                        Tahun Terbit
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div align="center">
                                                        <?php echo $kota_terbit ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div align="center">
                                                        <?php echo $penerbit ?>
                                                    </div>        
                                                </td>
                                                <td>
                                                    <div align="center">
                                                        <?php echo tanggal_indo($tahun_terbit)?>
                                                    </div>   
                                                </td>   
                                            <tr>
                                            <tr>
                                                <td colspan="3">                       
    <?php
        $query_banyak = "SELECT * FROM detail_buku WHERE id_buku LIKE '$id_buku'";
        $result_banyak = mysqli_query($con, $query_banyak);
        $banyakdata_banyak = $result_banyak->num_rows;
    ?>
                                                    <div align="right">
                                                        Total Data Buku Sekarang :  <b><?php echo $banyakdata_banyak ?></b>
                                                </td>
                                            <tr>
                                        </tbody>
                                    </table>
                                </div> 
                                <form id="inputmasks" class="form-horizontal" method="post" action="system/proses_tambah_detail_buku.php">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="form-control-5">Jilid</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="id" value="<?php echo $id_buku ?>">
                                            <input type="hidden" name="no_register" value="<?php echo $no_register ?>">
                                            <input id="form-control-4" name="jilid" class="form-control" type="text" 
                                            data-inputmask="'alias': '99'" placeholder="Jilid">  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="form-control-5">Cetakan</label>
                                        <div class="col-sm-9">
                                            <input id="form-control-4" name="cetakan" class="form-control" type="text" 
                                            data-inputmask="'alias': '99'" placeholder="Cetakan">  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="form-control-5">Edisi</label>
                                        <div class="col-sm-9">
                                            <input id="form-control-4" name="edisi" class="form-control" type="text" 
                                            data-inputmask="'alias': '9999'" placeholder="Edisi">  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="form-control-5">ISBN</label>
                                        <div class="col-sm-9">
                                            <input id="form-control-4" name="ISBN" class="form-control" type="text" 
                                            data-inputmask="'alias': '999-999-999-999-99'" placeholder="ISBN">  
                                        </div>
                                    </div>
                                    <div align="right">
                                        <a href="detail_buku.php?no_register=<?php echo $no_register ?>">
                                            <button type="button" rel="tooltip" class="btn btn-primary btn-fill">
                                                <i class="zmdi zmdi-arrow-left"></i> Kembali
                                            </button>
                                        </a>
                                        <button type="submit" name="input" rel="tooltip" class="btn btn-primary btn-fill">
                                            <i class="zmdi zmdi-plus"></i> Tambah Data
                                        </button>
                                    </div>
                                </form>
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
