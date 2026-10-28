<?php
/**
 * 6.   Afficher les lieux qui n'ont pas de site web
 * 
 * @author Tristan
 * @version 1.0
 */

//Connecter
$pdo = new PDO("mysql:host=localhost;dbname=reservations","root","");   //var_dump($pdo);

//Préparer
$query = "SELECT designation, website FROM `lieux`";

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
    <title>Série 3 Ex 06</title>
</head>
<body>
    <h1>Image des spectacles</h1>
    <table>
        <thead>
            <tr>
                <th>Spectacles</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $field) : ?>
                
                <?php if(empty($field['website'])) : ?>
                    <tr>
                        <th><?= $field['designation'] ?></th>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>