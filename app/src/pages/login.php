<html lang="fr">
<head>
    <title>Connexion</title>
    <?php require_once('../templates/meta.html'); ?>
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/form_login.css">
    <link rel="icon" href="../../svg/favicon.svg">
</head>
<body>
<main>
    <?php require_once('../templates/navbar.html'); ?>

    <section id="central">
        <h1>Connexion</h1>

        <p>
            <?php
            if (isset($_GET["error"])) {
                switch (htmlspecialchars($_GET["error"])) {
                    case "unset":
                        echo "Veuillez entrer un nom et un mot de passe pour vous connecter";
                        break;
                    case "incorrect":
                        echo "Le nom ou le mot de passe est incorrect !";
                        break;

                    default:
                        echo "Une erreur inconnue s'est produite durant la validation";;
                }
            } else {
                    echo "Authentifiez vous avec vos identifiants du domaine SIO.Fulbert";
                }
            ?>
        </p>

        <form action="../plugins/process_login.php" method="POST">
            <div class="equalizer">
                <label for="identifiant">
                    <input type="text" name="identifiant" placeholder="Identifiant" required>
                </label>
                <label for="password">
                    <input id="password" type="password" name="password" placeholder="Mot de Passe" required>
                    <span onclick="toggle_visibility()" class="field-icon toggle-password">
                        <img id="eye" src="../../img/eye2.png" alt="236">
                    </span>
                </label>
            </div>
            <div class="container">
                <input type="submit" value="Valider">
                <input type="reset" value="Annuler" accesskey="r">
            </div>
        </form>
    </section>
    <line>
</main>
</body>
<script src="../../js/eye.js"></script>
</html>