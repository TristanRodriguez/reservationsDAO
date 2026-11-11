<?php
/**
 * 7.   Afficher les personnes(nom, prénom) qui sont abonné
 * 
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

//Connecter
R::setup("mysql:host=localhost;dbname=reservations","root","");

$personnes = R::findAll("personnes", "WHERE abonne = 1");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Série 3 Ex 07</title>
</head>
<body>
    <h1>Personnes abonnées</h1>
    <table>
        <thead>
            <tr>
                <th>Personnes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($personnes as $personne) : ?>
                <tr>
                    <th><?= $personne['nom'] ?></th>
                    <th><?= $personne['prenom'] ?></th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>