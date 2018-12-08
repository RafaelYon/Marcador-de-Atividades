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

        $_SESSION['msg'] = $msg;
    }

    public static function ExistsSuccessMessage()
    {
        self::StartSessionIfNeed();

        return !empty($_SESSION['msg']);
    }

    public static function GetSuccessMessage()
    {
        self::StartSessionIfNeed();

        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);

        return $msg;
    }
}