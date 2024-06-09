<!DOCTYPE html>
<html>
<head>
    <title>Modifier Animal</title>
    <meta charset="UTF-8">
    <link href="../style_asso.css" rel="stylesheet">
</head>
<body>
<div class="header">
    <a href="tous_les_animaux.php" style="float: left;">Retour à l'accueil</a>
    <h1 style="margin-left: 600px;">Modifier les informations de l'animal</h1>
</div>

<?php

if(isset($_GET['num_animal'])) {
    $id_animal = $_GET['num_animal'];
    
    require_once '../login_asso.php';

    $select_query = "SELECT * FROM animaux WHERE id_animaux = $id_animal";
    $result = $connexion->query($select_query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nom = $row['nom'];
        $espece = $row['espece'];
        $race = $row['race'];
        $date_naissance = $row['date_naissance'];
        $sexe = $row['sexe'];
        $lieu = $row['lieu'];
        $description = $row['description'];

        ?>
        <div class ="ajout">
        <center>
        <form action="traitement_modification.php" method="POST">
            <input type="hidden" name="id_animal" value="<?php echo $id_animal; ?>"><br>
            <label for="nom">Nom :</label><br>
            <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>"><br><br>

            <label for="espece">Espèce :</label><br>
            <input type="text" id="espece" name="espece" value="<?php echo $espece; ?>"><br><br>

            <label for="race">Race :</label><br>
            <input type="text" id="race" name="race" value="<?php echo $race; ?>"><br><br>

            <label for="date_naissance">Date de naissance :</label><br>
            <input type="date" id="date_naissance" name="date_naissance" value="<?php echo $date_naissance; ?>"><br><br>

            <label for="sexe">Sexe :</label><br>
            <input type="text" id="sexe" name="sexe" value="<?php echo $sexe; ?>"><br><br>

            <label for="lieu">Lieu :</label><br>
            <input type="text" id="lieu" name="lieu" value="<?php echo $lieu; ?>"><br>
            <br>
            <label for="description">Description :</label><br>
            <textarea id="description" name="description"><?php echo $description; ?></textarea><br><br>

            <input type="submit" value="Modifier"><br><br>
        </form>
        </center>
        </div>
        <?php
    } else {
        echo "Aucun animal trouvé avec cet identifiant.";
    }

    $connexion->close();
} else {
    echo "ID d'animal non spécifié.";
}
?>

</body>
</html>
