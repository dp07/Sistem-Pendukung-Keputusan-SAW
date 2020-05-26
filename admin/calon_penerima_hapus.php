<?php
include '../inc/koneksi.php';

$id_penerima = $_GET['id_penerima'];
$query = mysqli_query($konek, "DELETE FROM penerima WHERE id_penerima='$id_penerima'") or die(mysqli_error($konek));
$q = mysqli_query($konek, "DELETE FROM klasifikasi WHERE id_penerima='$id_penerima'") or die(mysqli_error());
if ($query) {
?>
<script language="JavaScript">
	alert('Data calon Penerima Bantuan berhasil di hapus');
	document.location='calon_penerima.php';
</script>
<?php
}
?>