<?php

namespace Config {
    class database
    {
        static function getConnection(): \PDO
        {
            $host = "localhost";
            $port = 3386;
            $database = "todolist";
            $username = "root";
            $password = "";

             return new \PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
        }
    }
}
