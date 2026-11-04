<?php
/**
 * 3.	Afficher la rue du premier lieu
 * 
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

//Connecter
R::setup("mysql:host=localhost;dbname=reservations","root","");

$lieu = R::findOne('lieux', 'ORDER BY id LIMIT 1');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Série 1 Ex3</title>
</head>
<body>
    <h1>Lieu</h1>
        <div><?=  $lieu["designation"] ?></div>
</body>
</html>