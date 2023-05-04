<?php
    function open(){
        $username = "root";
        $database = "bebiimpianti";
        $password = "";
        $host = "localhost";
        $connection = new PDO("mysql: host=$host; dbname=$database", $username, $password );
        return $connection;
    }
?>