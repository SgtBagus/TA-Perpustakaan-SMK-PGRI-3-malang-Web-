<?php
  include("koneksi.php");
  if (isset($_GET["id"])) {
    $id = $_GET["id"];
    

$query = "SELECT gambar_buku FROM buku WHERE id_buku='".$id."'";
$sql = mysqli_query($con, $query); 
$data = mysqli_fetch_array($sql); 

if(is_file("../img/book/".$data['gambar_buku'])) 
			unlink("../img/book/".$data['gambar_buku']); 

$query2 = "DELETE FROM buku WHERE id_buku='".$id."'";
$sql2 = mysqli_query($con, $query2);

    if($sql2){ 
	    header("location:../buku.php?aksi=terhapus"); 
    }
    else{
	    header("location:../buku.php?aksi=error"); 
    }
  }else{
    header("location:../404.php");
  }
?>
