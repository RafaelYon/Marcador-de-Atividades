<?php
require_once 'Core/SessionController.php';

/**
 * Classe para controlar o acesso a páginas "protegidas"
 */
class Authentication
{
    public static function OnlyLogged()
    {
        if (!SessionController::UserIsLogged())
        {
            SessionController::SetErrorMessage('Você deve estar logado primeiro.');
            
            header('location:login.php');
            die();
        }
    }

    public static function OnlyNotLogged()
    {
        if (SessionController::UserIsLogged())
        {
            SessionController::SetErrorMessage('Desculpe, você já está logado.');
            
            header('location:activities.php');
            die();
        }
    }
}