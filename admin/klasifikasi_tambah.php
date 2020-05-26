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
			<script type="text/javascript" src="../js/jquery-1.9.0.js"></script>
            <script type="text/javascript" src="../js/jquery-ui-1.10.0.custom.js"></script>          
            <!-- Right labels -->
            <form class="form-horizontal" action="klasifikasi_tambah.php" method="post" role="form">
                <div class="panel panel-default">
                    <div class="panel-heading"><h6 class="panel-title">Klasifikasi</h6></div>
                    <div class="panel-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label text-right">Nama Penerima:</label>
                        <div class="col-sm-3">
                            <input class="form-control " type=text name='nama_penerima' id='nama_penerima' required>
                            <input type=hidden name='id_penerima' id='id_penerima' required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label text-right">Pendidikan Terakhir:</label>
                        <div class="col-sm-3">
                            <select class="form-control " name='pend_terakhir' data-placeholder="Pilih Pendidikan Terkhir..." class="required select">
                                <option></option>";
                                <?php
                                $query = "SELECT * FROM himpunan where id_kriteria='1' order by id_himpunan asc";
                                $hasil = mysqli_query($konek, $query);
                                while ($data = mysqli_fetch_array($hasil)) 
                                {
                                    echo "<option value='".$data['nilai']."'>".$data['namahimpunan']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label text-right">Penghasilan:</label>
                        <div class="col-sm-4">
                            <select class="form-control " name='penghasilan_ortu' data-placeholder="Pilih Penghasilan Ortu..." class="required select">
                                <option></option>
                                <?php
                                $query = "SELECT * FROM himpunan where id_kriteria='2' order by id_himpunan asc";
                                $hasil = mysqli_query($konek, $query);
                                while ($data = mysqli_fetch_array($hasil)) 
                                {
                                    echo "<option value='".$data['nilai']."'>".$data['namahimpunan']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label text-right">Kondisi Rumah:</label>
                        <div class="col-sm-3">
                            <select class="form-control " name='kond_rumah' data-placeholder="Pilih Kondisi Rumah..." class="required select">
                                <option></option>
                                <?php
                                    $query = "SELECT * FROM himpunan where id_kriteria='3' order by id_himpunan asc";
                                    $hasil = mysqli_query($konek, $query);
                                    while ($data = mysqli_fetch_array($hasil)) 
                                    {
                                        echo "<option value='".$data['nilai']."'>".$data['namahimpunan']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label text-right">Jumlah Tanggungan:</label>
                        <div class="col-sm-3">
                            <select class="form-control " name="jml_tanggungan" data-placehoder="Pilih Tanggungan..." class="required select">
                                <option></option>
                                <?php
                                    $query = "SELECT * FROM himpunan where id_kriteria='4' order by id_himpunan asc";
                                    $hasil = mysqli_query($konek, $query);
                                    while ($data = mysqli_fetch_array($hasil)) 
                                    {
                                        echo "<option value='".$data['nilai']."'>".$data['namahimpunan']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label text-right">Usia:</label>
                        <div class="col-sm-3">
                            <select class="form-control " name='usia' data-placeholder="Pilih Sikap..." class="required select">
                                <option></option>
                                <?php
                                    $query = "SELECT * FROM himpunan where id_kriteria='5' order by id_himpunan asc";
                                    $hasil = mysqli_query($konek, $query);
                                    while ($data = mysqli_fetch_array($hasil)) 
                                    {
                                        echo "<option value='".$data['nilai']."'>".$data['namahimpunan']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-action text-right">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                        <input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()" class="btn btn-danger">
                    </div>

                </div>
            </div>
        </form>
        <script type="text/javascript">
        $(document).ready(function(){
            var ac_config = {
                source: "calon_penerima_cari.php",
                select: function(event, ui){
                    $("#nama_penerima").val(ui.item.nama_penerima);
                    $("#id_penerima").val(ui.item.id_penerima);
                },
                minLength:1
            };
            $("#nama_penerima").autocomplete(ac_config);
        });
        </script>
<?php
if (isset($_POST['simpan'])) {
    $id_penerima     = $_POST['id_penerima'];
    $pend_terakhir  = $_POST['pend_terakhir'];
    $penghasilan_ortu = $_POST['penghasilan_ortu'];
    $kond_rumah   = $_POST['kond_rumah'];
    $jml_tanggungan = $_POST['jml_tanggungan'];
    $usia       = $_POST['usia'];

    $sql = "insert into klasifikasi values
    ('','$id_penerima','$jml_tanggungan','$pend_terakhir','$penghasilan_ortu','$kond_rumah','$usia')";
    $query = mysqli_query($konek,$sql) or die(mysqli_error($konek));
    if ($query) {        
    echo "<script>window.alert('Klasifikasi berhasil di tambah');
            window.location=(href='klasifikasi.php')</script>";
    }}
?>
            <!-- /right lebels -->
<?php include "footer.php" ?>