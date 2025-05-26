<?php
$x = 5;
$y = 10;

// Arithmetic operators
echo "Penambahan ". ($x + $y) ."<br>";
echo "Pengurangan ". ($x - $y) ."<br>";
echo "Perkalian ". ($x * $y) ."<br>";
echo "Pembagian ". ($x / $y) ."<br>";
echo "Modulus ". ($x % $y) ."<br>";
echo "Exponensial ". ($x ** $y) ."<br>";
echo("<br>");

// Assignment operators
$x += 2; // $x = $x + 2 -> $x is now 7
$y *= 2; // $y = $y * 2 -> $y is now 20
echo "Penambahan x = ". $x ."<br>";
echo "Perkalian y = ". $y ."<br>";
echo("<br>");

// Increment/Decrement operators
// Pre-increment ++$x: increments $x by one, then returns $x
// Post-increment $x++: returns $x, then increments $x by one
// Pre-decrement --$y: decrements $y by one, then returns $y
// Post-decrement $y--: returns $y, then decrements $y by one

echo "Isi ++x = ". ++$x ."<br>"; // $x becomes 8, outputs 8
echo "Isi x++ = ". $x++ ."<br>"; // outputs 8, then $x becomes 9
echo "Isi x = ". $x ."<br>"; // outputs 9
echo("<br>");
echo "Isi --y = ". --$y ."<br>"; // $y becomes 19, outputs 19
echo "Isi y-- = ". $y-- ."<br>"; // outputs 19, then $y becomes 18
echo "Isi y = ". $y ."<br>"; // outputs 18
echo("<br>");

// Conditional assignment operators
$user = "Andi darmawan";
// <kondisi> ? <nilai_jika_kondisi_true> : <nilai_jika_kondisi_false>
$status = (empty($user)) ? "Kosong" : "Ada isi";
echo $status ."<br>";

// variable $color diisi dengan "red" jika $color tidak ada atau null
// Null coalescing operator (??)
echo $color = $color ?? "red";
?>

