<?php
/**
 * 4.   Afficher l'image des spectacles
 * 
 * @author Tristan
 * @version 1.0
 */

//Connecter
$pdo = new PDO("mysql:host=localhost;dbname=reservations","root","");   //var_dump($pdo);

//Préparer
$query = "SELECT img, title FROM `spectacles`";

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
    <title>Série 3 Ex 04</title>
</head>
<body>
    <h1>Image des spectacles</h1>
    <table>
        <thead>
            <tr>
                <th>Spectacles</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $field) : ?>
                <tr>
                    <th><?= $field['title'] ?></th>
                    <th><img src="../../<?= $field['img'] ?>" alt="image_spectacle"></th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>