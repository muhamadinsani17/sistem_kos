<?php
	$bulan = $_POST["bulan"];
	$tahun = $_POST["tahun"];
?>

<?php
	$sql = $koneksi->query("SELECT * from tb_bulan where id_bulan='$bulan'");
	while ($data= $sql->fetch_assoc()) {
	
		$bl=$data['bulan'];
	}
?>


<section class="content">

	<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4>
			<i class="icon fa fa-info"></i> Laporan Keuangan</h4>
		<h4>Bulan :<?php echo $bl; ?>, 
			Tahun :<?php echo $tahun; ?>
		</h4>
	</div>

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
		<!-- /.box-header -->
		<div class="box-body">
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
                  $sql = $koneksi->query("SELECT t.id_tagihan, t.tagihan, t.status, t.tgl_bayar, t.bulan, t.tahun 
				  from tb_penghuni p inner join tb_tagihan t on p.id_penghuni=t.id_penghuni where bulan='$bulan' and tahun='$tahun' and status='LS'
				  order by status asc");
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
								<span class="label label-primary">Lunas</span>
								(
								<?php echo $data['tgl_bayar']; ?>)
							</td>
							<?php } ?>

						</tr>
						<?php
                  }
                ?>
					</tbody>

				</table>
				<!-- /.box-body -->

				<!-- <?php
                  $sql = $koneksi->query("SELECT t.id_tagihan, t.tagihan, t.status, t.tgl_bayar, t.bulan, t.tahun 
				  from tb_penghuni p inner join tb_tagihan t on p.id_penghuni=t.id_penghuni where bulan='$bulan' and tahun='$tahun' and status='LS'
				  order by status asc");
                  $data= $sql->fetch_assoc()
                ?> -->
				<div class="box-footer">
					<a href="?page=uang_masuk" class="btn btn-primary">Kembali</a>
					<a href="./report/cetak_struk_copy.php?bulan=<?php echo $data['bulan'];?>&tahun=<?php echo $data['tahun'];?>" 
					target=" _blank" title="Cetak Struk" class="btn btn-primary glyphicon glyphicon-print"> Cetak Laporan</a>
				</div>
			</div>
		</div>
	</div>
</section>