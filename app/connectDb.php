<?php
require_once __DIR__.'/../config.php';

function connectDb(){
    $config = getConfigDb();
    $servername = $config['host'];
    $username = $config['username'];
    $password = $config['password'];
    $dbName = $config['db_name'];
    $connect = null;
    try {
        $connect = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $connect;
}

function findOne($pdo,$query){
   $statement = $pdo->prepare($query);
   $statement->execute();
   return $statement->fetch(\PDO::FETCH_OBJ);
}
