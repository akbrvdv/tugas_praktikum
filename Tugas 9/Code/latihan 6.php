<?php
// while Loop
echo "While Loop:<br>";
$x = 10;
while ($x > 5) { // Kondisi diubah agar loop berjalan
    echo "Nomor: $x <br>";
    $x--;
}
echo "<br>";

// do while
echo "Do While Loop:<br>";
$x = 1;
do {
    echo "Nomor: $x <br>";
    $x++;
} while ($x <= 5);
echo "<br>";

// foreach
echo "Foreach Loop:<br>";
$colors = array("red", "green", "blue", "yellow"); // "blue" ditambahkan ke array
foreach ($colors as $value) {
    echo $value . "<br>";
}
echo "<br>";

// for
echo "For Loop:<br>";
for ($x = 0; $x <= 10; $x++) {
    echo "Nomor: $x <br>";
}
echo "<br>";

// for dengan break
echo "For Loop dengan Break:<br>";
for ($x = 0; $x < 10; $x++) {
    if ($x == 4) {
        break;
    }
    echo "Nomor: $x <br>";
}
?>