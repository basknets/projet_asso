
<html>
    <head>
        <title> </title>
        <link href="../style_asso.css" rel="stylesheet" >
        <meta charset="utf-8">

    </head>

<body>


<a href=accueil_pro.php>retour à l'accueil</a>
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
<label for = "nom">nom de l'animal : </label>
    <input type="text" name="nom" id ="nom">
</br></br>
<label for = "date_naissance"> date de naissance : </label>
    <input type = "date" name="date_naissance" id="date_naissance">
</br></br>
<label for = "espece">espèce : </label>
    <select name="espece" id ="espece">
        <option value="">choisisez une race </option>
        <option value = "chien">chien</option>
        <option value = "chat ">chat</option>
        <option value = "nacs">nacs</option>
    </select>
</br></br>
<label for = "race">race : </label>
    <select name="race" id ="race">
        <option value="">choisisez une race</option>
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

<label for = "sexe">sexe : </label>
    <select name="sexe" id ="sexe">
        <option value="">choisisez le sexe </option>
        <option value="femelle">femelle</option>
        <option value="male">male</option>
    </select>
</br></br>

<label for = "lieu">lieu : </label>
    <select name="lieu" id ="lieu">  
        <option value="">choisisez le lieu </option>
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

<label for = "description">description : </label>
    <textarea name = "description" id ="description"></textarea>

</br></br>

<input type="submit" name="valider" value="valider" >

</form>

</center>
</div>


</body> 




</html>