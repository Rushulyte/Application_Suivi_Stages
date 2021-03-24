<?php

try {
    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    $connexion = new PDO(
        'mysql:host=127.0.0.1;dbname=ass', 'app',
        file_get_contents('../../../keys/db/app.key'),
        $options
    );

}
catch (PDOException $error) {
    echo 'Erreur : '.$error->getMessage();
}
