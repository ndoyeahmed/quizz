<?php

if (!est_admin()) header("location:".WEB_ROUTE.'?controller=security&view=connexion');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == 'liste.question') {
            require_once (ROUTE_DIR.'views/admin/liste.question.html.php');
        }
    } else {
        require_once (ROUTE_DIR.'views/security/connexion.html.php');
    }
}
?>