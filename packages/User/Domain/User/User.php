<?php

namespace User\Domain\User;

class User
{
    private $user_id;
    private $user_name;
    private $privilege;
    private $email;
    private $password_hash;

    public function __construct(
        UserId $id,
        USerName $name,
        Privilege $privilege,
        Email $email,
        PasswordHash $password_hash,
    ) {
        $this->user_id = $id;
        $this->user_name = $name;
        $this->privilege = $privilege;
        $this->email = $email;
        $this->password_hash = $password_hash;
    }

    public function getUserId(): UserId
    {
        return $this->user_id;
    }

    public function getUserName(): USerName
    {
        return $this->user_name;
    }

    public function getUserPrivilege(): Privilege
    {
        return $this->privilege;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPasswordHash(): PasswordHash
    {
        return $this->password_hash;
    }
}
