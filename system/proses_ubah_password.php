<?php
include 'koneksi.php';
if (isset($_POST['input'])) {
    $id                 = $_POST['id'];
    $password           = $_POST['password_baru'];
    $konfimasi_password = $_POST['konfirmasi_password_baru'];
    $password_lama      = $_POST['password_lama'];

        $cekdulu= "SELECT password FROM user WHERE id_user = '$id' AND password = '$password_lama'";
        $prosescek= mysqli_query($con, $cekdulu);

    if(mysqli_num_rows($prosescek)>0){
 
        if($password == $konfimasi_password){    
            $query = "UPDATE user SET password='$password' WHERE id_user = '$id'";
            $result = mysqli_query($con, $query);
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($con).
                " - ".mysqli_error($con));
            }
            header("location:../profil.php?aksi=terubah"); 
        }
        else{
            header("location:../profil.php?aksi=konfimasi"); 
        }
    }
    else{
      header("location:../profil.php?aksi=password"); 
    }
} 
else{
      header("location:../404.php"); 
}