<?php
include 'koneksi.php';
if (isset($_POST['submit_edit_mhs'])) {
    $npm_original = mysqli_real_escape_string($link, $_POST['npm_original']);
    // $npm_baru = mysqli_real_escape_string($link, $_POST['npm']); // Jika NPM boleh diubah, gunakan ini
    $namaMhs = mysqli_real_escape_string($link, $_POST['namaMhs']);
    $prodi = mysqli_real_escape_string($link, $_POST['prodi']);
    $alamat = mysqli_real_escape_string($link, $_POST['alamat']);
    $noHP = mysqli_real_escape_string($link, $_POST['noHP']);

    // NPM adalah Primary Key, jadi kita update berdasarkan npm_original.
    // Jika NPM boleh diubah, pastikan $npm_baru tidak duplikat (kecuali dirinya sendiri)
    $query = "UPDATE t_mahasiswa SET namaMhs='$namaMhs', prodi='$prodi', alamat='$alamat', noHP='$noHP' WHERE npm='$npm_original'";
    if (mysqli_query($link, $query)) {
        header("Location: view_mahasiswa.php");
    } else {
        echo "Error updating record: " . mysqli_error($link);
    }
} else {
    header("Location: view_mahasiswa.php");
}
?>