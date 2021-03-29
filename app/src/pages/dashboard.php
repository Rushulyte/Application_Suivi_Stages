<?php
define('PAGES_', '../pages/');
session_start();
?>

<?php
if (empty($_SESSION)) {
    header('Location: ' . PAGES_ . 'login.php?error=unset');
    die();
}
?>

<?php define('__TEMPLATES__', dirname(__FILE__) . '../templates/') ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Dashboard</title>
    <?php require_once('../templates/meta.html'); ?>
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="icon" href="../../svg/favicon.svg">
</head>
<body>
<header>
    <nav>
        <a class="clickable" id="nav" href="#">
            <img src="../../svg/sio.svg" alt="236">
        </a>
        <a href="profil.php">Profil</a>
        <?php if ($_SESSION['type'] == 'admin') {
            ?>
            <a href="account_manager.php">Gestionnaire de comptes</a>
            <a href="logs.php">Logs</a>
        <?php } ?>
    </nav>
</header>
<main>
    <h1>Recherche de Stages en BTS SIO</h1>

    <h2>Partenaires</h2>

    <a href="partenaires.php">Nos partenaires</a>

    <h2>Contact</h2>

    <a href="https://www.facebook.com/BTS-SIO-Lyc%C3%A9e-Fulbert-668034059923781" target="_blank">
        <img class="icon" src="../../svg/facebook.svg" alt="-" height="16px">Facebook
    </a>

    <a href="mailto:ludovic.mery@ac-orleans-tours.fr">
        <img class="icon" src="../../svg/email.svg" alt="-" height="16px">Mail
    </a>

    <a href="https://www.lyceefulbert.fr/" target="_blank">
        <img class="icon" src="../../svg/education.svg" alt="-" height="16px">Lycée
    </a>
</main>
</body>
</html>
