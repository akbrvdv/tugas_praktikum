<?php
// Data siswa dalam array asosiatif (lebih mudah diakses)
$data_siswa = [
    ["No Urut" => 1, "Poin" => 75, "Siswa" => "Adi"],
    ["No Urut" => 2, "Poin" => 80, "Siswa" => "Joni"],
    ["No Urut" => 3, "Poin" => 65, "Siswa" => "Jihan"],
    ["No Urut" => 4, "Poin" => 70, "Siswa" => "Aya"],
    ["No Urut" => 5, "Poin" => 85, "Siswa" => "Ita"],
    ["No Urut" => 6, "Poin" => 90, "Siswa" => "Budi"],
    ["No Urut" => 7, "Poin" => 95, "Siswa" => "Tini"],
    ["No Urut" => 8, "Poin" => 65, "Siswa" => "Sari"]
];

echo "Data Siswa:<br>";
echo "<table border='1'><tr><th>No Urut</th><th>Poin</th><th>Siswa</th></tr>";
foreach ($data_siswa as $siswa) {
    echo "<tr><td>".$siswa['No Urut']."</td><td>".$siswa['Poin']."</td><td>".$siswa['Siswa']."</td></tr>";
}
echo "</table><br>";

// a) Tampilkan poin siswa dengan nomor urut 5
echo "a) Poin siswa dengan nomor urut 5:<br>";
$poin_no_5 = null;
foreach ($data_siswa as $siswa) {
    if ($siswa['No Urut'] == 5) {
        $poin_no_5 = $siswa['Poin'];
        break; // Hentikan loop jika sudah ketemu
    }
}
if ($poin_no_5 !== null) {
    echo "Poin: " . $poin_no_5 . "<br>";
} else {
    echo "Siswa dengan nomor urut 5 tidak ditemukan.<br>";
}
echo "<br>";

// b) Tampilkan semua nama siswa yang memiliki poin 90
echo "b) Nama siswa dengan poin 90:<br>";
$nama_poin_90 = [];
foreach ($data_siswa as $siswa) {
    if ($siswa['Poin'] == 90) {
        $nama_poin_90[] = $siswa['Siswa'];
    }
}
if (!empty($nama_poin_90)) {
    foreach ($nama_poin_90 as $nama) {
        echo "- " . $nama . "<br>";
    }
} else {
    echo "Tidak ada siswa dengan poin 90.<br>";
}
echo "<br>";

// c) Tampilkan semua nama siswa yang memiliki poin 100
echo "c) Nama siswa dengan poin 100:<br>";
$nama_poin_100 = [];
foreach ($data_siswa as $siswa) {
    if ($siswa['Poin'] == 100) {
        $nama_poin_100[] = $siswa['Siswa'];
    }
}
if (!empty($nama_poin_100)) {
    foreach ($nama_poin_100 as $nama) {
        echo "- " . $nama . "<br>";
    }
} else {
    echo "Tidak ada siswa dengan poin 100.<br>"; // Sesuai hasil yang diharapkan
}
?>

