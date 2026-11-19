<?php
/**
 * 4. Rechercher tous les spectacles réservables
 * array getReservables(array $spectacles)
 * Ex: var_dump(getReservables($spectacles))
 * 
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

// Connexion à la base de données
R::setup("mysql:host=localhost;dbname=reservations", "root", "");

// On récupère tous les spectacles
$spectacles = R::findAll("spectacles");

function getReservables(array $spectacles): array {

    $tabReservables = [];

    // Parcours de tous les spectacles
    foreach ($spectacles as $spectacle) {

        if ($spectacle->reservable == 1) {
            // On ajoute l'objet $spectacle complet dans le tableau
            $tabReservables[] = $spectacle;
        }
    }

    return $tabReservables;
}

var_dump(getReservables($spectacles));
