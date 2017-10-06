<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $id= ($_GET["id"]);
    $status_peminjaman = "SELECT status_pinjaman, tgl_peminjaman, tgl_peminjaman, tgl_pengembalian FROM peminjaman WHERE id_peminjaman = '$id'";
    $result_status = mysqli_query($con, $status_peminjaman);
        $data      = mysqli_fetch_assoc($result_status);

        $tanggal = date('Y-m-d');
        $status               = $data["status_pinjaman"];
        $tanggal_peminjaman   = $data["tgl_peminjaman"];
        $tanggal_pengembalian = $data["tgl_pengembalian"];
        
        $date1 = new DateTime($tanggal_peminjaman);
        $date2 = new DateTime($tanggal_pengembalian);
        $date3 = new DateTime($tanggal); 
        $denda = $date2->diff($date1)->format("%a");

    if($status == "Menunggu"){
        header("location:../tambah_sanksi.php?id_peminjaman=$id"); 
    }
    else if($status == "Diterima"){
        if($date3 > $date2){

            $query_banyak = "SELECT id_detail_peminjaman
            FROM detail_peminjaman WHERE id_peminjaman LIKE '$id'";
                $result_banyak = mysqli_query($con, $query_banyak);
                $banyakdata_banyak = $result_banyak->num_rows;

            $terlambat = $date3->diff($date2)->format("%a");
            $denda = $terlambat * 100 * $banyakdata_banyak;
            $query = "UPDATE peminjaman SET total_terlambat='$terlambat', denda='$denda' WHERE id_peminjaman = '$id'";
            $result = mysqli_query($con, $query);
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($con).
                " - ".mysqli_error($con));
            }
            else{
                header("location:../tambah_sanksi.php?id_peminjaman=$id"); 
            }
        }
        else{
            header("location:../tambah_sanksi.php?id_peminjaman=$id"); 
        }
    }
    else if($status == "Ditolak"){
        header("location:../tambah_sanksi.php?id_peminjaman=$id"); 
    }
    else if($status == "Kembali"){
        header("location:../tambah_sanksi.php?id_peminjaman=$id"); 
    }
}
else{
      header("location:../404.php"); 
}
?> 