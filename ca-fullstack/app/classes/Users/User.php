<?php

namespace App\Users;

use Core\DataHolder;

class User extends DataHolder
{
    const ROLE_ADMIN = 0;
    const ROLE_USER = 1;

    /* Nustato username reiksmes*/
    protected function setUsername(string $username): void
    {
        $this->username = $username;
    }
    /* Grazina username reiksmes*/
    protected function getUsername(): ?string
    {
        return $this->username ?? null;
    }
    /* Nustato password reiksmes*/
    protected function setPassword(string $password): void
    {
        $this->password = $password;
    }
    /* Grazina password reiksmes*/
    protected function getPassword(): ?string
    {
        return $this->password ?? null;
    }
    /* Nustato email reiksmes*/
    protected function setEmail(string $email): void
    {
        $this->email = $email;
    }
    /*Grazina email reiksmes */
    protected function getEmail(): ?string
    {
        return $this->email ?? null;
    }
    /* Nustato email reiksmes*/
    protected function setRole(int $role)
    {
        $this->role = $role;
    }
    /*Grazina email reiksmes */
    protected function getRole(): ?string
    {
        return $this->role ?? null;
    }
    
    protected function setId(int $id)
    {
        $this->id = $id;
    }

    protected function getId(): ?int
    {
        return $this->id ?? null;
    }

    protected function setName(string $name)
    {
        $this->name = $name;
    }

    protected function getName(): ?string
    {
        return $this->name ?? null;
    }
    protected function setSurname(string $surname)
    {
        $this->surname = $surname;
    }

    protected function getSurname(): ?string
    {
        return $this->surname ?? null;
    }
    protected function setNumber($number)
    {
        $this->number = $number;
    }

    protected function getNumber()
    {
        return $this->number ?? null;
    }
    protected function setAddress($address)
    {
        $this->address = $address;
    }

    protected function getAddress()
    {
        return $this->address ?? null;
    }
}
