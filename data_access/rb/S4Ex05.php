<?php
/**
 * 5.   Ajouter une date et une heure de représentation au spectacle Ayiti
 * 
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

//Connecter
R::setup("mysql:host=localhost;dbname=reservations","root","");

// Requete
$sql = "INSERT INTO representations(id_spectacle, date, heure, id_lieu, complet)
    VALUES('ayiti', '2026-10-12', '21:30:00', NULL, 0)";

$ajout = R::exec($sql);
