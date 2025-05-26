<?php
$warna = "merah"; // Contoh warna, bisa diganti

echo "Switch case untuk warna: " . $warna . "<br>";

switch ($warna) {
    case "merah":
        echo "Warna adalah merah";
        break;
    case "kuning":
        echo "Warna adalah kuning";
        break; // Break ditambahkan agar tidak lanjut ke case hijau
    case "hijau":
        echo "Warna adalah hijau";
        break;
    default:
        echo "Warna tidak dikenal!";
}
echo "<br>";
?>

