<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Input Mahasiswa</title>
    <style>
        body{font-family:arial,sans-serif;margin:20px;} form{width:400px;margin:auto;padding:20px;border:1px solid #ccc;}
        label{display:block;margin-bottom:5px;} input[type=text],input[type=number]{width:95%;padding:8px;margin-bottom:10px;border:1px solid #ccc;}
        input[type=submit]{background-color:#4CAF50;color:white;padding:10px;border:none;cursor:pointer;}
        .back-link { display: block; text-align: center; margin-top: 15px; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Input Data Mahasiswa</h2>
    <form action="proses_input_mahasiswa.php" method="post">
        <label for="npm">NPM:</label>
        <input type="number" id="npm" name="npm" required>
        <label for="namaMhs">Nama Mahasiswa:</label>
        <input type="text" id="namaMhs" name="namaMhs" required>
        <label for="prodi">Prodi:</label>
        <input type="text" id="prodi" name="prodi" required>
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" required>
        <label for="noHP">No HP:</label>
        <input type="text" id="noHP" name="noHP">
        <input type="submit" name="submit_mhs" value="Simpan">
    </form>
    <a href="view_mahasiswa.php" class="back-link">Kembali ke Daftar Mahasiswa</a>
</body>
</html>