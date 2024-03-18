<?php
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "Chaplin3000*";
$basededonnees = "bibliogames";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

if (isset($_GET['username'])) {
    $username = $_GET['username'];
} else {
    // Gérer l'absence de nom d'utilisateur dans l'URL
    $username = "Utilisateur"; // Défaut si le nom d'utilisateur n'est pas fourni
}

// Requête SQL pour récupérer les noms des jeux
$sql = "SELECT Nom FROM Jeux ";

// Exécution de la requête
$resultat = $connexion->query($sql);

// Vérification s'il y a des résultats
if ($resultat->num_rows > 0) {
    // Création d'un tableau pour stocker les noms des jeux
    $games = array();

    // Récupération des données de chaque ligne de résultat
    while ($row = $resultat->fetch_assoc()) {
        // Ajout du nom du jeu au tableau
        $games[] = $row['Nom'];
    }
} else {
    $games = array(); // Si aucun résultat, initialisation du tableau vide
}

// Fermeture de la connexion
$connexion->close();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque-Utilisateur</title>
    <link rel="stylesheet" href="Bibliogames.css">
</head>
<body background="Fond Bibliogames connexion.png">
<div id="Bande_Biblio"><a id="Bibliogames">Bibliogames</a> <button id="Deconnect" onclick="window.location.href = 'déconnexion.php'">Déconnexion</button></div>
<div style="height: 1250px;width: 1470px;border: solid black 15px; border-radius: 20px;background-color: rgb(198, 139, 30); position: relative;">
 
<div id="list-biblio">
<?php 
    // Affichage des noms des jeux dans des divs
    foreach($games as $game) {
        echo '<div class="game">'.$game.'</div>';
    } ?>

</div>
    
</body>
</html>