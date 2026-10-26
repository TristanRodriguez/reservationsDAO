<?php
/**
 * 1.	Afficher la liste des personnes (nom et prénom)
 * 
 * @author Tristan
 * @version 1.0
 */

//Connecter
$pdo = new PDO("mysql:host=localhost;dbname=reservations","root","");   //var_dump($pdo);

//Préparer
$query = "SELECT nom, prenom FROM `personnes`";

//Envoyer
$stmt = $pdo->query($query);

//Extraire
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);         //var_dump($data);

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
    <title>Série 3 Ex1</title>
</head>
<body>
    <h1>Personnes</h1>
      
            <?php foreach($data as $field) : ?>
            <ul>
                <li><?=  $field['nom'] ." ". $field['prenom']?></li>
            </ul>
            <?php endforeach; ?>
    
</body>
</html>