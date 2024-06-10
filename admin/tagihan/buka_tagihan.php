<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<!-- <a href="?page=buat-tagihan" title="Tambah Data" class="btn btn-primary">
						<i class="glyphicon glyphicon-edit"></i> Buat Tagihan</a> -->
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove">
							<i class="fa fa-remove"></i>
						</button>
					</div>
				</div>

				<form class="form-horizontal" action="?page=data-tagihan" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<div class="form-group">
							<label class="col-sm-2 control-label">Bulan</label>
							<div class="col-sm-4">
								<select name="bulan" id="bulan" class="form-control select2" style="width: 100%;" required>
									<option value="">-- Pilih Bulan --</option>
									<?php
								// ambil data dari database
								$query = "SELECT * FROM tb_bulan";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									<option value="<?php echo $row['id_bulan'] ?>">
										<?php echo $row['id_bulan'] ?>
										-
										<?php echo $row['bulan'] ?>
									</option>
									<?php
								}
								?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tahun</label>
							<div class="col-sm-3">
								<select name="tahun" id="tahun" class="form-control select2" style="width: 100%;" required>
									<option value="">-- Pilih Tahun --</option>
									<option>2020</option>
									<option>2021</option>
									<option>2022</option>
									<option>2023</option>
									<option>2024</option>
									<option>2025</option>
									<option>2026</option>
									<option>2027</option>
									<option>2028</option>
									<option>2029</option>
									<option>2030</option>
								</select>
							</div>

							<div>
								<input type="submit" name="Lihat" value="Lihat Tagihan" class="btn btn-success">
							</div>
						</div>


				</form>
				</div>
			</div>
		</div>
</section>