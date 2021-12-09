<?php
function getConfigDb(){
    return [
        'host' => $_ENV['DB_HOST'],
        'port' => $_ENV['DB_PORT'],
        'db_name' => $_ENV['DB_NAME'],
        'username'=> $_ENV['DB_USER_NAME'],
        'password' => $_ENV['DB_PASSWORD']
    ];
}
