<?php
include 'koneksi.php';

if (isset($_POST['input'])) {
  $nip          = $_POST['nip'];
  $nama         = $_POST['nama'];
  $jabatan      = $_POST['jabatan'];
  $no_hp        = $_POST['no_hp'];
  $alamat       = $_POST['alamat'];
  $entri    = date("Y-m-d");

  $random = rand(0,1000);

  $cekdulu= "SELECT NIP,nama_pegawai FROM pegawai WHERE NIP='$nip' OR nama_pegawai='$nama'";
  $prosescek= mysqli_query($con, $cekdulu);
  if (mysqli_num_rows($prosescek)>0) {
    header("location:../tambah_pegawai.php?pesan=error"); 
  } 
  else { 
    $query = "INSERT INTO pegawai SET NIP='$nip', nama_pegawai ='$nama', 
              foto_pegawai = 'thumbnail.jpg', jabatan_pegawai='$jabatan', 
              no_hp_pegawai = '$no_hp', alamat_pegawai='$alamat', tgl_entri_pegawai = '$entri'";
    $result = mysqli_query($con, $query);
    if(!$result){ 
        die ("Query gagal dijalankan: ".mysqli_errno($con).
             " - ".mysqli_error($con));
    }
    else{
      $query_user = "INSERT INTO user SET id_siswa_pegawai='$nip', username='-', email='-', password='$random', verifikasi='Belum', role='User'";
      $result_user = mysqli_query($con, $query_user);
      if(!$result_user){
          die ("Query gagal dijalankan: ".mysqli_errno($con).
              " - ".mysqli_error($con));
      }
      else{
        header("location:../pegawai.php?aksi=tambah");
      }
    }
  }
}else{
    header("location:../404.php");
}
?>
