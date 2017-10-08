<?php 
include 'koneksi.php';

if (isset($_POST['input'])) {
    $id_peminjaman  = $_POST['id_peminjaman'];
    $id_user        = $_POST['id_user'];
    $sanksi         = $_POST['sanksi'];
    $date           = date("Ymd");
    if($_POST['catatan'] == ''){
        $cat = '-';
    }else{
        $cat        = $_POST['catatan'];
    }
    
        $query = "INSERT INTO sanksi SET id_user='$id_user', id_peminjaman='$id_peminjaman', sanksi='$sanksi'
                  , catatan_sanksi='$cat', status_sanksi='Belum Lunas'";
        echo $query.'<br>';

        $result = mysqli_query($con, $query);
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($con).
                " - ".mysqli_error($con));
        }
        else{
            $query_buku = "SELECT id_detail_buku FROM detail_peminjaman WHERE id_peminjaman = '$id_peminjaman'";
            $result_buku = mysqli_query($con, $query_buku);
            $no_status_buku = 1;  
            while($data_detail_buku = mysqli_fetch_assoc($result_buku)){
                $status         = $_POST['status_buku_'.$no_status_buku.''];
                $query_status_berubah = "UPDATE detail_buku SET status_buku = '$status' 
                                         WHERE id_detail_buku = '$data_detail_buku[id_detail_buku]'";
                echo $query_status_berubah.'<br>';
                $result_status_berubah = mysqli_query($con, $query_status_berubah); 
                $no_status_buku++;  
            };
            
            include('session.php');
            $query_riwayat = "INSERT INTO riwayat_kegiatan SET id_user = '$_SESSION[id_user]', 
                            riwayat_kegiatan = 'Melakukan pendataan sanksi', 
                            tgl_riwayat_kegiatan='$date', status_riwayat='warning'";
            echo $query_riwayat;
    
            $result_riwayat = mysqli_query($con, $query_riwayat);
            if(!$result_riwayat){
                die ("Query gagal dijalankan: ".mysqli_errno($con).
                    " - ".mysqli_error($con));
            }
            else{
                header("location:../sanksi.php?aksi=tambah");
            } 
        } 
    }   
else{
    header("location: ../404.php"); 
}
?>
