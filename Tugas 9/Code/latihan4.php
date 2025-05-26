<?php
/* Operator logika yang bisa digunakan
* == Sama Dengan $x == $y
* === Identical $x === $y
* != Tidak sama dengan $x != $y
* <> Tidak sama dengan $x <> $y
* !== Not identical $x !== $y
* > Lebih Besar dari $x > $y
* < Kurang Dari $x < $y
* >= Lebih besar atau Sama dengan $x >= $y
* <= Kurang dari atau sama dengan $x <= $y
* <=> Spaceship $x <=> $y
*/

date_default_timezone_set('Asia/Jakarta'); // Set timezone agar sesuai
$t = date("H"); // mendapatkan jam dengan format 1-24

echo "If<br>";
if ($t < 16) {
    echo "Selamat siang!";
}

// Tambahkan kode dibawah ini if else
echo "<br>If dan Else<br>";
if ($t < 20) {
    echo "Selamat siang!"; // Seharusnya Selamat Sore jika mengikuti logika berikutnya
} else {
    echo "Selamat malam!";
}

// Tambahkan kode dibawah ini nested if
echo "<br>Nested If<br>";
if ($t < 12) { // Asumsi pagi sebelum jam 12
    echo "Selamat Pagi!";
} elseif ($t < 16) { // Asumsi sore antara jam 12 dan 16
    echo "Selamat sore!";
} else { // Asumsi malam setelah jam 16
    echo "Selamat Malam!";
}
?>

