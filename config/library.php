<?php
date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan menyebutkan timezone
$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari = date("w");
$hari_ini = $seminggu[$hari];

$tgl_sekarang = date("Ymd");
$tgl_skrng 	  = date("d");
$bln_sekarang = date("m");
$thn_sekarang = date("Y");
$jam_sekarang = date("H:i:s");

$nama_bln=array(1=> "Januari","Februari","Maret","April","Mei",
					"Juni","Juli","Agustus","September",
					"Oktober","November","Desember");
?>