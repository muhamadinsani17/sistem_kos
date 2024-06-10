
<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">
			Tagihan Belum Lunas
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
				  from tb_penghuni p inner join tb_tagihan t on p.id_penghuni=t.id_penghuni where status='BL'
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
								<a href="?page=bayar-tagihan&kode=<?php echo $data['id_tagihan']; ?>&phone=<?php echo $data['no_hp']; ?>&nama=<?php echo $data['nama']; ?>
								&bulan=<?php echo $data['bulan']; ?>&tahun=<?php echo $data['tahun']; ?>&tagihan=<?php echo $data['tagihan']; ?>" 
								title="Bayar Tagihan"
								 class="btn btn-info">
									<i class="glyphicon glyphicon-ok"></i>
								</a>
								<a href="?page=pengingat-bayar&phone=<?php echo $data['no_hp']; ?>&nama=<?php echo $data['nama']; ?>
								&bulan=<?php echo $data['bulan']; ?>&tahun=<?php echo $data['tahun']; ?>&tagihan=<?php echo $data['tagihan']; ?>"
								 target=" _blank" title="Pesan WhatsApp" class="btn btn-success" id="wa-button">
									<b>WA</b>
								</a>
							</td>
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
	
	<script>
    // Fungsi untuk memeriksa waktu setiap menit
	function checkTimeAndClick() {
            const now = new Date();
            const day = now.getDate();
            const hour = now.getHours();
            const minute = now.getMinutes();
            
            // Mengatur waktu yang diinginkan
            const targetHour = 14;
            const targetMinute = 36;
            
            if (day === 14 && hour === targetHour && minute === targetMinute) {
                document.getElementById('wa-button').click();
            }
        }
        
        // Periksa waktu setiap menit
        setInterval(checkTimeAndClick, 31000); // 60000 ms = 1 menit
        
        // Jalankan segera saat halaman dimuat untuk pertama kali
        checkTimeAndClick();
	</script>";
</section>