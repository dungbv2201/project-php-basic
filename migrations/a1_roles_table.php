<?php
function a1_roles_table_up($pdo){
	$success = false;
	try{
		$pdo->exec("CREATE TABLE IF NOT EXISTS roles (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            type int NOT NULL,
            name varchar(30) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;");
		$success = true;
	}catch(PDOException $e){
		echo "\e[31mError: " . $e->getMessage()."\e[0m";
	}
	return $success;
}
