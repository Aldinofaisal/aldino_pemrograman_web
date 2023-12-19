<!-- view.php -->
<?php
session_start();
require 'connect.php'; // assuming connect.php contains your MySQL connection code

// Ambil data dari MySQL
$result = $mysqli->query("SELECT * FROM reservasi");
$pesanan = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Reservation</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <section class="reservation-view" id="reservation-view">
    <h3>Daftar Reservasi</h3>
    <table>
      <thead>
        <tr>
          <th>No ID</th>
          <th>Check In</th>
          <th>Check Out</th>
          <th>Orang Dewasa</th>
          <th>Anak-anak</th>
          <th>Kelas</th>
          <th>Pilihan</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pesanan as $pesan) : ?>
          <tr>
            <!-- Ganti '_id' dengan kolom yang sesuai, seperti 'no_kamar' -->
            <td><?php echo $pesan['_id']; ?></td>
            <td><?php echo $pesan['check_in']; ?></td>
            <td><?php echo $pesan['check_out']; ?></td>
            <td><?php echo $pesan['orang_dewasa']; ?></td>
            <td><?php echo $pesan['anak_anak']; ?></td>
            <td><?php echo $pesan['kamar']; ?></td>
            <td>
              <a href='delete_reservasi.php?id=<?php echo $pesan['_id']; ?>' onclick="return confirmDelete();" class="btn">Delete</a>
              <a href='update_reservasi.php?id=<?php echo $pesan['_id']; ?>' class='btn'>Edit</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="form-group">
      <a href="home.php" class="btn">Kembali</a>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
