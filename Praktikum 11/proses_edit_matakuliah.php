<?php
include 'koneksi.php';

if (isset($_POST['submit_edit_mk'])) {
    $kodeMK_original = mysqli_real_escape_string($link, $_POST['kodeMK_original']);
    // $kodeMK_baru = mysqli_real_escape_string($link, strtoupper($_POST['kodeMK'])); // Jika Kode MK boleh diubah
    $namaMK = mysqli_real_escape_string($link, $_POST['namaMK']);
    $sks = mysqli_real_escape_string($link, $_POST['sks']);
    $jam = mysqli_real_escape_string($link, $_POST['jam']);

    // Asumsi Kode MK (Primary Key) tidak diubah di form edit.
    // Jika Kode MK diizinkan diubah, Anda perlu menambahkan validasi:
    // if ($kodeMK_baru != $kodeMK_original) {
    //    $query_cek = "SELECT kodeMK FROM t_matakuliah WHERE kodeMK='$kodeMK_baru'";
    //    $result_cek = mysqli_query($link, $query_cek);
    //    if (mysqli_num_rows($result_cek) > 0) {
    //        die("Error: Kode Mata Kuliah '$kodeMK_baru' sudah terdaftar untuk mata kuliah lain. <a href='edit_matakuliah.php?kodeMK=$kodeMK_original'>Kembali</a>");
    //    }
    // }
    // $query = "UPDATE t_matakuliah SET kodeMK='$kodeMK_baru', namaMK='$namaMK', sks='$sks', jam='$jam' WHERE kodeMK='$kodeMK_original'";

    $query = "UPDATE t_matakuliah SET namaMK='$namaMK', sks='$sks', jam='$jam' WHERE kodeMK='$kodeMK_original'";

    if (mysqli_query($link, $query)) {
        header("Location: view_matakuliah.php?status=sukses_edit");
    } else {
        echo "Error updating record: " . mysqli_error($link);
        echo "<br><a href='edit_matakuliah.php?kodeMK=$kodeMK_original'>Kembali</a>";
    }
} else {
    header("Location: view_matakuliah.php");
}
?>