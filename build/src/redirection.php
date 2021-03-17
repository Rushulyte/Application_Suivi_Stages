<?php
    define('__PLUGINS__', dirname(__FILE__) . '/plugins');
    require_once (__PLUGINS__.'/connexion.php');

    if (isset($_POST['login']) and isset($_POST['mdp'])) {

        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $hashed = hash("sha512", $mdp);

        $q_select = "SELECT users.authentication_string AS 'MDP', users.account_type AS 'TYPE' FROM USERS WHERE users.last_name = ?";
        $cur = $connexion -> prepare($q_select);
        $cur -> execute([$login]);

        $found = False;
        foreach ($cur -> fetchAll() as $row) {

            if ($hashed == $row["MDP"]){
                $found = True;

                if ($row["TYPE"] == 0) {
                    header("Location: accounts_manager.php");
                    die();

                } else if ($row["TYPE"] == 1){
                    header("Location: dashboard.php");
                    die();
                } else if ($row["TYPE"] == 2){
                    header("Location: dashboard.php");
                    die();
                } else {
                    header("Location: login.php?login=False");
                    die();

                }
            }
        }

        if (!$found) {
            header("Location: login.php?login=invalid");
            die();
        }
    }
    else {
        header("Location: login.php?login=false");
        die();

    }
