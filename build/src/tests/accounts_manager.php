<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Gestionnaire de sessions</title>
    <?php require_once("../../templates/meta.html"); ?>
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="../../public/css/table.css">
    <link rel="icon" href="../../public/svg/favicon.svg">
</head>
<body>
<main>
    <?php
    require_once("../plugins/connexion.php");

    $q_select = '
                    SELECT
                        U.id as id, 
                        U.login as login,
                        U.last_name,
                        U.first_name as prenom,
                        A.type_name as type 
                    FROM users U
                        INNER JOIN account_type A on U.id_account_type = A.id;
                '; ?>

    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>login</th>
            <th>nom</th>
            <th>prénom</th>
            <th>type</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $cursor = $connexion->prepare($q_select);
        $cursor->execute();

        foreach ($cursor->fetchAll(PDO::FETCH_ASSOC) as $table_row) {
            echo "<tr>";
            foreach ($table_row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</main>
</body>
</html>