<?php
/**
 * 2.	Afficher le nom de toutes les personnes
 * 
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

R::setup("mysql:host=localhost;dbname=reservations","root","");

/*
$person = R::getAll('SELECT nom FROM personnes');  en dernier recours !
*/

// Sinon

$person = R::findAll("personnes");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S1 Ex 02</title>
</head>
<body>
    <?php foreach($person as $personne) : ?>
        <p><?= $personne->nom ?></p>
    <?php endforeach; ?>
</body>
</html>