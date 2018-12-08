<?php
require 'Core/Authentication.php';
Authentication::OnlyNotLogged();
?>
<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf8">

        <link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">

        <title>Atividades - Login</title>
    </head>
    <body>
        <?php include 'navbar.php'; ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 offset-md-4 pt-4">
                    <?php require 'login_card.php'; ?>
                </div>
            </div>
        </div>
    
    <?php include 'jss.php'; ?>
    </body>
</html>