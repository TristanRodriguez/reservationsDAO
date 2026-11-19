<?php
/**
 * 4.   Afficher l'adresse du lieu du spectacle intitulé Cible mouvante
 * 
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

//Connecter
R::setup("mysql:host=localhost;dbname=reservations","root","");

$spectacles = R::findOne("spectacles", "WHERE id = 'cible'");

$lieux = R::findOne("lieux", "id = ?", [$spectacles->lieu]);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Série 4 Ex 04</title>
</head>
<body>
    <h1>Cible mouvante</h1>
    <table>
        <thead>
            <tr>
                <td>Adresse</td>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td><?= $lieux['adresse'] ?></td>
                </tr>
        </tbody>
    </table>
</body>
</html>
