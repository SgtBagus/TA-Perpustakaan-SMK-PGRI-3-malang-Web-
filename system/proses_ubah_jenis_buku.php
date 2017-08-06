<?php
include 'koneksi.php';
$id_jenis_buku        = $_POST['id'];
$no_dewery            = $_POST['no_dewery'];
$subyek               = $_POST['subyek'];
$deskripsi_jenis_buku = $_POST['deskripsi'];

  $cekdulu= "SELECT * FROM jenis_buku WHERE subyek='$subyek'";
  $prosescek= mysqli_query($con, $cekdulu);

  if (mysqli_num_rows($prosescek)>0) {
    header("location:../ubah_jenis_buku.php?no_dewery=$no_dewery");
  }
  else {
  $query = "UPDATE jenis_buku SET subyek='$subyek',
            deskripsi_jenis_buku='$deskripsi_jenis_buku' WHERE id_jenis_buku ='$id_jenis_buku'";
    $result = mysqli_query($con, $query);
    // periska query apakah ada error
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($con).
             " - ".mysqli_error($con));

    }
    header("location:../jenis_buku.php?proses=ubah");
  }
?>
