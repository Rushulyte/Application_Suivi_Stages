<?php
    $user = 'app';
    $pass = file_get_contents('../../keys/app.key');

    try {
        $connexion = new PDO('mysql:host=127.0.0.1:3308;dbname=ass', $user, $pass);
    } catch (Exception $e) {
        echo "ERREUR:<br/>".$e->getMessage();
    }