<?php

namespace App\Database\Config;

use mysqli;

class connection
{
    private $DBServerName = 'localhost';
    private $DBUserName = 'root';
    private $DBpassword = '';
    private $DBdatabaseName = 'ecommerce';
    public $conn;

    public function __construct()
    {
        $this->conn =  new  mysqli($this->DBServerName, $this->DBUserName, $this->DBpassword, $this->DBdatabaseName);
    }
    public function __destruct()
    {
        $this->conn->close();
    }
}
