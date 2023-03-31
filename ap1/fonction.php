<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

    function createBdd()
    {
        $host = '127.0.0.1';
        $db   = 'ap';
        $user = 'root';
        $pass = 'root';
        $dsn = "mysql:host=$host;dbname=$db";
        $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        }
        catch (\PDOException $e) {
        print"ERREUR:".$e;
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        return $pdo;
    }


?>