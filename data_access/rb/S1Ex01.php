<?php
/**
 * 1.	Afficher le nom de la première personne
 * 
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

R::setup("mysql:host=localhost;dbname=reservations","root","");

$person = R::load("personnes", 1);

var_dump($person->nom);
