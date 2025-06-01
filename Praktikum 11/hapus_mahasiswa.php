<?php
include 'koneksi.php';
if (isset($_GET['npm'])) {
    $npm = mysqli_real_escape_string($link, $_GET['npm']);
    $query = "DELETE FROM t_mahasiswa WHERE npm='$npm'";
    if (mysqli_query($link, $query)) {
        header("Location: view_mahasiswa.php");
    } else {
        echo "Error deleting record: " . mysqli_error($link);
    }
} else {
    header("Location: view_mahasiswa.php");
}
?>