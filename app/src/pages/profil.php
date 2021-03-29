<?php
session_start();

if (empty($_SESSION)) {
    header('Location: ' . PAGES_ . 'login.php?error=unset');
    die();
}

if (!isset($_SESSION['first']) || !isset($_SESSION['last']) || !isset($_SESSION['type'])) {
    header('Location: login.php?error=unset');
    die();
}

#define('TEMPLATES_', dirname(__FILE__) . '../templates'); ?>
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
    <h2>Prénom</h2>
    <p> <?php echo $_SESSION['first']; ?> </p>
    <h2>Nom</h2>
    <p> <?php echo $_SESSION['last']; ?> </p>
    <h2>Type</h2>
    <p> <?php echo $_SESSION['type']; ?> </p>
    <a href="../plugins/logout.php" title="Logout">Logout</a>
</main>
</body>
</html>

