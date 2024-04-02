<?php

require_once '../login_asso.php';


if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['pass'])  && !empty($_POST['retypepass']) && !empty($_POST['role']))
{
    $role = $_POST['role'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $retype = $_POST['retypepass'];
    $email=strtolower($email);
    $verif = $connexion -> query("SELECT * FROM utlisateur where email = '".$_POST['email']."'");
    
    if(mysqli_num_rows($verif)){
        echo"cette adresse mail existe déjà";}
        else {
            if (strlen($nom) < 100){
                if (strlen($prenom) < 100){
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if($pass === $retype){
                            $pass = hash('sha256',$pass);
                            
                            $insert = "INSERT INTO utilisateur (role, nom, prenom, email, password) VALUES ('$role','$nom','$prenom','$email','$pass')";
                            if ($connexion->query($insert)) {
                                header ('location: cote_clients.php?i=inscription_réussie');
                            } else {
                                echo "Erreur lors de l'enregistrement des informations : " . $connexion->error;
                            }
                        }else {echo "le mot de passe ne correspond pas";}
                    }else{echo"le mail n'a pas le bon format";}
                }else{echo"le prenom comporte trop de caractère";}
            }else{echo"le nom comporte trop de caractère";}
    }
}

$connexion->close()
?>

