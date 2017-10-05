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
  $jilid            = $_POST['jilid'];
  $cetakan          = $_POST['cetakan'];
  $edisi            = $_POST['edisi'];
  $ISBN             = $_POST['ISBN'];
  $jenis_media      = $_POST['jenis_media'];
  $kota             = $_POST['kota'];
  $penerbit         = $_POST['penerbit'];
  $terbit           = date('Y-m-d', strtotime($_POST['terbit']));
  $koleksi          = $_POST['koleksi'];
  $bahasa           = $_POST['bahasa'];
  $sumber           = $_POST['sumber'];
  $jenis_buku       = $_POST['jenis_buku'];
  $biografi         = $_POST['biografi'];
  $total_buku       = $_POST['total_buku'];

    $date = date("Ymd");

        $cekdulu= "SELECT * FROM buku WHERE judul_buku='$judul'";
        $prosescek= mysqli_query($con, $cekdulu);

                    

    $query_pertama = "SELECT kode_buku FROM detail_buku WHERE id_buku IN (SELECT max(id_buku) FROM buku ) ";
    $query_kedua= "SELECT SUBSTRING(kode_buku, 1, 8) AS no_register FROM detail_buku WHERE id_buku IN (SELECT max(id_buku) FROM buku ) ";
    $query_id = "SELECT max(id_buku) AS id_buku FROM buku";
    
    //// Untuk Membuat no_register automatis

    if(mysqli_num_rows($prosescek)>0){
      header("location:../tambah_buku.php?aksi=duplicate"); 
    }
    else{
      if($foto == NULL){
            $query = "INSERT INTO buku SET judul_buku='$judul', judul_singkat='$judul_singkat', gambar_buku='thumbnail.png', jilid='$jilid'
                      , cetakan='$cetakan', edisi='$edisi', ISBN='$ISBN', sumber='$sumber', tgl_entri_buku='$date'
                      , jenis_media='$jenis_media', id_jenis_buku='$jenis_buku', jenis_koleksi='$koleksi', kota_terbit='$kota'
                      , penerbit='$penerbit', tahun_terbit='$terbit', biografi='$biografi'
                      , bahasa='$bahasa'";
            $result = mysqli_query($con, $query);

            if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($con).
                        " - ".mysqli_error($con)); 
            }
            if($result){ 
                if($total_buku < 0){
                    header("location:../tambah_buku.php?aksi=mana"); 
                }
                else{
    $result_pertama = mysqli_query($con, $query_pertama);
    $data_pertama = mysqli_fetch_assoc($result_pertama);
    $id_buku_plus = $data_pertama['id_buku'];
    $kode_pertama = $data_pertama['kode_buku'];

    $result_kedua = mysqli_query($con, $query_kedua);
    $data_kedua = mysqli_fetch_assoc($result_kedua);
    $kode_kedua = $data_kedua['no_register'];

    $result_id = mysqli_query($con, $query_id);
    $data_id = mysqli_fetch_assoc($result_id);
    $id_buku_plus = $data_id['id_buku'];

                    $x = 1;
                    while($x <= $total_buku) {
                        if($kode_kedua == $date){
                            $no_kode = floatval($kode_pertama)+$x;
                        }else{
                            if($total_buku < 10){
                                $no_kode = $date."00".$x;
                            }else if ($total_buku < 100){
                                    if($x < 10)
                                    {
                                        $no_kode = $date."00".$x;
                                    }
                                    else{
                                        $no_kode = $date."0".$x;
                                    };
                            }else if ($total_buku < 1000){
                                    if($x < 10)
                                    {
                                        $no_kode = $date."00".$x;
                                    }
                                    else if ($x < 100){
                                        $no_kode = $date."0".$x;
                                    }
                                    else {
                                        $no_kode = $date.$x;
                                    }
                            }else if ($total_buku >= 1000){
                                header("location:../tambah_buku.php?aksi=kebanyakan"); 
                            }
                        }
                                    
                            $query_detail = "INSERT INTO detail_buku SET id_buku = '$id_buku_plus', kode_buku = '$no_kode', status_buku = 'Siap Terpinjam'";
                            $result_detail = mysqli_query($con, $query_detail);
                                            
                            if(!$result_detail){
                            die ("Query gagal dijalankan: ".mysqli_errno($con).
                                        " - ".mysqli_error($con)); 
                            }
                            $x++;
                    }
                        include('session.php');
                        $banyak_buku = $x - 1;
                        $query_riwayat = "INSERT INTO riwayat_kegiatan SET id_user = '$_SESSION[id_user]', 
                                        riwayat_kegiatan = 'Melakukan Penambahan Data Buku Berjudul $judul sebanyak $banyak_buku banyak buku', 
                                        tgl_riwayat_kegiatan='$date', status_riwayat='primary'";
                        $result_riwayat = mysqli_query($con, $query_riwayat);
                        if(!$result_riwayat){
                            die ("Query gagal dijalankan: ".mysqli_errno($con).
                                " - ".mysqli_error($con));
                        }
                        else{
                            header("location: ../buku.php?aksi=tambah"); 
                        }
                }
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
                            $query = "INSERT INTO buku SET judul_buku='$judul', judul_singkat='$judul_singkat', gambar_buku='$fotobaru', jilid='$jilid'
                      , cetakan='$cetakan', edisi='$edisi', ISBN='$ISBN', sumber='$sumber', tgl_entri_buku='$date'
                      , jenis_media='$jenis_media', id_jenis_buku='$jenis_buku', jenis_koleksi='$koleksi', kota_terbit='$kota'
                      , penerbit='$penerbit', tahun_terbit='$terbit', biografi='$biografi'
                      , bahasa='$bahasa'";
                            $result = mysqli_query($con, $query);
                            if(!$result){
                                die ("Query gagal dijalankan: ".mysqli_errno($con).
                                    " - ".mysqli_error($con));
                            }

                            if($result){ 
                                if($total_buku < 0){
                                    header("location:../tambah_buku.php?aksi=mana"); 
                                }
                                else{
                    $result_pertama = mysqli_query($con, $query_pertama);
                    $data_pertama = mysqli_fetch_assoc($result_pertama);
                    $id_buku_plus = $data_pertama['id_buku'];
                    $kode_pertama = $data_pertama['kode_buku'];

                    $result_kedua = mysqli_query($con, $query_kedua);
                    $data_kedua = mysqli_fetch_assoc($result_kedua);
                    $kode_kedua = $data_kedua['no_register'];

                    $result_id = mysqli_query($con, $query_id);
                    $data_id = mysqli_fetch_assoc($result_id);
                    $id_buku_plus = $data_id['id_buku'];

                                    $x = 1;
                                    while($x <= $total_buku) {
                                        if($kode_kedua == $date){
                                            $no_kode = floatval($kode_pertama)+$x;
                                        }else{
                                            if($total_buku < 10){
                                                $no_kode = $date."00".$x;
                                            }else if ($total_buku < 100){
                                                    if($x < 10)
                                                    {
                                                        $no_kode = $date."00".$x;
                                                    }
                                                    else{
                                                        $no_kode = $date."0".$x;
                                                    };
                                            }else if ($total_buku < 1000){
                                                    if($x < 10)
                                                    {
                                                        $no_kode = $date."00".$x;
                                                    }
                                                    else if ($x < 100){
                                                        $no_kode = $date."0".$x;
                                                    }
                                                    else {
                                                        $no_kode = $date.$x;
                                                    }
                                            }else if ($total_buku >= 1000){
                                                header("location:../tambah_buku.php?aksi=kebanyakan"); 
                                            }
                                        }
                                                    
                                            $query_detail = "INSERT INTO detail_buku SET id_buku = '$id_buku_plus', kode_buku = '$no_kode', status_buku = 'Siap Terpinjam'";
                                            $result_detail = mysqli_query($con, $query_detail);
                                            
                            if(!$result_detail){
                            die ("Query gagal dijalankan: ".mysqli_errno($con).
                                        " - ".mysqli_error($con)); 
                            }
                                            $x++;
                                    }
                                    include('session.php');
                                    $banyak_buku = $x - 1;
                                    $query_riwayat = "INSERT INTO riwayat_kegiatan SET id_user = '$_SESSION[id_user]', 
                                                    riwayat_kegiatan = 'Melakukan Penambahan Data Buku Berjudul $judul sebanyak $banyak_buku banyak buku', 
                                                    tgl_riwayat_kegiatan='$date', status_riwayat='primary'";
                                    $result_riwayat = mysqli_query($con, $query_riwayat);
                                    if(!$result_riwayat){
                                        die ("Query gagal dijalankan: ".mysqli_errno($con).
                                            " - ".mysqli_error($con));
                                    }
                                    else{
                                        header("location: ../buku.php?aksi=tambah"); 
                                    }
                                }
                            }else{
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
