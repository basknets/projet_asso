<nav>
    <ul>
        <li><a href = "index.php"><img src ="logo.png" ></a></li>
        <li><a href="animaux/adopter.php">Adopter</a></li>    
        <?php if(isset($_SESSION['prenom'])) {
        echo "<li><a href=\"deconnexion.php\">Déconnexion</a></li>";}
        else {
            echo "  <li><a href=\"traitement_client/cote_clients.php\">Connexion</a></li>";
            }   
                ?>              
       

    </ul>
</nav>