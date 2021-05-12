<?php
session_start();

if (empty($_SESSION)) {
    header('Location: ' . PAGES_ . 'login.php?error=unset');
    die();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Partenaires</title>
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
    <h1>Nos Partenaires</h1>

    <?php
    if ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'prof') {
        echo '<form action="#" method="GET">
                <input type="submit" name="action" value="Ajouter">
                <input type="submit" name="action" value="Modifier">
                <input type="submit" name="action" value="Supprimer">
            </form>';
    }

    echo '<table>
            <tr>
                <th>Nom</th>
                <th>Contact</th>
                <th>Mail</th>
                <th>Tel</th>
                <th>Adresse</th>
            </tr>';


    $get_companies = 'select E.name as nom, 
                                 E.contact as contact,
                                 E.mail as mail,
                                 E.tel as tel,
                                 E.address as adresse
                          from entreprises E
                          order by E.name';

    include '../plugins/connexion.php';

    $cursor = $connexion->prepare($get_companies);
    $cursor->execute();

    foreach ($cursor->fetchAll(PDO::FETCH_ASSOC) as $table_row) {
        echo '<tr>';
        foreach ($table_row as $value) {
            echo "<td>$value</td>";
        }
        echo '</tr>';
    }

    if ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'prof') {
        echo '</tbody></table><form action="#" method="GET">
                    <input type="submit" name="action" value="Annuler">
                  </form>';

        switch ($_GET['action']) {
            case 'Annuler' :
                header('Location: partenaires.php');
                die();
                break;
            case 'Ajouter' :
                echo '<form action="crud_companies.php?action=Ajouter" method="POST">';
                break;
            case 'Modifier' :
                echo '<form action="crud_companies.php?action=Modifier" method="POST">';
                break;
            case 'Supprimer' :
                echo '<form action="crud_companies.php?action=Supprimer" method="POST">';
                break;
            default:
                die();
        }

        echo '<label>
                        <input type="text" name="nom" placeholder="Nom" required>
                    </label>
                    <label>
                        <input type="text" name="contact" placeholder="Contact">
                    </label>
                    <label>
                        <input type="text" name="mail" placeholder="Mail">
                    </label>
                    <label>
                        <input type="text" name="tel" placeholder="Tel">
                    </label>
                    <label>
                        <input type="text" name="adresse" placeholder="Adresse">
                    </label>
                    <input type="submit" name="validation" value="Valider">
                    <input type="reset" name="validation" value="Annuler">
                    </tbody>';
    } ?>
</main>
</body>
</html>
