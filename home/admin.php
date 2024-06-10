<?php
	$sql = $koneksi->query("SELECT count(id_kamar) as kamar from tb_kamar");
	while ($data= $sql->fetch_assoc()) {
	
		$kamar=$data['kamar'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_penghuni) as huni from tb_penghuni");
	while ($data= $sql->fetch_assoc()) {
	
		$huni=$data['huni'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_tagihan) as tagih_b
	FROM tb_tagihan
	WHERE bulan = MONTH(CURDATE())
	  AND tahun = YEAR(CURDATE()) AND status='BL';");
	while ($data= $sql->fetch_assoc()) {
	
		$tagih=$data['tagih_b'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_tagihan) as tagih_l
	FROM tb_tagihan
	WHERE bulan = MONTH(CURDATE())
	  AND tahun = YEAR(CURDATE()) AND status='LS';");
	while ($data= $sql->fetch_assoc()) {
	
		$lunas=$data['tagih_l'];
	}
?>



<section class="content-header">
	<h1>
		Dashboard |
		<small>Administrator</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-primary">
				<div class="inner">
					<h2>
						<b>
							<?= $kamar; ?>
						</b>
					</h2>

					<p>Jumlah Kamar</p>
				</div>
				<div class="icon">
					<i class="ion-ios-home"></i>
				</div>
				<a href="?page=data-kamar" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h2>
						<b>
							<?= $huni; ?>
						</b>
					</h2>

					<p>Akun Penghuni</p>
				</div>
				<div class="icon">
					<i class="ion-person-stalker"></i>
				</div>
				<a href="?page=data-penghuni" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
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
				<a href="?page=belum-lunas-tagihan" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
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
				<a href="?page=lunas-tagihan" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>