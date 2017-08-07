<?php
include 'koneksi.php';
$id_jenis_buku        = $_POST['id'];
$no_dewery            = $_POST['no_dewery'];
$subyek               = $_POST['subyek'];
$deskripsi_jenis_buku = $_POST['deskripsi'];

  $query = "UPDATE jenis_buku SET subyek='$subyek',
            deskripsi_jenis_buku='$deskripsi_jenis_buku' WHERE id_jenis_buku ='$id_jenis_buku'";
    $result = mysqli_query($con, $query);
    // periska query apakah ada error
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($con).
             " - ".mysqli_error($con));

    }
    header("location:../jenis_buku.php?aksi=ubah");
?>
