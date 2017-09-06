<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
            $query = "UPDATE user SET role='User' WHERE id_user = '$id'";
            $result = mysqli_query($con, $query);

        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($con).
            " - ".mysqli_error($con));
        }
        header("location:../user.php?aksi=berubah"); 
}
else{
      header("location:../404.php"); 
}
?>