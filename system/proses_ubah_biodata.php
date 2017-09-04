<?php
include 'koneksi.php';

if (isset($_POST['input'])) {
    $id             = $_POST['id'];
    $NIP            = $_POST['NIP'];
    $foto           = $_FILES['foto']['name'];
    $tmp            = $_FILES['foto']['tmp_name'];
    $size           = $_FILES['foto']['size'];
    $explode	    = explode('.',$foto);
    $extensi	    = $explode[count($explode)-1];
    $nama           = $_POST['nama'];
    $jabatan        = $_POST['jabatan'];
    $no_hp          = $_POST['no_hp'];
    $alamat         = $_POST['alamat'];
    $password       = $_POST['konfirmasi'];

        $cekdulu= "SELECT password FROM user WHERE id_user = '$id' AND password = '$password'";
        $prosescek= mysqli_query($con, $cekdulu);

    if(mysqli_num_rows($prosescek)>0){
        if($foto == NULL){
            $query = "UPDATE pegawai SET nama_pegawai='$nama', 
                     jabatan_pegawai='$jabatan', no_hp_pegawai='$no_hp', 
                     alamat_pegawai='$alamat' WHERE NIP ='$NIP'";
            $result = mysqli_query($con, $query);

            if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($con).
                        " - ".mysqli_error($con)); 
            }
            if($result){ 
                header("location: ../profil.php?aksi=terubah"); 
            }else{
                header("location: ../profil.php?aksi=error"); 
            }
        }   
        else{
            $file_type	= array('jpg','jpeg','png' ); 
            $fotobaru = date('dmYHis').$foto;
            $path = "../img/avatars/".$fotobaru; 
            
            if(!in_array($extensi,$file_type)){
                $eror   = "format";
            }

            if($size > 1000000){
                $eror   = "size";
            }

                if($eror == "format"){
                header("location: ../profil.php?aksi=format"); 
                }
                else if ($eror == "size"){
                header("location: ../profil.php?aksi=size"); 
                }
                else{
                    $query_cek_gambar = "SELECT foto_pegawai FROM pegawai WHERE NIP='$NIP'";
                    $result_cek_gambar = mysqli_query($con, $query_cek_gambar);
                        if(!$result_cek_gambar){
                        die ("Query Error: ".mysqli_errno($con).
                            " - ".mysqli_error($con));
                        }
                    $data_cek_gambar  = mysqli_fetch_assoc($result_cek_gambar);

                    if($data_cek_gambar["foto_pegawai"] == "thumbnail.jpg"){
                        if(move_uploaded_file($tmp, $path)){ 
                            $query = "UPDATE pegawai SET nama_pegawai='$nama', foto_pegawai='$fotobaru'
                                    , jabatan_pegawai='$jabatan', no_hp_pegawai='$no_hp'
                                    , alamat_pegawai='$alamat' WHERE NIP = '$NIP'";
                            $result = mysqli_query($con, $query);

                            if(!$result){
                                die ("Query gagal dijalankan: ".mysqli_errno($con).
                                    " - ".mysqli_error($con));
                            }
                            if($result){ 
                                header("location: ../profil.php?aksi=terubah"); 
                            }
                            else{
                                header("location: ../profil.php?aksi=error"); 
                            }
                        }
                        else{
                            header("location: ../profil.php?aksi=error"); 
                        }
                    }

                    else{
                        if(is_file("../img/avatars/".$data_cek_gambar['foto_pegawai'])) 
						    unlink("../img/avatars/".$data_cek_gambar['foto_pegawai']); 
                            
                            if(move_uploaded_file($tmp, $path)){ 
                            $query = "UPDATE pegawai SET nama_pegawai='$nama', foto_pegawai='$fotobaru'
                                    , jabatan_pegawai='$jabatan', no_hp_pegawai='$no_hp'
                                    , alamat_pegawai='$alamat' WHERE NIP = '$NIP'";
                            $result = mysqli_query($con, $query);

                            if(!$result){
                                die ("Query gagal dijalankan: ".mysqli_errno($con).
                                    " - ".mysqli_error($con));
                            }
                            if($result){ 
                                header("location: ../profil.php?aksi=terubah"); 
                            }
                            else{
                                header("location: ../profil.php?aksi=error"); 
                            }
                        }
                        else{
                            header("location: ../profil.php?aksi=error"); 
                        }
                    }
                }
                    
        }
    }
    else{
      header("location:../profil.php?aksi=password"); 
    }
}
else{
      header("location:../404.php"); 
}
?>
