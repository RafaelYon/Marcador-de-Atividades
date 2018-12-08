<?php

class UserData
{
    private static $tableName = 'user';

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
            $user->SetPassword($row_assoc['password'], false);
        
        if (isset($row_assoc['role']) && is_numeric($row_assoc['role']))
            $user->SetRole($row_assoc['role']);

        return $user;
    }

    public static function Insert(User $user)
    {
        $tableName = self::$tableName;

        $sql = "INSERT INTO {$tableName} (email, name, password, role) VALUES 
        ('{$user->GetEmail()}', '{$user->GetName()}', '{$user->GetPassword()}', {$user->getRole()})";

        $db = DB::GetInstance();
        $result = $db->DoQuery($sql);

        if (mysqli_affected_rows($db->conn) != 1)
            throw new Exception("Não foi possível inserir este usuário.");
    }

    public static function Update(User $user)
    {
        $tableName = self::$tableName;
        
        $sql  = "UPDATE {$tableName} SET ";
        $sql .= "email = '{$user->GetEmail()}', ";
        $sql .= "name = '{$user->GetName()}', ";
        $sql .= "password = '{$user->GetPassword()}', ";
        $sql .= "role = {$user->GetRole()} ";
        $sql .= "WHERE id_user = {$user->GetId()}";

        $db = DB::GetInstance();
        $result = $db->DoQuery($sql);

        if (mysqli_affected_rows($db->conn) != 1)
            throw new Exception("Não foi possível atualizar este usuário.");
    }

    public static function SelectById(int $id)
    {
        $tableName = self::$tableName;

        $sql = "SELECT id_user, email, name, password, role FROM {$tableName} WHERE id_user = $id";

        $db = DB::GetInstance();
        $result = $db->DoQuery($sql);

        if (mysqli_affected_rows($db->conn) < 1)
            return null;
        
        $rowData = mysqli_fetch_assoc($result);

        return self::FillUserClass($rowData);
    }

    public static function SelectByEmail(string $email)
    {
        $tableName = self::$tableName;
        
        $sql = "SELECT id_user, email, name, password, role FROM $tableName WHERE email LIKE '$email'";

        $db = DB::GetInstance();
        $result = $db->DoQuery($sql);

        if (mysqli_affected_rows($db->conn) < 1)
            return null;
        
        $rowData = mysqli_fetch_assoc($result);

        return self::FillUserClass($rowData);
    }
}