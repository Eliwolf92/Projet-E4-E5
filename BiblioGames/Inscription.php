<?php
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "Chaplin3000*";
$basededonnees = "bibliogames";


$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);


if ($connexion->connect_error) {
    die("Y'a un probleme chef" . $connexion->connect_error);
}

?>

<!DOCTYPE html
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="Bibliogames.css">

</head>
<body background="Fond Bibliogames connexion.png">
    <div id="Bande_Biblio"><a id="Bibliogames" href="index.php">Bibliogames</a></div>

    
    <div id="Page_Connexion">
    <form method="post">
        <div><label style="position: relative; left: 170px; top: 70px;font-family: Edo SZ; font-size: 20px;" for="username">Pseudonyme :</label></div>
        <div><input style="border-radius: 10px; border: solid black 2px; height: 40px; width: 160px;top: 70px;position: relative; left: 170px;" type="text" name="username" id="username" placeholder="123Kevin..."></div>

        <div><label style="position: relative; left: 170px; top: 120px;font-family: Edo SZ; font-size: 20px;" for="mail">Adresse mail :</label></div>
        <div><input style="border-radius: 10px; border: solid black 2px; height: 40px; width: 160px;top: 120px;position: relative; left: 170px;" type="email" name="mail" id="mail" placeholder="exemple@gmail.com"></div>
        
        <div><label style="position: relative; left: 170px; top: 170px;font-family: Edo SZ; font-size: 20px;" for="password">Mot-De-Passe :</label></div>
        <div><input style="border-radius: 10px; border: solid black 2px; height: 40px; width: 160px;top: 170px;position: relative; left: 170px;" type="password" id="password" name="password" placeholder="*****"></div>
    
        <div><button type="submit" style="border-radius: 10px; border: solid black 2px; height: 40px; width: 160px;top: 290px;position: relative; left: 170px; font-family: Cyberpunk is not dead;">INSCRIT</button>
        </div>
    </form>
    </div>

</body>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['mail'];
    $mdp = $_POST['password'];

    // Redirection vers la page appropriée en fonction du type d'utilisateur
    header("Location: PageUtilisateur.php ?username=$unsername");
    exit();

    $sql = "INSERT INTO utilisateur (pseudonyme, email, mot_de_passe) VALUES ('$username', '$email', '$mdp')";

    if ($connexion->query($sql) === TRUE) {
        echo "<script>window.location.href = 'PageUtilisateur.php';</script>"; 
        exit;
    } else {
        echo "Erreur: " . $sql . "<br>" . $connexion->error;
    }
}
?>


</html>

