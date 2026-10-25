<?php
// 6.	Marquer un spectacle comme réservable ou non
$message = "";
$nbUpdates = 0;

$pdo = new PDO("mysql:host=localhost;dbname=reservations","root","");

//Traitement des commandes
if(isset($_POST["btSave"])) {       var_dump($_POST);
    if(!empty($_POST["reservable"])) {
        $query = "UPDATE `spectacles` SET `reservable` = '1' WHERE id IN(";
        
        foreach($_POST["reservable"] as $id) {
            $id = $pdo->quote($id);

            $query .= "$id,";
        }

        $query = substr($query,0,-1);
        $query .= ")";      var_dump($query);

        $query2 = str_replace("IN","NOT IN",$query);
        $query2 = str_replace("'1'","'0'",$query2); var_dump($query2);

        $nbUpdates = $pdo->exec($query);
        $nbUpdates += $pdo->exec($query2);
    } else {
        $nbUpdates += $pdo->exec("UPDATE `spectacles` SET `reservable` = '0'");
    }

    $message = "$nbUpdates ligne(s) modifiée(s).";
}

//Lecture des données
$query = "SELECT * FROM spectacles";      //var_dump($query);

$stmt = $pdo->query($query);

$spectacles = $stmt->fetchAll(PDO::FETCH_ASSOC);   //var_dump($spectacles);
$fields = isset($spectacles[0]) ? array_keys($spectacles[0]) : [];   //var_dump($fields);//die;

$stmt->closeCursor();

$pdo = null;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB Access - Gestion des spectacles</title>
</head>
<body>
<h1>Marquer un spectacle comme réservable ou non</h1>
<?php if(!empty($spectacles)): ?>
<form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
    <table>
        <thead>
            <tr>
            <?php foreach($fields as $field): ?>
                <th><?= $field ?></th>
            <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
        <?php foreach($spectacles as $spectacle): ?>
            <tr>
            <?php foreach($spectacle as $key => $value): ?>
            <?php if($key!="reservable"): ?>
                <td><?= $value ?></td>
            <?php else: ?>
                <td><input type="checkbox" 
                    name="reservable[]" 
                    id="reservable-<?= $spectacle["id"] ?>" 
                    <?= $value===1 ? "checked":"" ?>
                    value="<?= $spectacle["id"] ?>"></td>
            <?php endif; ?>
            <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <button type="submit" name="btSave">Sauvegarder</button>
</form>
<?php else: ?>
    <p>Aucun spectacle.</p>
<?php endif; ?>

<p><?= $message ?></p>
</body>
</html>