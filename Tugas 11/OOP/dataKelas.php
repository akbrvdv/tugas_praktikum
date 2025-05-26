
<?php

require_once 'kelas/Mahasiswa.php';

$mhs1 = new mahasiswa("Muhammad Akbar Fadilah <br>");
$mhs1->setNIM("244311051 <br>");
$mhs1->setKelas("TRPL 2B <br>");

echo($mhs1->getName());
echo($mhs1->getNim());
echo($mhs1->getKelas());
