<?php


//        $servername = "localhost";
//        $username = "newuser";
//        $password = "root";
//        $dbname = "bloemere";
//
//        $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $servername = "localhost";
    $username = "vierhaze";
    $password = "RobertHaas03-10";
    $dbname = "vierhaze-5";

    $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



?>