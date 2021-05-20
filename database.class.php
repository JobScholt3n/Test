<?php
class Database
{
    private $servername = 'jscholten@gc-webhosting.nl';
    private $username = "jscholten_dbuser";
    private $password = "prH1Ku#xjqf3";
    private $dbname = "jscholten_netland";
    private $charset = "utf8mb4";

    public function connect()
    {
        try {
            $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch (PDOException $e){
            echo  "Connection failed: " . $e->getMessage();
        }
    }
}
