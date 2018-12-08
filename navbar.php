<?php
    require 'Core/SessionController.php';

    SessionController::StartSessionIfNeed();

    $uri = $_SERVER['REQUEST_URI'];
?>
<div class="row">
    <div class="col">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Atividades</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <div class="btn-group">
                <a class="btn btn-light
                    <?php if (preg_match('/login/', $uri)) { echo 'active'; } ?>"
                    href="login.php">Entrar</a>
                <a class="btn btn-light 
                    <?php if (preg_match('/register/', $uri)) { echo 'active'; } ?>"
                    href="register.php">Cadastro</a>
            </div>
        </div>
        </nav>
    </div>
</div>

<div class="row">
    <?php if (SessionController::ExistsErrorMessage()) { ?>
        <div class="col alert alert-danger">
            <?php echo SessionController::GetErrorMessage(); ?>
        </div>
    <?php } else if (SessionController::ExistsSuccessMessage()) { ?>
        <div class="col alert alert-success">
            <?php echo SessionController::GetSuccessMessage(); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
</div>