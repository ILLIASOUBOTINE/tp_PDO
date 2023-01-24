<?php
   
  

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Jeux</title>
</head>

<body>
    <h1>Insertion d'un nouveau jeu</h1>
    <?php
        if(isset($_GET['error'])) {
            if ($_GET['error'] == '1') {
                echo '<h1>Error la formulair incorect</h1>';
            }
            
        }
    ?>
    <form action="insert.php" method="post">

        <label for="nom">Nom</label>
        <input id="nom" type="text" name="nom" size="45" maxlength="45" />
        <br>
        <label for="console">Nom de la console</label>
        <input id="console" type="text" name="console" size="45" maxlength="20" />
        <br>
        <input type="submit" name="ok" value="Ok" />


    </form>
    <br><br><a href="index.php?">retour</a><br>
    <?php
    

?>
</body>

</html>