<?php
include 'koneksi.php';
$keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($link, $_GET['keyword']) : '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        body{font-family:arial,sans-serif;} table{border-collapse:collapse;width:95%;margin:20px auto;}
        th,td{border:1px solid #ddd;padding:8px;text-align:left;} th{background-color:#f2f2f2;}
        .button{padding:5px 10px;text-decoration:none;border-radius:3px;margin-right:5px;}
        .add{background-color:#4CAF50;color:white;} .edit{background-color:#007bff;color:white;}
        .delete{background-color:#f44336;color:white;}
        .search-form{margin:20px auto;width:95%;text-align:right;}
        .nav-home{display:block; text-align:center; margin:15px; font-size:1.1em;}
    </style>
</head>
<body>
    <h2 style="text-align:center;">Data Mahasiswa</h2>
    <a class="nav-home" href="index.php">Kembali ke Menu Utama</a>
    <div class="search-form">
        <form action="view_mahasiswa.php" method="GET">
            <input type="text" name="keyword" placeholder="Cari Nama Mahasiswa..." value="<?php echo htmlspecialchars($keyword); ?>">
            <input type="submit" value="Cari">
             <?php if ($keyword): ?>
                <a href="view_mahasiswa.php" style="text-decoration:none; margin-left:5px;">Reset</a>
            <?php endif; ?>
        </form>
    </div>
    <div style="width:95%; margin: 20px auto;">
      <a href="input_mahasiswa.php" class="button add">Tambah Mahasiswa</a>
    </div>
    <table>
        <tr><th>NPM</th><th>Nama</th><th>Prodi</th><th>Alamat</th><th>No HP</th><th>Aksi</th></tr>
        <?php
        $query = "SELECT * FROM t_mahasiswa";
        if ($keyword) {
            $query .= " WHERE namaMhs LIKE '%$keyword%'";
        }
        $query .= " ORDER BY npm ASC";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0) {
            while($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$data['npm']."</td>";
                echo "<td>".htmlspecialchars($data['namaMhs'])."</td>";
                echo "<td>".htmlspecialchars($data['prodi'])."</td>";
                echo "<td>".htmlspecialchars($data['alamat'])."</td>";
                echo "<td>".htmlspecialchars($data['noHP'])."</td>";
                echo "<td>
                        <a href='edit_mahasiswa.php?npm=".$data['npm']."' class='button edit'>Edit</a>
                        <a href='hapus_mahasiswa.php?npm=".$data['npm']."' class='button delete' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center;'>Data tidak ditemukan.</td></tr>";
        }
        ?>
    </table>
</body>
</html>