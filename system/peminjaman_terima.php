<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $date = date("Ymd");
    $query = "UPDATE peminjaman SET status_pinjaman='Diterima' WHERE id_peminjaman = '$id'";
    $result = mysqli_query($con, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($con).
        " - ".mysqli_error($con));
    }
    else{
        $query_buku = "SELECT id_detail_buku FROM detail_peminjaman WHERE id_peminjaman = '$id'";
        $result_buku = mysqli_query($con, $query_buku);
        while($data_detail_buku = mysqli_fetch_assoc($result_buku)){
            $query_status_berubah = "UPDATE detail_buku SET status_buku = 'Dipinjam' WHERE id_detail_buku = '$data_detail_buku[id_detail_buku]'";
            $result_status_berubah = mysqli_query($con, $query_status_berubah); 
        };
        
        include('session.php');
        $query_riwayat = "INSERT INTO riwayat_kegiatan SET id_user = '$_SESSION[id_user]', 
                        riwayat_kegiatan = 'Melakukan Penerimaan Pemesanan', 
                        tgl_riwayat_kegiatan='$date', status_riwayat='primary'";
        $result_riwayat = mysqli_query($con, $query_riwayat);
        if(!$result_riwayat){
            die ("Query gagal dijalankan: ".mysqli_errno($con).
                " - ".mysqli_error($con));
        }
        else{
            header("location:../detail_peminjaman.php?id_peminjaman=$id&aksi=diterima");
        } 
    }
}
else{
      header("location:../404.php"); 
}
?> 