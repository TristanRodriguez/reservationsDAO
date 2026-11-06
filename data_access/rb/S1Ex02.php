<?php
/**
 * 2.	Afficher le nom de toutes les personnes
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
    <title>Série 1 Ex 02</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Personnes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($personnes as $personne) : ?>
                <tr>
                    <th><?= $personne['nom']." ".$personne['prenom'] ?></th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>