<?php
   
$dsn = "mysql:host=localhost:3360;dbname=ma_collection_jeux;charset=utf8";
$username = "root"; //A changer si besoin
$password = '';
$pdo = new PDO($dsn, $username, $password, array(PDO::ATTR_PERSISTENT =>TRUE));

?>