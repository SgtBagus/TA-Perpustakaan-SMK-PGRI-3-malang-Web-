<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $tanggal_kembali = date('Y-m-d');
    $query = "UPDATE peminjaman SET status_pinjaman='Kembali', tgl_kembali='$tanggal_kembali' WHERE id_peminjaman = '$id'";
    $result = mysqli_query($con, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($con).
        " - ".mysqli_error($con));
    }
    else{
        $query_buku = "SELECT id_detail_buku FROM detail_peminjaman WHERE id_peminjaman = '$id'";
        $result_buku = mysqli_query($con, $query_buku);
        while($data_detail_buku = mysqli_fetch_assoc($result_buku)){
            $query_status_berubah = "UPDATE detail_buku SET status_buku = 'Siap Terpinjam' WHERE id_detail_buku = '$data_detail_buku[id_detail_buku]'";
            $result_status_berubah = mysqli_query($con, $query_status_berubah); 
        };
        header("location:../detail_peminjaman.php?id_peminjaman=$id&aksi=kembali"); 
    }
}
else{
      header("location:../404.php"); 
}
?> 