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
              last_name = ?;
';

$properties_add = [$id, $prenom, $nom, $mdp, $type];
$properties_update = [$prenom, $nom, $mdp, $type, $id];
$properties_delete = [$id, $prenom, $nom];

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
        action($connexion, $add_user, $properties_add);
        break;
    case 'Modifier':
        action($connexion, $update_user, $properties_update);
        break;
    case 'Supprimer':
        action($connexion, $delete_user, $properties_delete);
        break;
    default:
        header('Location: account_manager.php?error=action');
        die();
}

header('Location: account_manager.php');
die();