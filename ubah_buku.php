<?php $page="BUKU" ?>
<!DOCTYPE html>
<html lang="en">
  <?php include('script/head_script.php') ?>
  <body class="layout layout-header-fixed layout-left-sidebar-fixed">
    <?php include('menu/header.php');

    if (isset($_GET['ISBN'])) {
        $ISBN = ($_GET["ISBN"]);
        $query = "SELECT a.*, b.* FROM buku AS a INNER JOIN 
                 jenis_buku AS b WHERE a.ISBN ='$ISBN' 
                 AND a.id_jenis_buku = b.id_jenis_buku";
        $result = mysqli_query($con, $query);

        if(!$result){
        die ("Query Error: ".mysqli_errno($con).
            " - ".mysqli_error($con));
        }

        $data           = mysqli_fetch_assoc($result);
        $id_buku        = $data["id_buku"];
        $judul_buku     = $data["judul_buku"];
        $judul_singkat  = $data["judul_singkat"];
        $gambar_buku    = $data["gambar_buku"];
        $jilid          = $data["jilid"];
        $cetakan        = $data["cetakan"];
        $edisi          = $data["edisi"];
        $ISBN           = $data["ISBN"];
        $jenis_media    = $data["jenis_media"];
        $id_jenis_buku  = $data["id_jenis_buku"];
        $sumber_buku    = $data["sumber"];
        $subyek         = $data["subyek"];
        $jenis_koleksi  = $data["jenis_koleksi"];
        $kota_terbit    = $data["kota_terbit"];
        $penerbit       = $data["penerbit"];
        $tahun_terbit   = date('d-m-Y', strtotime($data["tahun_terbit"]));
        $biografi       = $data["biografi"];
        $bahasa_buku    = $data["bahasa"];

    }else{
			header("location:../404.php");
    }
?>

    <div class="site-main">
      <?php include('menu/sidebar.php') ?>
      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Tambah Buku</h3>
          </div>
          <div class="panel-body"> 
            <div class="row">
              <div class="col-md-8">
                <form id="inputmasks" class="form-horizontal" method="post" action="system/proses_ubah_buku.php" 
                enctype="multipart/form-data">    
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Judul Buku</label>
                    <div class="col-sm-6">
                      <input type="hidden" name="id_buku" value="<?php echo $id_buku ?>">
                      <input class="form-control" type="text" name="judul" placeholder="Judul Buku" value="<?php echo $judul_buku ?>" required>
                    </div>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="judul_singkat" placeholder="Judul Singkat" value="<?php echo $judul_singkat ?>" required>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Gambar Sampul</label>
                    <div class="col-sm-9">                  
                      <img id="preview_gambar" src="img/book/<?php echo $gambar_buku ?>" alt="Foto Profil" width="150" height="200">
                      <input id="preview" style="visibility:hidden;" type="file" accept="image/png, image/jpeg, image/jpg" name="foto" onchange="readURL(this);" onclick="myFunction()" />
                      <label for="preview" class="btn btn-primary btn-fill"><i class="zmdi zmdi-edit"> </i> Pilih File</label> 
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Pelengkap</label>
                    <div class="col-sm-3">
                      <input name="jilid" class="form-control" type="text" placeholder="Jilid" value="<?php echo $jilid ?>">  
                    </div>
                    <div class="col-sm-3">
                      <input name="cetakan" class="form-control" type="text" placeholder="Cetakan" value="<?php echo $cetakan ?>">  
                    </div>
                    <div class="col-sm-3">
                      <input name="edisi" class="form-control" type="text" placeholder="Edisi" value="<?php echo $edisi ?>" >  
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">ISBN</label>
                    <div class="col-sm-9">
                      <input id="form-control-4" name="ISBN" class="form-control" type="text" 
                      data-inputmask="'alias': '999-999-999-999-99'" placeholder="ISBN" value="<?php echo $ISBN ?>">  
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-21">Jenis Media</label>
                    <div class="col-sm-9">
                        <select name="jenis_media" class="form-control" required>     
<?php
$semua_media = array("Media Cetak", "VCD", "CD ROM", "DVD", "Floppy Disk", "Lain-Lain");

