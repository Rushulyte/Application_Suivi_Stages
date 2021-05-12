<?php
session_start();

if (empty($_POST)) {
    header('Location: partenaires.php?error=allEmpty');
    die();
}

if (!isset($_POST['ID'])) {
    header('Location: partenaires.php?error=idEmpty');
    echo '#error# : ' . $_GET['error'];
}

$id = $_POST['ID'];
$nom = $_POST['nom'];
$contact = $_POST['contact'];
$mail = $_POST['mail'];
$tel = $_POST['tel'];
$adresse = $_POST['adresse'];

include '../plugins/connexion.php';

$add_companies = 'insert into ass.entreprises(name, contact, mail, tel, address)
                  values (?, ? ,?, ?, ?);';

$update_companies = '
        update ass.entreprises
        set contact = ?,
            mail = ?,
            tel = ?,
            address = ?
        where name = ?;
        ';

$delete_companies = '
        delete
        from ass.entreprises
        where name = ?;
';

$properties_add = [$nom, $contact, $mail, $tel, $adresse];
$properties_update = [$contact, $mail, $tel, $adresse, $nom];
$properties_delete = [$nom];

function action($connect, $query, $parameters)
{
    $cursor = $connect->prepare($query);
    $index = 1;
    foreach ($parameters as $parameter) {
        $cursor->bindValue($index, $parameter);
        $index += 1;
    }
    $cursor->execute();
    $cursor->fetch(PDO::FETCH_ASSOC);
}

switch ($_GET['action']) {
    case 'Ajouter':
        action($connexion, $add_companies, $properties_add);
        break;
    case 'Modifier':
        action($connexion, $update_companies, $properties_update);
        break;
    case 'Supprimer':
        action($connexion, $delete_companies, $properties_delete);
        break;
    default:
        header('Location: account_manager.php?error=action');
        die();
}

header('Location: partenaires.php');
die();