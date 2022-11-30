<?php

namespace model\user;

use model\user\Role;
use controller\util\Util;


class User
{

    private $id;
    private $name;
    private $password;
    private $role;
    private $email;
    private $birthday;
    private $valid;

    //create a user with a random generated id
    //#note: id is not check if it is present id db. 
    //upon creation user is assing as a role

    public function __construct($name, $password, $email)
    {
        $this->id = Util::generateId();
        $this->name = $name;
        $this->password = $password;
        $this->role = Role::$USER;
        $this->email = $email;
        $this->valid = false;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function setRole($role): void
    {
        $this->role = $role;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setBirthday($birthday): void
    {
        $this->birthday = $birthday;
    }
    public function setValid($valid): void
    {
        $this->valid = $valid;
    }

    public function isValid()
    {
        return $this->valid;
    }
}
