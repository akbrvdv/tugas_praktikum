<?php

require_once 'kelas/akunBank.php';

$data1 = new akunBank("001", 10000);
$data2 = new akunBank("002", 10000);

$akun = new akunBank("040705", 10000);

$akun->setName("Akbar");

$akun->tambahUang(500000);
$akun->kurangUang(200000);

echo "Nama: " . $akun->getName() . "<br>";
echo "Saldo sekarang: Rp " . $akun->getJumlahUang() . "<br>";
echo "Pajak (11%): Rp " . $akun->hitungPajak();