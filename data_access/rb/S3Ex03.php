<?php
/**
 * 3.   Afficher l'id des spectacles réservables
 * 
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

//Connecter
R::setup("mysql:host=localhost;dbname=reservations","root","");

$spectacles = R::findAll("spectacles","WHERE reservable = 1");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Série 3 Ex 03</title>
</head>
<body>
    <h1>Id des spectacles réservable</h1>
    <table>
        <thead>
            <tr>
                <th>Spectacles</th>
                <th>Id</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($spectacles as $spectacle) : ?>
                <tr>
                    <th><?= $spectacle['title'] ?></th>
                    <th><?= $spectacle['id'] ?></th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>