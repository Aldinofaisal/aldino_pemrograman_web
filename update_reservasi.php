<!-- update.php -->
<?php
session_start();
require 'connect.php';

// Ambil data dari MySQL berdasarkan ID
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data reservasi dari tabel MySQL
    $result = $mysqli->query("SELECT * FROM reservasi WHERE _id = $id");

    if ($result->num_rows > 0) {
        $pesanan = $result->fetch_assoc();
    } else {
        $_SESSION['error'] = "Reservasi tidak ditemukan";
        header("Location: home.php");
        exit();
    }
} else {
    $_SESSION['error'] = "ID tidak valid";
    header("Location: home.php");
    exit();
}

// Proses form update jika metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form (sesuaikan dengan nama field di tabel MySQL)
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $orang_dewasa = $_POST['orang_dewasa'];
    $anak_anak = $_POST['anak_anak'];
    $kamar = $_POST['kamar'];

    // Update data di tabel MySQL
    $query = "UPDATE reservasi SET check_in='$check_in', check_out='$check_out', orang_dewasa='$orang_dewasa', anak_anak='$anak_anak', kamar='$kamar' WHERE _id = $id";

    if ($mysqli->query($query)) {
        $_SESSION['success'] = "Data Berhasil Diupdate";
    } else {
        $_SESSION['error'] = "Gagal Mengupdate Data: " . $mysqli->error;
    }

    header("Location: reservasi.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Reservation</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="reservation-update" id="reservation-update">
        <h3>Update Reservasi</h3>
        <form method="post">
            <!-- Form input fields sesuaikan dengan field di tabel MySQL -->
            <label for="check_in">Check In:</label>
            <input type="date" name="check_in" value="<?php echo $pesanan['check_in']; ?>" required>

            <label for="check_out">Check Out:</label>
            <input type="date" name="check_out" value="<?php echo $pesanan['check_out']; ?>" required>

            <label for="orang_dewasa">Orang Dewasa:</label>
            <input type="number" name="orang_dewasa" value="<?php echo $pesanan['orang_dewasa']; ?>" required>

            <label for="anak_anak">Anak-anak:</label>
            <input type="number" name="anak_anak" value="<?php echo $pesanan['anak_anak']; ?>" required>

            <label for="kamar">Kelas:</label>
            <input type="text" name="kamar" value="<?php echo $pesanan['kamar']; ?>" required>

            <button type="submit">Update</button>
        </form>
        <div class="form-group">
            <a href="home.php" class="btn">Kembali</a>
        </div>
    </section>
</body>

</html>
