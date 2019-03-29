<?php
/**
 * Created by PhpStorm.
 * User: maud
 * Date: 27-3-2019
 * Time: 10:43
 */

class Events
{
    public $conn;
    public function __construct()
    {
        define('__ROOT__', dirname(dirname(dirname(__FILE__))));
        $db = require_once(__ROOT__ . '/config/config.php');

        $server_name = $db['server_name'];
        $db_name = $db['db_name'];
        $username = $db['username'];
        $password = $db['password'];

        $this->conn = new PDO("mysql:host=$server_name;dbname=$db_name", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function getEvents()
    {
        $stmt = $this->conn->query("SELECT * FROM tbl_evenement");

    }

}

