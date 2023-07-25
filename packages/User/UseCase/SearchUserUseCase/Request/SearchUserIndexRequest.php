<?php

namespace User\UseCase\SearchUserUseCase\Request;

class SearchUserIndexRequest
{
    /**
     *
     * @var null|string
     */
    private $user_name;

    /**
     *
     * @var null|string
     */
    private $email;

    /**
     *
     * @var null|string
     */
    private $privilege;

    public function __construct(
        ?string $name,
        ?string $email,
        ?string $privilege,
    ) {
        $this->user_name = $name;
        $this->email = $email;
        $this->privilege = $privilege;
    }

    public function getQueryUserName(): ?string
    {
        return $this->user_name;
    }

    public function getQueryEmail(): ?string
    {
        return $this->email;
    }

    public function getQueryPrivilege(): ?string
    {
        return $this->privilege;
    }
}
