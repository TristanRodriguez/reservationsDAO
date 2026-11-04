<?php
/**
 * 2.   Afficher le deuxième lieu (désignation)
 * 
 * @author Tristan
 * @version 1.0
 */

//Connecter
$pdo = new PDO("mysql:host=localhost;dbname=reservations","root","");   //var_dump($pdo);

//Préparer
$query = "SELECT designation FROM `lieux` OFFSET 1";

//Envoyer
$stmt = $pdo->query($query);

//Extraire
$lieu = $stmt->fetchAll(PDO::FETCH_ASSOC);         //var_dump($data);

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
    <title>Série 3 Ex 02</title>
</head>
<body>
    <h1>Deuxième lieu</h1>
    <div><?= $lieu['designation'] ?></div>
</body>
</html>