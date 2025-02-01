<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal Form 3 - BMI Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet"> <!-- Menghubungkan file CSS eksternal -->
</head>
<body>
    <header>
        <div class="container">
            <h1>Menghitung Body Mass Index (BMI)</h1>
            <p>Masukkan berat dan tinggi badan Anda untuk mengetahui hasil BMI.</p>
        </div>
    </header>

    <main class="main-content">
        <section>
            <div class="container">
                <div class="form-container">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="berat" class="form-label">Berat Badan (kg):</label>
                            <input type="number" class="form-control" name="berat" id="berat" required>
                        </div>
                        <div class="mb-3">
                            <label for="tinggi" class="form-label">Tinggi Badan (cm):</label>
                            <input type="number" class="form-control" name="tinggi" id="tinggi" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $berat = $_POST["berat"];
                    $tinggi = $_POST["tinggi"];

                    // Validasi input
                    if ($berat <= 0 || $tinggi <= 0) {
                        echo "<div class='alert alert-danger mt-4'>Berat dan tinggi badan harus berupa angka positif!</div>";
                    } else {
                        // Hitung BMI
                        $bmi = $berat / (($tinggi / 100) ** 2);

                        // Tampilkan hasil BMI
                        echo "<div class='result-container mt-4'>";
                        echo "<h2>Hasil BMI Anda</h2>";
                        echo "<p>BMI Anda: <strong>" . number_format($bmi, 2) . "</strong></p>";

                        // Tentukan kategori BMI
                        if ($bmi < 18.5) {
                            echo "<p>Kategori: <strong>Kekurangan berat badan</strong></p>";
                        } elseif ($bmi <= 24.9) {
                            echo "<p>Kategori: <strong>Berat badan normal</strong></p>";
                        } elseif ($bmi <= 29.9) {
                            echo "<p>Kategori: <strong>Kelebihan berat badan</strong></p>";
                        } else {
                            echo "<p>Kategori: <strong>Obesitas</strong></p>";
                        }

                        // Tombol Kembali ke Halaman Utama
                        echo "<a href='index.html' class='btn btn-secondary mt-3'>Kembali ke Halaman Utama</a>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2023 BMI Calculator - Dibuat dengan ❤️</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>