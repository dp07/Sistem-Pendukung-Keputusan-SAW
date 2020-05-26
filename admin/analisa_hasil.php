<?php include "head.php"; ?>
<!-- Body -->

			<!-- Link Menu -->
			<?php include "menu.php"; ?>

			</div>
		<br />

		<div id="content">
		<!-- Page title -->
			<div class="page-title">
				<h5><i class="fa fa-desktop"></i> Hasil Analisa</h5>
			</div>
			<!-- /page title -->

			<!-- Hover rows datatable inside panel -->
            <div class="panel panel-default">
            	<div class="panel-heading"><h6 class="panel-title">
            				<tr align="right">
            					<th></th>
            					<th>Bobot :</th>
            					<th><?php echo "(" .$_POST['bobot_pend_terakhir']. ")"; ?></th>
            					<th><?php echo "(" .$_POST['bobot_penghasilan_ortu']. ")"; ?></th>
            					<th><?php echo "(" .$_POST['bobot_kond_rumah']. ")"; ?></th>
            					<th><?php echo "(" .$_POST['bobot_tanggungan']. ")"; ?></th>
            					<th><?php echo "(" .$_POST['bobot_usia']. ")"; ?></th>
            				</tr>
            	</h6></div>
            	<div class="datatable">
            		<table class="table table-hover">
            			<thead>
            				<tr>
            					<th>No</th>
            					<th>Nama</th>
            					<th>C1. Pendidikan Terakhir (Cost)</th>
            					<th>C2. Penghasilan(Cost)</th>
            					<th>C3. Kondisi Rumah (cost)</th>
            					<th>C4. Jumlah Tanggungan (Benefit)</th>
            					<th>C5. Usia (Benefit)</th>            					
            				</tr>
            			</thead>
            			<tbody>
            				<?php
            				$nomor = 0;
            				$hasil = mysqli_query($konek,"select * from klasifikasi, penerima where klasifikasi.id_penerima=penerima.id_penerima");
            				while ($dataku = mysqli_fetch_array($hasil)) {
            				?>
            				<tr>
            					<td><?php echo $nomor=$nomor+1; ?></td>
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
<!-- Cari nilai maximal dan minimal-->
<?php
#Cari nilai maximal
$carimax = mysqli_query($konek,"SELECT max(pend_terakhir) as max1,
								max(penghasilan_ortu) as max2,
								max(kond_rumah) as max3,
								max(jml_tanggungan) as max4,
								max(usia) as max5
								FROM klasifikasi");
$max = mysqli_fetch_array($carimax);
# Cari nilai minimal
$carimin = mysqli_query($konek, "SELECT min(pend_terakhir) as min1,
								min(penghasilan_ortu) as min2,
								min(kond_rumah) as min3,
								min(jml_tanggungan) as min4,
								min(usia) as min5
								FROM klasifikasi");
$min = mysqli_fetch_array($carimin);
?>
				<div class="panel panel-default">
				<div class="panel-heading"><h6 class="panel-title">Normalisasi</h6></div>
				<div class="datatable">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>C1. Pendididkan Terakhir</th>
								<th>C2. Penghasilan</th>
								<th>C3. Kondisi Rumah</th>
								<th>C4. Jumlah Tanggungan</th>
								<th>C5. Usia</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$nomor=0;
							$hasil = mysqli_query($konek,"select * from klasifikasi, penerima where klasifikasi.id_penerima=penerima.id_penerima");
							while ($dataku = mysqli_fetch_array($hasil)) {
							?>
							<tr>
								<td><?php echo $nomor=$nomor+1; ?></td>
								<td><?php echo $dataku['nama_penerima']; ?></td>
								<td><?php echo round($min['min1']/$dataku['pend_terakhir'],3);?></td>
								<td><?php echo round($min['min2']/$dataku['penghasilan_ortu'],3); ?></td>
								<td><?php echo round($min['min3']/$dataku['kond_rumah'],3); ?></td>
								<td><?php echo round($dataku['jml_tanggungan']/$max['max4'],3); ?></td>
								<td><?php echo round($dataku['usia']/$max['max5'],3); ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				</div>
				<!-- /hover rows datatable inside panel -->
<?php
$bobot_pend_terakhir		= $_POST['bobot_pend_terakhir'];
$bobot_penghasilan_ortu	= $_POST['bobot_penghasilan_ortu'];
$bobot_kond_rumah			= $_POST['bobot_kond_rumah'];
$bobot_tanggungan		= $_POST['bobot_tanggungan'];
$bobot_usia				= $_POST['bobot_usia'];
?>
				<div class="panel panel-default">
				<div class="panel-heading"><h6 class="panel-title">Perangkingan</h6></div>
				<div class="datatable">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Nilai</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$nomor=0;
							$hasil = mysqli_query($konek, "select * from klasifikasi, penerima where klasifikasi.id_penerima=penerima.id_penerima");
							$nilai = [];
							while ($dataku = mysqli_fetch_array($hasil)) {
								// var_dump($dataku);
							?>
							<tr>
								<td><?php echo $nomor=$nomor+1; ?></td>
								<td><?php echo $dataku['nama_penerima']; ?></td>
								<td><?php echo $nilai[] = round((($min['min1']/$dataku['pend_terakhir'])*$bobot_pend_terakhir)+
								(($min['min2']/$dataku['penghasilan_ortu'])*$bobot_penghasilan_ortu)+
								(($min['min3']/$dataku['kond_rumah'])*$bobot_kond_rumah)+
								(($dataku['jml_tanggungan']/$max['max4'])*$bobot_tanggungan)+
								(($dataku['usia']/$max['max5'])*$bobot_usia), 3); ?></td>
							</tr>
							<?php 
							$nilai += $nilai; ?>
							<?php }	?>
							
							<!-- <h1><?= max($nilai) ?></h1> -->
						</tbody>
					</table>
				</div>
				</div>
				<!-- /hover rows datatable inside panel -->
<?php include "footer.php"; ?>