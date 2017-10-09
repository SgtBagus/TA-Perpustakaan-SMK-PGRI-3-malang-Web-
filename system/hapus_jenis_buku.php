<?php
  include("koneksi.php");
  if (isset($_GET["id"])) { 
    $id = $_GET["id"];
    $date = date("Ymd");
    $query = "DELETE FROM jenis_buku WHERE id_jenis_buku='$id'";
    $hasil_query = mysqli_query($con, $query);

      if(!$hasil_query) {
        die ("Gagal menghapus data: ".mysqli_errno($con).
            " - ".mysqli_error($con));
      }
      else{

      include('session.php');
      $query_riwayat = "INSERT INTO riwayat_kegiatan SET id_user = '$_SESSION[id_user]', 
                      riwayat_kegiatan = 'Melakukan Penghapusan Salah satu Jenis Buku', 
                      tgl_riwayat_kegiatan='$date', status_riwayat='danger'";
      $result_riwayat = mysqli_query($con, $query_riwayat);
      if(!$result_riwayat){
          die ("Query gagal dijalankan: ".mysqli_errno($con).
              " - ".mysqli_error($con));
      }
      else{
        header("location:../jenis_buku.php?aksi=hapus");
      }
    }
  }else{
    header("location:../404.php");
  }
?>
