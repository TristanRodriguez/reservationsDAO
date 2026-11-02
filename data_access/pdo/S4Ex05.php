<?php
/**
 * 5.   Ajouter une date et une heure de représentation au spectacle Ayiti
 * 
 * @author Tristan
 * @version 1.0
 */

// Connecter
$pdo = new PDO("mysql:host=localhost;dbname=reservations", "root", "");

// Requete
$query = "INSERT INTO representations(id_spectacle, date, heure, id_lieu, complet)
    VALUE('ayiti', '2026-10-12', '21:30:00', NULL, 0)";

// Envoyer
$pdo->exec($query);

// Déconnecter
$pdo = null;

