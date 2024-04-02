<html>
    <head>
        <title> </title>
        <link href="../style_asso.css" rel="stylesheet" >
        <meta charset="utf-8">

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

$genre = '';
if(isset($_GET['genre'])){
    $genre = $_GET['genre'];
    switch ($genre) {
        case 'femelle';
            $genre = "AND sexe = 'femelle'";
            break;
        case 'male';
            $genre = "AND sexe = 'male'";
            break;
        default:
            break;
    }
}
$lieu='';
if(isset($_GET['lieu'])){
    $lieu = $_GET['lieu'];
    switch ($lieu) {

        case 'Paris';
            $lieu = "AND lieu = 'paris'";
        break;

        case 'Lyon';
            $lieu = "AND lieu = 'Lyon'";               
        break;

        case 'Lille';
            $lieu = "AND lieu = 'Lille'";               
        break;
            
        case 'Marseille';
            $lieu = "AND lieu = 'Marseille'";               
        break;

        case 'Bordeaux';
            $lieu = "AND lieu = 'Bordeaux'";               
        break;

        case 'Grenoble';
            $lieu = "AND lieu = 'Grenoble'";               
        break;

        case 'Nantes';
            $lieu = "AND lieu = 'Nantes'";               
        break;

        case 'Strasbourg';
            $lieu = "AND lieu = 'Strasbourg'";               
        break;

        case 'Toulouse';
            $lieu = "AND lieu = 'Toulouse'";               
        break;

        case 'Nice';
            $lieu = "AND lieu = 'Nice'";               
        break;

        case 'La rochelle';
            $lieu = "AND lieu = 'La rochelle'";               
        break;

        default:
            break;
    }
}
$espece='';
if(isset($_GET['espece'])){
    $espece = $_GET['espece'];
    switch ($espece) {
            case 'chien';
            $espece = "AND espece = 'chien'";
            break;
            case 'chat';
            $espece = "AND espece = 'chat '";
            break;
            case 'NACS';
            $espece = "AND espece = 'nacs'";
            break;
        default:
            break;
    }
}

$nom = '';
if (!empty($_GET['nom'])) {
    $nom = $_GET['nom'];
    $nom_condition = "AND nom = '$nom'";
} else {
    $nom_condition = ""; 
}

echo "
<a href='adopter.php'>réinitialiser</a><br>
<form method='GET'>
<br><br>

<label for = 'sexe'>sexe : </label>
    <select name='genre' id ='sexe'>
        <option value=>choisissez le sexe </option>
        <option value='femelle'>femelle</option>
        <option value='male'>male</option>

        
    </select>
    <br><br>

    <label for = 'lieu'>refuge de : </label>
    <select name='lieu' id ='lieu' >
        <option value=>choisissez le refuge </option>
        <option value='Paris'>Paris</option>
        <option value='Lyon'>Lyon</option>
        <option value='Lille'>Lille</option>
        <option value='Marseille'>Marseille</option>
        <option value='Bordeaux'>bordeaux</option>
        <option value='Grenoble'>Grenoble</option>
        <option value='Nantes'>Nantes</option>
        <option value='Strasbourg'>Strasbourg</option>
        <option value='Toulouse'>Toulouse</option>
        <option value='Nice'>Nice</option>
        <option value='La rochelle'>La rochelle</option>
    
    </select>
<br><br>
<label for = 'espece'>Espèce : </label>
    <select name='espece' id ='espece'  >
        <option value=''>choisissez l'espèce </option>
        <option value='chien'>chien</option>
        <option value='chat'>chat</option>
        <option value='NACS'>NAC</option>

    </select>
    
<br><br>
<label for='nom'>Nom de l'animal :</label>
<input type='text' id='nom' name='nom'>
<br><br>

<input type='submit' value='valider' >

    </form>

    
";
$affichage = $connexion->query("SELECT * FROM animaux WHERE present = '0' " . $genre . " " . $lieu . " " . $espece . " " . $nom_condition);

echo"<div class='test'>";
if ($affichage->num_rows >0){
    ?><table><?php
    $count = 0;
    while ($row = $affichage->fetch_assoc()) {
        $chat = "lunatique.jpg";
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
                <a href =<?php echo "animal.php?r=$id_animaux" ?>>
                <?php echo $codeEspece ?><br>
                <?php echo $animal?><br>
                <?php echo "refuge de ".$refuge?> |
                <?php if ($sexe==="femelle"){ echo "<img class=image src='femelle.jpg'>";}
                else{
                    echo"<img class=image src='male.jpg'>";
                } ?>
                </a> 
                </td>    
        <?php
        $count++;
        if ($count % 3 === 0) {
            echo "</tr><tr>";
        }
    }
    echo "</table> ";
} else {
    echo "Aucun résultat trouvé.";
}
echo"</div>";

?>
