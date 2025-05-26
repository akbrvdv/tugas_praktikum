<?php
// data kelas dengan array 2 dimensi
$array = array(
    "1C" => array("udin", "ismail", "adi"), // Kelas 1C
    "1D" => array("lukman", "fajri", "mahmud") // Kelas 1D
);

// menampilkan data array
echo "Data Array Keseluruhan:<br>";
print_r($array);
echo "<br><br>";

// menampilkan kelas 1D (berdasarkan contoh asli '10' sepertinya typo untuk 1D)
echo "Data Array Kelas 1D:<br>";
print_r($array['1D']);
echo "<br><br>";

// menampilkan kelas 1C dengan index 0 (udin)
echo "Siswa Kelas 1C index 0: ";
echo $array['1C'][0]; // menampilkan udin
echo "<br><br>";

// tampilkan fajri (Kelas 1D index 1)
echo "Tampilkan Fajri: ";
echo $array['1D'][1];
echo "<br><br>";

// tampilkan adi (Kelas 1C index 2)
echo "Tampilkan Adi: ";
echo $array['1C'][2];
echo "<br><br>";


// data kelas bisa ditulis juga dengan shorthand syntax
$array_simple = [
    "1C" => ["udin", "ismail", "adi"],
    "1D" => ["lukman", "fajri", "mahmud"]
];

echo "Data Array Simple:<br>";
print_r($array_simple);
?>

