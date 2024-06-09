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
        <li><a href="../animaux/adopter.php">Adopter</a></li>    
        <?php if(isset($_SESSION['prenom'])) {
        echo "<li><a href=\"../deconnexion.php\">Déconnexion</a></li>";}
        else {
            echo "  <li><a href=\"../traitement_client/cote_clients.php\">Connexion</a></li>";
            }   
                ?>              
    </ul>
</nav>
<br/>
<br/>
 

<?php
if(isset($_GET['i'])){
    echo "inscription réussi"; 
}
?>
<div class = "cote_users">
    <div class = "inscription_users">
<h1>Inscription</h1>
<p>Si vous n'avez pas de compte, créez votre compte ci-dessous</p>
<br>

<form action="traitement_client.php" method="POST">
    
    <input type = "text"  id="nom" name="nom"  placeholder="Nom" required>  <br/><br>
    
    <input type = "text"  id="prenom" name="prenom" placeholder="Prénom"> <br/><br>
    
    <input type = "email"  id="email" name="email" placeholder="Email" required> <br/><br>
    
    <input type = "password" id="pass" name ="pass" placeholder="Mot de passe" required> <br><br/>
    
    <input type = "password" id ="retypepass" name ="retypepass" placeholder="Retapez votre mot de passe"><br/><br>

    <select name="role" id ="role">
        <option value="">Choisissez votre rôle</option>
        <option value="client">Client </option> 
        <option value="pro">Pro </option> 
    </select>

    </br>
    </br>
    
    <input type="submit" name="valide">


</form>
</div>

<div class = "connexion_users">
<h1>Connexion</h1>
<p>Connectez vous avec vos informations</p>
<br>

<form action="traitement_co_client.php" method="POST">
    

    
    <input type = "email"  id="email" name="email" placeholder="Email" required> <br/>
</br>
    
    <input type = "password" id="pass" name ="pass" placeholder="Mot de passe" required> <br/>
    
    </br>
    
    <input type="submit" name="valide">

</form>
</div>
</div>

</body>
