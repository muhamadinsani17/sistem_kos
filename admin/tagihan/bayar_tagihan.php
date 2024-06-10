<?php
    $phone = $_GET["phone"];
    $nama = $_GET["nama"];
    $bulan = $_GET["bulan"];
    $tahun = $_GET["tahun"];
    $tagihan = $_GET["tagihan"];
	$tanggal = date("Y-m-d");

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_tagihan WHERE id_tagihan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
	}
	
    $sql_ubah = "UPDATE tb_tagihan SET
		status='LS',
        tgl_bayar='".$tanggal."'
        WHERE id_tagihan='".$_GET['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Pembayaran Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=lunas-tagihan';
            }
        });

        setTimeout(function() {
            Swal.clickConfirm();
        }, 2000); 
        </script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Pembayaran Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=lunas-tagihan';
            }
        });

        setTimeout(function() {
            Swal.clickConfirm();
        }, 2000);
        </script>";
	}

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
    'target' => $phone,
    'message' => "Rincian Bukti Pembayaran Lunas

    Nama : $nama 
    Bulan : $bulan 
    Tahun : $tahun 
    Tagihan : Rp$tagihan
    Status : Pembayaran Lunas
    ",
    ),
    CURLOPT_HTTPHEADER => array(
        'Authorization: yNB3_hgrU9JTyP2uAHeg'
    ),
    ));

    $response = curl_exec($curl);
    if (curl_errno($curl)) {
    $error_msg = curl_error($curl);
    }
    curl_close($curl);
	
?>
<!-- END -->