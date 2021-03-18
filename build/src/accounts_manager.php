<?php define('__TEMPLATES__', dirname(__FILE__) . '/../templates') ?>
<?php define('__PLUGINS__', dirname(__FILE__) . '/plugins') ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Gestionnaire de sessions</title>
        <?php require_once(__TEMPLATES__.'/meta.html'); ?>
        <link rel="stylesheet" href="../public/css/main.css">
        <link rel="icon" href="../public/svg/favicon.svg">
    </head>
    <body>
        <header>
            <?php require_once(__TEMPLATES__.'/navbar.html'); ?>
        </header>
        <main>

            <?php

                require_once (__PLUGINS__.'/connexion.php');

                $q_select = 'SELECT users.id AS id , users.login AS login, users.authentication_string AS mdp, 
                                    users.last_name AS nom, users.first_name AS prenom, A.type_name AS type 
                            FROM USERS INNER JOIN account_type A ON users.id_account_type = A.id';
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
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["login"] . "</td><td>" . $row["mdp"] . "</td><td>"
                        . $row["nom"] . "</td><td>" . $row["prenom"] . "</td><td>" . $row["type"] . "</td></tr>";
                }
                ?>
            </table>
        </main>
    </body>
</html>