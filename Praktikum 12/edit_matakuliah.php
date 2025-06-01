<?php
include 'koneksi.php';
$kodeMK_edit = ''; $namaMK = ''; $sks = ''; $jam = ''; $found = false;

if (isset($_GET['kodeMK'])) {
    $kodeMK_edit = mysqli_real_escape_string($link, $_GET['kodeMK']);
    $query = "SELECT * FROM t_matakuliah WHERE kodeMK='$kodeMK_edit'";
    $result = mysqli_query($link, $query);

    if ($data = mysqli_fetch_assoc($result)) {
        $namaMK = $data['namaMK'];
        $sks = $data['sks'];
        $jam = $data['jam'];
        $found = true;
    } else {
        echo "Data mata kuliah tidak ditemukan. <a href='view_matakuliah.php'>Kembali</a>";
        exit;
    }
} else {
    header("Location: view_matakuliah.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Mata Kuliah</title>
    <style>
        body{font-family:arial,sans-serif;margin:20px;}
        form{width:400px;margin:auto;padding:20px;border:1px solid #ccc; border-radius:5px;}
        h2{text-align:center;}
        label{display:block;margin-bottom:5px;margin-top:10px;}
        input[type=text],input[type=number]{width:95%;padding:8px;margin-bottom:10px;border:1px solid #ccc; border-radius:3px;}
        input[type=text][readonly]{background-color:#e9ecef;}
        input[type=submit]{background-color:#007bff;color:white;padding:10px 15px;border:none;cursor:pointer;border-radius:3px;margin-top:10px;}
        input[type=submit]:hover{background-color:#0056b3;}
        .back-link { display: block; text-align: center; margin-top: 15px; text-decoration:none; color:#007bff;}
    </style>
</head>
<body>
    <h2>Edit Data Mata Kuliah</h2>
    <?php if ($found): ?>
    <form action="proses_edit_matakuliah.php" method="post">
        <input type="hidden" name="kodeMK_original" value="<?php echo htmlspecialchars($kodeMK_edit); ?>">

        <label for="kodeMK">Kode MK:</label>
        <input type="text" id="kodeMK" name="kodeMK" value="<?php echo htmlspecialchars($kodeMK_edit); ?>" readonly>

        <label for="namaMK">Nama Mata Kuliah:</label>
        <input type="text" id="namaMK" name="namaMK" value="<?php echo htmlspecialchars($namaMK); ?>" required>

        <label for="sks">SKS:</label>
        <input type="number" id="sks" name="sks" value="<?php echo $sks; ?>" min="1" required>

        <label for="jam">Jam:</label>
        <input type="number" id="jam" name="jam" value="<?php echo $jam; ?>" min="1" required>

        <input type="submit" name="submit_edit_mk" value="Update Data">
    </form>
    <?php endif; ?>
    <a href="view_matakuliah.php" class="back-link">Kembali ke Daftar Mata Kuliah</a>
</body>
</html>