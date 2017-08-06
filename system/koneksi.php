<?php
    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con, 'katalog_perpustakaan') or die(mysqli_error($con));
?> 