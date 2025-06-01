<?php
include 'koneksi.php';
if (isset($_POST['submit_mhs'])) {
    $npm = mysqli_real_escape_string($link, $_POST['npm']);
    $namaMhs = mysqli_real_escape_string($link, $_POST['namaMhs']);
    $prodi = mysqli_real_escape_string($link, $_POST['prodi']);
    $alamat = mysqli_real_escape_string($link, $_POST['alamat']);
    $noHP = mysqli_real_escape_string($link, $_POST['noHP']);

    $query_cek = "SELECT npm FROM t_mahasiswa WHERE npm='$npm'";
    $result_cek = mysqli_query($link, $query_cek);
    if (mysqli_num_rows($result_cek) > 0) {
        die("Error: NPM sudah ada. <a href='input_mahasiswa.php'>Kembali</a>");
    }

    $query = "INSERT INTO t_mahasiswa (npm, namaMhs, prodi, alamat, noHP) VALUES ('$npm', '$namaMhs', '$prodi', '$alamat', '$noHP')";
    if (mysqli_query($link, $query)) {
        header("Location: view_mahasiswa.php");
    } else {
        echo "Error: " . mysqli_error($link);
    }
}
?>