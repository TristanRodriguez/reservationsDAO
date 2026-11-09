<?php
/**
 * 1.	Afficher la liste des personnes (nom et prénom)
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
    <title>Série 3 Ex1</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($personnes as $personnes) : ?>
            <tr>
                <th><?=  $personnes['nom'] ?></th> 
                <th><?=  $personnes["prenom"] ?></th> 
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>