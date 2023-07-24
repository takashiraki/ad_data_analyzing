<?php

namespace User\UseCase\CreateUserUseCase\Request;

class CreateUserHandleRequest
{
    private $user_name;
    private $email;
    private $raw_password;
    private $privilege;

    public function __construct(
        string $name,
        string $email,
        string $password,
        string $privilege,
    ) {
        $this->user_name = $name;
        $this->email = $email;
        $this->raw_password = $password;
        $this->privilege = $privilege;
    }

    public function getUserName(): string
    {
        return $this->user_name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRawPassword(): string
    {
        return $this->raw_password;
    }

    public function getPrivilege(): string
    {
        return $this->privilege;
    }
}
