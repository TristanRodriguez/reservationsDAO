<?php
/**  
 * 1.	Afficher tous les lieux (description complète)
 * void printLieux(SimpleXMLElement xml)
 * Ex.: printLieux($xml)
 * b.	Format: liste
 * 
 * @author Tristan
 * @version 1.0
*/

// Charger le fichier XML
$xml = simplexml_load_file('../../data/reservations.xml');

// Afficher tous les lieux
function printLieux(SimpleXMLElement $xml) :void{

    foreach ($xml->lieu as $lieu) {
        echo '<ul>';    
            echo '<li>' . htmlspecialchars((string) $lieu->designation) . '</li>';
            echo '<li>' . htmlspecialchars((string) $lieu->adresse->rue) . '</li>';
            echo '<li>' . htmlspecialchars((string) $lieu->adresse->localite) . '</li>';
        echo '</ul>';
    }
}

printLieux($xml);
