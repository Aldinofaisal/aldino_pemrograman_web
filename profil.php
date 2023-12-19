<?php
session_start();
require 'connect.php';

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

    <section class="profil" id="profil">
        <div class="row">
            <h3>Daftar Profil</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <!-- Ganti 'id' dengan kolom yang sesuai di database -->
                        <th>Id</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo $user['nama']; ?></td>
                            <!-- Ganti 'id' dengan kolom yang sesuai di database -->
                            <td><?php echo $user['_id']; ?></td>
                            <td><?php echo $user['jenis_kelamin']; ?></td>
                            <td><?php echo $user['status']; ?></td>
                            <td><?php echo $user['alamat']; ?></td>
                            <td>
                                <!-- Ganti 'id' dengan kolom yang sesuai di database -->
                                <a href='delete_profil.php?id=<?php echo $user['_id']; ?>' onclick="return confirmDelete();" class="btn">Delete</a>  
                                <a href='update_profil.php?id=<?php echo $user['_id']; ?>' class='btn'>Edit</a>
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
