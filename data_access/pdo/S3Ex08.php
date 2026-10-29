
<?php
/**
 * 8. Afficher les spectacles qui possèdent plus de 3 représentations
 *
 * @author Tristan
 * @version 1.0
 */

// Connecter
$pdo = new PDO("mysql:host=localhost;dbname=reservations", "root", "");

// Préparer
$query = "SELECT spectacles.id, spectacles.title,
                 COUNT(representations.id) AS nb_representations
          FROM spectacles, representations
          WHERE spectacles.id = representations.id_spectacle
          GROUP BY spectacles.id, spectacles.title
          HAVING COUNT(representations.id) > 3";

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
    <title>Série 3 Ex 08</title>
</head>
<body>
    <h1>Spectacles avec plus de 3 représentations</h1>

    <table>
        <thead>
            <tr>
                <th>Spectacle</th>
                <th>Nombre de représentations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $field) : ?>
                <tr>
                    <td><?= htmlspecialchars($field['title']) ?></td>
                    <td><?= $field['nb_representations'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
