<?php
session_start();
require "../controller/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $nik = $_GET['nik'];
    $sql = "SELECT * FROM masyarakat WHERE nik='$nik'";
    $row = $koneksi->query($sql)->fetch_assoc();

    $nama = $row['nama'];
    $username = $row['username'];
    $telepon = $row['telp'];
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik = $_GET['nik'];
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];

    $sql = "UPDATE masyarakat SET nama='$nama', telp='$telepon' WHERE nik='$nik'";
    $row = $koneksi->query($sql);

    if ($row) {
        header("Location: masyarakat.php");
    } else {
        echo "<script>alert('Gagal memperbarui data masyarakat');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Masyarakat</title>
</head>

<body>
    <h1>Edit Data Masyarakat</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" value="<?= $nik ?>" disabled>
        </div>
        <div class="form-item">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="<?= $nama ?>">
        </div>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?= $username ?>">
        </div>
        <div class="form-item">
            <label for="telepon">Telepon</label>
            <input type="tel" name="telepon" id="telepon" value="<?= $telepon ?>">
        </div>
    </form>
</body>

</html>