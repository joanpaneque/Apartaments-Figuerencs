<?php

namespace Daw;

class Users {
    private $sql;

    public function __construct($sql) {
        $this->sql = $sql;
    }

    public function login($email, $password) {
        $stm = $this->sql->prepare('SELECT * FROM users WHERE email = :email');
        $stm->bindValue(':email', $email);
        $stm->execute();
        $user = $stm->fetch(\PDO::FETCH_ASSOC);
        if ($user && $user['password'] == $password) {
            return $user;
        } else {
            return false;
        }
    }
}