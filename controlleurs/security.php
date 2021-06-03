<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == 'connexion') {
            require_once (ROUTE_DIR.'views/security/connexion.html.php');
        } elseif ($_GET['view'] == 'inscription') {
            require_once (ROUTE_DIR.'views/security/inscription.html.php');
        } elseif ($_GET['view'] == 'deconnexion') {
            deconnexion();
            require_once (ROUTE_DIR.'views/security/connexion.html.php');
        }
    } else {
        require_once (ROUTE_DIR.'views/security/connexion.html.php');
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'connexion') {
            connexion($_POST['login'], $_POST['password']);
        } elseif ($_POST['action'] == 'inscription') {
            unset($_POST['controller']);
            unset($_POST['action']);
            unset($_POST['btn_submit']);
            inscription($_POST);
        }
    }
}

function connexion(string $login, string $password): void {
    $arrayError = [];
    validation_login($login, 'login', $arrayError);
    validation_password($password, 'password', $arrayError);
    if (form_valid($arrayError)) {
        // appel du model
        $user = find_login_password($login, $password);
        if (count($user) == 0) {
            $arrayError['erreurConnexion'] = "login ou password incorrect";
            $_SESSION['arrayError'] = $arrayError;
            header('location:'.WEB_ROUTE.'?controller=security&view=connexion');
        } else {
            $_SESSION['userConnect'] = $user;
            if ($user['role'] == 'ROLE_ADMIN') {
                header('location:'.WEB_ROUTE.'?controller=admin&view=liste.question');
            } elseif ($user['role'] == 'ROLE_JOUEUR') {
                header('location:'.WEB_ROUTE.'?controller=joueur&view=jeu');
            }
        }
    } else {
        $_SESSION['arrayError'] = $arrayError;
        header('location:'.WEB_ROUTE.'?controller=security&view=connexion');
    }
}

function inscription(array $data): void {
    $arrayError = [];
    extract($data);
    validation_login($login, 'login', $arrayError);
    validation_password($password, 'password', $arrayError);
    validation_champ($prenom, 'prenom', $arrayError);
    validation_champ($nom, 'nom', $arrayError);
    validation_champ($datenaiss, 'datenaiss', $arrayError);
    if ($password != $confirmpassword) {
        $arrayError['confirmpassword'] = "Les deux password ne sont pas identique";
    }

    if (form_valid($arrayError)) {

    } else {
        $_SESSION['arrayError'] = $arrayError;
        header('location:'.WEB_ROUTE.'?controller=security&view=inscription');
    }
}

function deconnexion(): void {
    unset($_SESSION['userConnect']);
}

?>