<?php
// require ('controlleurs/security.php');

// URL = http://localhost:8000/URI
// URI = controller=nom_controlleur&view=nom_page
if (isset($_REQUEST['controller'])) {
    if ($_REQUEST['controller'] == 'security') {
        require_once (ROUTE_DIR.'controlleurs/security.php');
    } elseif ($_REQUEST['controller'] == 'admin') {
        require_once (ROUTE_DIR.'controlleurs/admin.php');
    } elseif ($_REQUEST['controller'] == 'joueur') {
        require_once (ROUTE_DIR.'controlleurs/joueur.php');
    } else {
        require_once (ROUTE_DIR.'views/security/connexion.html.php');
    }
} else {
    require_once (ROUTE_DIR.'views/security/connexion.html.php');
}
?>