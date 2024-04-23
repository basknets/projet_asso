<?php
require_once __DIR__.'/../DatabaseManager.php';

$databaseManager = new DatabaseManager();
$jsondata = file_get_contents('php://input');
$data = json_decode($jsondata, true);
$method = $_SERVER['REQUEST_METHOD'];
header('Content-Type: application/json');

if ($method == 'POST') {
    if (!isset($data['animal_id']) ) {
        http_response_code(400); // Bad Request
        echo json_encode(array("success" => false, "error" => "Invalid request"));
        exit;
    }

    $delete = $databaseManager->deleteAnimaux($data['animal_id']);
}
?>

