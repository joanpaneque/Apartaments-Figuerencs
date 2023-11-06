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
            return $user["code"];
        } else {
            return false;
        }
    }

    public function getData($userid) {
        $stm = $this->sql->prepare('SELECT * FROM users WHERE code = :code');
        $stm->bindValue(':code', $userid);
        $stm->execute();
        $user = $stm->fetch(\PDO::FETCH_ASSOC);
        return $user;
    }

    public function getPermissions($userid) {
        $user = $this->getData($userid);
        $stm = $this->sql->prepare('SELECT * FROM permissions JOIN roles_permissions ON permissions.code = roles_permissions.permission_code WHERE roles_permissions.role_code = :role_code');
        $stm->bindValue(':role_code', $user['role_code']);
        $stm->execute();
        $permissions = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $permissions;
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

    public function update($name, $surname, $phone, $email, $card_number, $cvc, $card_date) {
        $stm = $this->sql->prepare('UPDATE users SET name = :name, surname = :surname, phone = :phone, card_number = :card_number, cvc = :cvc, card_date = :card_date WHERE email = :email;');
        $stm->bindValue(':name', $name);
        $stm->bindValue(':surname', $surname);
        $stm->bindValue(':phone', $phone);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':card_number', $card_number);
        $stm->bindValue(':cvc', $cvc);
        $stm->bindValue(':card_date', $card_date);

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