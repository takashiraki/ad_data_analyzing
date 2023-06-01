<?php

namespace Media\UseCase\SearchMediumUseCase;

enum EnumSearchMediumRequest
{
    case Medium_id;
    case Medium_name;
}

class SearchMediumRequest
{

    public function __construct(
        private ?string $medium_id = EnumSearchMediumRequest::Medium_id,
        private ?string $medium_name = EnumSearchMediumRequest::Medium_name
    ) {
        //
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
