<?php
session_start();
include "koneksi.php";
unset($_SESSION['email']);
session_unset();
session_destroy();
		echo '<script>document.location.href="../login.php";</script>'
?>
 