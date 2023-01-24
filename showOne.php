<?php

    include './connection.php';
    // Récupération du paramètre GET
    $id = $_GET['id'];
    // $statement = $pdo->query("SELECT * FROM `mes_jeux` WHERE id = " . $id);
    $sql = "SELECT * FROM `mes_jeux` WHERE id = :id ";
    $statement = $pdo->prepare($sql);
    
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    
    $result = $statement->execute();
    // Récupère le résultat
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    // Affichage
    echo 'Mon jeu numéro : '. $result['id'];
    echo '<br>';
    echo 'Nom : ' . $result['nom'];
    echo '<br>';
    echo 'Sur console : '. $result['console'];
    echo '<br><br><a href="form_update.php?id='.$id.'">Modiffier joue</a><br>';
    echo '<br><br><a href="index.php">retour</a><br>';
   
    
?>