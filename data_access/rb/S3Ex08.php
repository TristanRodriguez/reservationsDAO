
<?php
/**
 * 8. Afficher les spectacles qui possèdent plus de 3 représentations
 *
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

//Connecter
R::setup("mysql:host=localhost;dbname=reservations","root","");

// Requête SQL : compte les représentations par spectacle et garde ceux > 3
$sql = "SELECT id_spectacle AS title, COUNT(*) AS nb_representations 
        FROM representations 
        GROUP BY id_spectacle 
        HAVING COUNT(*) > 3";

$tabRepresentations = R::getAll($sql);
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
            <?php foreach ($tabRepresentations as $field) : ?>
                <tr>
                    <td><?= htmlspecialchars($field['title']) ?></td>
                    <td><?= $field['nb_representations'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
