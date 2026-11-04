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
    $str = '<table border="1">';
    $str .= '<thead>
            <tr>
                <th>Désignation</th>
                <th>Adresse</th>
                <th>Localité</th>
            </tr>
          </thead>';
    $str .= '<tbody>';

    foreach ($xml->lieu as $lieu) {
        $str .= '<tr>';
        $str .= '<td>' . htmlspecialchars((string) $lieu->designation) . '</td>';
        $str .= '<td>' . htmlspecialchars((string) $lieu->adresse->rue) . '</td>';
        $str .= '<td>' . htmlspecialchars((string) $lieu->adresse->localite) . '</td>';
        $str .= '</tr>';
    }

    $str .= '</tbody>';
    $str .= '</table>';
    echo $str;
}

printLieux($xml);


