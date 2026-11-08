<?php
/**
 * 9.   Afficher l'adresse du troisième lieu
 * 
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

//Connecter
R::setup("mysql:host=localhost;dbname=reservations","root","");

$lieu = R::findOne('lieux', 'ORDER BY id LIMIT 3');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Série 1 Ex 09</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Adresse du troisième lieu</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><?=  $lieu['adresse'] ?></th>
            </tr>
        </tbody>
    </table>
</body>
</html>