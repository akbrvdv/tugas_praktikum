<?php
include 'koneksi.php'; // Sertakan file koneksi

// buat query yang akan dikirim ke database
$q = "CREATE TABLE IF NOT EXISTS t_login (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Panjang password disarankan 255 untuk hasil hash
    email VARCHAR(50) UNIQUE,
    tgl_registrasi TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// kirim kueri ke server basis data
$hasil = $con->query($q);

// periksa hasil pengiriman query
if ($hasil === TRUE) {
    echo "Tabel t_login berhasil dibuat atau sudah ada.";
} else {
    echo "Tabel gagal dibuat: " . $con->error;
}

// menutup koneksi
$con->close();
?>