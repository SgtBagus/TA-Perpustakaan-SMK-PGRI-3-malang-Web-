<?php
include 'koneksi.php';

if (isset($_POST['input'])) { 
    $id             = $_POST['id_login'];
    $NIS            = $_POST['NIS'];
    $nama           = $_POST['nama'];
    $jabatan        = $_POST['kelas'];
    $no_hp          = $_POST['no_hp'];
    $alamat         = $_POST['alamat'];
    $password       = $_POST['konfirmasi'];

        $cekdulu= "SELECT password FROM user WHERE id_user = '$id' AND password = md5('$password')";
        $prosescek= mysqli_query($con, $cekdulu);

    if(mysqli_num_rows($prosescek)>0){
        $query = "UPDATE siswa SET nama_siswa='$nama', 
                    kelas='$jabatan', no_hp_siswa='$no_hp', 
                    alamat_siswa='$alamat' WHERE NIS ='$NIS'";
        $result = mysqli_query($con, $query);

        if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($con).
                " - ".mysqli_error($con)); 
        }
        if($result){ 
            header("location:../detail_siswa.php?no_induk=$NIS&aksi=terubah"); 
        }else{
            header("location:../detail_siswa.php?no_induk=$NIS&aksi=error"); 
        }
    }
    else{
      header("location:../detail_siswa.php?no_induk=$NIS&aksi=password"); 
    }
}
else{
      header("location:../404.php"); 
}
?>
