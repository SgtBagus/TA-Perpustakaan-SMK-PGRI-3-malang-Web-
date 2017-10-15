<?php
include 'koneksi.php';

if (isset($_POST['input'])) { 
    $id             = $_POST['id_login'];
    $NIP            = $_POST['NIP'];
    $nama           = $_POST['nama'];
    $jabatan        = $_POST['jabatan'];
    $no_hp          = $_POST['no_hp'];
    $alamat         = $_POST['alamat'];
    $password       = $_POST['konfirmasi'];

        $cekdulu= "SELECT password FROM user WHERE id_user = '$id' AND password = md5('$password')";
        $prosescek= mysqli_query($con, $cekdulu);

    if(mysqli_num_rows($prosescek)>0){
        $query = "UPDATE pegawai SET nama_pegawai='$nama', 
                    jabatan_pegawai='$jabatan', no_hp_pegawai='$no_hp', 
                    alamat_pegawai='$alamat' WHERE NIP ='$NIP'";
        $result = mysqli_query($con, $query);

        if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($con).
                " - ".mysqli_error($con)); 
        }
        if($result){ 
            header("location:../detail_pegawai.php?no_induk=$NIP&aksi=terubah"); 
        }else{
            header("location:../detail_pegawai.php?no_induk=$NIP&aksi=error"); 
        }
    }
    else{
      header("location:../detail_pegawai.php?no_induk=$NIP&aksi=password"); 
    }
}
else{
      header("location:../404.php"); 
}
?>
