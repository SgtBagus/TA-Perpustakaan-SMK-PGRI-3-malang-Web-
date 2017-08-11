<?php
include 'koneksi.php';

if (isset($_POST['input'])) {
  $nip          = $_POST['nis'];
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
    $query = "INSERT INTO user SET no_induk='$nip', nama='$nama', foto_user='thumbnail.jpg',
              jabatan='Siswa', kelas='$kelas - $jurusan - $sub_kelas',no_hp='$no_hp', alamat='$alamat', 
              tgl_entri = '$entri', verifikasi='Belum'";
      $result = mysqli_query($con, $query);
      if(!$result){
          die ("Query gagal dijalankan: ".mysqli_errno($con).
              " - ".mysqli_error($con));
      }

    $query_cek = "SELECT * FROM user";
    $result_cek= mysqli_query($con, $query_cek);
    $jumlah_user = $result_cek->num_rows + 1;

    $query_verifikasi = "INSERT INTO verifikasi SET id_user = '$jumlah_user', role_user = 'User'";
      $result_verifikasi = mysqli_query($con, $query_verifikasi);
      if(!$result_verifikasi){
          die ("Query gagal dijalankan: ".mysqli_errno($con).
              " - ".mysqli_error($con));
      }
    

    header("location:../siswa.php?aksi=tambah");
  }
}
?>
