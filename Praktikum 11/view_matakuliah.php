<?php
include 'koneksi.php';
$keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($link, $_GET['keyword']) : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mata Kuliah</title>
    <style>
        body{font-family:arial,sans-serif;margin:0;padding:0;}
        .container{width:85%;margin:20px auto;}
        h2{text-align:center;margin-top:20px;}
        table{border-collapse:collapse;width:100%;margin-top:20px;}
        th,td{border:1px solid #ddd;padding:10px;text-align:left;}
        th{background-color:#f2f2f2;color:#333;}
        .button{padding:6px 12px;text-decoration:none;border-radius:4px;margin-right:5px;color:white;font-size:0.9em;}
        .add{background-color:#5cb85c;border:1px solid #4cae4c;}
        .add:hover{background-color:#4cae4c;}
        .edit{background-color:#337ab7;border:1px solid #2e6da4;}
        .edit:hover{background-color:#286090;}
        .delete{background-color:#d9534f;border:1px solid #d43f3a;}
        .delete:hover{background-color:#c9302c;}
        .top-controls{display:flex;justify-content:space-between;align-items:center;margin-bottom:15px;}
        .search-form input[type="text"]{padding:8px;border:1px solid #ccc;border-radius:4px;}
        .search-form input[type="submit"]{padding:8px 12px;background-color:#5bc0de;color:white;border:1px solid #46b8da;border-radius:4px;cursor:pointer;}
        .search-form input[type="submit"]:hover{background-color:#31b0d5;}
        .search-form a{text-decoration:none;margin-left:10px;padding:8px 10px; background-color:#f0ad4e; color:white; border-radius:4px; font-size:0.9em;}
        .search-form a:hover{background-color:#ec971f;}
        .nav-home{text-decoration:none; color:#007bff; font-size:1.1em; display:block; text-align:center; margin-bottom:20px;}
        .message{padding:10px; margin-bottom:15px; border-radius:4px; text-align:center;}
        .sukses{background-color:#dff0d8; color:#3c763d; border:1px solid #d6e9c6;}
        .error{background-color:#f2dede; color:#a94442; border:1px solid #ebccd1;}
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Mata Kuliah</h2>
        <a class="nav-home" href="index.php">Kembali ke Menu Utama</a>

        <?php
        if ($status == 'sukses_input') {
            echo '<div class="message sukses">Data mata kuliah berhasil ditambahkan!</div>';
        } elseif ($status == 'sukses_edit') {
            echo '<div class="message sukses">Data mata kuliah berhasil diperbarui!</div>';
        } elseif ($status == 'sukses_hapus') {
            echo '<div class="message sukses">Data mata kuliah berhasil dihapus!</div>';
        }
        ?>

        <div class="top-controls">
            <a href="input_matakuliah.php" class="button add">Tambah Mata Kuliah Baru</a>
            <form class="search-form" action="view_matakuliah.php" method="GET">
                <input type="text" name="keyword" placeholder="Cari Nama Mata Kuliah..." value="<?php echo htmlspecialchars($keyword); ?>">
                <input type="submit" value="Cari">
                <?php if ($keyword): ?>
                    <a href="view_matakuliah.php">Reset</a>
                <?php endif; ?>
            </form>
        </div>

        <table>
            <thead>
                <tr><th>Kode MK</th><th>Nama Mata Kuliah</th><th>SKS</th><th>Jam</th><th>Aksi</th></tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM t_matakuliah";
            if ($keyword) {
                $query .= " WHERE namaMK LIKE '%$keyword%' OR kodeMK LIKE '%$keyword%'"; // Bisa cari berdasarkan kode juga
            }
            $query .= " ORDER BY kodeMK ASC";
            $result = mysqli_query($link, $query);

            if (mysqli_num_rows($result) > 0) {
                while($data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".htmlspecialchars($data['kodeMK'])."</td>";
                    echo "<td>".htmlspecialchars($data['namaMK'])."</td>";
                    echo "<td>".$data['sks']."</td>";
                    echo "<td>".$data['jam']."</td>";
                    echo "<td>
                            <a href='edit_matakuliah.php?kodeMK=".$data['kodeMK']."' class='button edit'>Edit</a>
                            <a href='hapus_matakuliah.php?kodeMK=".$data['kodeMK']."' class='button delete' onclick='return confirm(\"Anda yakin ingin menghapus data mata kuliah ".htmlspecialchars($data['namaMK'], ENT_QUOTES)." (".$data['kodeMK'].")?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5' style='text-align:center;'>";
                if ($keyword) {
                    echo "Tidak ada mata kuliah yang cocok dengan kata kunci '".htmlspecialchars($keyword)."'.";
                } else {
                    echo "Belum ada data mata kuliah.";
                }
                echo "</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>