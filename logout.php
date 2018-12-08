<?php
    require 'Core/SessionController.php';

    SessionController::StopUserSession();
    
    header('location:login.php');
    die();