<?php
  include("koneksi.php");
  if (isset($_GET["id_siswa"])) {
    $id_siswa = $_GET["id_siswa"];
    $query = "DELETE FROM siswa WHERE id_siswa LIKE 'S$id_siswa'";
    $hasil_query = mysqli_query($con, $query);

      if(!$hasil_query) {
        die ("Gagal menghapus data: ".mysqli_errno($con).
            " - ".mysqli_error($con));
      } 
      else{

      $query_user = "DELETE FROM user WHERE id_siswa_pegawai LIKE 'S$id_siswa'";
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
