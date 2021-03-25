<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Application de Suivi de Stage</title>
        <?php require_once('../templates/meta.html'); ?>
        <link rel="stylesheet" href="../../css/main.css">
        <link rel="icon" href="../../svg/favicon.svg">
    </head>
    <body>
        <div id="particles-js"></div>

        <main>
            <?php require_once('../templates/navbar.html'); ?>

            <section id="central">
                <div class="gap">
                    <h1>Suivi de Stages</h1>
                    <a class="clickable" id="button" href="login.php">Se connecter</a>
                </div>

            </section>
            <?php require_once('../templates/external_links.html'); ?>
        </main>
        <div class="hidden_info">
            <h2>Développé par</h2>
            <section class="dev_wrapper">
                <section class="dev_inner">
                    <section class="dev_info">
                        <h3>Boniface Yohann</h3>
                        <h4>CSS, Php, & SQL - Design</h4>
                    </section>
                    <img src="../../svg/edhyjox.svg" alt="236">
                </section>
                <section class="dev_inner">
                    <img src="../../svg/reyks.svg" alt="236">
                    <section class="dev_info">
                        <h3>Betsch Victor</h3>
                        <h4>HTML, Php & SQL - Concept</h4>
                    </section>
                </section>
            </section>
        </div>
    </body>
    <script src="../../js/particles.min.js"></script>
    <script src="../../js/app.js"></script>
</html>
