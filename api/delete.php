<?php
header("Content-Type: application/json");

include_once '../config/Database.php';
include_once '../models/Penonton.php';

$database = new Database();
$db = $database->getConnection();
$penonton = new Penonton($db);

$data = json_decode(file_get_contents("php://input"));

$penonton->id = $data->id ?? '';

if ($penonton->delete()) {
    http_response_code(200);
    echo json_encode(["message" => "Data berhasil dihapus"]);
} else {
    http_response_code(503);
    echo json_encode(["message" => "Gagal hapus"]);
}
?>