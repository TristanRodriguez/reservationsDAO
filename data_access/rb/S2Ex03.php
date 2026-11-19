<?php
/**
 * 3. Créer une fonction de recherche d'information sur un lieu précis
 * string getLieuInfo(array $lieux, string $id, string $info)
 * Ex: echo getLieuInfo($lieux, "dexia", "website");
 * 
 * @author Tristan
 * @version 1.0
 */

require '../../rb.php';

// Connexion à la base de données
R::setup("mysql:host=localhost;dbname=reservations", "root", "");

$lieux = R::findAll("lieux");

function getLieuInfo(array $lieux, string $id, string $info): string {

    // On parcourt le tableau des objets RedBean
    foreach ($lieux as $lieu) {

        // Condition si les id correspondent
        if ($lieu->id === $id) {

            // Vérifie si la colonne existe et n'est pas vide
            if (!empty($lieu->$info)) {
                return (string) $lieu->$info;
            } else {
                return "Propriété inexistante ou vide";
            }
        }
    }

    return "Lieu introuvable";
}

echo "<p>" . getLieuInfo($lieux, "dexia", "designation") . "</p>";
echo "<p>" . getLieuInfo($lieux, "dexia", "website") . "</p>";
echo "<p>" . getLieuInfo($lieux, "dexia", "BBL") . "</p>";
