<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $date = date("Ymd");
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

        include('session.php');
        $query_riwayat = "INSERT INTO riwayat_kegiatan SET id_user = '$_SESSION[id_user]', 
                        riwayat_kegiatan = 'Melakukan Penerimaan Pengembalian', 
                        tgl_riwayat_kegiatan='$date', status_riwayat='primary'";
        $result_riwayat = mysqli_query($con, $query_riwayat);
        if(!$result_riwayat){
            die ("Query gagal dijalankan: ".mysqli_errno($con).
                " - ".mysqli_error($con));
        }
        else{
            header("location:../detail_peminjaman.php?id_peminjaman=$id&aksi=kembali"); 
        } 
        
                            }

            }
        }
        else{

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
                
                        include('session.php');
                        $query_riwayat = "INSERT INTO riwayat_kegiatan SET id_user = '$_SESSION[id_user]', 
                                        riwayat_kegiatan = 'Melakukan Penerimaan Pengembalian', 
                                        tgl_riwayat_kegiatan='$date', status_riwayat='primary'";
                        $result_riwayat = mysqli_query($con, $query_riwayat);
                        if(!$result_riwayat){
                            die ("Query gagal dijalankan: ".mysqli_errno($con).
                                " - ".mysqli_error($con));
                        }
                        else{
                            header("location:../detail_peminjaman.php?id_peminjaman=$id&aksi=kembali"); 
                        } 
            }
        }
}
else{
      header("location:../404.php"); 
}
?> 