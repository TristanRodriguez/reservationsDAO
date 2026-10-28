<?php
/**
 * 5.   Afficher les spectacles dont le scenographe est aussi le distributeur
 * 
 * @author Tristan
 * @version 1.0
 */

//Connecter
$pdo = new PDO("mysql:host=localhost;dbname=reservations","root","");   //var_dump($pdo);

//Préparer
$query = "SELECT title, scenographie, `distribution` FROM `spectacles`";

//Envoyer
$stmt = $pdo->query($query);

//Extraire
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);         //var_dump($data);

$tabData = [];

// Parcour du tableau spectacle
foreach ($data as $field) {

    if (str_contains($field['scenographie'], "Daniel Marcelin") && str_contains($field['distribution'], "Daniel Marcelin")) {
        
        array_push($tabData, $field['title']);
    }
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
    <title>Série 3 Ex 05</title>
</head>
<body>
    <h1>Scenographie et distribution</h1>
    <table>
        <thead>
            <tr>
                <th>Spectacle</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($tabData)) : ?>
                <tr>
                    <td>Aucun spectacle ne correspond !</td>
                </tr>
            <?php else : ?>
                <?php foreach ($tabData as $spectacle) : ?>
                    <tr>
                        <td><?= htmlspecialchars($spectacle) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>