<?php
// 6.	Marquer un spectacle comme réservable ou non

require "../../rb.php";

$message = "";
$nbUpdates = 0;

R::setup("mysql:host=localhost;dbname=reservations","root","");

//Traitement des commandes
if(isset($_POST["btSave"])) {       var_dump($_POST);
    if(!empty($_POST["reservable"])) {
        R::exec( 'UPDATE spectacles SET reservable=0' );

        foreach($_POST["reservable"] as $id) {
            $spectacleIds[] = $id;
        }

        $spectacles = R::find('spectacles',' id IN('.R::genSlots($spectacleIds).')',$spectacleIds);
        //var_dump($spectacles);die;
        
        $nbUpdates = 0;
        foreach($spectacles as $spectacle) {
            $spectacle->reservable = 1;

            R::store($spectacle);
            $nbUpdates++; //TODO Améliorer le calcul en faisant 2 requête comme en PDO
        }
    } else {
        $nbUpdates += R::exec( 'UPDATE spectacles SET reservable=0' );
    }

    $message = "$nbUpdates ligne(s) modifiée(s).";
}

//Lecture des données
$spectacles = R::findAll('spectacles');
$fields = R::getAll('SHOW COLUMNS FROM spectacles');
$fields = array_column($fields, 'Field'); //var_dump($fields);
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
        <?php foreach($spectacles as $spectacle): //var_dump($spec); ?>
            <tr>
            <?php foreach($spectacle as $key => $value): ?>
            <?php if($key!="reservable"): ?>
                <td><?= $value ?></td>
            <?php else: ?>
                <td><input type="checkbox" 
                    name="reservable[]" 
                    id="reservable-<?= $spectacle["id"] ?>" 
                    <?= $value==1 ? "checked":"" ?>
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