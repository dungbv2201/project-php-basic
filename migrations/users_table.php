<?php
function users_table_up($pdo){
    $success = false;
    try{
        $pdo->exec("CREATE TABLE IF NOT EXISTS users (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            first_name varchar(30) NOT NULL,
            last_name varchar(30) NOT NULL,
            email VARCHAR(50) NOT NULL,
            password varchar(255) NOT NULL,
            date_of_birth date,
            avatar varchar(255),
            address varchar(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;");
        $success = true;
    }catch(PDOException $e){
        echo "\e[31mError: " . $e->getMessage()."\e[0m";
    }
    return $success;
}
