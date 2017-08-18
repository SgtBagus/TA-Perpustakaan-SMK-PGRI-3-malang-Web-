<?php 
include 'koneksi.php';

if (isset($_POST['input'])) {
  $judul            = $_POST['judul'];
  $judul_singkat    = $_POST['judul_singkat'];
  $foto             = $_FILES['foto']['name'];
    $tmp              = $_FILES['foto']['tmp_name'];
    $size             = $_FILES['foto']['size'];
    $explode	        = explode('.',$foto);
    $extensi	        = $explode[count($explode)-1];
  $jenis_media      = $_POST['jenis_media'];
  $kota             = $_POST['kota'];
  $penerbit         = $_POST['penerbit'];
  $terbit           = date('Y-m-d', strtotime($_POST['terbit']));
  $jenis_buku       = $_POST['jenis_buku'];
  $koleksi          = $_POST['koleksi'];
  $bahasa           = $_POST['bahasa'];
  $biografi         = $_POST['biografi'];

        $cekdulu= "SELECT * FROM buku WHERE judul_buku='$judul'";
        $prosescek= mysqli_query($con, $cekdulu);

    if(mysqli_num_rows($prosescek)>0){
      header("location:../tambah_buku.php?aksi=duplicate"); 
    }
    else{
      if($foto == NULL){
            $query = "INSERT INTO buku SET judul_buku='$judul', judul_singkat='$judul_singkat', gambar_buku='thumbnail.png'
                      , jenis_media='$jenis_media', id_jenis_buku='$jenis_buku', jenis_koleksi='$koleksi', kota_terbit='$kota'
                      , penerbit='$penerbit', tahun_terbit='$terbit', biografi='$biografi'
                      , bahasa='$bahasa'";
            $result = mysqli_query($con, $query);

            if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($con).
                        " - ".mysqli_error($con)); 
            }
            if($result){ 
                header("location: ../buku.php?aksi=tertambah"); 
            }else{
                header("location: ../tambah_buku.php?aksi=error"); 
            }
        }   
        else{
            $file_type	= array('jpg','jpeg','png', 'JPG', 'JPEG', 'PNG' ); 
            $fotobaru = date('dmYHis').$foto;
            $path = "../img/book/".$fotobaru; 

                if(!in_array($extensi,$file_type)){
                    header("location: ../tambah_buku.php?aksi=format"); 
                }
                else if ($size > 1000000){
                    header("location: ../tambah_buku.php?aksi=size"); 
                }
                else{
                        if(move_uploaded_file($tmp, $path)){ 
                            $query = "INSERT INTO buku SET judul_buku='$judul', judul_singkat='$judul_singkat', gambar_buku='$fotobaru'
                      , jenis_media='$jenis_media', id_jenis_buku='$jenis_buku', jenis_koleksi='$koleksi', kota_terbit='$kota'
                      , penerbit='$penerbit', tahun_terbit='$terbit', biografi='$biografi'
                      , bahasa='$bahasa'";
                            $result = mysqli_query($con, $query);
                            if(!$result){
                                die ("Query gagal dijalankan: ".mysqli_errno($con).
                                    " - ".mysqli_error($con));
                            }

                            if($result){ 
                                header("location: ../buku.php?aksi=tertambah"); 
                            }
                            else{
                                header("location: ../tambah_buku.php?aksi=error"); 
                            }
                        }
                        else{
                                header("location: ../tambah_buku.php?aksi=error"); 
                    }
                }
                  
        }
    }
}
else{
    header("location: ../404.php"); 
}
?>
