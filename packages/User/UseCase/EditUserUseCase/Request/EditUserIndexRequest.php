<?php

namespace User\UseCase\EditUserUseCase\Request;

class EditUserIndexRequest
{
    private $user_id;

    public function __construct(string $id)
    {
        $this->user_id = $id;
    }

    public function getUserId(): string
    {
        return $this->user_id;
    }
}
