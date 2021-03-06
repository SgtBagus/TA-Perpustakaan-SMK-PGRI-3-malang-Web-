<?php $page="BUKU" ?>
<!DOCTYPE html>
<html lang="en">
  <?php include('script/head_script.php') ?>
  <body class="layout layout-header-fixed layout-left-sidebar-fixed">
    <?php include('menu/header.php') ?>
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
                <form id="inputmasks" class="form-horizontal" method="post" action="system/proses_tambah_buku.php" 
                enctype="multipart/form-data">    
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Judul Buku</label>
                    <div class="col-sm-6">
                      <input class="form-control" type="text" name="judul" placeholder="Judul Buku" required>
                    </div>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="judul_singkat" placeholder="Judul Singkat" required>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Gambar Sampul</label>
                    <div class="col-sm-9">                  
                      <img id="preview_gambar" src="img/book/thumbnail.png" alt="Foto Profil" width="150" height="200">
                      <input id="preview" style="visibility:hidden;" type="file" accept="image/png, image/jpeg, image/jpg" name="foto" onchange="readURL(this);" onclick="myFunction()" />
                      <label for="preview" class="btn btn-primary btn-fill"><i class="zmdi zmdi-edit"> </i> Pilih File</label> 
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Pelengkap</label>
                    <div class="col-sm-3">
                      <input name="jilid" class="form-control" type="text" placeholder="Jilid">  
                    </div>
                    <div class="col-sm-3">
                      <input name="cetakan" class="form-control" type="text" placeholder="Cetakan">  
                    </div>
                    <div class="col-sm-3">
                      <input name="edisi" class="form-control" type="text" placeholder="Edisi">  
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">ISBN</label>
                    <div class="col-sm-9">
                      <input id="form-control-4" name="ISBN" class="form-control" type="text" 
                      data-inputmask="'alias': '999-999-999-999-99'" placeholder="ISBN">  
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-21">Jenis Media</label>
                    <div class="col-sm-9">
                        <select name="jenis_media" class="form-control" required>
                            <option value="Media Cetak">Media Cetak</option>
                            <option value="VCD">VCD</option>
                            <option value="CD ROM">CD ROM</option>
                            <option value="DVD">DVD</option>
                            <option value="Floppy Disk">Floppy Disk</option>
                            <option value="Lain-lain">Lain-lain</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-5">Kota Terbit</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="kota" placeholder="Kota" required>
                    </div>
                    <div class="col-sm-6">
                      <input class="form-control" type="text" name="penerbit" placeholder="Penerbit" required>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-md-3 control-label" for="form-control-1">Tanggal Terbit</label>
                    <div class="col-md-9">
                        <input id="datepicker" class="form-control" type="text"  name="terbit">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                    <label class="control-label" for="form-control-21">Jenis Koleksi</label>
                        <select name="koleksi" class="form-control" required>  
                            <option value="Biasa">Biasa</option>
                            <option value="Alat Peraga">Alat Peraga</option>
                            <option value="American Corner">American Corner</option>
                            <option value="Referensi">Referensi</option>
                            <option value="Jurnal">Jurnal</option>
                            <option value="Tandon">Tandon</option>
                            <option value="Koleksi Kecil">Koleksi Kecil</option>
                            <option value="Multimedia">Multimedia</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                    <label class="control-label" for="form-control-21">Jenis Bahasa</label>
                        <select name="bahasa" class="form-control" required>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Inggris">Inggris</option>
                            <option value="Perancis">Perancis</option>
                            <option value="Jerman">Jerman</option>
                            <option value="Cina">Cina</option>
                            <option value="Arab">Arab</option>
                            <option value="Jepang">Jepang</option>
                            <option value="Belanda">Belanda</option>                      
                            <option value="Italia">Italia</option>                      
                            <option value="Lain-lain">Lain-lain</option>                      
                        </select>
                    </div>
                    <div class="col-sm-3">
                    <label class="control-label" for="form-control-21">Sumber Buku</label>
                        <select name="sumber" class="form-control" required>
                            <option value="Pembelian">Pembelian</option>
                            <option value="Hadiah">Hadiah</option>
                            <option value="Penggantian">Penggantian</option>
                            <option value="Penggandaan">Penggandaan</option>
                            <option value="Tidak Diketahui">Tidak Diketahui</option>
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
        while($data = mysqli_fetch_assoc($result))
        {
            echo '<option value="'.$data[id_jenis_buku].'" title="Diskripsi : '.$data[deskripsi_jenis_buku].'">'.$data[subyek].'</option>';
        }
    ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8" required>Biografi</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" rows="3" name="biografi" placeholder="Biografi"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-21">Total Buku</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="number" name="total_buku" placeholder="Total Buku" required>
                    </div>
                  </div>
                  <div align="right">
                      <a href="buku.php">
                        <button type="button" rel="tooltip" class="btn btn-info btn-fill">
                          <i class="zmdi zmdi-arrow-left"></i> Kembali
                        </button>
                      </a>
                      <button type="submit" name="input" rel="tooltip" class="btn btn-primary btn-fill">
                        <i class="zmdi zmdi-plus-circle"></i> Tambah
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
      if (isset($_GET['aksi'])) {
          $aksi = ($_GET["aksi"]);
          if($aksi == "error"){
              echo 'swal({
                title: "Kesalahan!",
                text: "Mohon Maaf Terjadi Kesalahan",
                type: "error",
                showConfirmButton: true,
              })';
          }else if ($aksi == "duplicate"){
            echo 'swal({
              title: "Kesalahan!",
              text: "Data Buku Sudah Ada",
              type: "error",
              showConfirmButton: true,
            })';
          }else if ($aksi == "mana"){
            echo 'swal({
              title: "Kesalahan!",
              text: "Mohon Isi Total Buku",
              type: "error",
              showConfirmButton: true,
            })';
          }else if ($aksi == "kebanyakan"){
            echo 'swal({
              title: "Kesalahan!",
              text: "Total Buku Terlalu Banyak",
              type: "error",
              showConfirmButton: true,
            })';
          }else if ($aksi == "format"){
            echo 'swal({
              title: "Kesalahan!",
              text: "Gambar Tidak Cocok",
              type: "error",
              showConfirmButton: true,
            })';
          }else if ($aksi == "size"){
            echo 'swal({
              title: "Kesalahan!",
              text: "Ukuran Gambar Terlalu Besar",
              type: "error",
              showConfirmButton: true,
            })';
          }
      }
  ?>
  </script>
</html>
