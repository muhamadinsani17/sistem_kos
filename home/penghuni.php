<?php
	$sql = $koneksi->query("SELECT count(id_tagihan) as tagih_b from tb_tagihan where status='BL' and id_penghuni='$data_id'");
	while ($data= $sql->fetch_assoc()) {
	
		$tagih=$data['tagih_b'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_tagihan) as tagih_l from tb_tagihan where status='LS' and id_penghuni='$data_id'");
	while ($data= $sql->fetch_assoc()) {
	
		$lunas=$data['tagih_l'];
	}
?>



<section class="content-header">
	<h1>
		Dashboard |
		<small>Penghuni Kos</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">

		<div class="col-lg-6 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h2>
						<b>
							<?= $tagih; ?>
						</b>
					</h2>

					<p>Belum Bayar</p>
				</div>
				<div class="icon">
					<i class="ion-sad"></i>
				</div>
				<a href="?page=tagihan-belum-lunas" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-6 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h2>
						<b>
							<?= $lunas; ?>
						</b>
					</h2>

					<p>Lunas</p>
				</div>
				<div class="icon">
					<i class="ion-happy"></i>
				</div>
				<a href="?page=data-tagihan-lunas" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>