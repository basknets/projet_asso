<?php
class DatabaseManager {
    private $connection;

    public function __construct() {
        $config = include('database.php');
        $this->connection = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
        if ($this->connection->connect_error) {
            throw new Exception("Erreur de connexion à la base de données : " . $this->connection->connect_error);
        }
    }

    // public function createUser($firstname, $lastname, $mail, $password) {
    //     $hashedPassword = hash('sha256', $password);
    //     $stmt = $this->connection->prepare("INSERT INTO connexion_users (prenom, nom, email, password) VALUES (?, ?, ?, ?)");
    //     $stmt->bind_param("ssss", $firstname, $lastname, $mail, $hashedPassword);
    //     if ($stmt->execute()) {
    //         $stmt->close();
    //         return true;
    //     } else {
    //         $stmt->close();
    //         throw new Exception("Erreur lors de la création de l'utilisateur : " . $this->connection->error);
    //     }
    // }


    public function connectUser($mail, $password) {
        $stmt = $this->connection->prepare("SELECT * FROM utilisateur WHERE email = ? AND role ='pro'");
        $stmt->bind_param("s", $mail);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $hashedPassword = $user['password']; // Récupérer le mot de passe hashé stocké dans la base de données
            $hashedInputPassword = hash('sha256', $password); 
    
            if ($hashedInputPassword === $hashedPassword) {
                $stmt->close();
                return $user; 
            } else {
                $stmt->close();
                return false; 
            }
        } else {
            $stmt->close();
            return false; 
        }
    } 


    public function getAnimaux(){
        $stmt = $this->connection->prepare("SELECT * FROM animaux WHERE present = 1");
        $stmt->execute();
        $result = $stmt->get_result();
        
        $animals = array(); 
        
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $animal = array(
                    "animal_id" => $row["id_animaux"],
                    "nom" => $row["nom"],
                    "espece" => $row["espece"],
                    "description" => $row["description"]
                );
                $animals[] = $animal;
            }
        }
        return json_encode($animals);
    }

    public function getAnimauxAdopte(){
        $stmt = $this->connection->prepare("SELECT * FROM animaux where present = 0 ");
        $stmt->execute();
        $result = $stmt->get_result();
        
        $animals = array(); 
        
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $animal = array(
                    "animal_id" => $row["id_animaux"],
                    "nom" => $row["nom"],
                    "espece" => $row["espece"],
                    "description" => $row["description"]
                );
                $animals[] = $animal;
            }
        }
        return json_encode($animals);
    }

    public function deleteAnimaux($animal_id){
        
            $stmt = $this->connection->prepare("DELETE FROM animaux WHERE id_animaux = ?");
            $stmt->bind_param("i", $animal_id); 
            if($stmt->execute()) {
                echo json_encode(array("message" => "Suppression de l'animal réussie."));
            } else {
                http_response_code(500);
                echo json_encode(array("message" => "Échec de la suppression de l'animal."));
            }
        } 


    public function ajoutAnimal($nom, $date_naissance, $espece, $race,$sexe, $lieu, $description) {
        $stmt = $this->connection->prepare("INSERT INTO animaux (nom, date_naissance, espece, sexe, race, lieu, description, present) VALUES (?, ?, ?, ?, ?, ?, ?, 0)");

        $stmt->bind_param("sssssss", $nom, $date_naissance, $espece, $race,$sexe, $lieu, $description);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            throw new Exception("Erreur lors de l'ajout de l'animal : " . $this->connection->error);
        }
    }

    public function modifAnimal($nom, $espece, $description, $animal_id){
        $stmt = $this->connection->prepare("UPDATE animaux SET nom=?, espece=?, description=? WHERE id_animaux=?");
        
        if (!$stmt) {
            throw new Exception("Erreur de préparation de la requête : " . $this->connection->error);
        }
        
        $stmt->bind_param("sssi", $nom, $espece, $description, $animal_id);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            throw new Exception("Erreur lors de la modification de l'animal : " . $this->connection->error);
        }
    }
    
}

?>
