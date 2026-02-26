<?php
include "koneksi.php";

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $tipe = $_POST['tipe_tiket'];
    $jumlah = $_POST['jumlah_tiket'];
    $tanggal = $_POST['tanggal_pesan'];

    mysqli_query($conn, "INSERT INTO penonton
        (nama, no_hp, tipe_tiket, jumlah_tiket, tanggal_pesan)
        VALUES ('$nama','$no_hp','$tipe','$jumlah','$tanggal')");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Penonton</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Tambah Data Penonton</h2>

<form method="POST">
    Nama : <input type="text" name="nama" required><br><br>
    No HP : <input type="text" name="no_hp" required><br><br>

    Tipe Tiket :
    <select name="tipe_tiket" required>
        <option value="VIP">VIP</option>
        <option value="Festival">Festival</option>
        <option value="Tribune">Tribune</option>
    </select><br><br>

    Jumlah Tiket : <input type="number" name="jumlah_tiket" required><br><br>
    Tanggal Pesan : <input type="date" name="tanggal_pesan" required><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>

</body>
</html>