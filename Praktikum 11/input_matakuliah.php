<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Input Mata Kuliah</title>
    <style>
        body{font-family:arial,sans-serif;margin:20px;}
        form{width:400px;margin:auto;padding:20px;border:1px solid #ccc; border-radius:5px;}
        h2{text-align:center;}
        label{display:block;margin-bottom:5px;margin-top:10px;}
        input[type=text],input[type=number]{width:95%;padding:8px;margin-bottom:10px;border:1px solid #ccc; border-radius:3px;}
        input[type=submit]{background-color:#4CAF50;color:white;padding:10px 15px;border:none;cursor:pointer;border-radius:3px;margin-top:10px;}
        input[type=submit]:hover{background-color:#45a049;}
        .back-link { display: block; text-align: center; margin-top: 15px; text-decoration:none; color:#007bff;}
    </style>
</head>
<body>
    <h2>Input Data Mata Kuliah</h2>
    <form action="proses_input_matakuliah.php" method="post">
        <label for="kodeMK">Kode MK:</label>
        <input type="text" id="kodeMK" name="kodeMK" required>

        <label for="namaMK">Nama Mata Kuliah:</label>
        <input type="text" id="namaMK" name="namaMK" required>

        <label for="sks">SKS:</label>
        <input type="number" id="sks" name="sks" min="1" required>

        <label for="jam">Jam:</label>
        <input type="number" id="jam" name="jam" min="1" required>

        <input type="submit" name="submit_mk" value="Simpan">
    </form>
    <a href="view_matakuliah.php" class="back-link">Kembali ke Daftar Mata Kuliah</a>
</body>
</html>