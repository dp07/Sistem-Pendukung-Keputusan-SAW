<?php include "head.php"; ?>
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

			<!-- Right labels -->
			<form class="form-horizontal" action="calon_penerima_tambah.php" method="post" role="form">
                <div class="panel panel-default">
                    <div class="panel-heading"><h6 class="panel-title">Calon Penerima Bantuan</h6></div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label class="col-sm-2 control-label text-right">Id Calon Penerima:</label>
                            <div class="col-sm-10">
                                <input type="text" name="id_penerima" class="form-control" value="<?php echo kdauto('penerima','CPB-'); ?>" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label text-right">Nama Calon Penerima:</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_penerima" required class="form-control">
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-2 control-label text-right">Asal:</label>
                            <div class="col-sm-10">
                                <input type="text" name="asal" required class="form-control">
                            </div>
                        </div>

                        <div class="form-actions text-right">
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
							<input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()" class="btn btn-danger">
                        </div>

                    </div>
                </div>
            </form>
<?php
if(isset($_POST['simpan'])){
	$id_penerima	= $_POST['id_penerima'];
	$nama_penerima	= $_POST['nama_penerima'];
	$asal		= $_POST['asal'];
	
	$sql="INSERT INTO penerima VALUES
	('$id_penerima','$nama_penerima','$asal')";
	$query= mysqli_query($konek,$sql) or die(mysqli_error($konek));
	if($query) {
	echo "<script>window.alert('Calon Beasiswa berhasil ditambah');
            window.location=(href='calon_penerima.php')</script>";
	}}
?>			
            <!-- /right labels -->
<?php include "footer.php";?>