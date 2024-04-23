<?php
require_once __DIR__.'/../DatabaseManager.php';

$databaseManager = new DatabaseManager();

$animaux = $databaseManager->getAnimauxAdopte();

header('Content-Type: application/json');

if ($animaux !== false) {
    echo json_encode(array('success' => true, 'animaux' => $animaux));
} else {
    echo json_encode(array('success' => false, 'message' => 'No animals found.'));
}
?>
