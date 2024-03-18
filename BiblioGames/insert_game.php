<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="NouveauJeux">
        <form method="post">
        
        <label class="description" for="Nom"></label>
        <input type="text" id="insert" name="Nom" placeholder="nom du jeux"></input>

        <label class="description" for="platform"></label>
        <select id="listgame" name="platform" >
            <option value="">jouable où ?</option>
            <optgroup label="Xbox">
                <option value="Xbox serie x">Xbox série X</option>
                <option value="Xbox one">Xbox One</option>  
                <option value="Xbox 360">Xbox 360</option>
                <option value="Xbox legacy">Xbox legacy (ancienne version)</option>
            </optgroup>
            <optgroup label="PS">
                <option value="PS5">PlayStation 5</option>
                <option value="PS4">PlayStation 4</option>
                <option value="PS3">PlayStation 3</option>
                <option value="PS2">PlayStation 2</option>
            </optgroup>        
            <optgroup label="Nintendo">
                <option value="Switch">Nintendo Switch</option>
                <option value="Wii U">Wii U</option>
                <option value="Wii">Wii</option>
                <option value="Game Boy Advance">Game Boy Advance</option>
            </optgroup>
            <option value="Steam">Steam</option>
            <option value="Epic">Epic</option>
        </select>
<button type="submit">validé !</button>
        
        </form>
    </div>
    
</body>
</html>





<?php
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "Chaplin3000*";
$basededonnees = "bibliogames";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

if ($connexion->connect_error) {
    die("Y'a un probleme chef" . $connexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $NameGame = $_POST['Nom'];
    $PlatformGame = $_POST['platform'];

    $sql = "INSERT INTO jeux (Nom, platform) VALUES ('$NameGame', '$PlatformGame')";

    if ($connexion->query($sql) === TRUE) {
        echo "<script>window.location.href = 'PageUtilisateur.php';</script>";

    } else {
        echo "Erreur: " . $sql . "<br>" . $connexion->error;
    }
}


?>