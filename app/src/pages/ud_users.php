<?php
if (empty($_POST)) {
    header('Location: account_manager.php?error=allEmpty');
    die();
}

if (!isset($_POST['ID'])) {
    header('Location: account_manager.php?error=idEmpty');
    echo '#error# : ' . $_GET['error'];
}

$id = $_POST['ID'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mdp = hash('sha512', $_POST['mdp']);

switch ($_POST['type']) {
    case 'admin':
        $type = 1;
        break;
    case 'prof':
        $type = 2;
        break;
    default:
        $type = 3;
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

$properties = [$prenom, $nom, $mdp, $type, $id];

function action($connect, $query, $parameters) {
    $cursor = $connect->prepare($query);
    $index = 1;
    foreach ($parameters as $parameter) {
        $cursor->bindValue($index, $parameter);
        $index += 1;
    }
    $cursor->execute();
    $cursor->fetch(PDO::FETCH_ASSOC);
}

if ($_GET['action'] == 'Ajouter') {
    action($connexion, $add_user, $properties);
}

if ($_GET['action'] == 'Modifier') {
    action($connexion, $update_user, $properties);
}

if ($_GET['action'] == 'Supprimer') {
    action($connexion, $delete_user, $properties);
}

header('Location: account_manager.php');
die();