<?php
require 'PrimaryModel.php';

class User extends PrimaryModel
{
    private $email = null;
    private $name = null;
    private $password = null;
    private $role = 1;
    
    public function SetEmail(string $email)
    {
        if ($email == null)
            throw new Exception('O e-mail do usuário não pode estar vazio.');
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            throw new Exception("O e-mail \"$email\" não é válido.");
        
        $this->email = $email;
    }

    public function GetEmail()
    {
        return $this->email;
    }
    
    public function SetName(string $name)
    {
        if ($name == null)
            throw new Exception('O nome do usuário não pode estar vazio.');
        
        $this->name = $name;
    }

    public function GetName()
    {
        return $this->name;
    }

    public function SetPassword(string $password, bool $hash = true)
    {
        if ($password == '')
            throw new Exception('A senha do usuário não pode estar vazia.');
        
        if ($hash)
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        else
            $this->password = $password;
    }

    public function GetPassword()
    {
        return $this->password;
    }

    public function VerifyPassword(string $attemptedPassword) : bool
    {
        if ($this->password == '')
            throw new Exception('A senha do usuário não foi definida.');
        
        if ($attemptedPassword == '')
            throw new Exception('A senha do usuário não pode estar vazia.');
        
        return password_verify($attemptedPassword, $this->password);
    }

    public function RemovePassword()
    {
        $this->password = '';
    }

    public function SetRole(int $role)
    {   
        $this->role = $role;
    }

    public function GetRole()
    {
        return $this->role;
    }

    public function GetRoleName()
    {
        switch ($this->role)
        {
            case 0:
                return 'Administrador';
            case 1:
                return 'Usuário';
            default:
                return 'Desconhecido';
        }
    }
}