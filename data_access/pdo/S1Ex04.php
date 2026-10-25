<?php
/**
 * 4.	Afficher l'id de toutes les personnes
 * 
 * @author Tristan
 * @version 1.0
 */

//Connecter
$pdo = new PDO("mysql:host=localhost;dbname=reservations","root","");   //var_dump($pdo);

//Préparer
$query = "SELECT id FROM `personnes`";

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
    <title>Série 1 Ex2</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $field) : ?>
            <tr>
                <th><?=  $field['id'] ?></th>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>