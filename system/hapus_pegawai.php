<?php
  include("koneksi.php");
  if (isset($_GET["id_pegawai"])) {
    $id_pegawai = $_GET["id_pegawai"];
    $query = "DELETE FROM pegawai WHERE id_pegawai LIKE 'P$id_pegawai'";
    $hasil_query = mysqli_query($con, $query); 

      if(!$hasil_query) {
        die ("Gagal menghapus data: ".mysqli_errno($con).
            " - ".mysqli_error($con));
      }
      else{

      $query_user = "DELETE FROM user WHERE id_siswa_pegawai LIKE 'P$id_pegawai'";
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
