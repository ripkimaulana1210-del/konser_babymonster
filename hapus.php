<?php
include "koneksi.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM penonton WHERE id='$id'");

header("Location: index.php");
exit;
?>