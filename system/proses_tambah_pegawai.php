<?php
include 'koneksi.php';

if (isset($_POST['input'])) {
  $nip          = $_POST['nip'];
  $nama         = $_POST['nama'];
  $jabatan      = $_POST['jabatan'];
  $no_hp        = $_POST['no_hp'];
  $alamat       = $_POST['alamat'];
  $entri    = date("Y-m-d");

  echo $nip , $nama , date("Y-m-d"),'thumbnail.jpg', $jabatan , $no_hp , $alamat, 'belum';

  $cekdulu= "SELECT no_induk,nama FROM user WHERE no_induk='$nip' OR nama='$nama'";
  $prosescek= mysqli_query($con, $cekdulu);
  if (mysqli_num_rows($prosescek)>0) {
    header("location:../tambah_pegawai.php?pesan=error");
  }
  else {
    $query = "INSERT INTO user SET no_induk='$nip', nama='$nama', username='-', email='-', password='-', foto_user='thumbnail.jpg',
              jabatan='$jabatan', kelas='-',no_hp='$no_hp', alamat='$alamat', tgl_entri = '$entri', verifikasi='Belum'";
    $result = mysqli_query($con, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($con).
             " - ".mysqli_error($con));
    }
    header("location:../pegawai.php?aksi=tambah");
  }
}else{
    header("location:../404.php");
}
?>
