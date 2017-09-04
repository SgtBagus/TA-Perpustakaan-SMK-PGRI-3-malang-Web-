<?php
include 'koneksi.php';

if (isset($_POST['input'])) {
  $nis          = $_POST['nis'];
  $nama         = $_POST['nama'];
  $kelas        = $_POST['kelas'];
  $no_hp        = $_POST['no_hp'];
  $jurusan      = $_POST['jurusan'];
  $sub_kelas    = $_POST['sub_kelas'];
  $alamat       = $_POST['alamat'];
  $entri        = date("Y-m-d");

  $cekdulu= "SELECT no_induk,nama FROM user WHERE no_induk='$nip' OR nama='$nama'";
  $prosescek= mysqli_query($con, $cekdulu);
  if (mysqli_num_rows($prosescek)>0) {
    header("location:../tambah_siswa.php?pesan=error");
  }
  else { 
    $query = "INSERT INTO siswa SET NIS='$nis', nama_siswa='$nama', foto_siswa='thumbnail.jpg',
              kelas='$kelas - $jurusan - $sub_kelas', no_hp_siswa='$no_hp', alamat_siswa='$alamat', 
              tgl_entri_siswa = '$entri'";
    $result = mysqli_query($con, $query);
      
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($con).
            " - ".mysqli_error($con));
    }
    else{ 

    $query_user = "INSERT INTO user SET NIP_NIS='$nis' username='-', email='-', password='-', verifikasi='Belum'";
      $result_user = mysqli_query($con, $query_user);
      if(!$result_user){
          die ("Query gagal dijalankan: ".mysqli_errno($con).
              " - ".mysqli_error($con));
      }
      else{
        header("location:../siswa.php?aksi=tambah");
      }
    }
  }
}else {
  header("location:../404.php");
}
?>
