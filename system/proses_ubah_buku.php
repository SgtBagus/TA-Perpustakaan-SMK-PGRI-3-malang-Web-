<?php 
include 'koneksi.php';

if (isset($_POST['input'])) {

    $id_buku          = $_POST['id_buku'];
    $judul            = $_POST['judul'];
    $judul_singkat    = $_POST['judul_singkat'];
    $foto             = $_FILES['foto']['name'];
        $tmp              = $_FILES['foto']['tmp_name'];
        $size             = $_FILES['foto']['size'];
        $explode	        = explode('.',$foto);
        $extensi	        = $explode[count($explode)-1];
    $jilid            = $_POST['jilid'];
    $cetakan          = $_POST['cetakan'];
    $edisi            = $_POST['edisi'];
    $ISBN             = $_POST['ISBN'];
    $jenis_media      = $_POST['jenis_media']; 
    $kota             = $_POST['kota'];
    $penerbit         = $_POST['penerbit'];
    $terbit           = date('Y-m-d', strtotime($_POST['terbit']));
    $jenis_buku       = $_POST['jenis_buku'];
    $koleksi          = $_POST['koleksi'];
    $bahasa           = $_POST['bahasa'];
    $sumber           = $_POST['sumber'];
    $biografi         = $_POST['biografi'];

    $date = date("Ymd");

        if($foto == NULL){ 
            $query = "UPDATE buku SET judul_buku='$judul', judul_singkat='$judul_singkat'
                      , cetakan='$cetakan', edisi='$edisi', ISBN='$ISBN', sumber='$sumber', tgl_entri_buku='$date'
                      , jenis_media='$jenis_media', id_jenis_buku='$jenis_buku', jenis_koleksi='$koleksi', kota_terbit='$kota'
                      , penerbit='$penerbit', tahun_terbit='$terbit', biografi='$biografi'
                      , bahasa='$bahasa' WHERE id_buku = '$id_buku'";
            $result = mysqli_query($con, $query);

            if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($con).
                        " - ".mysqli_error($con)); 
            }
            if($result){ 
                header("location: ../detail_buku.php?ISBN=$ISBN&aksi=ubah"); 
            }else{
                header("location: ../ubah_buku.php?ISBN=$ISBN&aksi=error"); 
            }
        }   
        else{
            $file_type	= array('jpg','jpeg','png' ); 
            $fotobaru = date('dmYHis').$foto;
            $path = "../img/book/".$fotobaru; 

                if(!in_array($extensi,$file_type)){
                header("location: ../ubah_buku.php?ISBN=$ISBN&aksi=file"); 
                }
                else if ($size > 1000000){
                header("location: ../ubah_buku.php?ISBN=$ISBN&aksi=size"); 
                }
                else{
                    $query_cek_gambar = "SELECT gambar_buku FROM buku WHERE id_buku='$id_buku'";
                    $result_cek_gambar = mysqli_query($con, $query_cek_gambar);
                        if(!$result_cek_gambar){
                        die ("Query Error: ".mysqli_errno($con).
                            " - ".mysqli_error($con));
                        }
                    $data_cek_gambar  = mysqli_fetch_assoc($result_cek_gambar);


                    if($data_cek_gambar["gambar_buku"] == "thumbnail.png"){
                        if(move_uploaded_file($tmp, $path)){ 
                            $query = "UPDATE buku SET judul_buku='$judul', judul_singkat='$judul_singkat', gambar_buku='$fotobaru'
                                     , cetakan='$cetakan', edisi='$edisi', ISBN='$ISBN', sumber='$sumber', tgl_entri_buku='$date'
                                     , jenis_media='$jenis_media', id_jenis_buku='$jenis_buku', jenis_koleksi='$koleksi', kota_terbit='$kota'
                                     , penerbit='$penerbit', tahun_terbit='$terbit', biografi='$biografi'
                                     , bahasa='$bahasa' WHERE id_buku = '$id_buku'";
                            $result = mysqli_query($con, $query);
                            if(!$result){
                                die ("Query gagal dijalankan: ".mysqli_errno($con).
                                    " - ".mysqli_error($con));
                            }

                            if($result){ 
                                header("location: ../detail_buku.php?ISBN=$ISBN&aksi=ubah"); 
                            }
                            else{
                                header("location: ../ubah_buku.php?ISBN=$ISBN&aksi=error"); 
                            }
                        }
                        else{
                            header("location: ../ubah_buku.php?ISBN=$ISBN&aksi=error"); 
                        }
                    }
                    else{
                        if(is_file("../img/book/".$data_cek_gambar['gambar_buku'])) 
						    unlink("../img/book/".$data_cek_gambar['gambar_buku']);
                        
                        if(move_uploaded_file($tmp, $path)){ 
                            $query = "UPDATE buku SET judul_buku='$judul', judul_singkat='$judul_singkat', gambar_buku='$fotobaru'
                                     , jenis_media='$jenis_media', id_jenis_buku='$jenis_buku', jenis_koleksi='$koleksi', kota_terbit='$kota'
                                     , penerbit='$penerbit', tahun_terbit='$terbit', biografi='$biografi'
                                     , bahasa='$bahasa' WHERE id_buku = '$id_buku'";
                            $result = mysqli_query($con, $query);
                            if(!$result){
                                die ("Query gagal dijalankan: ".mysqli_errno($con).
                                    " - ".mysqli_error($con));
                            }

                            if($result){ 
                                header("location: ../detail_buku.php?ISBN=$ISBN&aksi=ubah"); 
                            }
                            else{
                                header("location: ../ubah_buku.php?ISBN=$ISBN&aksi=error"); 
                            }
                        }
                        else{
                            header("location: ../ubah_buku.php?ISBN=$ISBN&aksi=error"); 
                        } 
                    }
                }
            }
}
else{
    header("location: ../404.php"); 
}
?>
