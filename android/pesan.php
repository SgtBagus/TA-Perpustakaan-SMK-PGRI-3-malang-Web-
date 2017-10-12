<?php
 define('HOST','localhost');
 define('USER','root');
 define('PASS','');
 define('DB','katalog_perpustakaan');

 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
 if($_SERVER['REQUEST_METHOD']=='POST'){
	echo '44su' ;
 }
 ?>