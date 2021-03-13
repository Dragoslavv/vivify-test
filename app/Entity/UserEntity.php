<?php
namespace App\Entity;

class UserEntity extends AbstractEntity implements GenericEntityInterface {
    //class properties
    private $idUser;
    private $firstName;
    private $lastName;
    private $email;

    public function __toString()
    {
        $names = [];
        if(false === empty($this->firstName)) {
            $names[] = $this->firstName;
        }

        if(false === empty($this->lastName)) {
            $names[] = $this->lastName;
        }

        return implode(' ', $names);
    }

    public function getId() {
        return $this->idUser;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setId($idUser) {
        $this->idUser = $idUser;
        return $this;
    }

    public function setFirstName($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

}