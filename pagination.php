<?php
$date = date('Y-m-d');
$date1 = str_replace('-', '/', $date);

$hari = "+$_GET[hari] days";

$tomorrow = date('Y-m-d',strtotime($date1 . $hari));

echo $tomorrow;
?>