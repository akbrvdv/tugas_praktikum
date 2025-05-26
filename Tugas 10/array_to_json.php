<?php
$data = [];

for ($i = 1; $i <= 15; $i++) {
    $data[] = [
        "nama" => "Mahasiswa $i",
        "umur" => 18 + $i
    ];
}

header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
?>
