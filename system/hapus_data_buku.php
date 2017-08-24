<?php
  include("koneksi.php");
  if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $query = "DELETE FROM detail_buku WHERE id_detail_buku='$id'";
    $hasil_query = mysqli_query($con, $query);

      if(!$hasil_query) {
        die ("Gagal menghapus data: ".mysqli_errno($con).
            " - ".mysqli_error($con));
      }
    header("location:../buku.php?aksi=detail_hapus");
  }else{
    header("location:../404.php");
  }
?>
