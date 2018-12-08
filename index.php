<?php
require 'Core/SessionController.php';
?>
<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf8">

        <link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">

        <title>Atividades</title>
    </head>
    <body>
        <?php include 'navbar.php'; ?>

        <div class="container-fluid pt-4">
            <?php if (SessionController::UserIsLogged()) { ?>
                
            <?php } else { ?>
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <?php include 'login_card.php'; ?>
                    </div>
                </div>
            <?php } ?>
        </div>

    </body>
</html>