<?php
  include("koneksi.php");
  if (isset($_GET["id"])) {
    $id = $_GET["id"];
    

    $date = date("Ymd");
    
$query = "SELECT gambar_buku FROM buku WHERE id_buku='".$id."'";
$sql = mysqli_query($con, $query); 
$data = mysqli_fetch_array($sql); 
 
if($data['gambar_buku'] == "thumbnail.png"){
  $query2 = "DELETE FROM buku WHERE id_buku='".$id."'";
  $sql2 = mysqli_query($con, $query2);

      if($sql2){ 
        include('session.php');
        $query_riwayat = "INSERT INTO riwayat_kegiatan SET id_user = '$_SESSION[id_user]', 
                        riwayat_kegiatan = 'Melakukan Penghapusan Salah satu Data Buku', 
                        tgl_riwayat_kegiatan='$date', status_riwayat='danger'";
        $result_riwayat = mysqli_query($con, $query_riwayat);
        if(!$result_riwayat){
            die ("Query gagal dijalankan: ".mysqli_errno($con).
                " - ".mysqli_error($con));
        }
        else{
          header("location:../buku.php?aksi=hapus"); 
        }
      }
      else{
        header("location:../buku.php?aksi=error"); 
      }
}
else{
  if(is_file("../img/book/".$data['gambar_buku'])) 
        unlink("../img/book/".$data['gambar_buku']); 

  $query2 = "DELETE FROM buku WHERE id_buku='".$id."'";
  $sql2 = mysqli_query($con, $query2);

      if($sql2){ 
        include('session.php');
        $query_riwayat = "INSERT INTO riwayat_kegiatan SET id_user = '$_SESSION[id_user]', 
                        riwayat_kegiatan = 'Melakukan Penghapusan Salah satu Buku', 
                        tgl_riwayat_kegiatan='$date', status_riwayat='danger'";
        $result_riwayat = mysqli_query($con, $query_riwayat);
        if(!$result_riwayat){
            die ("Query gagal dijalankan: ".mysqli_errno($con).
                " - ".mysqli_error($con));
        }
        else{
          header("location:../buku.php?aksi=hapus"); 
        }
      }
      else{
        header("location:../buku.php?aksi=error"); 
      }
}
  }else{
    header("location:../404.php");
  }
?>
