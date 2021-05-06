<?php
if (empty($_POST)) {
    header('Location: account_manager.php?error=allEempty');
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

$select_user = '
        select identifiant as id
        from ass.users
        where identifiant = ?;
';

$add_user = '
        insert into ass.users(identifiant, first_name, last_name, authentication_string, id_account_type)
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
        where identifiant = ? and
              first_name = ? and
              last_name = ? and
              authentication_string = ? and
              id_account_type = ?;
';

$cursor = $connexion->prepare($select_user);
$cursor->bindValue(1, $identifiant);
$cursor->execute();
$array = $cursor->fetch(PDO::FETCH_ASSOC);

$test_id = False;

if ($array) {
    $test_id = True;
}

if ($_GET['action'] == 'Ajouter') {
    $cursor = $connexion->prepare($add_user);
    $cursor->bindValue(1, $identifiant);
    $cursor->bindValue(2, $first_name);
    $cursor->bindValue(3, $last_name);
    $cursor->bindValue(4, $pwd_hashed);
    $cursor->bindValue(5, $account_type);
    $cursor->execute();
    $array = $cursor->fetch(PDO::FETCH_ASSOC);
    print_r($array);
    echo $array;
}

if ($_GET['action'] == 'Modifier') {
    $cursor = $connexion->prepare($update_user);
    $cursor->bindValue(1, $first_name);
    $cursor->bindValue(2, $last_name);
    $cursor->bindValue(3, $pwd_hashed);
    $cursor->bindValue(4, $account_type);
    $cursor->bindValue(5, $identifiant);
    $cursor->execute();
    $array = $cursor->fetch(PDO::FETCH_ASSOC);
    print_r($array);
    echo $array;
}

if ($_GET['action'] == 'Supprimer') {
    $cursor = $connexion->prepare($delete_user);
    $cursor->bindValue(1, $identifiant);
    $cursor->bindValue(2, $first_name);
    $cursor->bindValue(3, $last_name);
    $cursor->bindValue(4, $pwd_hashed);
    $cursor->bindValue(5, $account_type);
    $cursor->execute();
    $array = $cursor->fetch(PDO::FETCH_ASSOC);
    print_r($array);
    echo $array;
}

header('Location: account_manager.php');
die();