<?php
if (empty($_POST)) {
    header('Location: account_manager.php?error=allEmpty');
    die();
}

if (!isset($_POST['ID'])) {
    header('Location: account_manager.php?error=idEmpty');
    echo '#error# : ' . $_GET['error'];
}

$identifiant = $_POST['ID'];
$last_name = $_POST['nom'];
$first_name = $_POST['prenom'];
$pwd_hashed = hash('sha512', $_POST['mdp']);

switch ($_POST['type']) {
    case 'admin':
        $account_type = 1;
        break;
    case 'prof':
        $account_type = 2;
        break;
    default:
        $account_type = 3;
        break;
}

include '../plugins/connexion.php';

$add_user = '
        insert into ass.users(first_name, last_name, authentication_string, id_account_type, identifiant)
        values (?, ?, ? ,?, ?);
    ';

$update_user = '
        update ass.users
        set first_name = ?,
            last_name = ?,
            authentication_string = ?,
            id_account_type = ?
        where identifiant = ?;
        ';

$delete_user = '
        delete
        from ass.users
        where first_name = ? and
              last_name = ? and
              authentication_string = ? and
              id_account_type = ? and
              identifiant = ?;
';

if ($_GET['action'] == 'Ajouter') {
    $cursor = $connexion->prepare($add_user);
    $cursor->bindValue(1, $first_name);
    $cursor->bindValue(2, $last_name);
    $cursor->bindValue(3, $pwd_hashed);
    $cursor->bindValue(4, $account_type);
    $cursor->bindValue(5, $identifiant);
    $cursor->execute();
    $cursor->fetch(PDO::FETCH_ASSOC);
}

if ($_GET['action'] == 'Modifier') {
    $cursor = $connexion->prepare($update_user);
    $cursor->bindValue(1, $first_name);
    $cursor->bindValue(2, $last_name);
    $cursor->bindValue(3, $pwd_hashed);
    $cursor->bindValue(4, $account_type);
    $cursor->bindValue(5, $identifiant);
    $cursor->execute();
    $cursor->fetch(PDO::FETCH_ASSOC);
}

if ($_GET['action'] == 'Supprimer') {
    $cursor = $connexion->prepare($delete_user);
    $cursor->bindValue(1, $first_name);
    $cursor->bindValue(2, $last_name);
    $cursor->bindValue(3, $pwd_hashed);
    $cursor->bindValue(4, $account_type);
    $cursor->bindValue(5, $identifiant);
    $cursor->execute();
    $cursor->fetch(PDO::FETCH_ASSOC);
}

header('Location: account_manager.php');
die();