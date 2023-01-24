<?php

include "connection.php";

$id = $_GET['id'];
     
$sql ="DELETE FROM mes_jeux  WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$result = $statement->execute();
// var_dump($result);
// echo $pdo->lastInsertId();
            
echo '<h1>Le jeu № '.$id.' a ete suprimee succes</h1>
<p><a href="index.php">Retour</a></p>';
           