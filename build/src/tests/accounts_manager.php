<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Gestionnaire de sessions</title>
        <?php require_once("../../templates/meta.html"); ?>
        <link rel="stylesheet" href="../../public/css/main.css">
        <link rel="icon" href="../../public/svg/favicon.svg">
    </head>
    <body>
    <header>
        <?php require_once("../../templates/navbar.html"); ?>
    </header>
    <main>
        <?php
        require_once("../plugins/connexion.php");

        $q_select = '
                    SELECT
                        U.id as id, 
                        U.login as login,
                        U.authentication_string as mdp,
                        U.last_name,
                        U.first_name as prenom,
                        A.type_name as type 
                    FROM users U
                        INNER JOIN account_type A on U.id_account_type = A.id;
                '; ?>

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
            $cur = $connexion->prepare($q_select);
            $cur -> execute();

            foreach ($cur->fetchAll(PDO::FETCH_ASSOC) as $row) {
                echo "<tr>";
                foreach ($row as $item) {
                    echo "<td>$item</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </main>
    </body>
</html>