<?php
include 'koneksi.php';

if (isset($_POST['submit_mk'])) {
    $kodeMK = mysqli_real_escape_string($link, strtoupper($_POST['kodeMK'])); // Buat jadi uppercase
    $namaMK = mysqli_real_escape_string($link, $_POST['namaMK']);
    $sks = mysqli_real_escape_string($link, $_POST['sks']);
    $jam = mysqli_real_escape_string($link, $_POST['jam']);

    // Cek apakah kodeMK sudah ada
    $query_cek = "SELECT kodeMK FROM t_matakuliah WHERE kodeMK='$kodeMK'";
    $result_cek = mysqli_query($link, $query_cek);

    if (mysqli_num_rows($result_cek) > 0) {
        die("Error: Kode Mata Kuliah '$kodeMK' sudah terdaftar. <a href='input_matakuliah.php'>Kembali</a>");
    }

    $query = "INSERT INTO t_matakuliah (kodeMK, namaMK, sks, jam) VALUES ('$kodeMK', '$namaMK', '$sks', '$jam')";

    if (mysqli_query($link, $query)) {
        header("Location: view_matakuliah.php?status=sukses_input");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
        echo "<br><a href='input_matakuliah.php'>Kembali</a>";
    }
} else {
    header("Location: input_matakuliah.php");
}
?>