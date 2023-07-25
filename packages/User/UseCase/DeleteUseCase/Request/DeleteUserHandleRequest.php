<?php

namespace User\UseCase\DeleteUseCase\Request;

class DeleteUserHandleRequest
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
