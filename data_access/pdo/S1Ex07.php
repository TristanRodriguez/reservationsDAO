<?php
/**
 * 7.	Afficher la personne qui s'appelle Hirogawa
 * 
 * @author Cedric
 * @version 1.0
 */

$data = [];
var_dump($_GET);
if(isset($_GET["btSearch"])) {
    $pdo = new PDO("mysql:host=localhost;dbname=reservations","root","");

    $nom = $pdo->quote($_GET["nom"]);

    $query = "SELECT * FROM personnes WHERE nom=$nom";      //var_dump($query);
    
    $stmt = $pdo->query($query);

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt->closeCursor();

    $pdo = null;
}
var_dump($data);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB Access - Série 1 Ex 07</title>
</head>
<body>
<h1>Afficher la personne qui s'appelle Hirogawa</h1>

<?php if(!empty($data)): ?>
    <table>
    <?php foreach($data as $key => $value): ?>
        <tr>
            <th><?= $key ?></th>
            <td><?= $value ?></td>
        </tr>
    <?php endforeach; ?>    
    </table>
<?php else: ?>
    <p>Aucune donnée à afficher.</p>
<?php endif; ?>

<form action="<?= $_SERVER["PHP_SELF"] ?>" method="get">
    <div>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">
        <button type="submit" name="btSearch">Rechercher</button>
    </div>
</form>
</body>
</html>