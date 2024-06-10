<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">
			Laporan Keuangan
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove">
					<i class="fa fa-remove"></i>
				</button>
			</div>
		</div>

		<form class="form-horizontal" action="?page=data_laporan" method="post" enctype="multipart/form-data">
		<!-- /.box-header -->
			<div class="box-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">Bulan</label>
					<div class="col-sm-4">
						<select name="bulan" id="bulan" class="form-control select2" style="width: 100%;" required>
							<option selected="selected">-- Pilih Bulan --</option>
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
							<option>-- Pilih Tahun --</option>
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
						<input type="submit" name="Lihat" value="Lihat Laporan" class="btn btn-success">
					</div>
				</div>
				
				<div class="table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Bulan/Tahun</th>
								<th>Tagihan</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>

							<?php
					$no = 1;
					$sql = $koneksi->query("SELECT p.no_hp, t.id_tagihan, t.tagihan, t.status, t.tgl_bayar, t.bulan, t.tahun   
					from tb_penghuni p inner join tb_tagihan t on p.id_penghuni=t.id_penghuni where t.status='LS'
					order by tgl_bayar desc");
					while ($data= $sql->fetch_assoc()) {
					?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['bulan']; ?>
									/
									<?php echo $data['tahun']; ?>
								</td>
								<td>
									<?php echo rupiah($data['tagihan']); ?>
								</td>
								<td>
									<?php $stt = $data['status']  ?>
									<?php if($stt == 'BL'){ ?>
									<span class="label label-danger">Belum Bayar</span>
									<?php }elseif($stt == 'LS'){ ?>
									<span class="label label-info">Lunas</span>
									(
									<?php  $tgl = $data['tgl_bayar']; echo date("d-M-Y", strtotime($tgl))?>)
								
								<!-- </td>
								<?php } ?>
								<td>
									<a href="./report/cetak_struk.php?id_tagihan=<?php echo $data['id_tagihan']; ?>"
									target=" _blank" title="Cetak Struk" class="btn btn-primary">
										<i class="glyphicon glyphicon-print"></i> Cetak Laporan</a>
								</td> -->
								
							</tr>
							<?php
							}
							?>
						</tbody>

					</table>
					<!-- /.box-body -->
			</form>
			</div>
		</div>
	</div>
</section>