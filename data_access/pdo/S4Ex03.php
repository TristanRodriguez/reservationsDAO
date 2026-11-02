<?php
/**
 * 3.   Afficher le titre des spectacles et les dates de représentations de tous les spectacles
 * qui ont des représentations complètes 
 * 
 * @author Tristan
 * @version 1.0
 */

// Connecter
$pdo = new PDO("mysql:host=localhost;dbname=reservations", "root", "");

// Requete
$query = "SELECT spectacles.title, representations.id_spectacle, representations.date FROM spectacles, representations WHERE spectacles.id = representations.id_spectacle AND complet = 1";

// Envoyer
$stmt = $pdo->query($query);

// Extraire
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Libérer
$stmt->closeCursor();

// Déconnecter
$pdo = null;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Série 4 Ex 02</title>
</head>
<body>
    <h1>Spectacles complets</h1>
    <table>
        <thead>
            <tr>
                <td>Titre</td>
                <td>Date</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $field) : ?>
                <tr>
                    <td><?= $field['id_spectacle'] ?></td>
                    <td><?= $field['date'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>