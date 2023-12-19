<?php
session_start();
require 'connect.php';

if (isset($_POST['submit'])) {
    // Menyimpan data ke MySQL
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis'];
    $status = $_POST['status'];
    $alamat = $_POST['alamat'];

    // Tidak perlu menyertakan _id dalam VALUES karena sudah AUTO_INCREMENT
    $query = "INSERT INTO users (nama, jenis_kelamin, status, alamat) VALUES ('$nama', '$jenis_kelamin', '$status', '$alamat')";

    if ($mysqli->query($query)) {
        $_SESSION['success'] = "Data Berhasil Ditambahkan";
        header("Location: reservasi_form.php");
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
}

// Query untuk mendapatkan data pengguna dari tabel MySQL
$query = "SELECT * FROM users";
$result = $mysqli->query($query);

// Mengambil hasil query ke dalam array
$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

// Menutup koneksi tidak diperlukan di sini
// $mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="contact" id="contact">
        <div class="row">
            <form action="" method="post">
                <h3>send us message</h3>
                <input type="text" name="nama" required maxlength="50" placeholder="nama anda" class="box">
                <input type="text" name="jenis" required maxlength="50"  placeholder="masukkan jenis kelamin" class="box">
                <input type="text" name="status" required maxlength="50" placeholder="status anda" class="box">
                <input type="text" name="alamat" required maxlength="50" placeholder="masukkan alamat anda" class="box">
                <div class="form-group">
                    <button type="submit" name="submit" class="btn">send</button>
                </div>
            </form>
        </div>
        <div class="form-group">
            <a href="home.php" class="btn">Kembali</a>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>
