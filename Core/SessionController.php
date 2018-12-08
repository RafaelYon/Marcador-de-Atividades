<?php

class SessionController
{
    public static function StartSessionIfNeed()
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();
    }
    
    // Salva um menssagem de erro usando sessão
    // Utilizei isto para possuir url limpas
    public static function SetErrorMessage($msg)
    {
        self::StartSessionIfNeed();

        $_SESSION['msgError'] = $msg;
    }

    public static function ExistsErrorMessage()
    {
        self::StartSessionIfNeed();

        return !empty($_SESSION['msgError']);
    }

    public static function GetErrorMessage()
    {
        self::StartSessionIfNeed();

        $msg = $_SESSION['msgError'];
        unset($_SESSION['msgError']);

        return $msg;
    }

    // Salva um menssagem usando a sessão
    public static function SetSuccessMessage($msg)
    {
        self::StartSessionIfNeed();

        $_SESSION['msgSuccess'] = $msg;
    }

    public static function ExistsSuccessMessage()
    {
        self::StartSessionIfNeed();

        return !empty($_SESSION['msgSuccess']);
    }

    public static function GetSuccessMessage()
    {
        self::StartSessionIfNeed();

        $msg = $_SESSION['msgSuccess'];
        unset($_SESSION['msgSuccess']);

        return $msg;
    }

    public static function StartUserSession(User $user)
    {
        self::StartSessionIfNeed();
        
        // Todo usuário deve possuir um id válido.
        if ($user->GetId() == 0)
            return;

        // Remove a senha da modal
        $user->RemovePassword();
        
        // Armazena diretamento o objeto User na sessão
        $_SESSION['user'] = $user;
    }

    public static function StopUserSession()
    {
        self::StartSessionIfNeed();

        unset($_SESSION['user']);

        session_destroy();
    }

    public static function UserIsLogged() : bool
    {
        self::StartSessionIfNeed();

        return (!empty($_SESSION['user']));
    }
}