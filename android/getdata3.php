<?php
 include 'koneksi.php';
 
 $id = $_GET['id'];
 $hasil         = mysqli_query($con, "SELECT * FROM riwayat_kegiatan WHERE id_user = '$id'")
				  or die(mysqli_error());
 $json_response = array();
 $row 			= $hasil->num_rows;

if($row> 0){
 while ($row = mysqli_fetch_array($hasil)) {
     $json_response[] = $row;
 }
 echo 
 json_encode(array('rwyt' => $json_response));
 
}
?>
