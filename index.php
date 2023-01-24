<?php
    include "connection.php";
    // Utilise la méthode query afin de récupérer un PDOStatement
    $statement = $pdo->query("SELECT * FROM `mes_jeux`");
    // Récupère le résultat
    //façons d'obtenir un objet:
    //crée par défaut un objet de classe stdClass
    // $result = $statement->fetchAll(PDO::FETCH_OBJ);
    // $result = $statement->fetchObject();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    // $result = $statement->fetchObject();
    // var_dump($result);

    
    // pour afficher la liste de tous les jeux, sous forme d’un liste
    function affichResult($result){
        echo 'Ma liste de jeux videos: <br>';
        foreach ($result as $key => $value) {
          echo "- {$value['nom']} sur la console {$value['console']} {$value['id']}<br>" ;
        }
    }
// affichResult($result);


// pour afficher la liste de tous les jeux, sous forme d’un liste avec des lien

function affichResultAvecLien($result){
  echo 'Ma liste de jeux videos: <br>';
  foreach ($result as $key => $value) {
    echo "- {$value['nom']} sur la console {$value['console']}<br>";
    echo '<a href="showOne.php?id='.$value['id'].'">Voir ce jeu en détail</a><br>';
    // echo '<a href="delete.php?id='.$value['id'].'">Supprimer</a>';
  }
}

affichResultAvecLien($result);



// pour afficher la liste de tous les jeux, sous forme d’un liste avec des lien supprime

foreach ($result as $row) {
    ?>
<p><?= $row['nom'] ?> -
    <a href="delete.php?id=<?= $row['id'] ?>">Supprimer</a>
</p>
<?php
  }
  

//Faire une requête avec paramètre
// $nom = 'Skyrim';
// $console = 'ps4';
// $sql = "INSERT INTO `mes_jeux` ( `nom`, `console` )VALUES (' ". $nom . " ', ' ". $console . "' );";
// //echo $sql . "<br>";
// $statement = $pdo->query($sql);



// Mes variables récupérer en GET ou POST
// $sql = " INSERT INTO mes_jeux ( nom, console ) VALUES ( ?, ?)”;
//$statement->bindParam( 1 , $nom);
//$statement->bindParam( 2 , $console);
//$statement->bind( 1 , $nom , PDO::PARAM_STR);

// $nom = 'Skyrim3';
// $console = 'ps4';
// // Préparation
// $sql = " INSERT INTO mes_jeux ( nom, console ) VALUES ( :n, :c )";

// $statement = $pdo->prepare($sql);
// // Correspondre les valeurs
// $statement->bindParam(':n', $nom, PDO::PARAM_STR);
// $statement->bindParam(':c', $console, PDO::PARAM_STR);
// $result = $statement->execute();
// var_dump($result);
// echo $pdo->lastInsertId();


echo '<br><br><a href="form_insert.php">Ceer noveux joue</a><br>';

?>