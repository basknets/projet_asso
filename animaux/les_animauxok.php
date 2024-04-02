<html>
    <head>
        <title> </title>
        <link href="../style_asso.css" rel="stylesheet" >
        <meta charset="utf-8">
        <style> 
             td, tr {
                border: 2px solid;
                text-align:center;
                width : 500px;
                
                
             }
        </style>
    </head>


    <body> 
    <nav>
            
            <ul>
                <li><a href = "../index.php"><img src ="../logo.png" ></a></li>
                <li class="deroulant"><a href = "#">adopter &ensp;</a>
                    <ul class="sous">
                        <li><a href="../animaux/adopter.php">adopter</a></li>
                    </ul>
                </li>
                <li class="deroulant"><a href = "#">mon espace &ensp;</a> 
                    <ul class="sous">
                        <li><a href="../traitement_client/cote_clients.php">coté client</a></li>
                        <li><a href="../traitement_pro/connexion_pro.php">coté pro</a></li>
                    </ul>
                </li>
            </ul>
        </nav>



<?php 
require_once '../login_asso.php';

$affichage = $connexion -> query ("SELECT * FROM animaux where present ='0'");

$columnValues = array();


if ($affichage->num_rows >0){
    ?>"<table align ="right"><?php
    $count = 0;
    while ($row = $affichage->fetch_assoc()) {
        $codeEspece = "";
        if ($row["espece"] === "chat ") {
            $codeEspece = "1";
        } elseif ($row["espece"] === "chien") {
            $codeEspece = "2";
        }else {
            $codeEspece ="3";
        }

        echo "<td>" . $row["nom"] . "<br>" . $codeEspece . "</td>";
        $count++;
        if ($count % 3 === 0) {
            echo "</tr><tr>";
        }
    }
    echo "</table>";
} else {
    echo "Aucun résultat trouvé.";
}

