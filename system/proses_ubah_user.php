<?php
include 'koneksi.php';

if (isset($_POST['input'])) { 
    $no_induk       = $_POST['no_induk'];
    $foto           = $_FILES['foto']['name'];
    $tmp            = $_FILES['foto']['tmp_name'];
    $size           = $_FILES['foto']['size'];
    $explode	    = explode('.',$foto);
    $extensi	    = $explode[count($explode)-1];
    $username       = $_POST['username'];
    $password       = $_POST['password'];
    $no_hp          = $_POST['no_hp'];
    $alamat         = $_POST['alamat'];

    $cekdulu= "SELECT NIS FROM siswa WHERE NIS = '$no_induk";
    $prosescek= mysqli_query($con, $cekdulu);

    if(mysqli_num_rows($prosescek) > 0){
        echo "siswa";
    }
        
    else{
        echo "pegawai";
    }   
}
else{
      header("location:../404.php"); 
}
?>
