<?php
  include("koneksi.php");
  if (isset($_GET["NIP"])) {
    $NIP = $_GET["NIP"];
    $date = date("Ymd");
    $query = "DELETE FROM pegawai WHERE NIP LIKE '$NIP%'";
    $hasil_query = mysqli_query($con, $query); 
 
      if(!$hasil_query) {
        die ("Gagal menghapus data: ".mysqli_errno($con).
            " - ".mysqli_error($con));
      }
      else{

      $query_user = "DELETE FROM user WHERE id_siswa_pegawai LIKE '$NIP%'";
      $hasil_query_user = mysqli_query($con, $query_user);

        if(!$hasil_query_user) {
          die ("Gagal menghapus data: ".mysqli_errno($con).
              " - ".mysqli_error($con));
        }
        else{
          
                include('session.php');
                $query_riwayat = "INSERT INTO riwayat_kegiatan SET id_user = '$_SESSION[id_user]', 
                                riwayat_kegiatan = 'Melakukan Penghapusan Salah satu Pegawai', 
                                tgl_riwayat_kegiatan='$date', status_riwayat='danger'";
                $result_riwayat = mysqli_query($con, $query_riwayat);
                if(!$result_riwayat){
                    die ("Query gagal dijalankan: ".mysqli_errno($con).
                        " - ".mysqli_error($con));
                }
                else{
                  header("location:../pegawai.php?aksi=hapus");
                }
        }
      }
  }else{
    header("location:../404.php");
  } 
?>
