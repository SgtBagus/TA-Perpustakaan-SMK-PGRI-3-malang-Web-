<?php
include 'koneksi.php';

if (isset($_POST['input'])) {
  $noinduk          = $_POST['noinduk'];
  $username         = $_POST['username'];
  $email            = $_POST['email'];
  $password         = $_POST['password'];
  $konpass          = $_POST['konpass'];

    $cekdulu= "SELECT id_user FROM user WHERE id_siswa_pegawai='$noinduk'";
    $prosescek= mysqli_query($con, $cekdulu);
    if (mysqli_num_rows($prosescek)>0) {
        $cekke2="SELECT * FROM user WHERE email = '$email' OR username = '$username'";
        $prosescekke2 = mysqli_query($con, $cekke2);

        if (mysqli_num_rows($prosescekke2)>0) {
            header("location:../daftar.php?alert=duplicate"); 
        }
        else{
            echo 'email dan username gak terdaftar <br>';
            if ($password == $konpass) {
                $daftar = "UPDATE user SET username='$username', email='$email', password='$password', verifikasi='Sudah' 
                          WHERE id_siswa_pegawai = '$noinduk'";

                $result_daftar = mysqli_query($con, $daftar);
                if(!$result_daftar){
                    header("location:../daftar.php?alert=error"); 
                }
                else{
                    header("location:../terdaftar.php"); 
                }
            }
            else{
                header("location:../daftar.php?alert=password"); 
            }
        }
    }
    else { 
        header("location:../daftar.php?alert=tidak_terdaftar"); 
    }
}
else {
  header("location:../404.php");
}
?>
