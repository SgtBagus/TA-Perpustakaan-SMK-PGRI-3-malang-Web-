<?php
  include("koneksi.php");
  if (isset($_GET["NIP"])) {
    $NIP = $_GET["NIP"];
    $query = "DELETE FROM pegawai WHERE NIP LIKE '$NIP%'";
    $hasil_query = mysqli_query($con, $query);

      if(!$hasil_query) {
        die ("Gagal menghapus data: ".mysqli_errno($con).
            " - ".mysqli_error($con));
      }
      else{

      $query_user = "DELETE FROM user WHERE NIP_NIS LIKE '$NIP%'";
      $hasil_query_user = mysqli_query($con, $query_user);

        if(!$hasil_query_user) {
          die ("Gagal menghapus data: ".mysqli_errno($con).
              " - ".mysqli_error($con));
        }
        else{
          header("location:../siswa.php?aksi=hapus");
        }
      }
  }else{
    header("location:../404.php");
  } 
?>
