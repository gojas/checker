<?php

$servername = "localhost";
$username = "root";
$password = "root";

class Database {
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "root";
    private static $instance;

    public static function getInstance() {
        if (!self::$instance) {
            $servername = self::$servername;
            $conn = new PDO("mysql:host={$servername};dbname=checker", self::$username, self::$password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            self::$instance = $conn;
        }

        return self::$instance;
    }
}