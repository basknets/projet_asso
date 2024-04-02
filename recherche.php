<?php
require_once 'login_asso.php';

if(isset($_POST['nom'])) {
    $nom = $_POST['nom'];

    // Échapper les caractères spéciaux pour éviter les injections SQL
    $nom = mysqli_real_escape_string($connexion, $nom);

    // Requête SQL pour rechercher dans la table "animaux" où la colonne "nom" correspond à la valeur entrée
    $sql = "SELECT * FROM animaux WHERE nom LIKE '%$nom%'";

    $result = $connexion->query($sql);

    if ($result->num_rows > 0) {
        // Afficher les résultats
        while($row = $result->fetch_assoc()) {
            echo "  Nom: " . $row["nom"]. "<br>";
        }
    } else {
        echo "Aucun résultat trouvé pour le nom : $nom";
    }

    // Fermer la connexion à la base de données
    $connexion->close();
}

?>