<?php
//1.	Afficher le nom de la première personne
//Connecter
$mysqli = new mysqli("localhost","root","","reservations");     //var_dump($mysqli);

//Préparer
$query = "SELECT nom FROM `personnes` LIMIT 1";

//Envoyer
$res = $mysqli->query($query, MYSQLI_ASSOC);    //var_dump($res);

//Extraire
$data = $res->fetch_assoc();    //var_dump($data);

//Libérer
$res->free();       //var_dump($res);

//Déconnecter
$mysqli->close();   //var_dump($mysqli);