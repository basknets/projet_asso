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
    <h1 style="margin-left: 800px;">Adopter l'animal</h1><br>
</div>
<?php 
require_once '../login_asso.php';



if (isset($_GET['num_animal'])) {
    $id = $_GET['num_animal'];

    $affichage = $connexion->query("SELECT * FROM animaux WHERE id_animaux='$id'");
    echo"<div class= 'infos'>";
    if ($affichage->num_rows > 0) {
        while ($row = $affichage->fetch_assoc()) {
            

            echo "Nom : ".$row['nom'];
            echo "<br> Espece : ".$row['espece'];
            echo "<br> Race : ".$row['race'];
            echo "<br> Date de naissance : ".$row['date_naissance'];
            echo "<br> Sexe : ".$row['sexe'];
            echo "<br> Lieu : ".$row['lieu'];
            echo "<br> Description : ".$row['description'];
        }
    } else {
        echo "Une erreur est survenue !";
    }
    echo "</div>";
} else {
    echo "Erreur dans l'ID";
}
?>
<center><h1> Informations de l'animal </h1></center>
<div class="ajout">
<form action="" method="post">
    <center>
    <br>
    

    <input type="text" name="nom_adoptants" id="nom_adoptants" placeholder="Nom adoptant">
    <br><br>
    <input type="text" name="prenom_adoptants" id="prenom_adoptants" placeholder="Prénom adoptant">
    <br><br>
   
    <input type="email" name="mail_adoptants" id="mail_adoptants" placeholder="Mail">
    <br><br>
    <input type="submit" name="valider" value="Valider">
    <br>
    <br>
    </center>
</form>

</div>

<?php
if (isset($_POST['nom_adoptants']) && isset($_POST['prenom_adoptants']) && isset($_POST['mail_adoptants'])) {
    $insert = $connexion->prepare("INSERT INTO adoptants (id_animal, nom, prenom, email) VALUES (?, ?, ?,  ?)");

    $nom = $_POST['nom_adoptants'];
    $prenom = $_POST['prenom_adoptants'];
    $mail = $_POST['mail_adoptants'];

    if ($insert) {
        $insert->bind_param("isss", $id, $nom, $prenom, $mail);

        if ($insert->execute()) {
            $update_animal = $connexion->query("UPDATE animaux SET present = 1 WHERE id_animaux = '$id'");
            if (!$update_animal) {
                echo "Erreur lors de la mise à jour du statut de l'animal";
            }
        } else {
            echo "Erreur dans l'enregistrement : ".$connexion->error;
        }

        $insert->close();
    } else {
        echo "Erreur de préparation de la requête : ".$connexion->error;
    }
}
?>

</body>
</html>

