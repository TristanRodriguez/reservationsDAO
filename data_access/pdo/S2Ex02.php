<?php
/**
 * 2.	Créer une fonction de recherche d'un lieu précis
 * SimpleXMLElement getLieu(SimpleXMLElement xml, String id)
 * Ex.: print_r( getLieu($xml,'espacemagh') );
 * 
 * @author Tristan
 * @version 1.0
 */

// Charger le fichier XML
$xml = simplexml_load_file('../../data/reservations.xml');

function getLieu(SimpleXMLElement $xml, string $id) {

    foreach($xml->lieu as $lieu) {

        if((string) $id == (string)$lieu["id"]) {

            return $lieu;
        }
    }

    return "Ce lieu n'existe pas !";
}

print_r(getLieu($xml,"dexia"));
print_r(getLieu($xml,"BBL"));