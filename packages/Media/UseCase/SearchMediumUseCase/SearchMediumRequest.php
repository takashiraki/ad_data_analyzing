<?php

namespace Media\UseCase\SearchMediumUseCase;

class SearchMediumRequest
{

    private $medium_id;
    private $medium_name;

    public function __construct(
        null|string $medium_id,
        null|string $medium_name

    ) {
        $this->medium_id = $medium_id;
        $this->medium_name = $medium_name;
    }


    public function getMediumId()
    {
        return $this->medium_id;
    }

    public function getMediumName()
    {
        return $this->medium_name;
    }
}
