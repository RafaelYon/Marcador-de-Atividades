<?php

class ActivityData
{
    private static $tableName = 'activity';

    private static function FillActivityClass(array $row_assoc) : Activity
    {
        $activity = new Activity();

        if (isset($row_assoc['id_activity']) && is_numeric($row_assoc['id_activity']))
            $activity->SetId($row_assoc['id_activity']);
        
        if (isset($row_assoc['id_user']) && is_numeric($row_assoc[id_user]))
            $activity->SetUserId($row_assoc['id_user']);
        
        if (!empty($row_assoc['name']))
            $activity->SetName($row_assoc['name']);
        
        if (!empty($row_assoc['start_date']))
            $activity->SetStartDate($row_assoc['start_date']);
        
        if (!empty($row_assoc['end_date']))
            $activity->SetEndDate($row_assoc['end_date']);
        
        return $activity;
    }

    public static function Insert(Activity $activity)
    {
        $tableName = self::$tableName;

        $sql = "INSERT INTO $tableName (id_user, name, start_date, end_date) VALUES 
            ({$activity->GetUserId()}, '{$activity->GetName()}', '{$activity->GetStartDate()}',
            '{$activity->GetEndDate()}')";
        
        $db = DB::GetInstance();
        $result = $db->DoQuery($sql);

        if (mysqli_affected_rows($db->conn) != 1)
            throw new Exception('Não foi possível inserir este atividade.');
    }

    public static function Update(Activity $activity)
    {
        $tableName = self::$tableName;

        $sql  = "UPDATE $tableName SET ";
        $sql .= "name = '{$activity->GetName()}', ";
        $sql .= "start_date = '{$activity->GetStartDate()}', ";
        $sql .= "end_date = '{$activity->GetEndDate()}' ";
        $sql .= "WHERE id_activity = {$activity->GetId()}";

        $db = DB::GetInstance();
        $result = $db->DoQuery($sql);

        if (mysqli_affected_rows($db->conn) != 1)
            throw new Exception('Não foi possível atualizar este atividade.');
    }

    public static function SelectById(int $id)
    {
        $tableName = self::$tableName;

        $sql = "SELECT id_activity, id_user, name, start_date, end_date FROM $tableName WHERE id_activity = $id";

        $db = DB::GetInstance();
        $result = $db->DoQuery($sql);

        if (mysqli_affected_rows($db->conn) < 1)
            return null;
        
        $rowData = mysqli_fetch_assoc($result);

        return self::FillActivityClass($rowData);
    }

    public static function SelectAll()
    {
        $tableName = self::$tableName;

        $sql = "SELECT id_activity, id_user, name, start_date, end_date FROM $tableName";

        $db = DB::GetInstance();
        return $db->DoQuery($sql);
    }

    public static function SelectAllByUserId(int $userId)
    {
        $tableName = self::$tableName;

        $sql = "SELECT id_activity, id_user, name, start_date, end_date FROM $tableName WHERE id_user = $userId";

        $db = DB::GetInstance();
        return $db->DoQuery($sql);
    }
}