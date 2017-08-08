<?php
session_start();
$logged_in = false;
  if (empty($_SESSION['email'])) {
      echo "<script type='text/javascript'>document.location='login.php?alert=login ';</script>";
  }
  else {
      $logged_in = true;
  }
?>
