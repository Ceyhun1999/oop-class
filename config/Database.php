<?php
class Database
{
    private $servername = 'localhost:3307';
    private $username = 'root';
    private $password = '';
    private $dbname = 'website3';
    public $conn = null;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            return false;
        } else {
            return true;
        }
    }
}
