<?php
    require 'Core/DB.php';
    require 'Core/Models/User.php';
    require 'Core/AcessLayers/UserData.php';
    require 'Core/SessionController.php';
    
    try
    {        
        $user = new User();
        $user->SetName($_POST['name']);
        $user->SetEmail($_POST['email']);
        $user->SetPassword($_POST['password']);

        // Verifica se já não exite um usuário com este e-mail
        $dbUser = UserData::SelectByEmail($user->GetEmail());

        if ($dbUser != null)
        {
            SessionController::SetErrorMessage('Desculpe, vocẽ não pode se registrar com esse e-mail. Por favor escolha outro.');
            
            header('location:register.php');
            die();
        }

        UserData::Insert($user);

        SessionController::SetSuccessMessage("Cadastrado com sucesso! Agora você já pode se logar:");

        header('location:login.php');
        die();
    }
    catch (Exception $ex)
    {
        // Salva o erro na sessão para exibir esta menssagem sem utilizar a url
        SessionController::SetErrorMessage($ex->getMessage());

        header('location:register.php');
        die();
    }