<?php
session_start();
require 'connect.php';

if (isset($_SESSION['success'])) {
}

try {
    // Menggabungkan data dari tabel reviews, users, dan reservasi
    $query = "
        SELECT
            r._id,
            r.reservasi_id,
            r.users_id,
            u.nama AS user,
            re.kamar AS kamar,
            r.reviews
        FROM reviews r
        JOIN users u ON r.users_id = u._id
        JOIN reservasi re ON r.reservasi_id = re._id
    ";

    $result = $mysqli->query($query);

    if (!$result) {
        throw new Exception("Error executing query: " . $mysqli->error);
    }

    $reviews = $result->fetch_all(MYSQLI_ASSOC);
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
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

    <section class="review">
        <div class="row">
            <h3>review anda sebagai masukan bagi kami</h3>
            <table>
                <thead>
                    <tr>
                        <th>no id</th>
                        <th>no reservasi</th>
                        <th>no profil</th>
                        <th>nama pelanggan</th>
                        <th>kelas kamar</th>
                        <th>review</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reviews as $review) : ?>
                        <tr>
                            <td><?php echo $review['_id']; ?></td>
                            <td><?php echo $review['reservasi_id']; ?></td>
                            <td><?php echo $review['users_id']; ?></td>
                            <td><?php echo $review['user']; ?></td>
                            <td><?php echo $review['kamar']; ?></td>
                            <td><?php echo $review['reviews']; ?></td>
                            <td>
                                <a href='delete_reviews.php?id=<?php echo $review['_id']; ?>' class="btn">Delete</a>
                                <a href='update.php?id=<?php echo $review['_id']; ?>' class='btn'>Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <a href="home.php" class="btn">Kembali</a>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>
