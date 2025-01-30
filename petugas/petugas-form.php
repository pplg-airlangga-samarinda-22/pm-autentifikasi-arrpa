<?php
session_start();
require "../controller/koneksi.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5( $_POST['password']);
    $telepon = $_POST['telepon']; 
    $level = $_POST['level']; 
    $sql = "INSERT INTO petugas (nama_petugas, username, password, telp, level) values (?,?,?,?,?)";
    $row = $koneksi->execute_query($sql, [$nama, $username, $password, $telepon, $level]);

    if($row){
        header("location:petugas.php");
    } else {    
        echo "<script>alert('Gagal menambahkan petugas');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Petugas Baru</title>
</head>
<body>
    <h1>Tambah Petugas Baru</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="level">Level Akses</label>
            <select name="level" id="level">
                <option value="" disabled selected>Pilih level akses</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>   
        </div>
        <div class="for-item">
            <label for="nama">Nama petugas</label>
            <input type="text" name="nama" id="nama">
        </div>
        <div class="form-item">
            <label for="telepon">telepon</label>
            <input type="telp" name="telepon" id="telepon">
        </div>
        <div class="form-item">
            <label for="username">username</label>
            <input type="username" name="username" id="username">
        </div>
        <div class="form-item">
            <label for="password">password</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Kirim</button>
        <a href="petugas.php">Batal</a>
    </form>
    
</body>
</html>