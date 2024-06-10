<?php
include "../inc/koneksi.php";
include "../inc/rupiah.php";

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cetak Struk Kos</title>
	<link rel="icon" href="../dist/img/print.jpg">
</head>

<body>

	<center>
		<h2>** TOTAL PEMASUKAN **</h2>
		<h4>KOS BU ENDANG - BANDUNG</h4>
		<hr / size="2px" color="black">


		<table border="1" cellspacing="0" style="width: 100%">
			<thead>
				<tr>
					<th>Penghuni</th>
					<th>Kamar</th>
					<th>Bulan/Tahun</th>
					<th>Uang Masuk</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$bulan = $_GET["bulan"];
				$tahun = $_GET["tahun"];
				$total = 0;

				$no=1;
				$sql_tampil = "SELECT p.id_penghuni, p.nama, p.no_hp, t.id_tagihan, t.tagihan, t.status, t.tgl_bayar, t.bulan, t.tahun, k.id_kamar   
				from tb_penghuni p inner join tb_tagihan t on p.id_penghuni=t.id_penghuni 
				inner join tb_kamar k on k.id_kamar=p.id_kamar where status='LS' AND bulan='$bulan' AND tahun='$tahun'";
				$query_tampil = mysqli_query($koneksi, $sql_tampil);
				while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
					$total += $data['tagihan'];
				?>
				<tr align="center">
					<td>
						<?php echo $data['id_penghuni']; ?>
						-
						<?php echo $data['nama']; ?>
					</td>
					<td>
						<?php echo $data['id_kamar']; ?>
					</td>
					<td>
						<?php echo $data['bulan']; ?>
						/
						<?php echo $data['tahun']; ?>
					</td>
					<td>
						<?php echo rupiah($data['tagihan']); ?>
					</td>

				</tr>
				<?php
				}
        		?>
				<tr align="center">
					<td colspan="3"> Total </td>
					<td> <?php echo rupiah($total); ?> </td>
				</tr>
			</tbody>
		</table>
	</center>

	<script>
		window.print();
	</script>
</body>

</html>