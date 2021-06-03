<?php
if (isset($_SESSION['arrayError'])) {
    $arrayError = $_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}
require_once (ROUTE_DIR.'views/inc/header.inc.html.php');
?>
      <div class="container mt-5">
        <div class="row mt-5">
          <div class="col-xs-8 col-md-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title text-center">Formulaire de connexion</h3>
                <p class="card-text">
                <?php if (isset($arrayError['erreurConnexion'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <strong><?=isset($arrayError['erreurConnexion']) ? $arrayError['erreurConnexion'] : '' ?></strong>
                    </div>
                <?php endif; ?>
                    <form method="POST" action="<?= WEB_ROUTE ?>">
                    <input type="hidden" name="controller" value="security" />
                    <input type="hidden" name="action" value="connexion" />
                        <div class="form-group">
                            <label >Login</label>
                            <input type="text" class="form-control" name="login">
                            <small class="form-text text-danger"><?=isset($arrayError['login']) ? $arrayError['login'] : '' ?></small>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                            <small class="form-text text-danger"><?=isset($arrayError['password']) ? $arrayError['password'] : '' ?></small>
                        </div>
                        <button type="submit" name="btn_submit" value="btn_connexion" class="btn btn-primary">Connexion</button>
                    </form>
                    <div class="row">
                        <div class="col-md-3 offset-md-9">
                            <a href="<?=WEB_ROUTE.'?controller=security&view=inscription'?>">S'inscrire en tant que joueur</a>
                        </div>
                    </div>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php require_once (ROUTE_DIR.'views/inc/footer.inc.html.php'); ?>