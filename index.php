<?php
include "koneksi.php";
$data = mysqli_query($conn, "SELECT * FROM penonton");
?>

<!DOCTYPE html>
<html>
    
<head>
    <title>Data Penonton Konser Baby Monster</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Data Penonton Konser Baby Monster</h2>
<a href="tambah.php">Tambah Data</a>
<br><br>

<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>No HP</th>
    <th>Tipe Tiket</th>
    <th>Jumlah</th>
    <th>Tanggal Pesan</th>
    <th>Aksi</th>
</tr>

<?php 
$no = 1;
while($row = mysqli_fetch_assoc($data)){
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['no_hp']; ?></td>
    <td><?= $row['tipe_tiket']; ?></td>
    <td><?= $row['jumlah_tiket']; ?></td>
    <td><?= $row['tanggal_pesan']; ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
        <a href="hapus.php?id=<?= $row['id']; ?>">Hapus</a>
    </td>
</tr>

<?php } ?>

</table>

</body>
</html>