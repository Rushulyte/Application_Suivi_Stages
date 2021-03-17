<?php define('__TEMPLATES__', dirname(__FILE__) . '/templates') ?>
<?php define('__PLUGINS__', dirname(__FILE__) . '/plugins') ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Gestionnaire de sessions</title>
        <?php require_once(__TEMPLATES__.'/meta.html'); ?>
        <link rel="stylesheet" href="css/main.css">
        <link rel="icon" href="svg/favicon.svg">
    </head>
    <body>
        <header>
            <?php require_once(__TEMPLATES__.'/navbar.html'); ?>
        </header>
        <main>

            <?php

                require_once (__PLUGINS__.'/connexion.php');

                $q_select = 'SELECT users.id_users AS id , users.last_name AS login, users.authentication_string AS mdp, users.last_name AS nom, users.first_name AS prenom, A.name AS type FROM USERS INNER JOIN account_types A ON A.id = users.account_type';
                ?>


            <table>
                <tr>
                    <td>ID</td>
                    <td>LOGIN</td>
                    <td>MDP</td>
                    <td>NOM</td>
                    <td>PRENOM</td>
                    <td>TYPE</td>
                </tr>
                <?php
                foreach($connexion -> query($q_select) as $row)
                {
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["login"] . "</td><td>" . $row["mdp"] . "</td><td>" . $row["nom"] . "</td><td>" . $row["prenom"] . "</td><td>" . $row["type"] . "</td></tr>";
                }
                ?>
            </table>
        </main>
    </body>
</html>