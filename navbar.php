<?php
    require_once 'Core/SessionController.php';

    SessionController::StartSessionIfNeed();
    $uri = $_SERVER['REQUEST_URI'];
?>
<div class="row">
    <div class="col">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Atividades</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item  <?php if (preg_match('/index/', $uri)) { echo 'active'; } ?>">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <?php if (SessionController::UserIsLogged()) { ?>
                    <li class="nav-item  <?php if (preg_match('/activitie/', $uri)) { echo 'active'; } ?>">
                        <a class="nav-link" href="activities.php">Minhas Atividades</a>
                    </li>
                <?php } ?>
            </ul>
            <div class="btn-group">

                <?php if (SessionController::UserIsLogged()) { ?>
                    <a class="btn btn-light" href="logout.php">Sair</a>
                <?php } else { ?>
                    <a class="btn btn-light
                        <?php if (preg_match('/login/', $uri)) { echo 'active'; } ?>"
                        href="login.php">Entrar</a>
                    <a class="btn btn-light 
                        <?php if (preg_match('/register/', $uri)) { echo 'active'; } ?>"
                        href="register.php">Cadastro</a>
                <?php } ?>
            </div>
        </div>
        </nav>
    </div>
</div>

<div class="row">
    <?php if (SessionController::ExistsErrorMessage()) { ?>
        <div class="col alert alert-danger pl-4">
            <?php echo SessionController::GetErrorMessage(); ?>
        </div>
    <?php } else if (SessionController::ExistsSuccessMessage()) { ?>
        <div class="col alert alert-success pl-4">
            <?php echo SessionController::GetSuccessMessage(); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
</div>