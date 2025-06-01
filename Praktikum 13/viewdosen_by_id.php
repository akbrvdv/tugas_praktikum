<?php
include 'koneksi.php'; // Sertakan file koneksi

// Cek apakah 'id' ada di URL dan bukan string kosong
if (isset($_GET['id']) && $_GET['id'] !== '') {
    $input_id = $_GET['id']; // Tidak perlu escape_string jika menggunakan prepared statement untuk bind

    // membuat query dengan prepared statement
    $statement = $con->prepare("SELECT * FROM t_dosen WHERE idDosen = ?");

    if ($statement) {
        // merubah ? sesuai dengan tipe data input yang dibutuhkan
        // i = integer, s = string, d = double, b = blob
        $statement->bind_param("i", $input_id);

        // mengeksekusi query ke basis data
        $statement->execute();

        // mendapatkan hasil dari eksekusi query
        $hasil = $statement->get_result();

        if ($hasil->num_rows > 0) {
            echo "<h2>Data Dosen dengan ID: " . htmlspecialchars($input_id) . "</h2>";
            // perulangan untuk mendapatkan baris data
            while ($baris = $hasil->fetch_assoc()) {
                // filter data tampilan untuk data teks saja tanpa kode html
                echo "Nama Dosen: " . htmlspecialchars($baris['namaDosen']) . "<br>";
                echo "No HP: " . htmlspecialchars($baris['noHP']) . "<br>";
                echo "<hr>";
            }
        } else {
            echo "Tidak ada dosen ditemukan dengan ID: " . htmlspecialchars($input_id);
        }
        // Tutup statement
        $statement->close();
    } else {
        echo "Error preparing statement: " . $con->error;
    }
} else {
    echo "Silakan masukkan ID dosen pada URL. Contoh: viewdosen_by_id.php?id=1";
}

// Menutup koneksi
$con->close();
?>