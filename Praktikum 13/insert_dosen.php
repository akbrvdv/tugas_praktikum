<?php
include 'koneksi.php'; // Sertakan file koneksi

// Contoh data - di aplikasi nyata data ini akan datang dari form
$idDosenContoh = 10; // Sebaiknya biarkan auto-increment atau ambil dari form
$namaDosenContoh = 'Rahmat Dwi Prasetya';
$noHPContoh = '081234567890'; // Modul menuliskan 'rahmat@example.com', saya sesuaikan ke noHP

// Query dengan placeholder untuk prepared statement
$sql = "INSERT INTO t_dosen (namaDosen, noHP) VALUES (?, ?)"; // idDosen auto_increment

// Membuat prepared statement
$stmt = $con->prepare($sql);

if ($stmt) {
    // Bind parameter ke placeholder
    // "ss" berarti kedua parameter adalah string
    $stmt->bind_param("ss", $namaDosenContoh, $noHPContoh);

    // Eksekusi statement
    if ($stmt->execute()) {
        echo "Data dosen baru berhasil ditambahkan. ID Dosen: " . $stmt->insert_id;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
} else {
    echo "Error preparing statement: " . $con->error;
}

// Menutup koneksi
$con->close();
?>