<?php
$gaji_pokok = 3250000;
$tunjangan_jabatan = 1200000;
$pajak_persen = 10; // 10%

// Hitung gaji kotor
$gaji_kotor = $gaji_pokok + $tunjangan_jabatan;

// Hitung pajak penghasilan
$pajak_penghasilan = ($pajak_persen / 100) * $gaji_kotor;

// Hitung gaji bersih
$gaji_bersih = $gaji_kotor - $pajak_penghasilan;

echo "Gaji Pokok: Rp. " . number_format($gaji_pokok, 0, ',', '.') . ",-<br>";
echo "Tunjangan Jabatan: Rp. " . number_format($tunjangan_jabatan, 0, ',', '.') . ",-<br>";
echo "Gaji Kotor: Rp. " . number_format($gaji_kotor, 0, ',', '.') . ",-<br>";
echo "Pajak Penghasilan (10%): Rp. " . number_format($pajak_penghasilan, 0, ',', '.') . ",-<br>";
echo "Gaji Bersih: Rp. " . number_format($gaji_bersih, 0, ',', '.') . ",-<br>";
?>

