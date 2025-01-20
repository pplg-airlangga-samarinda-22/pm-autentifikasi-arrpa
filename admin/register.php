<?php
require "../controller/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'];

    $sql = "SELECT * FROM petugas WHERE username=?";
    $cek = $koneksi->execute_query($sql, [$username]);

    if (mysqli_num_rows($cek) == 1) {
        echo "<script>alert('Pendaftaran berhasil!')</script>";
        header("location:login.php");
    } else {
        $nama_petugas = $_POST['nama_petugas'];
        $telepon = $_POST['telepon'];
        $username = $_POST['username'];
        $level = $_POST['level'];
        $password = md5($_POST['password']);
        $sql = "INSERT INTO petugas SET nama_petugas=?,  telp=?, username=?, password=?, level=?";
        $koneksi->execute_query($sql, [$nama_petugas, $telepon, $username, $password, $level]);
        echo "<script>alert('USERNAME sudah digunakan!') </script>";
        header("location:login.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrasi</title>
</head>

<body>
    <h1>Registrasi Pengguna Baru</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="nama_petugas">Nama Lengkap</label>
            <input type="text" name="nama_petugas" id="nama_petugas" required>
        </div>
        <div class="form-item">
            <label for="telepon">Telepon</label>
            <input type="tel" name="telepon" id="telepon" required>
        </div>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <select name="level" class="form-control" required>
            <option value=""> Pilih Level Petugas </option>
            <option value="admin"> Admin </option>
            <option value="petugas"> Petugas </option>
        </select>
        <br>
        <button type="submit">Register</button>
    </form>
    <a href="login.php">Batal</a>
</body>

</html>