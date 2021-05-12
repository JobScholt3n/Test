<?php
class Database
{
    private $servername = 'localhost';
    private $username = "root";
    private $password = "";
    private $dbname = "netland";
    private $charset = "utf8mb4";

    public function connect()
    {
        $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
        $pdo = new PDO($dsn, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
