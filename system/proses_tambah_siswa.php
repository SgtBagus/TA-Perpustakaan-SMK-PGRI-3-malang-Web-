<?php
include 'koneksi.php';

if (isset($_POST['input'])) {
  $nis          = $_POST['nis'];
  $nama         = $_POST['nama'];
  $kelas        = $_POST['kelas'];
  $no_hp        = $_POST['no_hp'];
  $alamat       = $_POST['alamat'];
  $entri        = date("Y-m-d");

  $random = rand(0,1000);

  $cekdulu= "SELECT NIS,nama_siswa FROM siswa WHERE NIS='$nis' OR nama_siswa='$nama'";
  $prosescek= mysqli_query($con, $cekdulu);
  if (mysqli_num_rows($prosescek)>0) {
    header("location:../tambah_siswa.php?pesan=error");
  }
  else { 
    $query = "INSERT INTO siswa SET NIS='$nis', nama_siswa='$nama', foto_siswa='thumbnail.jpg',
              kelas='$kelas', no_hp_siswa='$no_hp', alamat_siswa='$alamat', 
              tgl_entri_siswa = '$entri'";
    $result = mysqli_query($con, $query);
      
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($con).
            " - ".mysqli_error($con));
    }
    else{ 
      $query_user = "INSERT INTO user SET id_siswa_pegawai = '$nis', username='-', email='-', password=md5('$random'), verifikasi='Belum', role='User'";
      $result_user = mysqli_query($con, $query_user);
      if(!$result_user){
          die ("Query gagal dijalankan: ".mysqli_errno($con).
              " - ".mysqli_error($con));
      }
      else{
          include('session.php');
          $query_riwayat = "INSERT INTO riwayat_kegiatan SET id_user = '$_SESSION[id_user]', 
                          riwayat_kegiatan = 'Melakukan Penambahan Data Siswa Bernama $nama Sebagai pengguna baru ', 
                          tgl_riwayat_kegiatan='$entri', status_riwayat='primary'";
          $result_riwayat = mysqli_query($con, $query_riwayat);
          if(!$result_riwayat){
              die ("Query gagal dijalankan: ".mysqli_errno($con).
                  " - ".mysqli_error($con));
          }
          else{
            header("location:../siswa.php?aksi=tambah");
          }
      }
    }
  }
}else {
  header("location:../404.php");
}
?>
