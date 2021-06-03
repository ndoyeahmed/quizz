<nav class="navbar navbar-expand-md navbar-light bg-info">
    <a class="navbar-brand" href="#">QUIZZ</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <?php if (est_admin()): ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=WEB_ROUTE.'?controller=admin&view=liste.question'?>">Liste des questions <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=WEB_ROUTE.'?controller=admin&view=liste.joueur'?>">Liste des joueurs</a>
                </li>
            <?php endif; ?>
            <?php if(est_joueur()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=WEB_ROUTE.'?controller=joueur&view=jeu'?>">Jeu</a>
                </li>
            <?php endif; ?>
        </ul>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <?php if(est_connect()): ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=WEB_ROUTE.'?controller=security&view=deconnexion'?>">Deconnexion <span class="sr-only">(current)</span></a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>