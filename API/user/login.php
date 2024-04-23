<?php
require_once __DIR__.'/../DatabaseManager.php';

$databaseManager = new DatabaseManager();
$jsondata = file_get_contents('php://input');
$data = json_decode($jsondata, true);
$method = $_SERVER['REQUEST_METHOD'];

header('Content-Type: application/json');

if ($method == 'POST') {
    if (!isset($data['mail']) || !isset($data['password'])) {
        http_response_code(400); // Bad Request
        echo json_encode(array("success" => false, "error" => "Invalid request"));
        exit;
    }

    $mail = $data['mail'];
    $password = $data['password'];
    $user = $databaseManager->connectUser($mail, $password);

    if ($user !== false) {
        // Utilisateur authentifié avec succès
        http_response_code(200); // OK
        echo json_encode(array("success" => true, "user" => $user));
    } else {
        // Échec de l'authentification de l'utilisateur
        http_response_code(401); // Unauthorized
        echo json_encode(array("success" => false, "error" => "Invalid credentials"));
    }
} else {
    // Méthode non autorisée
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("success" => false, "error" => "Invalid request method"));
}
?>
