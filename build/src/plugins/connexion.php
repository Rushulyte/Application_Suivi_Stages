<?php
$user = 'app';
$pass = file_get_contents('../../keys/db/app.key');
$connexion = new PDO('mysql:host=127.0.0.1;dbname=ass', $user, $pass);
