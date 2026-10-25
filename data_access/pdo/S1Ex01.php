<?php
/**
 * 1.	Afficher le nom de la première personne
 * 
 * @author Tristan
 * @version 1.0
 */

//Connecter
$pdo = new PDO("mysql:host=localhost;dbname=reservations","root","");   //var_dump($pdo);

//Préparer
$query = "SELECT nom FROM `personnes` LIMIT 1";

//Envoyer
$stmt = $pdo->query($query);

//Extraire
$data = $stmt->fetch(PDO::FETCH_ASSOC);         //var_dump($data);

//Libérer
$stmt->closeCursor();

//Déconnecter
$pdo = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Série 1 Ex2</title>
</head>
<body>
    <h1>Lieu</h1>
    <div><?=  $data["nom"] ?></div>
</body>
</html>