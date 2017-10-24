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
    $password       = md5($_POST['password']);
    $no_hp          = $_POST['no_hp'];
    $alamat         = $_POST['alamat'];

        $cekdulu= "SELECT NIS FROM siswa WHERE NIS = '$no_induk'";
        $prosescek= mysqli_query($con, $cekdulu);

    if(mysqli_num_rows($prosescek) > 0){
        if($foto == NULL){
            $query = "UPDATE siswa SET no_hp_siswa='$no_hp', 
                     alamat_siswa='$alamat' WHERE NIS ='$no_induk'";
            $result = mysqli_query($con, $query);

            if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($con).
                        " - ".mysqli_error($con)); 
            }
            if($result){ 
                $query_user = "UPDATE user SET username='$username', 
                            password='$password' WHERE id_siswa_pegawai ='$no_induk'";
                $result_user = mysqli_query($con, $query_user);

                if(!$result_user){
                die ("Query gagal dijalankan: ".mysqli_errno($con).
                            " - ".mysqli_error($con)); 
                }
                if($result_user){ 
                    header("location: ../profil_user.php?no_induk=$no_induk&aksi=terubah"); 
                }else{
                    header("location: ../profil_user.php?no_induk=$no_induk&aksi=error"); 
                }
            }else{
                header("location: ../profil_user.php?no_induk=$no_induk&aksi=error"); 
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
                header("location: ../profil_user.php?no_induk=$no_induk&aksi=format"); 
                }
                else if ($eror == "size"){
                header("location: ../profil_user.php?no_induk=$no_induk&aksi=size"); 
                }
                else{
                    $query_cek_gambar = "SELECT foto_siswa FROM siswa WHERE NIS ='$no_induk'";
                    $result_cek_gambar = mysqli_query($con, $query_cek_gambar);
                        if(!$result_cek_gambar){
                        die ("Query Error: ".mysqli_errno($con).
                            " - ".mysqli_error($con));
                        }
                    $data_cek_gambar  = mysqli_fetch_assoc($result_cek_gambar);

                    if($data_cek_gambar["foto_siswa"] == "thumbnail.jpg"){
                        if(move_uploaded_file($tmp, $path)){ 
                            $query = "UPDATE siswa SET no_hp_siswa='$no_hp'
                                    , alamat_siswa='$alamat'  WHERE NIS ='$no_induk'";
                            $result = mysqli_query($con, $query);

                            if(!$result){
                                die ("Query gagal dijalankan: ".mysqli_errno($con).
                                    " - ".mysqli_error($con));
                            }
                            if($result){ 
                                $query_user = "UPDATE user SET username='$username', 
                                            password='$password' WHERE id_siswa_pegawai ='$no_induk'";
                                $result_user = mysqli_query($con, $query_user);
                
                                if(!$result_user){
                                die ("Query gagal dijalankan: ".mysqli_errno($con).
                                            " - ".mysqli_error($con)); 
                                }
                                if($result_user){ 
                                    header("location: ../profil_user.php?no_induk=$no_induk&aksi=terubah"); 
                                }else{
                                    header("location: ../profil_user.php?no_induk=$no_induk&aksi=error"); 
                                }
                            }
                            else{
                                header("location: ../profil_user.php?no_induk=$no_induk&aksi=error"); 
                            }
                        }
                        else{
                            header("location: ../profil_user.php?no_induk=$no_induk&aksi=error"); 
                        }
                    }

                    else{
                        if(is_file("../img/avatars/".$data_cek_gambar['foto_siswa'])) 
						    unlink("../img/avatars/".$data_cek_gambar['foto_siswa']); 
                            
                            if(move_uploaded_file($tmp, $path)){ 
                            $query = "UPDATE siswa SET foto_siswa='$fotobaru', no_hp_siswa='$no_hp'
                                    , alamat_siswa='$alamat' WHERE NIS ='$no_induk'";
                            $result = mysqli_query($con, $query);

                            if(!$result){
                                die ("Query gagal dijalankan: ".mysqli_errno($con).
                                    " - ".mysqli_error($con));
                            }
                            if($result){ 
                                $query_user = "UPDATE user SET username='$username', 
                                            password='$password' WHERE id_siswa_pegawai ='$no_induk'";
                                $result_user = mysqli_query($con, $query_user);
                
                                if(!$result_user){
                                die ("Query gagal dijalankan: ".mysqli_errno($con).
                                            " - ".mysqli_error($con)); 
                                }
                                if($result_user){ 
                                    header("location: ../profil_user.php?no_induk=$no_induk&aksi=terubah"); 
                                }else{
                                    header("location: ../profil_user.php?no_induk=$no_induk&aksi=error"); 
                                }
                            }
                            else{
                                header("location: ../profil_user.php?no_induk=$no_induk&aksi=error"); 
                            }
                        }
                        else{
                            header("location: ../profil_user.php?no_induk=$no_induk&aksi=error"); 
                        }
                    }
                }
                    
        }
    }
        
    else{
        if($foto == NULL){
            $query = "UPDATE pegawai SET no_hp_pegawai='$no_hp', 
                     alamat_pegawai='$alamat' WHERE NIP ='$no_induk'";
            $result = mysqli_query($con, $query);

            if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($con).
                        " - ".mysqli_error($con)); 
            }
            if($result){ 
                $query_user = "UPDATE user SET username='$username', 
                            password='$password' WHERE id_siswa_pegawai ='$no_induk'";
                $result_user = mysqli_query($con, $query_user);

                if(!$result_user){
                die ("Query gagal dijalankan: ".mysqli_errno($con).
                            " - ".mysqli_error($con)); 
                }
                if($result_user){ 
                    header("location: ../profil_user.php?no_induk=$no_induk&aksi=terubah"); 
                }else{
                    header("location: ../profil_user.php?no_induk=$no_induk&aksi=error"); 
                }
            }else{
                header("location: ../profil_user.php?no_induk=$no_induk&aksi=error"); 
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
                header("location: ../profil_user.php?no_induk=$no_induk&aksi=format"); 
                }
                else if ($eror == "size"){
                header("location: ../profil_user.php?no_induk=$no_induk&aksi=size"); 
                }
                else{
                    $query_cek_gambar = "SELECT foto_pegawai FROM pegawai WHERE NIP ='$no_induk'";
                    $result_cek_gambar = mysqli_query($con, $query_cek_gambar);
                        if(!$result_cek_gambar){
                        die ("Query Error: ".mysqli_errno($con).
                            " - ".mysqli_error($con));
                        }
                    $data_cek_gambar  = mysqli_fetch_assoc($result_cek_gambar);

                    if($data_cek_gambar["foto_pegawai"] == "thumbnail.jpg"){
                        if(move_uploaded_file($tmp, $path)){ 
                            $query = "UPDATE pegawai SET no_hp_pegawai='$no_hp'
                                    , alamat_pegawai='$alamat'  WHERE NIP ='$no_induk'";
                            $result = mysqli_query($con, $query);

                            if(!$result){
                                die ("Query gagal dijalankan: ".mysqli_errno($con).
                                    " - ".mysqli_error($con));
                            }
                            if($result){ 
                                $query_user = "UPDATE user SET username='$username', 
                                            password='$password' WHERE id_siswa_pegawai ='$no_induk'";
                                $result_user = mysqli_query($con, $query_user);
                
                                if(!$result_user){
                                die ("Query gagal dijalankan: ".mysqli_errno($con).
                                            " - ".mysqli_error($con)); 
                                }
                                if($result_user){ 
                                    header("location: ../profil_user.php?no_induk=$no_induk&aksi=terubah"); 
                                }else{
                                    header("location: ../profil_user.php?no_induk=$no_induk&aksi=error"); 
                                }
                            }
                            else{
                                header("location: ../profil_user.php?no_induk=$no_induk&aksi=error"); 
                            }
                        }
                        else{
                            header("location: ../profil_user.php?no_induk=$no_induk&aksi=error"); 
                        }
                    }

                    else{
                        if(is_file("../img/avatars/".$data_cek_gambar['foto_pegawai'])) 
						    unlink("../img/avatars/".$data_cek_gambar['foto_pegawai']); 
                            
                            if(move_uploaded_file($tmp, $path)){ 
                            $query = "UPDATE pegawai SET foto_pegawai='$fotobaru', no_hp_pegawai='$no_hp'
                                    , alamat_pegawai='$alamat' WHERE NIP ='$no_induk'";
                            $result = mysqli_query($con, $query);

                            if(!$result){
                                die ("Query gagal dijalankan: ".mysqli_errno($con).
                                    " - ".mysqli_error($con));
                            }
                            if($result){ 
                                $query_user = "UPDATE user SET username='$username', 
                                            password='$password' WHERE id_siswa_pegawai ='$no_induk'";
                                $result_user = mysqli_query($con, $query_user);
                
                                if(!$result_user){
                                die ("Query gagal dijalankan: ".mysqli_errno($con).
                                            " - ".mysqli_error($con)); 
                                }
                                if($result_user){ 
                                    header("location: ../profil_user.php?no_induk=$no_induk&aksi=terubah"); 
                                }else{
                                    header("location: ../profil_user.php?no_induk=$no_induk&aksi=error"); 
                                } 
                            }
                            else{
                                header("location: ../profil_user.php?no_induk=$no_induk&aksi=error"); 
                            }
                        }
                        else{
                            header("location: ../profil_user.php?no_induk=$no_induk&aksi=error"); 
                        }
                    }
                }
                    
        }
    }   
}
else{
      header("location:../404.php"); 
}
?>
