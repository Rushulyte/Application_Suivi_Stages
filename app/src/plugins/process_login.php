<?php
define('PAGES_', '../pages/');

include 'connexion.php';

if ((!isset($_POST['identifiant'])) or (!isset($_POST['password']))) {
    header('Location: ' . PAGES_ . 'login.php?error=unset');
    die();
}

$identifiant = htmlspecialchars($_POST['identifiant']);
$password = htmlspecialchars($_POST['password']);

if (empty($identifiant) || empty($password)) {
    header('Location: ' . PAGES_ . 'login.php?error=empty');
    die();
}

$query_hash = "
   select U.identifiant as 'id',
          U.first_name as 'first',
          U.last_name as 'last',
          U.authentication_string as 'password', 
          U.id_account_type as 'type' ,
          A.name as type 
   
   from ass.users U 
       INNER JOIN account_types A on U.id_account_type = A.id
   
   where U.identifiant = ?;
";

$cursor = $connexion->prepare($query_hash);
$cursor->bindValue(1, $identifiant);
$cursor->execute();
$array = $cursor->fetch(PDO::FETCH_ASSOC);

if (empty($array)) {
    header('Location: ' . PAGES_ . 'login.php?error=incorrect');
    die();
}

if ($array['password'] !== hash('sha512', $password)) {
    header('Location: ' . PAGES_ . 'login.php?error=incorrect');
    die();
}

session_start();
$_SESSION['id'] = $array['id'];
$_SESSION['first'] = $array['first'];
$_SESSION['last'] = $array['last'];
$_SESSION['type'] = $array['type'];

header('Location: ' . PAGES_ . 'dashboard.php');
die();