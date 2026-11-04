<?php
/**
 * 7.	Afficher la personne qui s'appelle Hirogawa
 * 
 * @author Cedric
 * @version 1.0
 */

 require '../../rb.php';

 //Connecter
 R::setup("mysql:host=localhost;dbname=reservations","root","");
 
 $personnes = R::findAll("personnes");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB Access - Série 1 Ex 07</title>
</head>
<body>
<h1>Afficher la personne qui s'appelle Hirogawa</h1>
    <?php foreach($personnes as $personne) : ?>
        <?php if($personne->nom == "Hirogawa") : ?>
            <p><?= $personne->nom ?></p>
        <?php endif; ?>
    <?php endforeach; ?>
</form>
</body>
</html>