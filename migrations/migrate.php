<?php

function runMigrations($pdo){
    createMigrationsTable($pdo);
    $appliedMigrations = getAppliedMigrations($pdo);
    $files = scandir(__DIR__.'/../migrations');
    $toApplyMigrations = array_diff($files, $appliedMigrations);
    $newMigrations = [];
    $migrateError = false;
    foreach ($toApplyMigrations as $migration){
        if($migration === '.' || $migration === '..'){
            continue;
        }
        $fileName = pathinfo($migration, PATHINFO_FILENAME);
        if($fileName !== 'migrate'){
            require_once __DIR__ . '/'.$migration;
            echo "\e[32mApplying migration " . $migration.PHP_EOL;
            $result = call_user_func($fileName."_up", $pdo);
            if($result){
                $newMigrations[] = $migration;
                echo "\e[32mApplied migration " . $migration.PHP_EOL;
            }else{
                $migrateError = true;
            }
        }
    }
    if(!empty($newMigrations)){
        saveMigrations($newMigrations, $pdo);
    }else if(!$migrateError){
        echo "\e[32mNothing to migrate! \n";
    }
}

function createMigrationsTable($pdo){
    $pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        migrations varchar(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=INNODB;");
}

function getAppliedMigrations($pdo){
    $statement = $pdo->prepare("SELECT migrations FROM migrations");
    $statement->execute();
    return $statement->fetchAll(\PDO::FETCH_COLUMN);
}

function saveMigrations($migrations, $pdo){
    $migrations = array_map(function($m){
        return "('$m')";
    }, $migrations);
    $migrations = implode(',',$migrations);
    $statement =  $pdo->prepare("INSERT INTO migrations (migrations) VALUES $migrations");
    $statement->execute();
}
