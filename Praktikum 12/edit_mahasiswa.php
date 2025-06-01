<?php
include 'koneksi.php';
$npm = ''; $namaMhs = ''; $prodi = ''; $alamat = ''; $noHP = ''; $found = false;

if (isset($_GET['npm'])) {
    $npm_edit = mysqli_real_escape_string($link, $_GET['npm']);
    $query = "SELECT * FROM t_mahasiswa WHERE npm='$npm_edit'";
    $result = mysqli_query($link, $query);
    if ($data = mysqli_fetch_assoc($result)) {
        $npm = $data['npm'];
        $namaMhs = $data['namaMhs'];
        $prodi = $data['prodi'];
        $alamat = $data['alamat'];
        $noHP = $data['noHP'];
        $found = true;
    } else {
        echo "Data tidak ditemukan. <a href='view_mahasiswa.php'>Kembali</a>"; exit;
    }
} else {
    header("Location: view_mahasiswa.php"); exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <style>
        body{font-family:arial,sans-serif;margin:20px;} form{width:400px;margin:auto;padding:20px;border:1px solid #ccc;}
        label{display:block;margin-bottom:5px;} input[type=text],input[type=number]{width:95%;padding:8px;margin-bottom:10px;border:1px solid #ccc;}
        input[type=submit]{background-color:#007bff;color:white;padding:10px;border:none;cursor:pointer;}
        .back-link { display: block; text-align: center; margin-top: 15px; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Edit Data Mahasiswa</h2>
    <?php if ($found): ?>
    <form action="proses_edit_mahasiswa.php" method="post">
        <input type="hidden" name="npm_original" value="<?php echo $npm; ?>">
        <label for="npm">NPM:</label>
        <input type="number" id="npm" name="npm" value="<?php echo $npm; ?>" readonly style="background-color:#e9ecef;">
        <label for="namaMhs">Nama Mahasiswa:</label>
        <input type="text" id="namaMhs" name="namaMhs" value="<?php echo htmlspecialchars($namaMhs); ?>" required>
        <label for="prodi">Prodi:</label>
        <input type="text" id="prodi" name="prodi" value="<?php echo htmlspecialchars($prodi); ?>" required>
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($alamat); ?>" required>
        <label for="noHP">No HP:</label>
        <input type="text" id="noHP" name="noHP" value="<?php echo htmlspecialchars($noHP); ?>">
        <input type="submit" name="submit_edit_mhs" value="Update">
    </form>
    <?php endif; ?>
    <a href="view_mahasiswa.php" class="back-link">Kembali ke Daftar Mahasiswa</a>
</body>
</html>