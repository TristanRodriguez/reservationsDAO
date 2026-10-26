<?php
/**
 * 3.   Créer une fonction de recherche d'information sur un lieu précis
 * sring getLieuInfo(SimpleXMLElement $xml, string $id, String $info)
 * Ex: echo(getLieuInfo($xml,"dexia","website"))
 * 
 * @author Tristan
 * @version 1.0
 */

// Charger le fichier XML
$xml = simplexml_load_file('../../data/reservations.xml');

function getLieuInfo(SimpleXMLElement $xml, string $id, string $info) {

    // On parcour le tableau xml 
    foreach($xml->lieu as $lieu) {

        // Condition si les id correspond
        if((string)$lieu['id'] == (string)$id) {

            if(!empty((string)$lieu->{$info})) {
                
                return (string)$lieu->{$info};
            }
        }
    }

    return "Error";
}

echo "<p>".getLieuInfo($xml,"dexia","designation")."</p>";
echo "<p>".getLieuInfo($xml,"dexia","website")."</p>";
echo "<p>".getLieuInfo($xml,"dexia","BBL")."</p>";
