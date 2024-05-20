<?php

class Database
{
    private static $instance = null;
    
    public static function getInstance()
    {
        if (self::$instance === null) {
            $host = 'localhost';
            $db   = 'agenda_contatos';
            $user = 'root';
            $pass = '';

            $dsn = "mysql:host=$host;dbname=$db;";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                self::$instance = new PDO($dsn, $user, $pass, $options);
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

        return self::$instance;
    }
    
}
