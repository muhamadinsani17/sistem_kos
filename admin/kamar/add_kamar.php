<?php
//kode
$nol='0';
  
$carikode = mysqli_query($koneksi,"SELECT id_kamar FROM tb_kamar order by id_kamar desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_kamar'];
$urut = substr($kode, 1, 3);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
	$format = "K"."00".$tambah;
}else if (strlen($tambah) == 2){
	$format = "K"."0".$tambah;
}else if (strlen($tambah) == 3){
	$format = "K".$tambah;
}

?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Data Kamar</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove">
							<i class="fa fa-remove"></i>
						</button>
					</div>
				</div>

				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">ID Kamar</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="id_kamar" name="id_kamar" value="<?php echo $format; ?>"
								 readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Lantai</label>
							<div class="col-sm-2">
								<input type="number" class="form-control" id="lantai" name="lantai" placeholder="Lantai Kamar" autofocus required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Kapasitas</label>
							<div class="col-sm-2">
								<input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Kapasitas Kamar" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Fasilitas</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="fasilitas" name="fasilitas" placeholder="Fasilitas Kamar" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tarif Per Bulan</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="tarif" name="tarif" placeholder="Tarif Per Bulan" required>
							</div>
						</div>

						<!-- /.box-body -->
						<div class="box-footer">
							<a href="?page=data-kamar" class="btn btn-default">Batal</a>
							<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
						</div>
				</form>
				</div>
			</div>
		</div>
</section>

<?php

    if (isset ($_POST['Simpan'])){
    
        $sql_simpan = "INSERT INTO tb_kamar (id_kamar, lantai, kapasitas, fasilitas, tarif) VALUES (
           '".$_POST['id_kamar']."',
          '".$_POST['lantai']."',
		  '".$_POST['kapasitas']."',
		  '".$_POST['fasilitas']."',
          '".$_POST['tarif']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=data-kamar';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=data-kamar';
          }
      })</script>";
    }
  }
    
