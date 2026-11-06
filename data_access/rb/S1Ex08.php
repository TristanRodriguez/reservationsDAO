<?php
/**
 * 8.	Afficher la photo du premier spectacle
 * 
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

//Connecter
R::setup("mysql:host=localhost;dbname=reservations","root","");

$spectacle = R::load("spectacles", "ayiti");
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
                <th>Image du premier spectacle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><img src="../../<?= $spectacle['img'] ?>" alt="photo_spectacle"></th>
            </tr>
        </tbody>
    </table>
</body>
</html>