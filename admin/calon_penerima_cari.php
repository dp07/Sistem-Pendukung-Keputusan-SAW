<?php
include "../inc/koneksi.php";
include "../cek-login.php";

$term = $_GET['term'];

$query = mysqli_query($konek,"select * from penerima where nama_penerima like '%".$term."%'");
$json = array();
while ($ketik = mysqli_fetch_array($query)) {
	$json[] = array(
		'label' => $ketik['nama_penerima'], // text sugesti sat user mengetik di input box
		'value' => $ketik['nama_penerima'], // nilai yang akan di masukan di inputbox saat user memilih salah satu sugesti
		'id_penerima' => $ketik['id_penerima']
		);
}
header("Content-Type: text/json");
echo json_encode($json);
?>