<?php
  include("koneksi.php");
  if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $query = "DELETE FROM peminjaman WHERE id_peminjaman='$id'";
    $hasil_query = mysqli_query($con, $query);

      if(!$hasil_query) {
        die ("Gagal menghapus data: ".mysqli_errno($con).
            " - ".mysqli_error($con));
      }
    header("location:../peminjaman.php?aksi=hapus");
  }else{
    header("location:../404.php");
  }
?>
