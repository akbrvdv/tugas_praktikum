<?php
$jumlah_uang = 1387500;
$sisa_uang = $jumlah_uang;

echo "Jumlah Uang Tabungan: Rp. " . number_format($jumlah_uang, 0, ',', '.') . ",-<br><br>";
echo "Rincian Pecahan:<br>";

// Pecahan Rp. 100.000
$pecahan_100rb = floor($sisa_uang / 100000);
if ($pecahan_100rb > 0) {
    echo $pecahan_100rb . " lembar Rp. 100.000,-<br>";
    $sisa_uang = $sisa_uang % 100000;
}

// Pecahan Rp. 50.000
$pecahan_50rb = floor($sisa_uang / 50000);
if ($pecahan_50rb > 0) {
    echo $pecahan_50rb . " lembar Rp. 50.000,-<br>";
    $sisa_uang = $sisa_uang % 50000;
}

// Pecahan Rp. 20.000
$pecahan_20rb = floor($sisa_uang / 20000);
if ($pecahan_20rb > 0) {
    echo $pecahan_20rb . " lembar Rp. 20.000,-<br>";
    $sisa_uang = $sisa_uang % 20000;
}

// Pecahan Rp. 10.000
$pecahan_10rb = floor($sisa_uang / 10000);
if ($pecahan_10rb > 0) {
    echo $pecahan_10rb . " lembar Rp. 10.000,-<br>";
    $sisa_uang = $sisa_uang % 10000;
}

// Pecahan Rp. 5.000
$pecahan_5rb = floor($sisa_uang / 5000);
if ($pecahan_5rb > 0) {
    echo $pecahan_5rb . " lembar Rp. 5.000,-<br>";
    $sisa_uang = $sisa_uang % 5000;
}

// Pecahan Rp. 2.000
$pecahan_2rb = floor($sisa_uang / 2000);
if ($pecahan_2rb > 0) {
    echo $pecahan_2rb . " lembar Rp. 2.000,-<br>";
    $sisa_uang = $sisa_uang % 2000;
}

// Pecahan Rp. 500
$pecahan_500 = floor($sisa_uang / 500);
if ($pecahan_500 > 0) {
    echo $pecahan_500 . " keping Rp. 500,-<br>";
    $sisa_uang = $sisa_uang % 500;
}

// Cek jika ada sisa (seharusnya tidak ada untuk kasus ini)
if ($sisa_uang > 0) {
    echo "Sisa uang yang tidak dapat dipecah: Rp. " . number_format($sisa_uang, 0, ',', '.') . ",-";
}

?>

