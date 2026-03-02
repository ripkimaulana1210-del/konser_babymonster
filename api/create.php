<?php
header("Content-Type: application/json");

include_once '../config/Database.php';
include_once '../models/Penonton.php';

$database = new Database();
$db = $database->getConnection();
$penonton = new Penonton($db);

$data = json_decode(file_get_contents("php://input"));

$penonton->nama = $data->nama ?? '';
$penonton->no_hp = $data->no_hp ?? '';
$penonton->tipe_tiket = $data->tipe_tiket ?? '';
$penonton->jumlah_tiket = $data->jumlah_tiket ?? '';
$penonton->tanggal_pesan = $data->tanggal_pesan ?? '';

if ($penonton->create()) {
    http_response_code(201);
    echo json_encode(["message" => "Data berhasil ditambahkan"]);
} else {
    http_response_code(503);
    echo json_encode(["message" => "Gagal menambahkan data"]);
}
?>