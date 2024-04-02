<?php

require_once '../login_asso.php';

$affichage = $connexion -> query ("SELECT * FROM animaux");

if (isset($_POST['id_animaux'])) {
    $valeur_modifiee = 1;
    $id = $_POST['id_animaux']; 
    $update_sql = "UPDATE animaux SET present = '$valeur_modifiee' WHERE id_animaux = '$id'";
    $connexion->query($update_sql);

    } else {
    $valeur_modifiee = 0;
  
    }

?>
<html>
    <head>
        <meta charset ="uft-8">
        <title></title>
        <link href="../style_asso.css" rel="stylesheet" >
    </head>
<body>
    <ul>
    <a href=accueil_pro.php>retour à l'accueil</a>
            
            <li>  <a href ="animaux_a_ladoption.php">toujours à l'adoption <a></li>
            <li>  <a href ="animaux_adopte.php">adopté <a></li>
            <li>  <a href ="tous_les_animaux.php">tous les animaux<a></li>
    </ul>

    <div class = adoption>
    <center>
        <table>
    <?php
    if ($affichage->num_rows > 0) {
        echo "<tr>";
        echo "<th><center>Nom</center></th>";
        echo "<th><center>Date de naissance</center></th>";
        echo "<th><center>Date d'ajout</center></th>";
        echo "<th><center>Espèce</center></th>";
        echo "<th><center>Race</center></th>";
        echo "<th><center>Sexe</center></th>";
        echo "<th><center>Lieu</center></th>";
        echo "<th><center>Description</center></th>";
        echo "<th><center>Statut</center></th>";
        echo "<th><center>Supprimer</center></th>";
        echo "<th><center>Modifier</center></th>";


        echo "</tr>";


    

        while ($row = $affichage->fetch_assoc()) {

            $date_complete = $row['date_ajout'];
            $date_seulement = substr($date_complete, 0, 10); // Garde uniquement les 10 premiers caractères
            $date_ajout = date("d/m/Y", strtotime($date_seulement));

            $date_naissance_us = $row['date_naissance'] ;
            $date_naissance = date("d/m/Y", strtotime($date_naissance_us));

            echo "<tr>";
            echo "<td><center>" . $row['nom'] . "</center></td>";
            echo "<td><center>" . $date_naissance . "</center></td>";
            echo "<td><center>" . $date_ajout. "</center></td>";
            echo "<td><center>" . $row['espece'] . "</center></td>";
            echo "<td><center>" . $row['race'] . "</center></td>";
            echo "<td><center>" . $row['sexe'] . "</center></td>";
            echo "<td><center>" . $row['lieu'] . "</center></td>";
            echo "<td><center>" . $row['description'] . "</center></td>";
            echo "<td>";
            
            $id_animaux = $row['id_animaux'];
            if ($row['present'] == 1) {
                echo "<center>Adopté</center>";
            } else {
                echo "<center><a href='adopter.php?num_animal=$id_animaux'>à l'adoption</a></center>";
            }
            echo "</td>";
            echo "<td><center> <a href='suppression.php?num_animal=$id_animaux'>supprimer</center></td>";
            echo "<td><center> <a href='modification.php?num_animal=$id_animaux'>modifier</center></td>";


            echo "</tr>";
        }
    }

?>
</div>
</center>
</html>

