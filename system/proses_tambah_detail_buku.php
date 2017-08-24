<?php
include 'koneksi.php';

if (isset($_POST['input'])) {

  $id_buku              = $_POST['id'];
  $jilid                = $_POST['jilid'];
  $cetakan              = $_POST['cetakan'];
  $edisi                = $_POST['edisi'];
  $ISBN                 = $_POST['ISBN'];
  $tanggal              = date('Y-m-d');
  $no_register          = $_POST['no_register'];

  $cekdulu= "SELECT * FROM detail_buku WHERE ISBN='$ISBN'";
  $prosescek= mysqli_query($con, $cekdulu);
  if (mysqli_num_rows($prosescek)>0) {
    header("location:../tambah_data_buku.php?pesan=duplicate");
  }
  else { 

    $query = "INSERT INTO detail_buku SET id_buku='$id_buku', jilid='$jilid', cetakan='$cetakan', edisi='$edisi',
              ISBN='$ISBN', tgl_entri_buku='$tanggal', status_buku='Siap Terpinjam'";
    $result = mysqli_query($con, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($con).
             " - ".mysqli_error($con));
    }
  header("location:../detail_buku.php?no_register=$no_register&aksi=tambah");
  }
}else{
  header("location:../404.php");
}
?>
