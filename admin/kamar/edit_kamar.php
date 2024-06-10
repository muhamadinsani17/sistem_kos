<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_kamar WHERE id_kamar='".$_GET['kode']."'";
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
					<h3 class="box-title">Ubah Data Kamar</h3>
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
							<label class="col-sm-2 control-label">ID Kamar</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="id_kamar" name="id_kamar" value="<?php echo $data_cek['id_kamar']; ?>"
								 readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Lantai</label>
							<div class="col-sm-2">
								<input type="number" class="form-control" id="lantai" name="lantai" value="<?php echo $data_cek['lantai']; ?>"
								 required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Kapasitas</label>
							<div class="col-sm-2">
								<input type="number" class="form-control" id="kapasitas" name="kapasitas" value="<?php echo $data_cek['kapasitas']; ?>"
								 required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Fasilitas</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="fasilitas" name="fasilitas" value="<?php echo $data_cek['fasilitas']; ?>"
								 required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tarif Per Bulan</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="tarif" name="tarif" value="<?php echo $data_cek['tarif']; ?>"
								 required>
							</div>
						</div>

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=data-kamar" class="btn btn-default">Batal</a>
							<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
						</div>
				</form>
				</div>
				<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai Mahasiswaoses ubah
    $sql_ubah = "UPDATE tb_kamar SET
		lantai='".$_POST['lantai']."',
		kapasitas='".$_POST['kapasitas']."',
		fasilitas='".$_POST['fasilitas']."',
        tarif='".$_POST['tarif']."'
        WHERE id_kamar='".$_POST['id_kamar']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-kamar';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-kamar';
            }
        })</script>";
    }
}

