<?php

class Database
{
    private string $servername = "localhost";

    private string $username = "root";

    private string $password = "";

    private string $dbName = "php_kurs";

    protected function connect()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbName", $this->username, $this->password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
            
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
