<?php

/**
 * Exemple per a M07.
 *
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Classe contenidor,  té la responsabilitat d'instaciar els models i altres objectes.
 **/

namespace Emeset;

/**
 * Container: Classe contenidor.
 *
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Classe contenidor, la responsabilitat d'instaciar els models i altres objectes.
 **/
class Container {
    public $config = [];
    public $sql;
    public $userid;

    /**
     * __construct:  Crear contenidor
     *
     * @param $config array paràmetres de configuració de l'aplicació.
     **/
    public function __construct($config, $userid = null) {
        $this->config = $config;
        $conn = new \Daw\Connection($config);
        $this->sql = $conn->getConnection();
        $this->userid = $userid;
    }

    public function setUserId($userid) {
        $this->userid = $userid;
    }

    public function response() {
        return new \Emeset\Response();
    }

    public function request() {
        return new \Emeset\Request();
    }

    public function apartments() {
        return new \Daw\Apartments($this->sql);
    }

    public function user() {
        return new \Daw\Users($this->sql);
    }
}