<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">
			Laporan Pembayaran
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove">
					<i class="fa fa-remove"></i>
				</button>

			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Penghuni</th>
							<th>Bulan/Tahun</th>
							<th>Tagihan</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT p.id_penghuni, p.nama, p.no_hp, t.id_tagihan, t.tagihan, t.status, t.tgl_bayar, t.bulan, t.tahun   
				  from tb_penghuni p inner join tb_tagihan t on p.id_penghuni=t.id_penghuni
				  order by tgl_bayar desc");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['id_penghuni']; ?>
								-
								<?php echo $data['nama']; ?>
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
							</td>
							<?php } ?>

							<td>
							    <?php $stt = $data['status'] ?>
								<?php if($stt == 'BL'){ ?>

								<?php }elseif($stt == 'LS'){ ?>

								<a href="./report/cetak_struk.php?id_tagihan=<?php echo $data['id_tagihan']; ?>"
								 target=" _blank" title="Cetak Struk" class="btn btn-primary">
									<i class="glyphicon glyphicon-print"></i> Cetak Struk</a>
							</td>
							<?php } ?>
						</tr>
						<?php
						}
						?>
					</tbody>

				</table>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</section>