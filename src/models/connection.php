<?php

namespace Daw;

class Connection {
    private $sql = null;

    public function __construct($config) {
        $dsn = "mysql:host={$config["database"]["host"]};dbname={$config["database"]["name"]};charset=utf8";
        $user = $config["database"]["user"];
        $password = $config["database"]["password"];
        try {
            $this->sql = new \PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            die("Connexió fallida");
        }
    }

    public function getConnection() {
        return $this->sql;
    }
}