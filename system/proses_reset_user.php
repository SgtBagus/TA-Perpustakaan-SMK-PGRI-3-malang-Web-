<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $date = date("Ymd");
    $random = rand();
            $query = "UPDATE user SET username = '-', email = '-', 
                    password = md5('$random'), verifikasi='Belum' WHERE id_user = '$id'";
            $result = mysqli_query($con, $query);

        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($con).
            " - ".mysqli_error($con));
        }

        else{
            
            
                    include('session.php');
                    $query_riwayat = "INSERT INTO riwayat_kegiatan SET id_user = '$_SESSION[id_user]', 
                                    riwayat_kegiatan = 'Melakukan Reset pada salah satu user', 
                                    tgl_riwayat_kegiatan='$date', status_riwayat='warning'";
                    $result_riwayat = mysqli_query($con, $query_riwayat);
                    if(!$result_riwayat){
                        die ("Query gagal dijalankan: ".mysqli_errno($con).
                            " - ".mysqli_error($con));
                    }
                    else{
                        header("location:../user.php?aksi=berubah"); 
                    } 
                }
}
else{
      header("location:../404.php"); 
}
?>