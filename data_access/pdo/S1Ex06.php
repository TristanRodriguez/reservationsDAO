<?php
/**
 * 6.	Afficher tous les spectacles non réservables
 * 
 * @author Tristan
 * @version 1.0
 */

//Connecter
$pdo = new PDO("mysql:host=localhost;dbname=reservations","root","");   //var_dump($pdo);

//Préparer
$query = "SELECT title FROM `spectacles` WHERE reservable = 1";

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
    <title>Série 1 Ex 06</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Spectacles réservables</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $field) : ?>
            <tr>
                <th>- <?=  $field['title'] ?></th>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>