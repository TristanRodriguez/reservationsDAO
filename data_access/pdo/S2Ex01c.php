<?php
/**  
 * 1.	Afficher tous les lieux (description complète)
 * void printLieux(SimpleXMLElement xml)
 * Ex.: printLieux($xml)
 * c.	Format: tableau
 * 
 * @author Tristan
 * @version 1.0
*/

// Charger le fichier XML
$xml = simplexml_load_file('../../data/reservations.xml');

// Afficher tous les lieux
function printLieux(SimpleXMLElement $xml) :void{
    echo '<table border="1">';
    echo '<thead>
            <tr>
                <th>Désignation</th>
                <th>Adresse</th>
                <th>Localité</th>
            </tr>
          </thead>';
    echo '<tbody>';

    foreach ($xml->lieu as $lieu) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars((string) $lieu->designation) . '</td>';
        echo '<td>' . htmlspecialchars((string) $lieu->adresse->rue) . '</td>';
        echo '<td>' . htmlspecialchars((string) $lieu->adresse->localite) . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}

printLieux($xml);


