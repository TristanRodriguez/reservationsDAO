<?php
/**
 * 2.	Créer une fonction de recherche d'un lieu précis
 * SimpleXMLElement getLieu(SimpleXMLElement xml, String id)
 * Ex.: print_r( getLieu($xml,'espacemagh') );
 * 
 *
 */

require '../../rb.php';

R::setup("mysql:host=localhost;dbname=reservations","root","");

function getLieu(string $id) {
    $lieu = R::load('lieux', $id);

    return $lieu;
}

$lieu = getLieu("dexia");
var_dump($lieu);

$localite = R::find('localites', 'code = ?',[ $lieu->localite ]);
$localite = array_pop($localite);
var_dump($localite);
?>
<p>Désignation: <?= $lieu->designation ?></p>
<p>Adresse: <?= $lieu->adresse ?></p>
<p>Site web: <?= $lieu->website ?></p>
<p>Tel: <?= $lieu->tel ?></p>
<p>Localité: <?= $lieu->localite ?> <?= $localite->localite_fr ?></p>