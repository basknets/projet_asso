<?php

require_once '../login_asso.php';

$affichage = $connexion -> query ("SELECT * FROM animaux where present ='1'");

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
<center>
    <div class = adoption>
    <table>
        <th>nom</th>
        <th>date de naissance</th>
        <th>date d'arrivée</th>
        <th>espèce</th>
        <th>race</th>
        <th>sexe</th>
        <th>lieu</th>
        <th>description</th>
        

<?php
if ($affichage->num_rows >0){
        while($row = $affichage->fetch_assoc()) {

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
            echo "</tr>";
        }
    }

    ?>
    </div>
    </center>
    </html>

