<?php

require_once '../login_asso.php';

$affichage = $connexion -> query ("SELECT * FROM animaux where present='0'");

if (isset($_POST['id_animaux']))     {
    $id = $_POST['id_animaux'];
} 
$affichage = $connexion->query("SELECT * FROM animaux WHERE present='0'");

?>
<html>
    <head>
        <meta charset ="uft-8">
        <title>à l'adoption</title>
        <link href="../style_asso.css" rel="stylesheet" >
    </head>
<body>
<ul>
        
<a href=accueil_pro.php>retour à l'accueil</a>
        
<li>  <a href ="animaux_a_ladoption.php">toujours à l'adoption <a></li>
        <li>  <a href ="animaux_adopte.php">adopté <a></li>
        <li>  <a href ="tous_les_animaux.php">tous les animaux<a></li>
</ul>
<center>
    <div class = adoption>
    <table>
        <th>Nom</th>
        <th>Date de naissance</th>
        <th>Date d'arrivée</th>
        <th>Espèce</th>
        <th>Race</th>
        <th>Sexe</th>
        <th>Lieu</th>
        <th>Description</th>
        <th>Statut</th>


<?php

if ($affichage->num_rows > 0) {
    while ($row = $affichage->fetch_assoc()) {

        $date_complete = $row['date_ajout'];
        $date_seulement = substr($date_complete, 0, 10); // Garde uniquement les 10 premiers caractères
        $date_ajout = date("d/m/Y", strtotime($date_seulement));

        $date_naissance_us = $row['date_naissance'] ;
        $date_naissance = date("d/m/Y", strtotime($date_naissance_us));

           echo "<tr>";
            echo "<td>" . "<center>". $row['nom']."</center>"."</td>";
            echo "<td>" ."<center>". $date_naissance."</center>"."</td>";
            echo "<td>". "<center>". $date_ajout."</center>"."</td>";
            echo "<td>" ."<center>". $row['espece']."</center>"."</td>";
            echo "<td>" ."<center>". $row['race']."</center>"."</td>";
            echo "<td>" ."<center>". $row['sexe']."</center>"."</td>";
            echo "<td>" ."<center>". $row['lieu']."</center>"."</td>";
            echo "<td>" ."<center>". $row['description']."</center>"."</td>";
            $id_animaux=$row['id_animaux'];
            echo "<td>" ."<center>"?><a href =<?php echo "adopter.php?num_animal=$id_animaux" ?>>à l'adoption</a></center></td>

        
       

            <?php 
            echo "</tr>";
        }
    }

    ?>

</div>
    </center>
    </html>

