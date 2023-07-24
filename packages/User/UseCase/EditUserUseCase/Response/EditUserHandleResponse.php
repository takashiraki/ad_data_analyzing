<?php

namespace User\UseCase\EditUserUseCase\Response;

class EditUserHandleResponse
{
    private $user_id;
    private $user_name;
    private $email;
    private $privilege;

    public function __construct(
        string $id,
        string $name,
        string $email,
        string $privilege
    ) {
        $this->user_id = $id;
        $this->user_name = $name;
        $this->email = $email;
        $this->privilege = $privilege;
    }

    public function getUserId(): string
    {
        return $this->user_id;
    }

    public function getUserName(): string
    {
        return $this->user_name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPrivilege(): string
    {
        return $this->privilege;
    }
}
