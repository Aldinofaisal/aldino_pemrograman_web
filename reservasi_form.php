<?php
session_start();
require 'connect.php';

if(isset($_POST['submit'])) {
    // Menyimpan data ke MySQL
    $check_in = $_POST['in'];
    $check_out = $_POST['out'];
    $orang_dewasa = $_POST['dewasa'];
    $anak_anak = $_POST['anak'];
    $kamar = $_POST['kamar'];

    $query = "INSERT INTO reservasi (check_in, check_out, orang_dewasa, anak_anak, kamar) VALUES ('$check_in', '$check_out', '$orang_dewasa', '$anak_anak', '$kamar')";

    if ($mysqli->query($query)) {
        $_SESSION['success'] = "Data Berhasil Ditambahkan";
        header("Location: reviews_form.php");
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
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

<section class="reservation" id="reservation">
    <form action="" method="post">
        <h3>make a reservation</h3>
        <div class="flex">
            <div class="box">
                <p>check in <span>*</span></p>
                <input type="date" name="in" class="input" required />
            </div>
            <div class="box">
                <p>check out <span>*</span></p>
                <input type="date" name="out" class="input" required />
            </div>
            <div class="box">
                <p>orang dewasa <span>*</span></p>
                <select name="dewasa" class="input" required>
                    <option value="1 orang-dewasa">1 orang dewasa</option>
                    <option value="2 orang dewasa">2 orang dewasa</option>
                    <option value="3 orang dewasa">3 orang dewasa</option>
                    <option value="4 orang dewasa ">4 orang dewasa</option>
                    <option value="5 orang dewasa">5 orang dewasa</option>
                    <option value="6 orang dewasa">6 orang dewasa</option>
                </select>
            </div>
            <div class="box">
                <p>anak-anak <span>*</span></p>
                <select name="anak" class="input" required>
                    <option value="-">0 anak-anak</option>
                    <option value="1 anak-anak">1 anak-anak</option>
                    <option value="2 anak-anak">2 anak-anak</option>
                    <option value="3 anak-anak">3 anak-anak</option>
                    <option value="4 anak-anak">4 anak-anak</option>
                    <option value="5 anak-anak">5 anak-anak</option>
                    <option value="6 anak-anak">6 anak-anak</option>
                </select>
            </div>
            <div class="box">
                <p>rooms <span>*</span></p>
                <select name="kamar" class="input" required>
                    <option value="Standart Rooms">Standart Rooms</option>
                    <option value="Superior Rooms">Superior Romms</option>
                    <option value="Deluxe Rooms">Deluxe Rooms</option>
                    <option value="Suite Rooms">Suite Rooms</option>
                    <option value="Single Rooms">Single Rooms</option>
                    <option value="VVIP Rooms">VVIP Rooms</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn">order</button>
        </div>
        <div class="form-group">
            <a href="home.php" class="btn">Kembali</a>
        </div>
    </form>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>
