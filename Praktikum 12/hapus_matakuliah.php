<?php
include 'koneksi.php';

if (isset($_GET['kodeMK'])) {
    $kodeMK = mysqli_real_escape_string($link, $_GET['kodeMK']);
    $query = "DELETE FROM t_matakuliah WHERE kodeMK='$kodeMK'";

    if (mysqli_query($link, $query)) {
        header("Location: view_matakuliah.php?status=sukses_hapus");
    } else {
        // Sebaiknya tampilkan pesan error yang lebih user-friendly atau log error
        echo "Error deleting record: " . mysqli_error($link);
        echo "<br><a href='view_matakuliah.php'>Kembali</a>";
    }
} else {
    header("Location: view_matakuliah.php");
}
?>