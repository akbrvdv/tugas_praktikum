<?php
require_once 'Database.php';

if (isset($_GET['idDosen'])) {
    $idDosen = intval($_GET['idDosen']);

    $database = new Database();
    $db = $database->getConnection();

    $query = "DELETE FROM t_dosen WHERE idDosen = ?";
    $stmt = $db->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $idDosen);
        if ($stmt->execute()) {
            // Periksa apakah ada baris yang terpengaruh
            if ($stmt->affected_rows > 0) {
                header("Location: view_dosen_oop.php?status=sukses_hapus");
                exit;
            } else {
                 // Tidak ada baris yang terhapus (mungkin ID tidak ada)
                header("Location: view_dosen_oop.php?status=gagal_hapus_notfound");
                exit;
            }
        } else {
            // Error saat eksekusi
            // Sebaiknya log error ini daripada menampilkannya langsung ke user di produksi
            die("Error menghapus data: " . $stmt->error . " <a href='view_dosen_oop.php'>Kembali</a>");
        }
        $stmt->close();
    } else {
        die("Error mempersiapkan statement: " . $db->error . " <a href='view_dosen_oop.php'>Kembali</a>");
    }
    $database->closeConnection();
} else {
    // Tidak ada idDosen di GET
    header("Location: view_dosen_oop.php");
    exit;
}
?>