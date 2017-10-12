<?php
 include 'koneksi.php';
 $hasil         = mysqli_query($con, "SELECT * FROM buku INNER JOIN jenis_buku ON jenis_buku.id_jenis_buku = buku.id_jenis_buku 
										INNER JOIN detail_buku ON buku.id_buku=detail_buku.id_buku group by detail_buku.id_buku") or die(mysqli_error());
 $json_response = array();
 $row 			= $hasil->num_rows;

if($row> 0){
 while ($row = mysqli_fetch_array($hasil)) {
     $json_response[] = $row;
 }
 echo 
 json_encode(array('buku_buku' => $json_response));
 
}
?>
