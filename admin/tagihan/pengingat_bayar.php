<?php
    $phone = $_GET["phone"];
    $nama = $_GET["nama"];
    $bulan = $_GET["bulan"];
    $tahun = $_GET["tahun"];
    $tagihan = $_GET["tagihan"];

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
    'message' => "Pengingat Pembayaran KOSAN
    
    sdr/i $nama anda belum melakukan pembayaran tagihan untuk bulan $bulan tahun $tahun sebesar $tagihan rupiah",
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

    if (isset($error_msg)) {
        echo "<script>
        Swal.fire({title: 'Pengiriman Pesan WA Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=lunas-tagihan';
            }
        });
        
        setTimeout(function() {
            Swal.clickConfirm();
        }, 2000);</script>";
    }else{
        echo "<script>
        Swal.fire({title: 'Pengiriman Pesan WA Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=belum-lunas-tagihan';
            }
        });

        setTimeout(function() {
            Swal.clickConfirm();
        }, 2000); 
        </script>";
    }
	
?>
<!-- END -->