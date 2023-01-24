<?php
include 'connection.php';
$id = $_GET['id'];
$statement = $pdo->query("SELECT * FROM `mes_jeux` WHERE id = ". $id); //
//pas bien, il faut préparer !!!
// Récupère le résultat
$jeu = $statement->fetch(PDO::FETCH_ASSOC);
$nom = $jeu['nom'];
$console = $jeu['console'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Jeux</title>
</head>

<body>
    <h1>Modiffier d'un nouveau jeu</h1>
    <?php
        if(isset($_GET['error'])) {
            if ($_GET['error'] == '1') {
                echo '<h1>Error la formulair incorect</h1>';
            }
            
        }
    ?>
    <form action="update.php?id=<?=$id?>" method="post">

        <label for="nom">Nom</label>
        <input id="nom" type="text" name="nom" value="<?= $nom?>" size="45" maxlength="45" />
        <br>
        <label for="console">Nom de la console</label>
        <input id="console" type="text" name="console" value="<?= $console?>" size="45" maxlength="20" />
        <br>
        <input type="submit" name="ok1" value="Ok" />


    </form>

    <br><br>
    <a href="showOne.php?id=<?=$id?>">retour</a>
    <br>
</body>

</html>