<?php

include "connection.php";

   
    $regexpNom = '<^[A-Za-z0-9\s]{2,45}$>';
    $regexpConsole = '<^[A-Za-z0-9\s]{2,20}>';
    // $options = array(
    //     'options' => array('regexp' => $regexp)
    // );
    if (isset($_POST['ok'])) {
        // $nom = filter_input(INPUT_POST, 'nom', FILTER_VALIDATE_REGEXP,['options' => array('regexp' => $regexpNom)]);
        // // var_dump($nom);
        // $console = filter_input(INPUT_POST,'console',FILTER_VALIDATE_REGEXP, ['options' => array('regexp' =>  $regexpConsole)]);
        $nom = filter_input(INPUT_POST, 'nom');
        $nom = trim($nom);
        $nom = filter_var($nom, FILTER_VALIDATE_REGEXP,['options' => array('regexp' => $regexpNom)]);
        
        // var_dump($nom);
        $console = filter_input(INPUT_POST, 'console');
        $console = trim( $console);
        $console = filter_var($console,FILTER_VALIDATE_REGEXP, ['options' => array('regexp' =>  $regexpConsole)]);
       
        if (is_string($nom) & is_string($console)) {
            $sql = "INSERT INTO mes_jeux (nom, console) VALUES ( :n, :c )";
        
            $statement = $pdo->prepare($sql);
            // Correspondre les valeurs
            $statement->bindParam(':n', $nom, PDO::PARAM_STR);
            $statement->bindParam(':c', $console, PDO::PARAM_STR);
            $result = $statement->execute();
            // var_dump($result);
            // echo $pdo->lastInsertId();
            // header('Location: form_insert.php');
            echo '<h1>Le jeu № '.$pdo->lastInsertId().' a ete cree avec succes</h1>
            <p><a href="index.php">Retour</a></p>';
        }else {
            header('Location: form_insert.php?error=1');
            exit();
        }
        
        
        
    }
    
     

   