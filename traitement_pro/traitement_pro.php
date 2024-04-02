<?php
require_once '../login_asso.php'; 

if (!empty($_POST['email']) && !empty($_POST['pass'])) {
    $pseudo = $_POST['email'];
    $pass = $_POST ['pass'];
    
    $select = $connexion->prepare("SELECT * FROM utilisateur WHERE email = ? AND role = 'pro'");
    $select->bind_param("s", $_POST['email']);
    $select->execute();
    
    $result = $select->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pass_hashed = hash('sha256', $pass);
            if ($row['password'] == $pass_hashed) {
                header('Location: accueil_pro.php');
            } else {
                echo "Mot de passe incorrect";
            }
        }
    } else {
        echo "Utilisateur non trouvé ou n'est pas un professionnel";
    }
}
?>
