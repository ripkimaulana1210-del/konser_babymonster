<?php
header("Content-Type: application/json");

include_once '../config/Database.php';
include_once '../models/Penonton.php';

$database = new Database();
$db = $database->getConnection();
$penonton = new Penonton($db);

$penonton->id = $_GET['id'];

$stmt = $penonton->readOne();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if($row){
    echo json_encode($row);
} else {
    echo json_encode(["message" => "Data tidak ditemukan"]);
}
?>