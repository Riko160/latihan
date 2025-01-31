<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal Form 3</title>
</head>
<body>
    <h1>Menghitung Body Mass Index (BMI)</h1>

    <form action="" method="post">
        <label for="berat">Berat Badan (kg):</label>
        <input type="number" name="berat" id="berat" required>
        <br><br>
        <label for="tinggi">Tinggi Badan (cm):</label>
        <input type="number" name="tinggi" id="tinggi" required>
        <br><br>
        <button type="submit">Kirim</button>
    </form>
    <br><hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $berat = $_POST["berat"];
        $tinggi = $_POST["tinggi"];

        // Validasi input
        if ($berat <= 0 || $tinggi <= 0) {
            echo "<p style='color: red;'>Berat dan tinggi badan harus berupa angka positif!</p>";
        } else {
            // Hitung BMI
            $bmi = $berat / (($tinggi / 100) ** 2);

            // Tampilkan hasil BMI
            echo "<h2>Hasil BMI Anda</h2>";
            echo "BMI Anda: " . number_format($bmi, 2) . "<br>";

            // Tentukan kategori BMI
            if ($bmi < 18.5) {
                echo "Kategori: Kekurangan berat badan";
            } elseif ($bmi <= 24.9) {
                echo "Kategori: Berat badan normal";
            } elseif ($bmi <= 29.9) {
                echo "Kategori: Kelebihan berat badan";
            } else {
                echo "Kategori: Obesitas";
            }
        }
    }
    ?>
</body>
</html>
