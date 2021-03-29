<?php
#define('TEMPLATES_', dirname(__FILE__) . '../templates');

session_start();

if (empty($_SESSION)) {
    header('Location: ' . PAGES_ . 'login.php?error=unset');
    die();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Partenaires</title>
    <?php require_once('../templates/meta.html'); ?>
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="icon" href="../../svg/favicon.svg">
</head>
<body>
<header>
    <nav>
        <a class="clickable" id="nav" href="dashboard.php">
            <img src="../../svg/sio.svg" alt="236">
        </a>
    </nav>
</header>
<main>
    <h1>Nos Partenaires</h1>
</main>
</body>
</html>
