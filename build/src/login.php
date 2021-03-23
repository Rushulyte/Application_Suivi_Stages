<html lang="fr">
<head>
    <title>Connexion</title>
    <?php require_once('../templates/meta.html'); ?>
    <link rel="stylesheet" href="../public/css/main.css">
    <link rel="stylesheet" href="../public/css/form_login.css">
    <link rel="icon" href="../public/svg/favicon.svg">
</head>
<body>
<main>
    <?php require_once('../templates/navbar.html'); ?>

    <section id="central">
        <h1>Connexion</h1>

        <p><?php
            if (isset($_GET["login"])) {
                $issue = $_GET["login"];

                if ($issue == "false")
                    echo "Veuillez entrer un nom et un mot de passe pour vous connecter";
                elseif ($issue == "invalid")
                    echo "Le nom ou le mot de passe est incorrect !";
                else
                    echo "Une erreur inconnue s'est produite durant la validation";
            } else
                echo "Authentifiez vous avec vos identifiants du domaine SIO.Fulbert";
            ?>
        </p>

        <form action="tests/redirection.php" method="POST">
            <div class="equalizer">
                <label for="id">
                    <input type="text" name="login" placeholder="Identifiant" required>
                </label>
                <label for="mdp">
                    <input type="password" name="mdp" placeholder="Mot de Passe" required>
                </label>
            </div>
            <div class="container">
                <input type="submit" value="Valider">
                <input type="reset" value="Annuler" accesskey="r">
            </div>
        </form>
    </section>
</main>
</body>
</html>