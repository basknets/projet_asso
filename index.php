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

    $id_user = $_SESSION['id'];
    $select_adoption = $connexion->query("SELECT animaux.* FROM adoptants JOIN animaux ON adoptants.id_animal = id_animaux WHERE adoptants.id_utilisateur = $id_user");
    $nbAnimauxAdoptes = $connexion->query("SELECT COUNT(id_animaux) AS nombre_adoption FROM adoptants JOIN animaux ON adoptants.id_animal = id_animaux WHERE adoptants.id_utilisateur = $id_user")->fetch_assoc()['nombre_adoption'];

    echo"<div class='mes_adoptions'>";
    if ($select_adoption->num_rows >0){
        
        echo "Vous avez adoptés ".$nbAnimauxAdoptes." animaux";
        ?><table><?php
        $count = 0;
        while ($row = $select_adoption->fetch_assoc()) {
            $chat = "caprice.jpg";
            $chien="loky2.jpg";
            $nacs = "tic2.jpg";
            $codeEspece = "";
                if ($row["espece"] === "chat ") {
                    $codeEspece ="<img class=img_animaux src='" . $chat . "' alt='Image'>";
                } elseif ($row["espece"] === "chien") {
                    $codeEspece ="<img class=img_animaux src='" . $chien . "' alt='Image'>";
                }else {
                    $codeEspece ="<img class=img_animaux src='" . $nacs . "' alt='Image'>";
                }
                    $animal = $row['nom'];
                    $sexe = $row['sexe'];
                    $refuge = $row['lieu'];
                    $id_animaux = $row['id_animaux'];
                    ?>
                    <td> 
                    <?php echo $codeEspece ?><br>
                    <?php echo $animal?><br>
                    <?php echo "refuge de ".$refuge?> |
                    <?php if ($sexe==="femelle"){ echo "femelle";}
                    else{
                        echo"male";
                    } ?>
                    </td>    
            <?php
            $count++;
            if ($count % 2 === 0) {
                echo "</tr><tr>";
            }
        }
        echo "</table> ";
    } else {
        echo "Aucun résultat trouvé.";
    }
    echo"</div>";
    
      $select_adoptions = $connexion->query("SELECT * FROM animaux WHERE present = 0");
  
      echo"<div class='presentation'>";
  
      if ($select_adoptions->num_rows >0){
    echo "Animaux récement arrivé au refuge";

          ?><table><?php
          $count = 0;
          while ($row = $select_adoptions->fetch_assoc()) {
              $chat = "caprice.jpg";
              $chien="loky2.jpg";
              $nacs = "tic2.jpg";
              $codeEspece = "";
              if ($row["espece"] === "chat ") {
                      $codeEspece ="<img class=img_animaux src='" . $chat . "' alt='Image'>";
                  } elseif ($row["espece"] === "chien") {
                      $codeEspece ="<img class=img_animaux src='" . $chien . "' alt='Image'>";
                  }else {
                      $codeEspece ="<img class=img_animaux src='" . $nacs . "' alt='Image'>";
                  }
                      $animal = $row['nom'];
                      $sexe = $row['sexe'];
                      $refuge = $row['lieu'];
                      $id_animaux = $row['id_animaux'];
                      ?>
                      <td> 
                      
                      <?php echo $codeEspece ?><br>
                      <?php echo $animal?><br>
                      <?php echo "refuge de ".$refuge?> |
                      <?php if ($sexe==="femelle"){ echo "femelle";}
                      else{
                          echo"male";
                      } ?>
                       
                      </td>    
              <?php
              $count++;
              if ($count % 2 === 0) {
                  echo "</tr><tr>";
              }
          }
          echo "</table> ";
      } else {
          echo "Aucun résultat trouvé.";
      }

      echo "</div>";
     
    



}else{
    echo "<center>";
    echo "<h1>";
    echo "Bienvenue";
    echo "</h1>";
    echo "</center>";
    echo "<br>";
    echo "<br>";

    
}
echo"</div>";



if(isset($_GET['d'])){
    echo "Déconnexion réussi.";
}


?>

   
    

    </body>
</html>

