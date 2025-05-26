
<?php

require_once('kelas/Manusia.php');

$anwar = new Manusia();
$anwar->setName('Anwar Zaid');

$budi = new Manusia();
$budi->setName('Budi Santoso');

$akbar = new Manusia();
$akbar->setName('Muhammad Akbar Fadilah');
$umur = new Manusia();
$umur->setAge('19');

$nik = new Manusia();
$nik->getNIK();

echo($anwar->getName());
echo "<br>";
echo($budi->getName());
echo "<br>";
echo($akbar->getName());
echo "<br>";
echo($umur->getAge());
echo "<br>";
echo($nik->getNIK());
echo "<br>";

