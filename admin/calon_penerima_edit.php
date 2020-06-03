<?php  
include "head.php";
?>

<!-- Body -->

			<!-- Link Menu -->
			<?php include "menu.php"; ?>

			</div>
		<br />

		<div id="content">

		<!-- Page title -->
			<div class="page-title">
				<h5><i class="fa fa-desktop"></i> Halaman Admin</h5>
			</div>
			<!-- /page title -->
<?php
$id_penerima = $_GET['id_penerima'];
$query = mysqli_query($konek,"SELECT * FROM penerima WHERE id_penerima='$id_penerima'");
$dataku = mysqli_fetch_array($query);
?>
			<!-- Right labels -->
			<form class="form-horizontal" action="calon_penerima_edit.php" method="post" role="form">
				<div class="panel panel-default">
					<div class="panel-heading"><h6 class="panel-title">Calon Beasiswa</h6></div>
					<div class="panel-body">

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Id Calon Penerima:</label>
							<div class="col-sm-10">
								<input type="text" name="id_penerima" readonly="" value="<?php echo $dataku['id_penerima']; ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Penerima:</label>
							<div class="col-sm-10">
								<input type="text" name="nama_penerima" value="<?php echo $dataku['nama_penerima']; ?>" required class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label text-right">Asal:</label>
							<div class="col-sm-10">
								<input type="text" name="asal" value="<?php echo $dataku['asal']; ?>" required class="form-control">
							</div>
						</div>

					<div class="form-action text-right">
						<input type="submit" name="ubah" value="Ubah" class="btn btn-success">
						<input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()" class="btn btn-danger">
					</div>

				</div>
			</div>
			</form>
<?php
if (isset($_POST['ubah'])) {
	$id_penerima = $_POST['id_penerima'];
	$nama_penerima = $_POST['nama_penerima'];
	$asal = $_POST['asal'];

	$query=mysqli_query($konek, "UPDATE penerima SET nama_penerima='$nama_penerima', asal='$asal' WHERE id_penerima='$id_penerima'") or die(mysql_error($konek));
	if ($query) {
		echo "<script>window.alert('Calon Penerima Beasiswa berhasil diubah');
				window.location=(href='calon_penerima.php')</script>";
	}}
?>
		<!-- /right labels -->
<?php include "footer.php"; ?>