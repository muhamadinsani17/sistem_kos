<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_penghuni WHERE id_penghuni='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Ubah Data Penghuni</h3>
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
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">ID Penghuni</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="id_penghuni" name="id_penghuni" value="<?php echo $data_cek['id_penghuni']; ?>"
								 readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Password</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="password" name="password" value="<?php echo $data_cek['password']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Alamat</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">No HP (Awali : 62)</label>
							<div class="col-sm-4">
								<input type="number" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tgl Registrasi</label>
							<div class="col-sm-2">
								<input type="date" class="form-control" id="tgl_reg" name="tgl_reg" value="<?php echo $data_cek['tgl_reg']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Kamar</label>
							<div class="col-sm-4">
								<select name="id_kamar" id="id_kamar" class="form-control select2" style="width: 100%;">
									<option selected="">- Pilih -</option>
									<?php
									// ambil data dari database
									$query = "select k.id_kamar, p.nama from tb_kamar k left join tb_penghuni p 
									on k.id_kamar=p.id_kamar order by id_kamar asc";
									$hasil = mysqli_query($koneksi, $query);
									while ($row = mysqli_fetch_array($hasil)) {
										$disabled = !empty($row['nama']) ? 'disabled' : ''; // Jika ada nama, set disabled
									?>
										<option value="<?php echo $row['id_kamar'] ?>" <?=$data_cek[
										'id_kamar']==$row[ 'id_kamar'] ? "selected" : null ?> <?php echo $disabled; ?>>
										<?php echo $row['id_kamar'] ?> | <?php echo $row['nama'] ?>
									</option>
									 <?php
									 }
									 ?>
								</select>
							</div>
						</div>

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=data-penghuni" class="btn btn-default">Batal</a>
							<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
						</div>
				</form>
				</div>
				<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai Mahasiswaoses ubah
    $sql_ubah = "UPDATE tb_penghuni SET
		nama='".$_POST['nama']."',
		alamat='".$_POST['alamat']."',
		no_hp='".$_POST['no_hp']."',
		tgl_reg='".$_POST['tgl_reg']."',
		password='".$_POST['password']."',
        id_kamar='".$_POST['id_kamar']."'
        WHERE id_penghuni='".$_POST['id_penghuni']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-penghuni';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-penghuni';
            }
        })</script>";
    }
}

