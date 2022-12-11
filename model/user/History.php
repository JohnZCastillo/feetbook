<?php

namespace model\user;

class History {

    private $id;
    private $sessionId;
    private $email;
    private $login;
    private $logout;

    public function getId() {
        return $this->id;
    }

    public function getSessionId() {
        return $this->sessionId;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getLogout() {
        return $this->logout;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setSessionId($sessionId): void {
        $this->sessionId = $sessionId;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setLogin($login): void {
        $this->login = $login;
    }

    public function setLogout($logout): void {
        $this->logout = $logout;
    }

}
