<?php
/**
 * 4.   Afficher l'image des spectacles
 * 
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

//Connecter
R::setup("mysql:host=localhost;dbname=reservations","root","");

$spectaclesIMG = R::findAll("spectacles");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Série 3 Ex 04</title>
</head>
<body>
    <h1>Image des spectacles</h1>
    <table>
        <thead>
            <tr>
                <th>Spectacles</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($spectaclesIMG as $spectacleIMG) : ?>
                <tr>
                    <th><?= $spectacleIMG['title'] ?></th>
                    <th><img src="../../<?= $spectacleIMG['img'] ?>" alt="image_spectacle"></th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>