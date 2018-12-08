<?php

class DB
{
    private static $instance;
    
    public $conn = null;
    
    // Singleton para existir apenas 1 classe do banco
    public static function GetInstance()
    {
        if (self::$instance === null)
            self::$instance = new DB();

        return self::$instance;
    }

    private function __construct()
    {
        $this->conn = mysqli_connect('localhost', 'root', '', 'activities_clock');

        if (!$this->conn)
        {
            die("Conexão com o banco falhou: " + mysqli_connect_error());
        }
    }

    // Previne que esta classe seja clona
    private function __clone() {}

    // Previne a desserialização desta classe
    private function __wakeup() {}

    public function DoQuery($query)
    {
        $result = mysqli_query($this->conn, $query);

        if (!$result)
            throw new Exception(mysqli_error($this->conn));
        
        return $result;
    }
}