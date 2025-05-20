<?php
require 'data.php';

// 1. Normalisasi Matriks (R)
$sumSquares = array_fill(0, count($W), 0);
foreach ($X as $nilai) {
    foreach ($nilai as $j => $xij) {
        $sumSquares[$j] += pow($xij, 2);
    }
}
$rootSums = array_map('sqrt', $sumSquares);

// Normalisasi
$R = [];
foreach ($X as $nama => $nilai) {
    foreach ($nilai as $j => $xij) {
        $R[$nama][$j] = $xij / $rootSums[$j];
    }
}

// 2. Normalisasi Terbobot (Y)
$Y = [];
foreach ($R as $nama => $nilai) {
    foreach ($nilai as $j => $rij) {
        $Y[$nama][$j] = $rij * $W[$j];
    }
}

// 3. Menentukan A+ dan A-
$A_plus = [];
$A_minus = [];
for ($j = 0; $j < count($W); $j++) {
    $column = array_column($Y, $j);
    $A_plus[$j] = max($column);
    $A_minus[$j] = min($column);
}

// 4. Menghitung D+ dan D-
$D_plus = [];
$D_minus = [];
foreach ($Y as $nama => $nilai) {
    $D_plus[$nama] = sqrt(array_sum(array_map(fn($yij, $apj) => pow($yij - $apj, 2), $nilai, $A_plus)));
    $D_minus[$nama] = sqrt(array_sum(array_map(fn($yij, $amj) => pow($yij - $amj, 2), $nilai, $A_minus)));
}

// 5. Menghitung nilai preferensi (V)
$V = [];
foreach ($Y as $nama => $nilai) {
    $V[$nama] = $D_minus[$nama] / ($D_plus[$nama] + $D_minus[$nama]);
}

// Mengurutkan berdasarkan ranking
arsort($V);
?>
