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

    public function register($name, $surname, $email, $phone, $password) {
        $stm = $this->sql->prepare('INSERT INTO users (name, surname, email, phone, password, code, role_code) VALUES (:name, :surname, :email, :phone, :password, NULL, 1)');
        $stm->bindValue(':name', $name);
        $stm->bindValue(':surname', $surname);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':phone', $phone);
        $stm->bindValue(':password', $password);
        $stm->execute();
        if ($stm->errorCode() == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update($name, $surname, $phone, $email) {
        $stm = $this->sql->prepare('UPDATE users SET name = :name, surname = :surname, phone = :phone WHERE email = :email;');
        $stm->bindValue(':name', $name);
        $stm->bindValue(':surname', $surname);
        $stm->bindValue(':phone', $phone);
        $stm->bindValue(':email', $email);

        $stm->execute();
        if ($stm->errorCode() == 0) {
            return true;
        } else {
            return false;
        }
    }

    


    public function exists($email) {
        $stm = $this->sql->prepare('SELECT * FROM users WHERE email = :email');
        $stm->bindValue(':email', $email);
        $stm->execute();
        $user = $stm->fetch(\PDO::FETCH_ASSOC);
        if ($user) {
            return true;
        } else {
            return false;
        }
    }
}