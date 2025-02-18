<?php
session_start();
require "../controller/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $nik = $_POST['nik'];
    $sql = "SELECT * FROM masyarakat WHERE nik=?";
    $cek = $koneksi->execute_query($sql, [$nik]);

    if ($cek->num_rows == 1) {
        echo "<script>alert('NIK sudah digunakan!');</script>";
    } else {
        $nama = $_POST['nama'];
        $telepon = $_POST['telepon'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "INSERT INTO masyarakat (nik, nama, telp, username, password) VALUES (?, ?, ?, ?, ?)";
        $row = $koneksi->execute_query($sql, [$nik, $nama, $telepon, $username, $password]);

        echo "<script>alert('Pendaftaran Berhasil !')</script>";
        header("location:masyarkat.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Masyarakat</title>
</head>

<body>
    <h1>Tambah Data Masyarakat</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik">
        </div>
        <div class="form-item">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama">
        </div>
        <div class="form-item">
            <label for="telepon">Telepon</label>
            <input type="tel" name="telepon" id="telepon">
        </div>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>

        <button type="submit">Register</button>
        <a href="masyarakat.php">Batal</a>
    </form>
</body>

</html>