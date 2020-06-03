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

			<!-- Hover rows datatable inside panel -->
			<div class="panel panel-default">
				<div class="panel-heading" align="right"><h6 class="panel-title"><i class="fa fa-male"></i> Data Calon Penerima</h6>
				<a href="calon_penerima_tambah.php"><input type="submit" value="Tambah Calon Penerima" class="btn btn-success"></a>
				</div>
				<div class="datatable">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Calon Penerima</th>
								<th>Asal</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$nomor = 0;
							$hasil = mysqli_query($konek, "select * from penerima");
							while ($dataku = mysqli_fetch_assoc($hasil)) {
								// var_dump($dataku);
							?>
								<tr>
									<td><?php echo $nomor=$nomor+1;?></td>
									<td><?php echo $dataku['nama_penerima']; ?></td>
									<td><?php echo $dataku['asal']; ?></td>
									<td>
										<a href="calon_penerima_edit.php?id_penerima=<?php echo $dataku['id_penerima']; ?>">
										<i class='fa fa-edit'></i>
										</a>
										<a href="calon_penerima_hapus.php?id_penerima=<?php echo $dataku['id_penerima']; ?>">
										<i class='fa fa-eraser'></i>
										</a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

			<br />
			<br />
			

			<!-- Footer -->
			<?php include "footer.php"; ?>