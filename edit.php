<?php
include "koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM penonton WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $tipe = $_POST['tipe_tiket'];
    $jumlah = $_POST['jumlah_tiket'];
    $tanggal = $_POST['tanggal_pesan'];

    mysqli_query($conn, "UPDATE penonton SET
        nama='$nama',
        no_hp='$no_hp',
        tipe_tiket='$tipe',
        jumlah_tiket='$jumlah',
        tanggal_pesan='$tanggal'
        WHERE id='$id'");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Penonton</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit Data Penonton</h2>

<form method="POST">
    Nama : <input type="text" name="nama" value="<?= $row['nama']; ?>"><br><br>
    No HP : <input type="text" name="no_hp" value="<?= $row['no_hp']; ?>"><br><br>

    Tipe Tiket :
    <select name="tipe_tiket">
        <option value="VIP" <?= $row['tipe_tiket']=="VIP"?"selected":""; ?>>VIP</option>
        <option value="Festival" <?= $row['tipe_tiket']=="Festival"?"selected":""; ?>>Festival</option>
        <option value="Tribune" <?= $row['tipe_tiket']=="Tribune"?"selected":""; ?>>Tribune</option>
    </select><br><br>

    Jumlah Tiket : <input type="number" name="jumlah_tiket" value="<?= $row['jumlah_tiket']; ?>"><br><br>
    Tanggal Pesan : <input type="date" name="tanggal_pesan" value="<?= $row['tanggal_pesan']; ?>"><br><br>

    <button type="submit" name="update">Update</button>
</form>

</body>
</html>