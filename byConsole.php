<?php
    include "connection.php";

    // $statement = $pdo->query("SELECT Distinct `console` FROM `mes_jeux` ORDER BY `console`");
    $sql = "SELECT Distinct `console` FROM `mes_jeux` ORDER BY `console`";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    // $statement = $pdo->query("SELECT Distinct `console` FROM `mes_jeux`"); 
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
   

    function affichResultByConsole($result){
        echo 'Ma liste de jeux videos by console: <br>';
        echo '<a href="byConsole.php?console=all">Voir tous les jeux</a><br>';
        foreach ($result as $key => $value) {
            echo '<a href="byConsole.php?console='.$value['console'].'">Voir tous les jeux '.$value['console'].'</a><br>';
        }
    }

   affichResultByConsole($result);