<?php
include 'koneksi.php';
if (isset($_POST['input'])) {
$id_jenis_buku        = $_POST['id'];
$no_dewery            = $_POST['no_dewery'];
$subyek               = $_POST['subyek'];
$deskripsi_jenis_buku = $_POST['deskripsi'];

  $query = "UPDATE jenis_buku SET subyek='$subyek',
            deskripsi_jenis_buku='$deskripsi_jenis_buku' WHERE id_jenis_buku ='$id_jenis_buku'";
    $result = mysqli_query($con, $query);
    // periska query apakah ada error
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($con).
             " - ".mysqli_error($con));

    }

    else{
        
        
                include('session.php');
                $query_riwayat = "INSERT INTO riwayat_kegiatan SET id_user = '$_SESSION[id_user]', 
                                riwayat_kegiatan = 'Melakukan Perbahan pada data buku', 
                                tgl_riwayat_kegiatan='$date', status_riwayat='warning'";
                $result_riwayat = mysqli_query($con, $query_riwayat);
                if(!$result_riwayat){
                    die ("Query gagal dijalankan: ".mysqli_errno($con).
                        " - ".mysqli_error($con));
                }
                else{
                    header("location:../jenis_buku.php?aksi=ubah");
                } 
            }

}
else{
      header("location:../404.php"); 
}
?>
