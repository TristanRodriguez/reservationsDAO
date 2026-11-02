<?php
/**
 * 4.   Afficher l'adresse du lieu du spectacle intitulé Cible mouvante
 * 
 * @author Tristan
 * @version 1.0
 */

// Connecter
$pdo = new PDO("mysql:host=localhost;dbname=reservations", "root", "");

// Requete
$query = "SELECT spectacles.id, spectacles.lieu, lieux.id, lieux.adresse FROM spectacles, lieux WHERE lieux.id = spectacles.lieu";

// Envoyer
$stmt = $pdo->query($query);

// Extraire
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Libérer
$stmt->closeCursor();

// Déconnecter
$pdo = null;

$adresse = "";
foreach($data as $field) {

    if($field['id'] == "cible") {
        $adresse = $field['adresse'];
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Série 4 Ex 04</title>
</head>
<body>
    <h1>Cible mouvante</h1>
    <table>
        <thead>
            <tr>
                <td>Adresse</td>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td><?= $field['adresse'] ?></td>
                </tr>
        </tbody>
    </table>
</body>
</html>