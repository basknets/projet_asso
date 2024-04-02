<?php
session_start();

// Vérifier si le prénom est défini dans la session
if(isset($_SESSION['prenom'])) {
    $prenom = $_SESSION['prenom'];
    echo "Bonjour, $prenom !"; // Afficher le prénom
} else {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: cote_clients.php");
    exit(); // Arrêter l'exécution du script
}
?>
