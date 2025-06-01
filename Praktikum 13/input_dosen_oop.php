<?php
require_once 'Database.php';

$namaDosen = '';
$noHP = '';
$errors = [];
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['input'])) {
    $database = new Database();
    $db = $database->getConnection();

    $namaDosen = trim($_POST['namaDosen']);
    $noHP = trim($_POST['noHP']);

    if (empty($namaDosen)) {
        $errors[] = "Nama dosen tidak boleh kosong.";
    }
    if (empty($noHP)) {
        $errors[] = "Nomor HP tidak boleh kosong.";
    }
    // Anda bisa menambahkan validasi lain di sini (misal format No HP)

    if (empty($errors)) {
        $query = "INSERT INTO t_dosen (namaDosen, noHP) VALUES (?, ?)";
        $stmt = $db->prepare($query);

        if ($stmt) {
            $stmt->bind_param("ss", $namaDosen, $noHP);
            if ($stmt->execute()) {
                $message = "Data dosen berhasil ditambahkan!";
                // Kosongkan field setelah sukses
                $namaDosen = '';
                $noHP = '';
                // header("Location: view_dosen_oop.php?status=sukses_input"); // Alternatif redirect
                // exit;
            } else {
                $errors[] = "Gagal menyimpan data: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $errors[] = "Gagal mempersiapkan statement: " . $db->error;
        }
    }
    $database->closeConnection();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Input Data Dosen (OOP)</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { width: 500px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        h1 { text-align: center; }
        label { display: block; margin-top: 10px; margin-bottom: 5px; }
        input[type="text"] { width: calc(100% - 22px); padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; }
        input[type="submit"] { background-color: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #218838; }
        .errors, .message { padding: 10px; margin-bottom: 15px; border-radius: 4px; }
        .errors { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .message { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .back-link { display: block; text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Input Data Dosen (OOP)</h1>

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

        <form action="input_dosen_oop.php" method="post">
            <div>
                <label for="namaDosen">Nama Dosen:</label>
                <input type="text" name="namaDosen" id="namaDosen" value="<?php echo htmlspecialchars($namaDosen); ?>" required>
            </div>
            <div>
                <label for="noHP">No HP:</label>
                <input type="text" name="noHP" id="noHP" value="<?php echo htmlspecialchars($noHP); ?>" placeholder="Contoh: 08123456789" required>
            </div>
            <div>
                <input type="submit" name="input" value="Simpan Data Dosen">
            </div>
        </form>
        <a href="view_dosen_oop.php" class="back-link">Lihat Daftar Dosen</a>
    </div>
</body>
</html>