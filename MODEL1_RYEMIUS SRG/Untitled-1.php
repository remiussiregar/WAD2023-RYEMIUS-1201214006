<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator BMI</title>
</head>
<body>
    <h1>Kalkulator BMI</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tinggi_cm = $_POST["tinggi"];
        $berat_kg = $_POST["berat"];

        // Konversi tinggi dari cm ke meter
        $tinggi_m = $tinggi_cm / 100;

        // Menghitung BMI
        $bmi = $berat_kg / ($tinggi_m ** 2);

        echo "<p>BMI Anda adalah: " . number_format($bmi, 2) . "</p>";

        // Menampilkan kategori BMI
        if ($bmi < 18.5) {
            echo "<p>Kamu berada dalam kategori Kurus</p>";
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            echo "<p>Kamu berada dalam kategori Normal</p>";
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            echo "<p>Kamu berada dalam kategori Kelebihan Berat Badan</p>";
        } else {
            echo "<p>Kamu berada dalam kategori Obesitas</p>";
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="tinggi">Tinggi Badan (cm):</label>
        <input type="number" name="tinggi" required>
        <br>

        <label for="berat">Berat Badan (kg):</label>
        <input type="number" name="berat" required>
        <br>

        <input type="submit" value="Hitung BMI">
    </form>
</body>
</html>
