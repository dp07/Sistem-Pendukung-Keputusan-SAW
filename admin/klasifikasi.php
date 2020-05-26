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
				<div class="panel-heading" align="right"><h6 class="panel-title"><i class="fa fa-tag"></i> Data Klasifikasi</h6>
				<a href="klasifikasi_tambah.php"><input type="submit" value="Tambah Klasifikasi" class="btn btn-success"></a>
				</div>
				<div class="datatable">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Penerima</th>
								<th>Pendidikan Terakhir</th>
								<th>Penghasilan</th>
								<th>Kondisi Rumah</th>
								<th>Jumlah Tanggungan</th>
								<th>Usia</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$nomor = 0;
						$hasil = mysqli_query($konek, "select * from klasifikasi, penerima where klasifikasi.id_penerima=penerima.id_penerima");
						while ($dataku = mysqli_fetch_array($hasil)) {
						?>
							<tr>
								<td><?php echo $nomor=$nomor+1;?></td>
								<td><?php echo $dataku['nama_penerima']; ?></td>
								<td><?php echo $dataku['pend_terakhir']; ?></td>
								<td><?php echo $dataku['penghasilan_ortu']; ?></td>
								<td><?php echo $dataku['kond_rumah']; ?></td>
								<td><?php echo $dataku['jml_tanggungan']; ?></td>
								<td><?php echo $dataku['usia']; ?></td>
							</tr>
						<?php }	?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- /hover rows datatable inside panel -->
	<?php include "footer.php"; ?>
		</div>
	</div>
</body>