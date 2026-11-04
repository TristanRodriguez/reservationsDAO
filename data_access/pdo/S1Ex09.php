<?php
/**
 * 9.   Afficher l'adresse du troisième lieu
 * 
 * @author Tristan
 * @version 1.0
 */

//Connecter
$pdo = new PDO("mysql:host=localhost;dbname=reservations","root","");   //var_dump($pdo);

//Préparer
$query = "SELECT adresse FROM `lieux` OFFSET 2";

//Envoyer
$stmt = $pdo->query($query);

//Extraire
$lieu = $stmt->fetch(PDO::FETCH_ASSOC);         //var_dump($data);

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
    <title>Série 1 Ex 09</title>
</head>
<body>
    <h1>Troisième lieu</h1>
    <div><?= $lieu['adresse'] ?></div>
</body>
</html>