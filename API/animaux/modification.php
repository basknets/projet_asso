<?php
require_once __DIR__.'/../DatabaseManager.php';

$databaseManager = new DatabaseManager();
$jsondata = file_get_contents('php://input');
$data = json_decode($jsondata, true);
$method = $_SERVER['REQUEST_METHOD'];

header('Content-Type: application/json');

if ($method == 'POST') {
    if (!isset($data['nom']) || !isset($data['espece']) || !isset($data['description']) || !isset($data['animal_id'])) {
        http_response_code(400); 
        echo json_encode(array("success" => false, "error" => "Invalid request"));
        exit;
    }

    $nom = $data['nom'];
    $espece = $data['espece'];
    $description = $data['description'];
    $animalId = $data['animal_id'];

    try {
        $modified = $databaseManager->modifAnimal($nom, $espece, $description, $animalId);
        if ($modified) {
            http_response_code(200); 
            echo json_encode(array("success" => true, "message" => "Animal modifié avec succès"));
        } else {
            http_response_code(500); 
            echo json_encode(array("success" => false, "error" => "Erreur lors de la modification de l'animal"));
        }
    } catch (Exception $e) {
        http_response_code(500); 
        echo json_encode(array("success" => false, "error" => $e->getMessage()));
    }
} else {
    http_response_code(405); 
    echo json_encode(array("success" => false, "error" => "Méthode non autorisée"));
}
?>