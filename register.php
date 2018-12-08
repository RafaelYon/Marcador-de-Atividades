<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf8">

        <link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">

        <title>Atividades - Registro</title>
    </head>
    <body>
        <?php include 'navbar.php'; ?>

        <div class="container-fluid">
            <div class="row">

                <div class="col-md-4 offset-md-4 p-4">

                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center">Cadastro</h2>
                            <hr>

                            <div class="row">
                                <div class="col">
                                    <form name="register_form" method="post" action="register_proc.php">
                                        
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input class="form-control" type="text" name="name" required>
                                        </div>

                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input class="form-control" type="email" name="email" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Senha</label>
                                            <input class="form-control" type="password" name="password" required>
                                        </div>

                                        <div class="form-group text-center">
                                            <button class="btn btn-danger" type="reset">Limpar</button>
                                            <button class="btn btn-primary" type="submit">Enviar</button>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>

    <?php include 'jss.php'; ?>

    </body>
</html>