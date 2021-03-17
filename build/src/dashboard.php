<?php define('__TEMPLATES__', dirname(__FILE__) . '/templates') ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Dashboard</title>
        <?php require_once(__TEMPLATES__.'/meta.html'); ?>
        <link rel="stylesheet" href="css/main.css">
        <link rel="icon" href="svg/favicon.svg">
    </head>
    <body>
        <header>
            <?php require_once(__TEMPLATES__.'/navbar_profile.html'); ?>
        </header>
        <main>
            <h1>Recherche de Stages en BTS SIO</h1>

        <h2>Partenaires</h2>

            <a href="partenaires.php">Nos partenaires</a>

        <h2>Contact</h2>

            <a href="https://www.facebook.com/BTS-SIO-Lyc%C3%A9e-Fulbert-668034059923781" target="_blank">
                <img class="icon" src="svg/facebook.svg" alt="-" height="16px">Facebook
            </a>

            <a href="mailto:ludovic.mery@ac-orleans-tours.fr">
                <img class="icon" src="svg/email.svg" alt="-" height="16px">Mail
            </a>

            <a href="https://www.lyceefulbert.fr/" target="_blank">
                <img class="icon" src="svg/education.svg" alt="-" height="16px">Lycée
            </a>
        </main>
    </body>
</html>