foreach ($semua_media as $media) 
{
  if($media == $jenis_media) {
    echo "<option value=".$media." SELECTED>$media</option>";
  } 
  else{
    echo "<option value=".$media.">$media</option>";
  }
}
?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Kota Terbit</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="kota" placeholder="Kota" value="<?php echo $kota_terbit ?>" required>
                    </div>
                    <div class="col-sm-6">
                      <input class="form-control" type="text" name="penerbit" placeholder="Penerbit" value="<?php echo $penerbit ?>" required>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-md-3 control-label" for="form-control-1">Tanggal Terbit</label>
                    <div class="col-md-9">
                        <input id="datepicker" class="form-control" type="text"  name="terbit" value="<?php echo $tahun_terbit ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                    <label class="control-label" for="form-control-21">Jenis Koleksi</label>
                        <select name="koleksi" class="form-control" required>
                               
<?php
$semua_koleksi = array("Biasa", "Alat Peraga", "American Corner", "Referensi", 
                     "Jurnal", "Tandon",  "Koleksi Kecil", "Multimedia");

foreach ($semua_koleksi as $koleksi) 
{
  if($koleksi == $jenis_koleksi) {
    echo "<option value=".$koleksi." SELECTED>$koleksi</option>";
  } 
  else{
    echo "<option value=".$koleksi.">$koleksi</option>"; 
  }
}
?>  
                        </select>
                    </div>
                    <div class="col-sm-3">
                    <label class="control-label" for="form-control-21">Jenis Bahasa</label>
                        <select name="bahasa" class="form-control" required>                           
<?php
$semua_bahasa = array("Indonesia", "Inggris", "Perancis", "Jerman", 
                     "Cina", "Arab",  "Jepang", "Belanda", "Italia", "Lain-lain");

foreach ($semua_bahasa as $bahasa) 
{
  if($bahasa == $bahasa_buku) {
    echo "<option value=".$bahasa." SELECTED>$bahasa</option>";
  } 
  else{
    echo "<option value=".$bahasa.">$bahasa</option>";
  }
}
?>                   
                        </select>
                    </div>
                    <div class="col-sm-3">
                    <label class="control-label" for="form-control-21">Sumber Buku</label>
                        <select name="sumber" class="form-control" required>                           
<?php
$semua_sumber = array("Pembelian", "Hadiah", "Penggantian", "Penggandaan", "Tidak Diketahui");

foreach ($semua_sumber as $sumber) 
{
  if($sumber == $sumber_buku) {
    echo "<option value=".$sumber." SELECTED>$sumber</option>";
  } 
  else{
    echo "<option value=".$sumber.">$sumber</option>";
  }
}
?>                   
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label" for="form-control-1">Jenis Buku</label>
                    <div class="col-md-9">
    <?php
        $query = "SELECT * FROM jenis_buku";     
        $result = mysqli_query($con, $query);
        if(!$result){
            die ("Query Error: ".mysqli_errno($con).
            " - ".mysqli_error($con));
        }
    ?>
                      <select name="jenis_buku" class="form-control" required>                                                     
    <?php
        $jenis_buku_sekarang = $subyek;
        while($data = mysqli_fetch_assoc($result))
        {
            if($data[subyek] == $jenis_buku_sekarang) {
            echo '<option value="'.$data[id_jenis_buku].'" title="Diskripsi : '.$data[deskripsi_jenis_buku].'" SELECTED>'.$data[subyek].'</option>';
            } else
            {
            echo '<option value="'.$data[id_jenis_buku].'" title="Diskripsi : '.$data[deskripsi_jenis_buku].'">'.$data[subyek].'</option>';
            }
        }
    ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8" required>Biografi</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" rows="3" name="biografi" placeholder="Biografi"><?php echo $biografi ?></textarea>
                    </div>
                  </div>
                  <div align="right">
                      <a href="buku.php">
                        <button type="button" rel="tooltip" class="btn btn-info btn-fill">
                          <i class="zmdi zmdi-arrow-left"></i> Kembali
                        </button>
                      </a>
                      <button type="submit" name="input" rel="tooltip" class="btn btn-primary btn-fill">
                        <i class="zmdi zmdi-edit"></i> Ubah
                      </button>
                  </div>
                </form>
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
  <?php
      if (isset($_GET['pesan'])) {
          $pesan = ($_GET["pesan"]);
          if($pesan == "error"){
              echo 'swal({
                title: "Kesalahan!",
                text: "Pengguna Sudah Terdaftar",
                type: "error",
                showConfirmButton: true,
              })';
          }
      }
  ?>
  </script>
</html>
