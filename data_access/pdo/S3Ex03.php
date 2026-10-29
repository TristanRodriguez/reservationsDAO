<?php
/**
 * 3.   Afficher l'id des spectacles réservables
 * 
 * @author Tristan
 * @version 1.0
 */

//Connecter
$pdo = new PDO("mysql:host=localhost;dbname=reservations","root","");   //var_dump($pdo);

//Préparer
$query = "SELECT id, title FROM `spectacles` WHERE reservable = 1";

//Envoyer
$stmt = $pdo->query($query);

//Extraire
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);         //var_dump($data);

// Récupère l'id des spectacles réservable
$tabId = [];
foreach($data as $id) {
    array_push($tabId, $id);
}

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
    <title>Série 3 Ex 03</title>
</head>
<body>
    <h1>Id des spectacles réservable</h1>
    <table>
        <thead>
            <tr>
                <th>Spectacles</th>
                <th>Id</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tabId as $field) : ?>
                <tr>
                    <th><?= $field['title'] ?></th>
                    <th><?= $field['id'] ?></th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>