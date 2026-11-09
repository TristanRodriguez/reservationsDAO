<?php
/**
 * 5.   Afficher les spectacles dont le scenographe est aussi le distributeur
 * 
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

//Connecter
R::setup("mysql:host=localhost;dbname=reservations","root","");

$spectacles = R::findAll("spectacles");

$tabSpectacles = [];

// Parcour du tableau spectacle
foreach ($spectacles as $spectacle) {

    if (str_contains($spectacle['scenographie'], "Daniel Marcelin") && str_contains($spectacle['distribution'], "Daniel Marcelin")) {
        
        array_push($tabSpectacles, $spectacle['title']);
    }
}
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
            <?php if (empty($tabSpectacles)) : ?>
                <tr>
                    <td>Aucun spectacle ne correspond !</td>
                </tr>
            <?php else : ?>
                <?php foreach ($tabSpectacles as $spectacle) : ?>
                    <tr>
                        <td><?= htmlspecialchars($spectacle) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>