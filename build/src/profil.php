<?php define('__TEMPLATES__', dirname(__FILE__) . '/templates') ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Profil</title>
        <?php require_once(__TEMPLATES__.'/meta.html'); ?>
        <link rel="stylesheet" href="css/main.css">
        <link rel="icon" href="svg/favicon.svg">
    </head>
    <body>
        <header>
            <?php require_once(__TEMPLATES__.'/navbar_profile.html'); ?>
        </header>
        <main>
            <a href="index.php">Se déconnecter</a>
        </main>
    </body>
</html>