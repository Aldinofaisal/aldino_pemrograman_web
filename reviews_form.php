<?php
session_start();

if (isset($_POST['submit'])) {
    require 'connect.php';

    // Tidak perlu mengambil nilai _id dari form, karena nilai ini akan otomatis di-generate oleh MySQL (AUTO_INCREMENT)
    $users_id = $_POST['users_id'];
    $reservasi_id = $_POST['reservasi_id'];
    $reviews = $_POST['reviews'];

    // Lakukan validasi data sesuai kebutuhan

    // Query untuk menyimpan data ke tabel reviews di MySQL
    $query = "INSERT INTO reviews (users_id, reservasi_id, reviews) VALUES ('$users_id', '$reservasi_id', '$reviews')";

    if ($mysqli->query($query)) {
        $_SESSION['success'] = "Data Berhasil Ditambahkan";
        header("Location: reviews.php");
    } else {
        $_SESSION['error'] = "Gagal Menambahkan Data: " . $mysqli->error;
        header("Location: reviews.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="contact" id="contact">

<div class="row">

   <form action="" method="post">
      <h3>send your problem😊😊</h3>
      <!-- Tidak perlu input _id karena akan di-generate secara otomatis -->
      <input type="text" name="users_id" required maxlength="50" placeholder="masukkan id user" class="box">
      <input type="text" name="reservasi_id" required maxlength="50"  placeholder="masukkan id reservasi" class="box">
      <input type="text" name="reviews" required maxlength="50" placeholder="berikan ulasan 👌👌" class="box">
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
