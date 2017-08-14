<?php
include 'koneksi.php';

    $id             = $_POST['id'];
    $foto           = $_FILES['foto']['name'];
    $tmp            = $_FILES['foto']['tmp_name'];
    $size           = $_FILES['foto']['size'];
    $explode	    = explode('.',$foto);
    $extensi	    = $explode[count($explode)-1];
    $nama           = $_POST['nama'];
    $jabatan        = $_POST['jabatan'];
    $no_hp          = $_POST['no_hp'];
    $alamat         = $_POST['alamat'];
    $password       = md5($_POST['konfirmasi']);

        $cekdulu= "SELECT password FROM user WHERE id_user = '$id' AND password = '$password'";
        $prosescek= mysqli_query($con, $cekdulu);

    if(mysqli_num_rows($prosescek)>0){
        if($foto == NULL){
            $query = "UPDATE user SET nama='$nama', jabatan='$jabatan', no_hp='$no_hp', alamat='$alamat' WHERE id_user ='$id'";
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
                header("location: ../tambah_pengajuan?aksi=format"); 
                }
                else if ($eror == "size"){
                header("location: ../tambah_pengajuan?aksi=size"); 
                }
                else{
                if(move_uploaded_file($tmp, $path)){ 
                    $query = "UPDATE user SET nama='$nama', foto_user='$fotobaru'
                            , jabatan='$jabatan', no_hp='$no_hp', alamat='$alamat' WHERE id_user = '$id'";
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
    else{
      header("location:../profil.php?aksi=password"); 
    }
?>
