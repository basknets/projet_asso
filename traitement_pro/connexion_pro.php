<html>
    <head>
        <title> </title>
        <link href="../style_asso.css" rel="stylesheet" >
        <meta charset="utf-8">

    </head>


    <body> 
    <nav>
            
            <ul>
                <li><a href = "../index.php"><img src ="../logo.png" ></a></li>
                <li class="deroulant"><a href = "#">adopter &ensp;</a>
                    <ul class="sous">
                        <li><a href="../animaux/adopter.php">adopter</a></li>
                    </ul>
                </li>
                <li class="deroulant"><a href = "#">mon espace &ensp;</a> 
                    <ul class="sous">
                        <li><a href="../traitement_client/cote_clients.php">coté client</a></li>
                        <li><a href="../traitement_pro/connexion_pro.php">coté pro</a></li>
                    </ul>
                </li>
            </ul>
        </nav>




<div class="cote_pro">
    <h1>connexion pro<h1>
<form action="traitement_pro.php" method="POST">
    

    
    <input type = "text"  id="email" name="email" placeholder="Email" required> <br/>
</br>
    
    <input type = "password" id="pass" name ="pass" placeholder="mot de passe" required> <br/>
    
    </br>
    
    <input type="submit" name="valide">


</form>
</div>

</body>
</html>