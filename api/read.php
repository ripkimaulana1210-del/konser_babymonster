<?php
header("Content-Type: application/json");

include_once '../config/Database.php';
include_once '../models/Penonton.php';

$database = new Database();
$db = $database->getConnection();
$penonton = new Penonton($db);

$stmt = $penonton->read();
$data = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

echo json_encode($data);
?>