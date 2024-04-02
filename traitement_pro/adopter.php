<html>
    <head>
    <title> </title>
        <link href="../style_asso.css" rel="stylesheet" >
        <meta charset="utf-8">
</head>
<button onclick="retourPagePrecedente()">Retour</button>

<script>
  function retourPagePrecedente() {
    window.history.back(); // Cette fonction JavaScript retourne à la page précédente dans l'historique du navigateur
  }
</script>

<?php 
require_once '../login_asso.php';

if (isset($_GET['num_animal'])){

    $id=$_GET['num_animal'];

    $affichage = $connexion-> query ("SELECT * from animaux where id_animaux='$id'");    
    if ($affichage->num_rows >0){
        while($row = $affichage->fetch_assoc()) {
            
            echo "<br><br>".$row['nom'] ;
            echo "<br>". $row['espece'];
            echo"<br>". $row['race'];
            echo "<br>". $row['date_naissance'];
            echo "<br>". $row['sexe'];
            echo "<br>". $row['lieu'];
            echo "<br>".$row['description'];

        }
    }
    else {
        echo "une erreur est survenue !";
    }
}else{
    echo "erreur dans l'id";
}
?>

<form action="" method="post">
<input type="text" name="nom_adoptants" id ="nom_adoptants" placeholder =" nom adoptant">
</br></br>
<input type = "text" name="prenom_adoptants" id="prenom_adoptants" placeholder="prénom adoptant">
    
</br></br>

<input type ="text" name = "adresse_adoptants" id ="adresse_adoptants" placeholder ="adresse"></input>

</br></br>
 <input type = "mail" name = "mail_adoptants" id ="mail_adoptants" placeholder =" mail"></input>

</br></br>

<input type ="tel" name = "telephone_adoptants" id ="telephone_adoptants" placeholder = "telephone adoptant" 
pattern="[0-9]{2}.0-9]{2}.0-9]{2}.0-9]{2}.0-9]{2}"></input>
<br>
format du numéro 00.00.00.00.00

</br></br>

<input type="submit" name="valider" value="valider" >

</form>

<?php

require_once '../login_asso.php';

if (isset($_POST['nom_adoptants'])  && isset($_POST['prenom_adoptants']) && isset($_POST['adresse_adoptants']) && isset($_POST['mail_adoptants'])&& isset($_POST['telephone_adoptants']))
{
    $insert = $connexion->prepare("INSERT INTO adoptants (id_animal, nom, prenom, adresse,mail, telephone) VALUES (?,?, ?, ?, ?,?)");

    
    $nom = $_POST['nom_adoptants'];
    $prenom = $_POST['prenom_adoptants'];
    $adresse = $_POST['adresse_adoptants'];
    $mail = $_POST['mail_adoptants'];
    $telephone = $_POST['telephone_adoptants'];

    $insert->bind_param("ssssss",$id, $nom, $prenom, $adresse, $mail, $telephone);



    if (strlen($nom)<70){
        if(strlen($prenom<70)){
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
                if ($insert->execute()) {
                        $update_animal =$connexion->query( "UPDATE animaux SET present = 1 WHERE id_animaux = '$id'");

                        } else {
                            echo "erreur dans l'enregistrement";
                        }
                    }else{echo"l'emil n'est pas valide";}
                }else {echo"le prenom est trop long";}

            }else {echo"le nom est trop long ";}

        $connexion->close();
}
?>




</body>
</html>