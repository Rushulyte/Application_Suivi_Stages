<?php define('__TEMPLATES__', dirname(__FILE__) . '/../templates') ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Profil</title>
        <?php require_once(__TEMPLATES__.'/meta.html'); ?>
        <link rel="stylesheet" href="../public/css/main.css">
        <link rel="icon" href="../public/svg/favicon.svg">
    </head>
    <body>
        <header>
            <?php require_once(__TEMPLATES__.'/navbar_profile.html'); ?>
        </header>
        <main>
            <a href="../public/index.php">Se déconnecter</a>
        </main>
    </body>
</html>