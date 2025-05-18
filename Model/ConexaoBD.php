<?php

class ConexaoBD
{
    private $serverName = 'localhost';
    private $userName = 'root';
    private $password = 'admin';
    private $dbName = 'projeto_final';


    public function conectar()
    {
        $con = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        } else {
            return $con;
        }
    }
}
