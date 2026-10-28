<?php
/**
 * 7.   Afficher les personnes(nom, prénom) qui ont reservé pour la première représentation du premier spectacle
 * 
 * @author Tristan
 * @version 1.0
 */

//Connecter
$pdo = new PDO("mysql:host=localhost;dbname=reservations","root","");   //var_dump($pdo);

//Préparer la requete de la table spectacles
$query = "SELECT p.nom, p.prenom
FROM personnes AS p
INNER JOIN reservations AS r
    ON p.id = r.id_personne
INNER JOIN representations AS rep
    ON r.id_representation = rep.id
WHERE rep.id = 1";

//Envoyer
$stmt = $pdo->query($query);

//Extraire
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);         //var_dump($data);

//Libérer
$stmt->closeCursor();

//Déconnecter
$pdo = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Série 3 Ex 07</title>
</head>
<body>
    <h1>Personnes</h1>
    <table>
        <thead>
            <tr>
                <th>Personnes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $personne) : ?>
                <tr>
                    <th><?= $personne['nom'] ?></th>
                    <th><?= $personne['prenom'] ?></th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>