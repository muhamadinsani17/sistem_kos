<?php
//kode

$pass_acak = mt_rand(1000, 9999);

  
$carikode = mysqli_query($koneksi,"SELECT id_penghuni FROM tb_penghuni order by id_penghuni desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_penghuni'];
$urut = substr($kode, 1, 3);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1){
$format = "P"."00".$tambah;
 	}else if (strlen($tambah) == 2){
 	$format = "P"."0".$tambah;
			}else if (strlen($tambah) == 3){
			$format = "P".$tambah;
				}

?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Data Penghuni</h3>
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
							<label class="col-sm-2 control-label">ID Penghuni</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="id_penghuni" name="id_penghuni" value="<?php echo $format; ?>"
								 readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" autofocus required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Alamat</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">No HP (Awali : 62)</label>
							<div class="col-sm-4">
								<input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tgl Registrasi</label>
							<div class="col-sm-2">
								<input type="date" class="form-control" id="tgl_reg" name="tgl_reg" required>
							</div>
						</div>

						<!-- <div class="form-group">
							<label class="col-sm-2 control-label">Kamar</label>
							<div class="col-sm-4">
								<select name="id_kamar" id="id_kamar" class="form-control select2" style="width: 100%;">
									<option selected="selected">-- Pilih --</option>
								//<?php
								// // ambil data dari database
								// $query = "select k.id_kamar, p.nama from tb_kamar k left join tb_penghuni p 
								// on k.id_kamar=p.id_kamar order by id_kamar asc";
								// $hasil = mysqli_query($koneksi, $query);
								// while ($row = mysqli_fetch_array($hasil)) {
								// ?>
								// 	<option value="<?php echo $row['id_kamar'] ?>">
								// 		<?php echo $row['id_kamar'] ?>
								// 		|
								// 		<?php echo $row['nama'] ?>
								// 	</option>
								// 	<?php
								// }
								// ?>
								</select>
							</div>
						</div> -->
						<div class="form-group">
							<label class="col-sm-2 control-label">Kamar</label>
							<div class="col-sm-4">
								<select name="id_kamar" id="id_kamar" class="form-control select2" style="width: 100%;">
									<option selected="selected">-- Pilih --</option>
									<?php
									// ambil data dari database
									$query = "SELECT k.id_kamar, p.nama FROM tb_kamar k LEFT JOIN tb_penghuni p ON k.id_kamar = p.id_kamar ORDER BY k.id_kamar ASC";
									$hasil = mysqli_query($koneksi, $query);
									while ($row = mysqli_fetch_array($hasil)) {
										$disabled = !empty($row['nama']) ? 'disabled' : ''; // Jika ada nama, set disabled
									?>
										<option value="<?php echo $row['id_kamar'] ?>" <?php echo $disabled; ?>>
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
							<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
						</div>
				</form>
				</div>
			</div>
		</div>
</section>

<?php

    if (isset ($_POST['Simpan'])){
    
        $sql_simpan = "INSERT INTO tb_penghuni (id_penghuni, nama, alamat, no_hp, tgl_reg, password, id_kamar) VALUES (
           '".$_POST['id_penghuni']."',
          '".$_POST['nama']."',
		  '".$_POST['alamat']."',
		  '".$_POST['no_hp']."',
		  '".$_POST['tgl_reg']."',
		  '".$pass_acak."',
          '".$_POST['id_kamar']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=data-penghuni';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OKE'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=data-penghuni';
          }
      })</script>";
    }
  }
    
