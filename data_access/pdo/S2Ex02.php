<?php
/**
 * 2.	Créer une fonction de recherche d'un lieu précis
 * SimpleXMLElement getLieu(SimpleXMLElement xml, String id)
 * Ex.: print_r( getLieu($xml,'espacemagh') );
 */

//Connecter
$pdo = new PDO("mysql:host=localhost;dbname=reservations","root","");   //var_dump($pdo);

//Préparer
$query = "SELECT * FROM `lieux`";

//Envoyer
$stmt = $pdo->query($query);

//Extraire
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);         //var_dump($data);

//Libérer
$stmt->closeCursor();

//Déconnecter
$pdo = null;

function getLieu()