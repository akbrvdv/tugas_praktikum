<?php
require_once 'Database.php';

$idDosen = null;
$namaDosen = '';
$noHP = '';
$errors = [];
$message = '';
$dosen_found = false;

$database = new Database(); // Instance database
$db = $database->getConnection(); // Dapatkan koneksi

// Ambil data dosen jika ID ada di GET
if (isset($_GET['idDosen'])) {
    $idDosen = intval($_GET['idDosen']); // Pastikan integer

    $query_select = "SELECT namaDosen, noHP FROM t_dosen WHERE idDosen = ?";
    $stmt_select = $db->prepare($query_select);

    if ($stmt_select) {
        $stmt_select->bind_param("i", $idDosen);
        $stmt_select->execute();
        $result = $stmt_select->get_result();
        if ($row = $result->fetch_assoc()) {
            $namaDosen = $row['namaDosen'];
            $noHP = $row['noHP'];
            $dosen_found = true;
        } else {
            $errors[] = "Data dosen tidak ditemukan.";
        }
        $stmt_select->close();
    } else {
        $errors[] = "Gagal mempersiapkan statement untuk mengambil data: " . $db->error;
    }
} else {
    // Jika tidak ada idDosen di GET, redirect atau tampilkan pesan
    // header("Location: view_dosen_oop.php");
    // exit;
    $errors[] = "ID Dosen tidak disediakan.";
}


// Proses update jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit']) && $dosen_found) {
    $idDosen_post = intval($_POST['idDosen']); // Ambil ID dari hidden field
    $namaDosen_post = trim($_POST['namaDosen']);
    $noHP_post = trim($_POST['noHP']);

    if (empty($namaDosen_post)) {
        $errors[] = "Nama dosen tidak boleh kosong.";
    }
    if (empty($noHP_post)) {
        $errors[] = "Nomor HP tidak boleh kosong.";
    }

    if (empty($errors) && $idDosen_post == $idDosen) { // Pastikan ID tidak dimanipulasi
        $query_update = "UPDATE t_dosen SET namaDosen = ?, noHP = ? WHERE idDosen = ?";
        $stmt_update = $db->prepare($query_update);

        if ($stmt_update) {
            $stmt_update->bind_param("ssi", $namaDosen_post, $noHP_post, $idDosen_post);
            if ($stmt_update->execute()) {
                $message = "Data dosen berhasil diperbarui!";
                // Update variabel untuk ditampilkan di form
                $namaDosen = $namaDosen_post;
                $noHP = $noHP_post;
                // header("Location: view_dosen_oop.php?status=sukses_edit"); // Alternatif redirect
                // exit;
            } else {
                $errors[] = "Gagal memperbarui data: " . $stmt_update->error;
            }
            $stmt_update->close();
        } else {
            $errors[] = "Gagal mempersiapkan statement untuk update: " . $db->error;
        }
    } elseif ($idDosen_post != $idDosen) {
        $errors[] = "Terjadi kesalahan ID.";
    }
}
$database->closeConnection(); // Tutup koneksi di akhir
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Dosen (OOP)</title>
    <style>
        /* Salin style dari input_dosen_oop.php, sesuaikan warna tombol submit */
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { width: 500px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        h1 { text-align: center; }
        label { display: block; margin-top: 10px; margin-bottom: 5px; }
        input[type="text"], input[type="hidden"] { width: calc(100% - 22px); padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; }
        input[type="submit"] { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
        .errors, .message { padding: 10px; margin-bottom: 15px; border-radius: 4px; }
        .errors { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .message { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .back-link { display: block; text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Data Dosen (OOP)</h1>

        <?php if (!empty($errors)): ?>
            <div class="errors">
                <strong>Error:</strong>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($message): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <?php if ($dosen_found): ?>
            <form action="edit_dosen_oop.php?idDosen=<?php echo $idDosen; /* Untuk mempertahankan ID di URL jika ada error */?>" method="post">
                <input type="hidden" name="idDosen" value="<?php echo htmlspecialchars($idDosen); ?>">
                <div>
                    <label for="namaDosen">Nama Dosen:</label>
                    <input type="text" name="namaDosen" id="namaDosen" value="<?php echo htmlspecialchars($namaDosen); ?>" required>
                </div>
                <div>
                    <label for="noHP">No HP:</label>
                    <input type="text" name="noHP" id="noHP" value="<?php echo htmlspecialchars($noHP); ?>" required>
                </div>
                <div>
                    <input type="submit" name="edit" value="Update Data Dosen">
                </div>
            </form>
        <?php elseif(empty($errors) && !$dosen_found && isset($_GET['idDosen'])): ?>
             <p style="text-align:center;">Data dosen dengan ID <?php echo htmlspecialchars($_GET['idDosen']); ?> tidak ditemukan.</p>
        <?php endif; ?>
        <a href="view_dosen_oop.php" class="back-link">Kembali ke Daftar Dosen</a>
    </div>
</body>
</html>