<?php
/**
 * 4.	Afficher l'id de toutes les personnes
 * 
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

//Connecter
R::setup("mysql:host=localhost;dbname=reservations","root","");

$personnes = R::findAll("personnes");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Série 1 Ex4</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($personnes as $personnes) : ?>
            <tr>
                <th><?=  $personnes['id'] ?></th> <!-- ou $personnes->id -->
                <th><?=  $personnes["nom"] ?></th> <!-- ou $personnes->nom -->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>