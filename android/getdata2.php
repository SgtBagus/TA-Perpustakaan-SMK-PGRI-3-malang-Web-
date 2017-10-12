<?php
 include 'koneksi.php';
 
 $id = $_GET['id'];
 $hasil         = mysqli_query($con, "SELECT * FROM detail_buku INNER JOIN buku ON buku.id_buku = detail_buku.id_buku WHERE detail_buku.id_buku = '$id'")
				  or die(mysqli_error());
 $json_response = array();
 $row 			= $hasil->num_rows;

if($row> 0){
 while ($row = mysqli_fetch_array($hasil)) {
     $json_response[] = $row;
 }
 echo 
 json_encode(array('jb' => $json_response));
 
}
?>
