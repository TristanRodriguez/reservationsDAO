<?php
/**
 * 1.	Afficher le nom de la première personne
 * 
 * @author C. Ruth
 * @version 1.0
 */

require '../../rb.php';

R::setup("mysql:host=localhost;dbname=reservations","root","");

$person = R::load('personnes',1);

var_dump($person);
?>

<p><?= "{$person->prenom} {$person->nom}" ?></p>