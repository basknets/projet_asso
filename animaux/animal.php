<html>
    <head>
        <title> </title>
        <link href="../style_asso.css" rel="stylesheet" >
        <meta charset="utf-8">
        <style> 

        </style>
    </head>


    <body> 
    <nav>
    <ul>
        <li><a href = "../index.php"><img src ="logo.png" ></a></li>
        <li><a href="adopter.php">Adopter</a></li>    
        <?php if(isset($_SESSION['prenom'])) {
        echo "<li><a href=\"../deconnexion.php\">Déconnexion</a></li>";}
        else {
            echo "  <li><a href=\"../traitement_client/cote_clients.php\">Connexion</a></li>";
            }   
                ?>              
    </ul>
</nav>



        

<?php 
    require_once '../login_asso.php';
    if(isset($_GET['r'])){

        $r = $_GET['r'];
      
        $affichage = $connexion-> query ("SELECT * from animaux where id_animaux='$r'");    

        echo "<a href ='adopter.php'> retour  </a>";
        if ($affichage->num_rows >0){
            while($row = $affichage->fetch_assoc()) {
                echo"<div class ='rectangle'>";
                echo "<div id = 'nom_animal'>".$row['nom'] ."<br></div>";
                echo "<div id = 'espece_animal'>espèce :</div><br><div id = 'carre_espece'>". $row['espece']."</div>";
                echo "<div id = 'race_animal'>race :</div><br><div id = 'carre_race'>". $row['race']."</div>";
                echo "<div id= 'naissance_animal'> né le : ". $row['date_naissance']."</div>";
                echo  "<div id ='sexe_animal'>".$row['sexe']."<br></div>";
                echo "<div id = 'refuge_animal'> refuge de ". $row['lieu']."<br></div>";
                echo "<div id = 'description_animal'> description : ". $row['description']."<br></div>";
              
                    if ($row['espece']==="chien"){
                            echo "<img id=image src='loky2.jpg'></div>";}
                    elseif($row['espece']==="nacs"){
                            echo "<img id=image src='tic2.jpg'></div>";
                    }else{
                            echo "<img id=image src='lunatique.jpg'></div>";
                    }
                    

                echo "</div>";
                    echo "<br>";
                    $id_animaux = $row['id_animaux'];
                    ?>
                <a href =<?php echo "adoption.php?id=$id_animaux" ?>> Adopter <?php echo $row['nom']; ?> </a>
                <?php

            }
        }
        else {
            echo "une erreur est survenue !";
        }



        $connexion->close();
    } else {
        echo "une erreur est survenue !";
    }



?>
    </body>
