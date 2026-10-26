<?php
/**
 * 4.   Rechercher tous les spectacles réservables
 * Array getReservables(SimpleXMLElement $xml)
 * Ex: var_dump(getReservables($xml))
 * 
 * @author Tristan
 * @version 1.0
 */

// Charger le fichier XML
$xml = simplexml_load_file('../../data/reservations.xml');

function getReservables(SimpleXMLElement $xml) {

    $tabReservables = [];
    // Parcour de tout les spectacles
    foreach($xml->spectacle as $spectacle) {

        if($spectacle["reservable"] == 1) {

            array_push($tabReservables, $spectacle->title);
        }
    }

    return $tabReservables;
}

var_dump(getReservables($xml));