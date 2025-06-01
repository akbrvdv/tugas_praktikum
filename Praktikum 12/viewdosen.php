<?php
include 'koneksi.php'; // memanggil file koneksi.php untuk melakukan koneksi database
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        /* Basic CSS for styling */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .action-links a {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
        }

        .action-links a:hover {
            text-decoration: underline;
        }

        .button-link {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .button-link:hover {
            background-color: #0056b3;
        }

        .search-form {
            margin-bottom: 20px;
            text-align: center;
        }

        .search-form input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 300px;
        }

        .search-form input[type="submit"] {
            padding: 8px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .search-form input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <h1>Tabel Dosen</h1>
    <div class="container">
        <center><a href="input.php" class="button-link">Input Data Dosen</a></center>

        <div class="search-form">
            <form action="viewdosen.php" method="GET">
                <input type="text" name="keyword" placeholder="Cari berdasarkan Nama Dosen..." value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                <input type="submit" value="Cari">
            </form>
        </div>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nama Dosen</th>
                <th>No HP</th>
                <th>Pilihan</th>
            </tr>

            <?php
            $search_keyword = "";
            if (isset($_GET['keyword'])) {
                $search_keyword = mysqli_real_escape_string($link, $_GET['keyword']);
                $query = "SELECT * FROM t_dosen WHERE namaDosen LIKE '%$search_keyword%' ORDER BY idDosen ASC";
            } else {
                $query = "SELECT * FROM t_dosen ORDER BY idDosen ASC";
            }

            $result = mysqli_query($link, $query);

            if (!$result) {
                die("Query Error: " . mysqli_errno($link) .
                    "-" . mysqli_error($link));
            }

            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $data['idDosen'] . "</td>";
                echo "<td>" . $data['namaDosen'] . "</td>";
                echo "<td>" . $data['noHP'] . "</td>";
                echo '<td class="action-links">
          <a href="editdosen.php?idDosen=' . $data['idDosen'] . '">Edit</a> /
          <a href="hapusdosen.php?idDosen=' . $data['idDosen'] . '"
          onclick="return confirm(\'Anda yakin akan menghapus data?\')">Hapus</a>
          </td>';
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>