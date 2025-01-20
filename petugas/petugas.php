<?php
session_start();
require "../controller/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petugas</title>
</head>
<body>

    <h1>Data Petugas</h1>
    <a href="index.php">Kembali</a>
    <a href="petugas-form.php">Tmabah Petugas Baru</a>
    <table>
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Username</th>
            <th>level</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $sql = "SELECT * FROM petugas";
            $rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
            foreach ($rows as $row) {
            ?>
            <tr>
                <td><?= ++$no ?></td>
                <td><?= $row['nama_petugas'] ?></td>
                <td><?= $row['telp_petugas'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['level'] ?></td>
                <td>
                    <a href="petugas-edit.php?id=<?=$row['id_petugas']?>">Edit</a>
                    <a href="petugas-hapus.php?id=<?=$row['id_petugas']?>">Hapus</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <a href="index,php">Kembali</a>
    
</body>
</html>