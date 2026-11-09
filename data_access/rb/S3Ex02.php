<?php
/**
 * 2.   Afficher le deuxième lieu (désignation)
 * 
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

//Connecter
R::setup("mysql:host=localhost;dbname=reservations","root","");

$lieu = R::findOne("lieux","LIMIT 1 OFFSET 1");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Série 3 Ex2</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Deuxième lieu</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><?=  $lieu['designation'] ?></th> 
            </tr>
        </tbody>
    </table>
</body>
</html>