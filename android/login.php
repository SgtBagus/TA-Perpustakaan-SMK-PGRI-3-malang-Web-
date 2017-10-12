<?php
 define('HOST','localhost');
 define('USER','root');
 define('PASS','');
 define('DB','katalog_perpustakaan');

 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
 if($_SERVER['REQUEST_METHOD']=='POST'){
 //Getting values-
 $username = $_POST['email'];
 $password = $_POST	['password'];
 $md5 	   = md5($password);

 //Creating sql query
 $sql = "SELECT * FROM user WHERE email='$username' AND password='$md5' AND role='user' AND verifikasi='Sudah' ";

 //executing query
 $result = mysqli_query($con,$sql);

 //fetching result
 $check = mysqli_fetch_array($result);

 //if we got some result
 if(isset($check)){
 //displaying success
	echo $check['username'];
 }else{
 //displaying failure
	echo 'zong';
 }
 mysqli_close($con);
 }
 