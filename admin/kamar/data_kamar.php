<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=add-kamar" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Data Kamar</a>
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
							<th>Lantai</th>
							<th>Kapasitas</th>
							<th>Fasilitas</th>
							<th>Tarif</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from tb_kamar");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['id_kamar']; ?>
							</td>
							<td>
								<?php echo $data['lantai']; ?>
							</td>
							<td>
								<?php echo $data['kapasitas']; ?>
								Orang
							</td>
							<td>
								<?php echo $data['fasilitas']; ?>
							</td>
							<td>
								<?php echo rupiah($data['tarif']); ?>
							</td>

							<td>
								<a href="?page=edit-kamar&kode=<?php echo $data['id_kamar']; ?>" title="Ubah"
								 class="btn btn-success">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="?page=del-kamar&kode=<?php echo $data['id_kamar']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
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