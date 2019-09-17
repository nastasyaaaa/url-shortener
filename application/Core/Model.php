<?php

namespace App\Core;

class Model
{
    protected $db;

    public function __construct()
    {
        $user = 'mysql';
        $pass = 'mysql';
        $host = 'localhost';
        $dbName = 'url_shortener';

        $dsn = "mysql:host=$host;dbname=$dbName;charset=utf8";
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        try {
            $this->db = new \PDO($dsn, $user, $pass, $options);
        }
        catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

    public function transaction(callable $call)
    {
        $this->db->beginTransaction();

        $call();

        return $this->db->commit();
    }


}