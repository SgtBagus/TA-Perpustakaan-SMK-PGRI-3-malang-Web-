<?php
include 'koneksi.php';
    $id             = $_POST['id'];
    $email          = $_POST['email'];
    $password       = $_POST['konfirmasi'];

        $cekdulu= "SELECT password FROM user WHERE id_user = '$id' AND password = '$password'";
        $prosescek= mysqli_query($con, $cekdulu);

    if(mysqli_num_rows($prosescek)>0){
        
            $query = "UPDATE user SET email='$email' WHERE id_user = '$id'";
            $result = mysqli_query($con, $query);

        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($con).
            " - ".mysqli_error($con));
        }
        header("location:logout.php"); 
    }
    else{
      header("location:../profil.php?aksi=password"); 
    }

?>