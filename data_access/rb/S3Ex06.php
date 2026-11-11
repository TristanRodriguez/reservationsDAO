<?php
/**
 * 6.   Afficher les lieux qui n'ont pas de site web
 * 
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

//Connecter
R::setup("mysql:host=localhost;dbname=reservations","root","");

$lieux = R::findAll("lieux");

$tabLieux = [];

foreach($lieux as $lieu) {
    if(empty($lieu['website'])) {
        array_push($tabLieux,$lieu);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Série 3 Ex 06</title>
</head>
<body>
    <h1>Lieux sans site web</h1>
    <table>
        <thead>
            <tr>
                <th>Désignation</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tabLieux as $lieu) : ?>
                <tr>
                    <th><?= $lieu['designation'] ?></th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>