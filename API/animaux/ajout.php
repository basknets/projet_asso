<?php
require_once __DIR__.'/../DatabaseManager.php';

$databaseManager = new DatabaseManager();
$jsondata = file_get_contents('php://input');
$data = json_decode($jsondata, true);
$method = $_SERVER['REQUEST_METHOD'];

header('Content-Type: application/json');

if ($method == 'POST') {
    if (!isset($data['nom']) || !isset($data['date_naissance']) || !isset($data['espece']) || !isset($data['race'])  || !isset($data['sexe']) || !isset($data['lieu']) || !isset($data['description'])) {
        http_response_code(400); 
        echo json_encode(array("success" => false, "error" => "Invalid request"));
        exit;
    }

    $nom = $data['nom'];
    $date_naissance = $data['date_naissance'];
    $espece = $data['espece'];
    $race = $data['race'];
    $sexe = $data['sexe'];
    $lieu = $data['lieu'];
    $description = $data['description'];

    $created = $databaseManager->ajoutAnimal($nom, $date_naissance, $espece, $race, $sexe, $lieu, $description);
    if ($created) {
        http_response_code(201); 
        echo json_encode(array("success" => true, "message" => "Animal ajouté avec succès"));
    } else {
        http_response_code(500); 
        echo json_encode(array("success" => false, "error" => "Erreur lors de l'ajout de l'animal"));
    }
} else {
    http_response_code(405); 
    echo json_encode(array("success" => false, "error" => "Méthode non autorisée"));
}
?>
