<?php
session_start();
require_once '../login_asso.php'; 

if (isset($_POST['email']) && isset($_POST['pass'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $email = strtolower($email);

    $select = $connexion->prepare("SELECT * FROM utilisateur WHERE email = ?");
    $select->bind_param("s", $_POST['email']);
    $select->execute();
    
    $result = $select->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pass_hashed = hash('sha256', $pass);
            if ($row['password'] == $pass_hashed) {
                $_SESSION['prenom'] = $row['prenom'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['id'] = $row['id'];
                    if ($row['role'] == 'client') {
                        header('Location: ../index.php');
                    } elseif ($row['role'] == 'pro') {
                        header('Location: ../traitement_pro/accueil_pro.php');
                    } else {
                        echo "Rôle invalide";
                    }
                die();
            } else {
                echo "Mot de passe invalide";
            }
        }
    } else {
        echo "Aucun utilisateur avec cet email";
    }
}
?>
