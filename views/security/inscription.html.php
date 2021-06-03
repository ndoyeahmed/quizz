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
                <h3 class="card-title text-center">Formulaire Inscription</h3>
                <p class="card-text">
                <?php if (isset($arrayError['erreurConnexion'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <strong><?=isset($arrayError['erreurConnexion']) ? $arrayError['erreurConnexion'] : '' ?></strong>
                    </div>
                <?php endif; ?>
                    <form method="POST" action="<?= WEB_ROUTE ?>">
                    <input type="hidden" name="controller" value="security" />
                    <input type="hidden" name="action" value="inscription" />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Prénom</label>
                                    <input type="text" class="form-control" name="prenom">
                                    <small class="form-text text-danger"><?=isset($arrayError['prenom']) ? $arrayError['prenom'] : '' ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Nom</label>
                                    <input type="text" class="form-control" name="nom">
                                    <small class="form-text text-danger"><?=isset($arrayError['nom']) ? $arrayError['nom'] : '' ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Date de naissance</label>
                            <input type="text" class="form-control" name="datenaiss">
                            <small class="form-text text-danger"><?=isset($arrayError['datenaiss']) ? $arrayError['datenaiss'] : '' ?></small>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="sexe" id="" value="m"> Masculin
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="sexe" id="" value="f" checked> Féminin
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label >Login</label>
                            <input type="text" class="form-control" name="login">
                            <small class="form-text text-danger"><?=isset($arrayError['login']) ? $arrayError['login'] : '' ?></small>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                            <small class="form-text text-danger"><?=isset($arrayError['password']) ? $arrayError['password'] : '' ?></small>
                        </div>
                        <div class="form-group">
                            <label>Confirmer password</label>
                            <input type="password" class="form-control" name="confirmpassword">
                            <small class="form-text text-danger"><?=isset($arrayError['confirmpassword']) ? $arrayError['confirmpassword'] : '' ?></small>
                        </div>
                        <button type="submit" name="btn_submit" value="btn_connexion" class="btn btn-primary">Inscription</button>
                    </form>
                    <div class="row">
                        <div class="col-md-3 offset-md-9">
                            <a href="<?=WEB_ROUTE.'?controller=security&view=connexion'?>">Se connecter</a>
                        </div>
                    </div>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php require_once (ROUTE_DIR.'views/inc/footer.inc.html.php'); ?>