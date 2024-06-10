<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=add-penghuni" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Data Penghuni</a>
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
							<th>ID</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>No HP</th>
							<th>Registrasi</th>
							<th>Kamar</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from tb_penghuni");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['id_penghuni']; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['alamat']; ?>
							</td>
							<td>
								<?php echo $data['no_hp']; ?>
							</td>
							<td>
								<?php  $tgl = $data['tgl_reg']; echo date("d-M-Y", strtotime($tgl))?>
							</td>
							<td>
								<?php echo $data['id_kamar']; ?>
							</td>

							<td>
								<a href="?page=edit-penghuni&kode=<?php echo $data['id_penghuni']; ?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="?page=add-teman&kode=<?php echo $data['id_penghuni']; ?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-plus"></i>
								</a>
								<a href="?page=del-penghuni&kode=<?php echo $data['id_penghuni']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
								 title="Hapus" class="btn btn-danger">
									<i class="glyphicon glyphicon-trash"></i>
							</td>
						</tr>
						<?php
                  }
                ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>