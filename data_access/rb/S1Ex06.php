<?php
/**
 * 6.	Afficher tous les spectacles non réservables
 * 
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

//Connecter
R::setup("mysql:host=localhost;dbname=reservations","root","");

$spectacles = R::findAll("spectacles","WHERE reservable=0" );


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Série 1 Ex 06</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Spectacles réservables</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($spectacles as $spectacle) : ?>
            <tr>
                <th>- <?=  $spectacle['title'] ?></th>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>