<?php
include "koneksi.php";
function kdauto($tabel, $inisial){
	global $konek;
	$struktur = mysqli_query($konek, "SELECT * FROM $tabel");
	// $field = mysqli_field_name($struktur,0);
	function mysqli_field_name($result, $field_offset) {
    	$properties = mysqli_fetch_field_direct($result, $field_offset);
    	return is_object($properties) ? $properties->length : null;
	}

	// $panjang = mysqli_field_len($struktur,0);
	function mysqli_field_len($result, $field_offset) {
    		$properties = mysqli_fetch_field_direct($result, $field_offset);
    		return is_object($properties) ? $properties->length : null;
		}
	$field = mysqli_field_name($struktur, 0);
	$panjang = mysqli_field_len($struktur, 0);
	$qry = mysqli_query($konek, "SELECT max(".$field.")
		FROM ".$tabel);
	$row = mysqli_fetch_array($qry);

	if ($row[0]=="") {
		$angka=0;
	}
	else {
		$angka = substr($row[0], strlen($inisial));
	}

	$angka++;
	$angka = strval($angka);
	$tmp = "";
	for ($i=1; $i<=($panjang-strlen($inisial)-
		strlen($angka)) ; $i++) { 
		$tmp=$tmp."0";
	}
	return $inisial.$tmp.$angka;
}

function format_angka($angka) {
	$hasil = number_format($angka,0, ",",".");
	return $hasil;
}
?>