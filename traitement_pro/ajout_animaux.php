
<html>
    <head>
        <title> </title>
        <link href="../style_asso.css" rel="stylesheet" >
        <meta charset="utf-8">

    </head>

<body>

<div class="header">
    <a href="accueil_pro.php" style="float: left;">Retour à l'accueil</a>
    <h1 style="margin-left: 780px;">Ajouter un animal</h1>
</div>


<center>
<?php
if(isset($_GET['a'])){
    echo $_GET['a']." a bien été ajouté";
}

?>

</center>

<br>
<br>
<div class="ajout">
<center>
<form action="traitement_ajout_animaux.php" method="post">
<br>
<label for = "nom">Nom de l'animal : </label><br>
    <input type="text" name="nom" id ="nom">
</br></br>
<label for = "date_naissance"> Date de naissance : </label><br>
    <input type = "date" name="date_naissance" id="date_naissance">
</br></br>
<label for = "espece">Espèce : </label><br>
    <select name="espece" id ="espece">
        <option value="">Choisissez une race </option>
        <option value = "Chien">Chien</option>
        <option value = "Chat ">Chat</option>
        <option value = "Nacs">Nacs</option>
    </select>
</br></br>
<label for = "race">Race : </label><br>
    <select name="race" id ="race">
        <option value="">Choissisez une race</option>
        <option value="croise">croisé </option> 
        <option value="lapin">lapin </option>
        <option value="souris">souris </option>
        <option value="rat">rat </option>
        <option value="hamster">hamster </option>
        <option value="gerbille">gerbille </option>
        <option value="octodon">octodon</option>
        <option value="chinchilla">chinchilla </option>
        <option value="cochon d'inde">cochon d'inde</option>
        <option value="furet">furet </option>
        <option value="oiseau">oiseau</option>
        <option value="angora">angora </option>
        <option value="europeen">européen </option>
        <option value="siamois">siamois </option>
        <option value="norvegien">norvegien </option>
        <option value="croise">croisé </option>
        <option value="sacre de birmanie">sacré de birmanie </option>
        <option value="persan">persan </option>
        <option value="akita inu">akita inu </option>
        <option value="american bully">american bully </option>
        <option value="Basenji">Basenji </option>
        <option value="Basset Hound">Basset Hound</option>
        <option value="Beagle">Beagle </option>
        <option value="Beauceron">Beauceron </option>
        <option value="Berger Allemand">Berger Allemand </option>
        <option value="berger australien">berger australien </option>
        <option value="Berger Belge Malinois">Berger Belge Malinois</option>
        <option value="Berger Hollandais">Berger Hollandais</option>
        <option value="Berger des Shetland">Berger des Shetland </option>
        <option value="Bichon Frisé">Bichon Frisé </option>
        <option value="Border Collie">Border Collie </option>
        <option value="Boston Terrier">Boston Terrier </option>
        <option value="Bouledogue Américain">Bouledogue Américain</option>
        <option value="Bouledogue Français">Bouledogue Français </option>
        <option value="Bouledogue Anglais">Bouledogue Anglais </option>
        <option value="Bouvier Bernois">Bouvier Bernois </option>
        <option value="Boxer">Boxer </option>
        <option value="Bull Terrier">Bull Terrier </option>
        <option value="Carlin">Carlin </option>
        <option value="Cavalier King Charles">Cavalier King Charles </option>
        <option value="chien loup">chien loup </option>
        <option value="Chow Chow">Chow Chow </option>
        <option value="Chihuahua">Chihuahua </option>
        <option value="Dalmatien">Dalmatien </option>
        <option value="Epagneul Breton">Epagneul Breton </option>
        <option value="Golden Retriever">Golden Retriever </option>
        <option value="Husky Sibérien">Husky Sibérien </option>
        <option value="Jack Russell">Jack Russell</option>
        <option value="Labrador Retriever">Labrador Retriever </option>
        <option value="Mastiff">Mastiff</option>
        <option value="Pinscher">Pinscher</option>
        <option value="Pitbull">Pitbull </option>
        <option value="Pomsky">Pomsky</option>
        <option value="Pékinois">Pékinois </option>
        <option value="Rottweiler">Rottweiler </option>
        <option value="Saint-Bernard ">Saint-Bernard </option>
        <option value="Samoyède">Samoyède </option>
        <option value="Setter Anglais">Setter Anglais </option>
        <option value="Shar Peï">Shar Peï </option>
        <option value="Spitz ">Spitz </option>
        <option value="Shiba Inu">Shiba Inu </option>
        <option value="Shih Tzu">Shih Tzu</option>
        <option value="Teckel">Teckel</option>
        <option value="Yorkshire Terrier">Yorkshire Terrier</option>
        <option value="Whippet">Whippet </option>
        <option value="levrier">levrier </option>
        
    </select>

</br></br>

<label for = "sexe">Sexe : </label><br>
    <select name="sexe" id ="sexe">
        <option value="">Choisissez le sexe </option>
        <option value="Femelle">Femelle</option>
        <option value="Male">Male</option>
    </select>
</br></br>

<label for = "lieu">Lieu : </label><br>
    <select name="lieu" id ="lieu">  
        <option value="">Choisissez le lieu </option>
        <option value="Paris">Paris</option>
        <option value="Lyon">Lyon</option>
        <option value="Lille">Lille</option>
        <option value="Marseille">Marseille</option>
        <option value="Bordeaux">bordeaux</option>
        <option value="Grenoble">Grenoble</option>
        <option value="Nantes">Nantes</option>
        <option value="Strasbourg">Strasbourg</option>
        <option value="Toulouse">Toulouse</option>
        <option value="Nice">Nice</option>
        <option value="La rochelle">La rochelle</option>
        <option value="Rennes">Rennes</option>


    </select>
    
</br></br>

<label for = "description">Description : </label><br>
    <textarea name = "description" id ="description"></textarea>

</br></br>

<input type="submit" name="valider" value="valider" >

</form>

</center>
</div>


</body> 




</html>