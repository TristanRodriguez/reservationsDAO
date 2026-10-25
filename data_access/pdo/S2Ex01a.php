<?php
/**  
 * 1.	Afficher tous les lieux (description complète)
 * void printLieux(SimpleXMLElement xml)
 * Ex.: printLieux($xml)
 * a.	Format: titre et paragraphes
 * 
 * @author Tristan
 * @version 1.0
*/

// Charger le fichier XML
$xml = simplexml_load_file('../../data/reservations.xml');

// Afficher tous les lieux
function printLieux(SimpleXMLElement $xml) :void{
    echo "<h1>Lieux</h1>";

    foreach ($xml->lieu as $lieu) {
        echo '<div>';
        echo '<h2>' . htmlspecialchars((string) $lieu->designation) . '</h2>';
        echo '<p>' . htmlspecialchars((string) $lieu->adresse->rue) . '</p>';
        echo '<p>' . htmlspecialchars((string) $lieu->adresse->localite) . '</p>';
        echo '</div>';
    }
}

printLieux($xml);
