<?php
session_start();
require_once 'menu.php';
require_once 'login_asso.php';
?>

<html>
    <head>
        <title> </title>
        <link href="style_asso.css" rel="stylesheet"  >
        <meta charset="utf-8">
    </head>


    <body> 

<?php
$id_user = $_SESSION['id'];
    $select_adoption = $connexion->query("SELECT animaux.* FROM adoptants JOIN animaux ON adoptants.id_animal = id_animaux WHERE adoptants.id_utilisateur = $id_user");
    $nbAnimauxAdoptes = $connexion->query("SELECT COUNT(id_animaux) AS nombre_adoption FROM adoptants JOIN animaux ON adoptants.id_animal = id_animaux WHERE adoptants.id_utilisateur = $id_user")->fetch_assoc()['nombre_adoption'];


    if($select_adoption->num_rows>0){
        echo "Vous avez adopté ". $nbAnimauxAdoptes ." animaux.";

        while ($row = $select_adoption->fetch_assoc()) {
            $nom_animal = $row['nom'];
            echo"<br>";
            echo"<br>";
            echo $nom_animal;
    }}

?>


    </body>

</html>