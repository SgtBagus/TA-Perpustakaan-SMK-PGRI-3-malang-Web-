<?php
include 'koneksi.php';
if (isset($_POST['input'])) {
    $id                 = $_POST['id'];
    $username           = $_POST['username'];
    $konfirmasi      = $_POST['konfirmasi'];

        $cekdulu= "SELECT password FROM user WHERE id_user = '$id' AND password = '$konfirmasi'";
        $prosescek= mysqli_query($con, $cekdulu);

    if(mysqli_num_rows($prosescek)>0){
 
        if($password == $konfimasi_password){    
            $query = "UPDATE user SET username='$username' WHERE id_user = '$id'";
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