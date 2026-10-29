<?php
/**
 * 1.   Afficher les dates de représentations du 3ième spectacle
 * 
 * @author Tristan
 * @version 1.0
 */

// Connecter
$pdo = new PDO("mysql:host=localhost;dbname=reservations", "root", "");

// Préparer
$query = "SELECT representations.date, spectacles.title
          FROM representations, spectacles
          WHERE spectacles.id = representations.id_spectacle
          AND spectacles.id = (
              SELECT id
              FROM spectacles
              ORDER BY id ASC
              LIMIT 1 OFFSET 2
          )";

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
    <title>Série 4 Ex 01</title>
</head>
<body>
    <h1>Dates du troisième spectacle</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $field) : ?>
                <tr>
                    <td><?= htmlspecialchars($field['title']) ?></td>
                    <td><?= htmlspecialchars($field['date']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
