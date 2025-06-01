<?php
// Definisikan konstanta untuk koneksi agar mudah diubah
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); // Sesuaikan jika username Anda berbeda
define('DB_PASSWORD', '');     // Sesuaikan jika ada password
define('DB_NAME', 'db_praktik'); // Nama database

// Membuat koneksi
$con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>

