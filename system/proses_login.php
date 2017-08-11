<?php
session_start();
include "koneksi.php";
$email=$_POST['email'];
$password=$_POST['password'];
$hash=md5($password);

$op=$_GET['op'];
if($op=="in"){
	$sql=mysqli_query( $con, "SELECT * FROM verifikasi WHERE email_user='$email' 
					   AND password_user = '$hash' AND role_user = 'admin'");
	if(mysqli_num_rows($sql)==1){
		$qry = mysqli_fetch_array($sql);
		$_SESSION['email'] = $qry['email_user'];
			header("location:../index.php");
	}
}
    echo "<script type='text/javascript'>document.location='../login.php?alert=error ';</script>";
?>
