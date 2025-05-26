<?php
$angka = 5; // Contoh angka, bisa diganti antara 1-9

echo "Angka: " . $angka . "<br>";
echo "Terbilang: ";

switch ($angka) {
    case 1:
        echo "satu";
        break;
    case 2:
        echo "dua";
        break;
    case 3:
        echo "tiga";
        break;
    case 4:
        echo "empat";
        break;
    case 5:
        echo "lima";
        break;
    case 6:
        echo "enam";
        break;
    case 7:
        echo "tujuh";
        break;
    case 8:
        echo "delapan";
        break;
    case 9:
        echo "sembilan";
        break;
    default:
        echo "Angka di luar rentang 1-9";
}
?>

