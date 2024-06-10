<?php

function createNewData() {
    // Konfigurasi koneksi database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "data_kos";

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Mendapatkan bulan dan tahun saat ini
    $bulan = date("m");
    $tahun = date("Y");

    // Menjalankan query untuk mendapatkan data dari tb_penghuni
    $sql = $conn->query("SELECT p.id_penghuni, p.nama, k.id_kamar, k.tarif from tb_penghuni p inner join 
    tb_kamar k on p.id_kamar=k.id_kamar order by id_penghuni");

    // Memeriksa apakah query berhasil dieksekusi
    if ($sql) {
        // Iterasi melalui hasil query
        while ($row = $sql->fetch_assoc()) {
            $id_penghuni = $row['id_penghuni'];
            $tarif = $row['tarif'];

            // Logika untuk membuat data baru
            $sql_simpan = "INSERT INTO tb_tagihan (bulan, tahun, id_penghuni, tagihan, status) VALUES (
                '$bulan',
                '$tahun',
                '$id_penghuni',
                '$tarif',
                'BL')";
            $query_simpan = $conn->query($sql_simpan);
        }

        // Menutup koneksi setelah semua data berhasil disimpan
        $conn->close();
    }
}

// Tangani permintaan AJAX
if (isset($_GET['action']) && $_GET['action'] == 'createNewData') {
    createNewData();
}
?>
