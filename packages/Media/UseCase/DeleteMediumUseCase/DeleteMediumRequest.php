<?php

namespace Media\UseCase\DeleteMediumUseCase;

class DeleteMediumRequest
{
    private $medium_id;

    public function __construct(string $id)
    {
        $this->medium_id = $id;
    }

    public function getMediumId()
    {
        return $this->medium_id;
    }
}
