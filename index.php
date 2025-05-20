<?php
require 'topsis.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hasil Perhitungan TOPSIS</title>
</head>
<body>
    <h2>Matriks Keputusan (X)</h2>
    <pre><?php print_r($X); ?></pre>

    <h2>Matriks Normalisasi (R)</h2>
    <pre><?php print_r($R); ?></pre>

    <h2>Matriks Normalisasi Terbobot (Y)</h2>
    <pre><?php print_r($Y); ?></pre>

    <h2>Solusi Ideal Positif (A+)</h2>
    <pre><?php print_r($A_plus); ?></pre>

    <h2>Solusi Ideal Negatif (A-)</h2>
    <pre><?php print_r($A_minus); ?></pre>

    <h2>Jarak ke Solusi Ideal Positif (D+)</h2>
    <pre><?php print_r($D_plus); ?></pre>

    <h2>Jarak ke Solusi Ideal Negatif (D-)</h2>
    <pre><?php print_r($D_minus); ?></pre>

    <h2>Hasil Perankingan</h2>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Nilai Preferensi (V)</th>
            <th>Peringkat</th>
        </tr>
        <?php
        $rank = 1;
        foreach ($V as $nama => $nilai) {
            echo "<tr><td>$nama</td><td>" . round($nilai, 4) . "</td><td>$rank</td></tr>";
            $rank++;
        }
        ?>
    </table>
</body>
</html>
