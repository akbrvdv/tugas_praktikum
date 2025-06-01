<?php
require_once 'Database.php'; // Sertakan kelas Database

// Buat instance Database dan dapatkan koneksi
$database = new Database();
$db = $database->getConnection();

$keyword = '';
$dosen_list = []; // Array untuk menyimpan data dosen

// Logika pencarian
if (isset($_GET['keyword']) && !empty(trim($_GET['keyword']))) {
    $keyword = trim($_GET['keyword']);
    $search_param = "%" . $keyword . "%";

    $query = "SELECT idDosen, namaDosen, noHP FROM t_dosen WHERE namaDosen LIKE ? ORDER BY namaDosen ASC";
    $stmt = $db->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $search_param);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $dosen_list[] = $row;
        }
        $stmt->close();
    } else {
        echo "Error preparing search statement: " . $db->error;
    }
} else {
    // Tampilkan semua data jika tidak ada keyword
    $query = "SELECT idDosen, namaDosen, noHP FROM t_dosen ORDER BY namaDosen ASC";
    $result = $db->query($query);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $dosen_list[] = $row;
        }
    } else {
        echo "Error fetching data: " . $db->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Dosen (OOP)</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { width: 80%; margin: auto; }
        h1, h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .action-links a { margin-right: 10px; text-decoration: none; }
        .add-button, .search-button { padding: 8px 15px; text-decoration: none; border-radius: 4px; color: white; }
        .add-button { background-color: #28a745; margin-bottom:15px; display:inline-block;}
        .search-button { background-color: #007bff; }
        .search-form { margin-bottom: 20px; text-align:center;}
        .search-form input[type="text"] { padding: 8px; border-radius:4px; border:1px solid #ccc; }
        .nav-home { display: block; text-align: center; margin: 15px; font-size: 1.1em; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Dosen (OOP & Prepared Statements)</h1>
        <a class="nav-home" href="index_oop.php">Kembali ke Menu Utama (OOP)</a>


        <div class="search-form">
            <form action="view_dosen_oop.php" method="GET">
                <input type="text" name="keyword" placeholder="Cari Nama Dosen..." value="<?php echo htmlspecialchars($keyword); ?>">
                <input type="submit" value="Cari" class="search-button">
                <?php if ($keyword): ?>
                    <a href="view_dosen_oop.php" style="text-decoration:none; margin-left:5px;">Reset</a>
                <?php endif; ?>
            </form>
        </div>
         <a href="input_dosen_oop.php" class="add-button">Tambah Dosen Baru</a>

        <?php if (!empty($dosen_list)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Dosen</th>
                        <th>No HP</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dosen_list as $dosen): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($dosen['idDosen']); ?></td>
                            <td><?php echo htmlspecialchars($dosen['namaDosen']); ?></td>
                            <td><?php echo htmlspecialchars($dosen['noHP']); ?></td>
                            <td class="action-links">
                                <a href="edit_dosen_oop.php?idDosen=<?php echo $dosen['idDosen']; ?>" style="color:blue;">Edit</a>
                                <a href="hapus_dosen_oop.php?idDosen=<?php echo $dosen['idDosen']; ?>" style="color:red;"
                                   onclick="return confirm('Anda yakin akan menghapus data ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="text-align:center;">
                <?php echo ($keyword) ? "Tidak ada dosen yang cocok dengan kata kunci '".htmlspecialchars($keyword)."'." : "Belum ada data dosen."; ?>
            </p>
        <?php endif; ?>
    </div>
    <?php $database->closeConnection(); // Tutup koneksi ?>
</body>
</html>