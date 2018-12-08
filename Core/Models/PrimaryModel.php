<?php

abstract class PrimaryModel
{
    protected $id = 0;

    public function SetId(int $id)
    {   
        $this->id = $id;
    }

    public function GetId()
    {
        return $this->id;
    }
}