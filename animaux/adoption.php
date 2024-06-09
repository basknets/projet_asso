<?php
session_start();
require_once '../login_asso.php';

if(isset($_SESSION['prenom'])) {
    if(isset($_GET['id'])) {
        $id_animal = $_GET['id'];
        $update_animaux = "UPDATE animaux SET present = 1 WHERE id_animaux = ?";
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $email = $_SESSION['email'];

        // Retrieve id_utilisateur based on email
        $select_utilisateur = $connexion->prepare("SELECT id FROM utilisateur WHERE email = ?");
        $select_utilisateur->bind_param("s", $email);
        $select_utilisateur->execute();
        $result = $select_utilisateur->get_result();
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_utilisateur = $row['id'];
        } else {
            echo "Erreur: Utilisateur non trouvé.";
            exit; // Exit script if user not found
        }
        $select_utilisateur->close();

        // Prepare INSERT statement for adoptants table
        $insert_adoption = $connexion->prepare("INSERT INTO adoptants (id_utilisateur, id_animal, nom, prenom, email) VALUES (?, ?, ?, ?, ?)");
        
        if ($insert_adoption) {
            $insert_adoption->bind_param("iisss", $id_utilisateur, $id_animal, $nom, $prenom, $email);
            if ($insert_adoption->execute()) {
                // Execute the animal present status update
                $stmt_update = $connexion->prepare($update_animaux);
                $stmt_update->bind_param("i", $id_animal);
                $stmt_update->execute();
                $stmt_update->close();

                echo "Animal adopté avec succès!";
                header("location:../index.php?r=$id_animal");
                exit(); 
            } else {
                echo "Erreur lors de l'insertion dans la table adoptants: " . $insert_adoption->error;
            }
        } else {
            echo "Erreur lors de la préparation de l'insertion: " . $connexion->error;
        }
    } else {
        echo "ID d'animal non spécifié!";
    }
} else {
?>
    <button onclick="retourPagePrecedente()">Retour</button>

    <script>
      function retourPagePrecedente() {
        window.history.back(); 
      }
    </script>
<?php
    echo "<br><br>";
    echo "Vous devez vous connecter pour adopter";
}

$connexion->close();
?>
