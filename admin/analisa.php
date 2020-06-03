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
            <form class="form-horizontal" action="analisa_hasil.php" method="post" role="form">
            	<div class="panel panel-default">
            		<div class="panel-heading"><h6 class="panel-title"><i class="fa fa-pencil"></i> Analisa Penerimaan Bantuan</h6></div>
            		<div class="panel-body">
            			
            			<div class="form-group">
            				<label class="col-sm-3 control-label text-right">C1. Pendidikan Terakhir:</label>
            				<div class="col-sm-8">
            					<select name='bobot_pend_terakhir' class="required select">
            						<option value="10">Sangat Rendah (10)</option>
            						<option value="20">Rendah (20)</option>
            						<option value="30">Cukup (30)</option>
            						<option value="40">Tinggi (40)</option>
            						<option value="50">Sangat Tinggi (50)</option>
            					</select>
            				</div>
            			</div>

            			<div class="form-group">
            				<label class="col-sm-3 control-label text-right">C2. Penghasilan:</label>
            				<div class="col-sm-8">
            					<select name='bobot_penghasilan_ortu' class="required select">
            						<option value="10">Sangat Rendah (10)</option>
            						<option value="20">Rendah (20)</option>
            						<option value="30">Cukup (30)</option>
            						<option value="40">Tinggi (40)</option>
            						<option value="50">Sangat Tinggi (50)</option>
            					</select>
            				</div>
            			</div>

            			<div class="form-group">
            				<label class="col-sm-3 control-label text-right">C3. Kondisi Rumah:</label>
            				<div class="col-sm-8">
            					<select name='bobot_kond_rumah' class="required select">
            						<option value="10">Sangat Rendah (10)</option>
            						<option value="20">Rendah (20)</option>
            						<option value="30">Cukup (30)</option>
            						<option value="40">Tinggi (40)</option>
            						<option value="50">Sangat Tinggi (50)</option>
            					</select>
            				</div>
            			</div>

            			<div class="form-group">
            				<label class="col-sm-3 control-label text-right">C4. Jumlah Tanggungan:</label>
            				<div class="col-sm-8">
            					<select name='bobot_tanggungan' class="required select">
            						<option value="10">Sangat Rendah (10)</option>
            						<option value="20">Rendah (20)</option>
            						<option value="30">Cukup (30)</option>
            						<option value="40">Tinggi (40)</option>
            						<option value="50">Sangat Tinggi (50)</option>
            					</select>
            				</div>
            			</div>

            			<div class="form-group">
            				<label class="col-sm-3 control-label text-right">C5. Usia:</label>
            				<div class="col-sm-8">
            					<select name='bobot_usia' class="required select">
            						<option value="10">Sangat Rendah (10)</option>
            						<option value="20">Rendah (20)</option>
            						<option value="30">Cukup (30)</option>
            						<option value="40">Tinggi (40)</option>
            						<option value="50">Sangat Tinggi (50)</option>
            					</select>
            				</div>
            			</div>

            			<div class="form-action text-right">
            				<input type="submit" name="simpan" value="Proses" class="btn btn-success">
            				<input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()" class="btn btn-danger">
            			</div>

            		</div>
            	</div>
            </form>

            <!-- /right labels -->
        <?php include "footer.php"; ?>