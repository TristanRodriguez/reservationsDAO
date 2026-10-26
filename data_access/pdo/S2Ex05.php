<?php
/**
 * 5.   Rechercher les représentations d'un spectacle précis
 * Array getRepresentations(SimpleXMLElement $xml, string $id)
 * Ex: var_dump(getRepresentations($xml, "ayiti"))
 * 
 * @author Tristan
 * @version 1.0
 */

// Charger le fichier XML
$xml = simplexml_load_file('../../data/reservations.xml');

function getReservables(SimpleXMLElement $xml, string $id) {

    $tabRepresentations = [];
    // Parcour de tout les spectacles
    foreach($xml->spectacle as $spectacle) {

        if($spectacle["id"] == (string)$id) {

            foreach($spectacle->representations as $representation) {

                array_push($tabRepresentations, $representation);
            }
        }
    }

    return $tabRepresentations;
}

var_dump(getReservables($xml, "ayiti"));