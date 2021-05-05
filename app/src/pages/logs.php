<?php
session_start();

if (empty($_SESSION)) {
    header('Location: ' . PAGES_ . 'login.php?error=unset');
    die();
} ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Gestionnaire de sessions</title>
    <?php require_once('../templates/meta.html'); ?>
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/table.css">
    <link rel="icon" href="../../svg/favicon.svg">
</head>
<body>
<header>
    <nav>
        <a class="clickable" id="nav" href="dashboard.php">
            <img src="../../svg/sio.svg" alt="236">
        </a>
    </nav>
</header>
<main>

    <?php
    require_once('../plugins/connexion.php');

    $q_select_logs = 'SELECT C.id AS ID_CO, 
        C.date_connection AS DATE, 
        C.time_connection AS TIME,
        C.id_user AS ID_USER,
        U.identifiant AS LOGIN,
        U.first_name AS PRENOM,
        U.last_name AS NOM,
        A.name as TYPE
    FROM connexions C
        INNER JOIN users U ON C.id_user = U.identifiant
        INNER JOIN account_types A ON U.id_account_type = A.id
    ORDER BY C.id;';
    ?>

    <table>
        <thead>
        <tr>
            <th>N°</th>
            <th>Date</th>
            <th>Heure</th>
            <th>ID</th>
            <th>Login</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Type</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $cursor = $connexion->prepare($q_select_logs);
        $cursor->execute();

        foreach ($cursor->fetchAll(PDO::FETCH_ASSOC) as $table_row) {
            echo '<tr>';
            foreach ($table_row as $value) {
                echo "<td>$value</td>";
            }
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

</main>
</body>
</html>
