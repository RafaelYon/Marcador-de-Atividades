<?php

class UserData
{
    private static $dbFile = 'user';

    private static function FillUserClass(array $row_assoc) : User
    {
        $user = new User();
        
        if (isset($row_assoc['id_user']) && is_numeric($row_assoc['id_user']))
            $user->SetId($row_assoc['id_user']);
        
        if (!empty($row_assoc['email']))
            $user->SetEmail($row_assoc['email']);

        if (!empty($row_assoc['name']))
            $user->SetName($row_assoc['name']);
        
        if (!empty($row_assoc['password']))
            $user->SetPassword($row_assoc['password']);
        
        if (isset($row_assoc['role']) && is_numeric($row_assoc['role']))
            $user->SetRole($row_assoc['role']);

        return $user;
    }

    public static function Insert(User $user)
    {
        $dbFile = self::$dbFile;

        $sql = "INSERT INTO {$dbFile} (email, name, password, role) VALUES 
        ('{$user->GetEmail()}', '{$user->GetName()}', '{$user->GetPassword()}', {$user->getRole()})";

        $db = DB::GetInstance();
        $result = $db->DoQuery($sql);

        if (mysqli_affected_rows($db->conn) != 1)
            throw new Exception("Não foi possível inserir este usuário.");
    }

    public static function Update(User $user)
    {
        $dbFile = self::$dbFile;
        
        $sql  = "UPDATE {$dbFile} SET ";
        $sql .= "email = '{$user->GetEmail()}', ";
        $sql .= "name = '{$user->GetName()}', ";
        $sql .= "password = '{$user->GetPassword()}', ";
        $sql .= "role = {$user->GetRole()} ";
        $sql .= "WHERE id_user = {$user->GetId()}";

        $db = DB::GetInstance();
        $result = $db->DoQuery($sql);

        if (mysqli_affected_rows($result) != 1)
            throw new Exception("Não foi possível atualizar este usuário.");
    }

    public static function SelectById(int $id)
    {
        $dbFile = self::$dbFile;

        $sql = "SELECT id_user, email, name, password, role FROM {$dbFile} WHERE id_user = $id";

        $db = DB::GetInstance();
        $result = $db->DoQuery($sql);

        if (mysqli_affected_rows($result) < 1)
            return null;
        
        $rowData = mysqli_fetch_assoc($result);

        return self::FillUserClass($rowData);
    }

    public static function SelectByEmail(string $email)
    {
        $dbFile = self::$dbFile;
        
        $sql = "SELECT id_user, email, name, password, role FROM $dbFile WHERE email LIKE '$email'";

        $db = DB::GetInstance();
        $result = $db->DoQuery($sql);

        if (mysqli_affected_rows($db->conn) < 1)
            return null;
        
        $rowData = mysqli_fetch_assoc($result);

        return self::FillUserClass($rowData);
    }
}