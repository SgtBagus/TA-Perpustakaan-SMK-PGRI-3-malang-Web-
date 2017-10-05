<?php
include 'koneksi.php';

if (isset($_POST['input'])) {

  $Nomor_Dewery           = $_POST['no_dewery'];
  $Subyek                 = $_POST['subyek'];
  $Deskripsi              = $_POST['deskripsi'];

  $date = date("Ymd");
  $cekdulu= "SELECT * FROM jenis_buku WHERE no_dewery='$Nomor_Dewery'";
  $prosescek= mysqli_query($con, $cekdulu);
  if (mysqli_num_rows($prosescek)>0) {
    header("location:../tambah_jenis_buku.php?pesan=error");
  }
  else { 

    $query = "INSERT INTO jenis_buku SET no_dewery='$Nomor_Dewery',
              subyek='$Subyek', deskripsi_jenis_buku='$Deskripsi'";
    $result = mysqli_query($con, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($con).
             " - ".mysqli_error($con));
    }
    else {
      include('session.php');
      $query_riwayat = "INSERT INTO riwayat_kegiatan SET id_user = '$_SESSION[id_user]', 
                      riwayat_kegiatan = 'Melakukan Penambahan Data Jenis Buku Bernama $Subyek', 
                      tgl_riwayat_kegiatan='$date', status_riwayat='primary'";
      $result_riwayat = mysqli_query($con, $query_riwayat);
      if(!$result_riwayat){
          die ("Query gagal dijalankan: ".mysqli_errno($con).
              " - ".mysqli_error($con));
      }
      else{
        header("location:../jenis_buku.php?aksi=tambah");
      }
    }
  }
}else{
  header("location:../404.php");
}
?>
