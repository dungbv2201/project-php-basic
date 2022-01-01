<?php
function admins_table_up($pdo){
	$success = false;
	try{
		$pdo->exec("CREATE TABLE IF NOT EXISTS admins (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            first_name varchar(30) NOT NULL,
            last_name varchar(30) NOT NULL,
            email VARCHAR(50) NOT NULL,
            password varchar(255) NOT NULL,
            date_of_birth date,
            avatar varchar(255),
            address varchar(255),
    		role_id INT UNSIGNED,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			FOREIGN KEY (role_id) REFERENCES roles(id),
        	UNIQUE (email)
        ) ENGINE=INNODB;");
		$success = true;
	}catch(PDOException $e){
		echo "\e[31mError: " . $e->getMessage()."\e[0m";
	}
	return $success;
}
