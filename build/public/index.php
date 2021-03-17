<?php define('__TEMPLATES__', dirname(__FILE__) . '/../templates') ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Application de Suivi de Stage</title>
        <?php require_once(__TEMPLATES__.'/meta.html'); ?>
        <link rel="stylesheet" href="css/main.css">
        <link rel="icon" href="svg/favicon.svg">
    </head>
    <body>
        <div id="particles-js"></div>
        <main>
            <a id="nav">
                <img src="svg/sio.svg" alt="236">
            </a>

            <section id="central">
                <div>
                    <h1>Suivi de Stages</h1>
                    <a id="button" href="../src/login.php">Se connecter</a>
                </div>
            </section>

            <section id="links">
                <section>
                    <img src="svg/education.svg" alt="236">
                    <a target="_blank" href="https://www.lyceefulbert.fr/">
                        Lycée
                    </a>
                </section>
                <section>
                    <img src="svg/email.svg" alt="236">
                    <a target="_blank" href="mailto:ludovic.mery@ac-orleans-tours.fr">
                        Mail
                    </a>
                </section>
                <section>
                    <img src="svg/facebook.svg" alt="236">
                    <a target="_blank" href="https://www.facebook.com/BTS-SIO-Lyc%C3%A9e-Fulbert-668034059923781">
                        Facebook
                    </a>
                </section>
            </section>
        </main>
        <?php require_once(__TEMPLATES__.'/footer.html'); ?>
    </body>
    <script src="js/particles.min.js"></script>
    <script src="js/app.js"></script>
</html>
