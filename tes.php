<?php
    // Sertakan file abc.php yang berisi definisi fungsi createNewData()
    include "abc.php";
?>

<script>
    // Fungsi untuk memeriksa waktu setiap menit
    function checkTimeAndCreate() {
        const now = new Date();
        const day = now.getDate();
        const hour = now.getHours();
        const minute = now.getMinutes();

        // Mengatur waktu yang diinginkan
        const targetDay = 16;
        const targetHour = 1;
        const targetMinute = 56;

        // Periksa apakah waktu saat ini sesuai dengan target waktu
        if (day === targetDay && hour === targetHour && minute === targetMinute) {
            // Panggil fungsi createNewData() menggunakan AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "abc.php?action=createNewData", true);
            xhr.send();
        }
    }

    // Periksa waktu setiap menit
    setInterval(checkTimeAndCreate, 35000); // 60000 ms = 1 menit

    // Jalankan segera saat halaman dimuat untuk pertama kali
    checkTimeAndCreate();
</script>
