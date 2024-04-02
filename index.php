<?php
 require_once 'login_asso.php';

 session_start();

?>
<html>
    <head>
        <title> </title>
        <link href="style_asso.css" rel="stylesheet"  >
        <meta charset="utf-8">
    </head>
testttt

    <body> 
<?php

require_once 'menu.php';

$nbAnimauxPresents = $connexion->query("SELECT COUNT(*) as count FROM animaux WHERE present = 0")->fetch_assoc()['count'];
$nbAnimauxAdoptes = $connexion->query("SELECT COUNT(*) as count FROM animaux WHERE present = 1")->fetch_assoc()['count'];

if(isset($_SESSION['prenom'])) {
    $prenom = $_SESSION['prenom'];
    echo "<center>";
    echo "<h1>";

    echo "Bienvenue ". $prenom;
    echo "</center>";
    echo "</h1>";

    echo "<br>";
    echo "<br>";

    echo "<a href=\"adopter_client.php\">Mes adoptions</a>";

   
}else{
    echo "<center>";
    echo "<h1>";
    echo "Bienvenue";
    echo "</h1>";

    echo "</center>";
    echo "<br>";
    echo "<br>";

}

if(isset($_GET['r'])) {
$id_animal = $_GET['r'];
$select = $connexion->query("SELECT * FROM animaux WHERE id_animaux = $id_animal");
   
    if($select) {
        if($select->num_rows > 0) {
            $row = $select->fetch_assoc();
            $nom = $row['nom'];
            echo "Vous avez adopté: $nom";
        } else {
            echo "Aucun animal trouvé avec cet identifiant.";
        }
    }
}   

if(isset($_GET['d'])){
    echo "Déconnexion réussi.";
}


?>
    <p>Actuellement <?php echo $nbAnimauxPresents; ?> animaux sont à l'adoption</p>
    <p><?php echo $nbAnimauxAdoptes; ?> animaux ont été adoptés</p>
    </body>
</html>

