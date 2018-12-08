<?php
    require 'Core/DB.php';
    require 'Core/Models/User.php';
    require 'Core/AcessLayers/UserData.php';
    require 'Core/SessionController.php';

    if (empty($_POST))
    {
        header('location:login.php');
        die();
    }

    try
    {
        $user = new User();
        
        // Armazena os dados do formulário e os valida.
        $user->SetEmail($_POST['email']);
        $user->SetPassword($_POST['password'], false);

        // Busca no banco algum usuário com este e-mail
        $user = UserData::SelectByEmail($user->GetEmail());

        if ($user == null)
            throw new Exception('Credenciais incorretas!');
        
        // Verifica se a senha digita é igual ao que foi armazenaddo no banco
        if (!$user->VerifyPassword($_POST['password']))
            throw new Exception('Credenciais incorretas!');

        SessionController::StartUserSession($user);
        SessionController::SetSuccessMessage('Bem vindo ' . ucfirst($user->GetName()) . '!');

        header('location:activities.php');
        die();
    }
    catch (Exception $ex)
    {
        SessionController::SetErrorMessage($ex->getMessage());

        header('location:login.php');
        die();
    }