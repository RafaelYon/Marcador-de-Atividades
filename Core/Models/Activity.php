<?php
require 'PrimaryModel.php';

class Activity extends PrimaryModel
{
    private $id_user;
    private $name;
    private $start_date;
    private $end_date;

    private $user;

    public function SetUserId(int $id_user)
    {
        $this->id_user = $id_user;
    }

    public function GetUserId() : int
    {
        return $this->id_user;
    }

    public function SetName(string $name)
    {
        if ($name == '')
            throw new Exception('O nome da atividade não pode estar vazia.');
        
        $this->name = $name;
    }

    public function GetName() : string
    {
        return $this->name;
    }

    public function SetStartDate(date $date)
    {
        if ($date == null)
            throw new Exception('A data inicial não pode estar vazia.');

        $this->start_date = $date;
    }

    public function GetStartDate() : date
    {
        return $this->start_date;
    }

    public function SetEndDate(date $date)
    {
        if ($date == null)
            throw new Exception('A data final não pode estar vazia.');
        
        $this->end_date = $date;
    }

    public function GetEndDate() : date
    {
        return $this->end_date;
    }
}