<?php

include "connection.php";

   
    $regexpNom = '<^[A-Za-z0-9\s]{2,45}$>';
    $regexpConsole = '<^[A-Za-z0-9\s]{2,20}>';
     $id = $_GET['id'];
    if (isset($_POST['ok1'])) {
        $nom = filter_input(INPUT_POST, 'nom');
        $nom = trim($nom);
        $nom = filter_var($nom, FILTER_VALIDATE_REGEXP,['options' => array('regexp' => $regexpNom)]);
        
        // var_dump($nom);
        $console = filter_input(INPUT_POST, 'console');
        $console = trim( $console);
        $console = filter_var($console,FILTER_VALIDATE_REGEXP, ['options' => array('regexp' =>  $regexpConsole)]);
       

        if (is_string($nom) & is_string($console)) {
            // $sql = "INSERT INTO mes_jeux (nom, console) VALUES ( :n, :c )";
            
            $sql ="UPDATE `mes_jeux` SET nom= :n, console= :c WHERE id = :id";
            $statement = $pdo->prepare($sql);
            // Correspondre les valeurs
            $statement->bindParam(':n', $nom, PDO::PARAM_STR);
            $statement->bindParam(':c', $console, PDO::PARAM_STR);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $result = $statement->execute();
            // var_dump($result);
            // echo $pdo->lastInsertId();
            // header('Location: form_insert.php');
            echo '<h1>Le jeu № '.$id.' a ete modiffier succes</h1>
            <p><a href="showOne.php?id='.$id.'">Retour</a></p>';
           
                exit;
        }else {
        header('Location: form_update.php?error=1');
        exit;
    }

}