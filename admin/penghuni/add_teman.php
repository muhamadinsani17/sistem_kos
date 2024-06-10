<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_penghuni WHERE id_penghuni='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

		$sql_cek1 = "SELECT * FROM tb_kamar WHERE id_kamar='".$data_cek['id_kamar']."'";
        $query_cek1 = mysqli_query($koneksi, $sql_cek1);
        $data_cek1 = mysqli_fetch_array($query_cek1,MYSQLI_BOTH);
    }
?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Teman Penghuni</h3>
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
							<label class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Kamar</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="id_kamar" name="id_kamar" value="<?=$data_cek[
										'id_kamar']?>"readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tarif Sebelumnya</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="tarif1" name="tarif1" value="<?php echo $data_cek1['tarif']; ?>"
								 required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tarif Terbaru</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="tarif2" name="tarif2" value="<?php echo $data_cek1['tarif']*130/100; ?>"
								 required>
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
		nama='".$_POST['nama']."'
        WHERE id_penghuni='".$_POST['id_penghuni']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

	$sql_ubah1 = "UPDATE tb_kamar SET
        tarif='".$_POST['tarif2']."'
        WHERE id_kamar='".$_POST['id_kamar']."'";
    $query_ubah1 = mysqli_query($koneksi, $sql_ubah1);


    if ($query_ubah1) {
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

