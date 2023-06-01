<?php

namespace Media\UseCase\SearchMediumUseCase;

enum EnumSearchMediumRequest
{
    case null;
}

class SearchMediumRequest
{

    private $medium_id;
    private $medium_name;

    public function __construct(
        ?string $medium_id,
        ?string $medium_name

    ) {
        $this->medium_id = $medium_id !== null ? $medium_id : EnumSearchMediumRequest::null;
        $this->medium_name = $medium_name !== null ? $medium_name : EnumSearchMediumRequest::null;
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
